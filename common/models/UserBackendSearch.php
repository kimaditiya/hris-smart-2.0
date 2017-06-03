<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\UserBackend;

/**
 * UserBackendSearch represents the model behind the search form about `common\models\UserBackend`.
 */
class UserBackendSearch extends UserBackend
{
    /**
     * @inheritdoc
     */
    public $nameEmploye;
    public function rules()
    {
        return [
            [['employee_identifikasi','nameEmploye'], 'safe'],
        ];
    }

    public function attributes()
    {
        /*Author -wawan- add related fields to searchable attributes */
        return array_merge(parent::attributes(), ['nameEmploye']);
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

      
        $query = UserBackend::find()->where(['<','log_tanda',3]);



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

       $query->joinWith(['employeeTbl' => function ($q) {
            $q->where('hr_employee.employee_name LIKE "%' . $this->nameEmploye . '%"');
        }]);

        return $dataProvider;
    }
}
