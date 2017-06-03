<?php

namespace backend\sistem\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\sistem\models\HrEmployeelog;

/**
 * HrEmployeelogSearch represents the model behind the search form about `backend\sistem\models\HrEmployeelog`.
 */
class HrEmployeelogSearch extends HrEmployeelog
{
    /**
     * @inheritdoc
     */
    public $nameEmploye;

    public function rules()
    {
        return [
            [['log_id', 'smf', 'rajamokas', 'sma', 'smabadi', 'smauto', 'bas', 'ssm', 'log_status', 'log_tanda'], 'integer'],
            [['employee_identifikasi', 'employee_nik', 'smartgroup_code', 'employeelog_gradedari', 'employeelog_gradesampai', 'employee_pass', 'employee_passori','nameEmploye'], 'safe'],
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
        $query = HrEmployeelog::find()->where(['<','log_tanda',3]);

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

       $query->joinWith(['employeeTbl' => function ($q) {
            $q->where('hr_employee.employee_name LIKE "%' . $this->nameEmploye . '%"');
        }]);

        $query->andFilterWhere(['like', 'log_tanda', $this->log_tanda]);

        return $dataProvider;
    }
}
