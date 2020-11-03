<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\TownBlock;
use app\models\User;
use app\models\Population;
use app\models\City;
use Yii;

/**
 * TownBlockSearch represents the model behind the search form of `app\models\TownBlock`.
 */
class TownBlockSearch extends TownBlock
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'city_id','region_id'], 'integer'],
            [['name'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = TownBlock::find()->orderBy(['id' => SORT_DESC]);

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'city_id' => $this->city_id,
            'region_id' => $this->region_id,
        ]);

        if(User::isViloyatRaisi()) {
            $region = Yii::$app->user->identity['region_id'];
            $query->andFilterWhere(['region_id' => $region]);
        }

        if(User::isTumanRaisi() || User::isTumanHodimi()) {
            $city = Yii::$app->user->identity['city_id'];
            $query->andFilterWhere(['city_id' => $city]);
        }

        // if(User::isTumanRaisi()) {
        //     $city = Yii::$app->user->identity['city_id'];
        //     $query->andFilterWhere(['user.city_id' => $city]);
        // }

        $query->andFilterWhere(['like', 'name', $this->name]);

        return $dataProvider;
    }
}
