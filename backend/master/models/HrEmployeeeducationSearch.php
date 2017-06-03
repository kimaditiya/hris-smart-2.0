<?php

namespace backend\master\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\master\models\HrEmployeeeducation;

/**
 * HrEmployeeeducationSearch represents the model behind the search form about `backend\master\models\HrEmployeeeducation`.
 */
class HrEmployeeeducationSearch extends HrEmployeeeducation
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['education_id', 'education_level', 'education_tanda'], 'integer'],
            [['employee_identifikasi', 'education_institution', 'education_majorin', 'education_city', 'education_startyear', 'education_endyear'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
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
        $query = HrEmployeeeducation::find();

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
            'education_id' => $this->education_id,
            'education_level' => $this->education_level,
            'education_tanda' => $this->education_tanda,
        ]);

        $query->andFilterWhere(['like', 'employee_identifikasi', $this->employee_identifikasi])
            ->andFilterWhere(['like', 'education_institution', $this->education_institution])
            ->andFilterWhere(['like', 'education_majorin', $this->education_majorin])
            ->andFilterWhere(['like', 'education_city', $this->education_city])
            ->andFilterWhere(['like', 'education_startyear', $this->education_startyear])
            ->andFilterWhere(['like', 'education_endyear', $this->education_endyear]);

        return $dataProvider;
    }
}
