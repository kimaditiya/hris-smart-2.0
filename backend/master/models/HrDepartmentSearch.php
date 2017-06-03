<?php

namespace backend\master\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\master\models\HrDepartment;

/**
 * HrDepartmentSearch represents the model behind the search form about `backend\master\models\HrDepartment`.
 */
class HrDepartmentSearch extends HrDepartment
{
    /**
     * @inheritdoc
     */
    public $nameCompany;
    public $nameDivisi;
    public $namedirektorat;
    public function rules()
    {
        return [
            [['department_id', 'direktorat_id', 'devision_id', 'department_tanda'], 'integer'],
            [['department_name','nameCompany','nameDivisi','namedirektorat'], 'safe'],
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
        $query = HrDepartment::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort'=>false,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'department_id' => $this->department_id,
            'direktorat_id' => $this->namedirektorat,
            'devision_id' => $this->nameDivisi,
            'smartgroup_code' => $this->nameCompany,
            'department_tanda' => $this->department_tanda,
        ]);

        $query->andFilterWhere(['like', 'department_name', $this->department_name]);

        return $dataProvider;
    }
}
