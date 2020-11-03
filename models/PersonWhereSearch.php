<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\PersonWhere;

/**
 * PersonWhereSearch represents the model behind the search form of `app\models\PersonWhere`.
 */
class PersonWhereSearch extends PersonWhere
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'population_id'], 'integer'],
            [['republic', 'region', 'city', 'address', 'working_place', 'education', 'export', 'import'], 'safe'],
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
        $query = PersonWhere::find();

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
            'population_id' => $this->population_id,
        ]);

        $query->andFilterWhere(['like', 'republic', $this->republic])
            ->andFilterWhere(['like', 'region', $this->region])
            ->andFilterWhere(['like', 'city', $this->city])
            ->andFilterWhere(['like', 'address', $this->address])
            ->andFilterWhere(['like', 'working_place', $this->working_place])
            ->andFilterWhere(['like', 'education', $this->education])
            ->andFilterWhere(['like', 'export', $this->export])
            ->andFilterWhere(['like', 'import', $this->import]);

        return $dataProvider;
    }
}
