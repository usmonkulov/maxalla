<?php

namespace app\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Population;
use app\models\User;
use app\models\City;
use Yii;

/**
 * PopulationSearch represents the model behind the search form of `app\models\Population`.
 */
class PopulationSearch extends Population
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'user_id', 'birthday', 'gender', 'region_id', 'city_id', 'town_block_id'], 'integer'],
            [['first_name', 'second_name', 'middle_name', 'passport', 'nation', 'address', 'phone', 'email', 'image', 'created_at', 'updated_at'], 'safe'],
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
        $query = Population::find();

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

        if(User::isViloyatRaisi()) {
            $region = Yii::$app->user->identity['region_id'];
            $query->andFilterWhere(['population.region_id' => $region]);
        }
        if(User::isTumanRaisi()) {
            $city = Yii::$app->user->identity['city_id'];
            $query->andFilterWhere(['city_id' => $city]);
        }
        if(User::isMahhallaRaisi() || User::isKotib() || User::isMaslahatchi() || User::isPospon() || User::isInspektor())
        {
            $town_block = Yii::$app->user->identity['town_block_id'];
            $query->andFilterWhere(['town_block_id' => $town_block]);
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'user_id' => $this->user_id,
            'birthday' => $this->birthday,
            'gender' => $this->gender,
            'region_id' => $this->region_id,
            'city_id' => $this->city_id,
            'town_block_id' => $this->town_block_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'first_name', $this->first_name])
            ->andFilterWhere(['like', 'second_name', $this->second_name])
            ->andFilterWhere(['like', 'middle_name', $this->middle_name])
            ->andFilterWhere(['like', 'passport', $this->passport])
            ->andFilterWhere(['like', 'nation', $this->nation])
            ->andFilterWhere(['like', 'address', $this->address])
            ->andFilterWhere(['like', 'phone', $this->phone])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'image', $this->image]);

        return $dataProvider;
    }
}
