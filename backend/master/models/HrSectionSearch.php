<?php

namespace backend\master\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\master\models\HrSection;

/**
 * HrSectionSearch represents the model behind the search form about `backend\master\models\HrSection`.
 */
class HrSectionSearch extends HrSection
{
    /**
     * @inheritdoc
     */
    public $nameDepartement;
    public $nameCompany;
    public function rules()
    {
        return [
            [['section_id', 'department_id', 'section_tanda'], 'integer'],
            [['smartgroup_code', 'section_name','nameDepartement','nameCompany'], 'safe'],
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
        $query = HrSection::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort'=>false
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'section_id' => $this->section_id,
            'department_id' => $this->nameDepartement,
            'section_tanda' => $this->section_tanda,
        ]);

        $query->andFilterWhere(['like', 'smartgroup_code', $this->nameCompany])
            ->andFilterWhere(['like', 'section_name', $this->section_name]);

        return $dataProvider;
    }
}
