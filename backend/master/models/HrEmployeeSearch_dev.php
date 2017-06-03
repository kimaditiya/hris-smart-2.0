<?php

namespace backend\master\models;

use Yii;
use yii\base\Model;
use yii\data\ArrayDataProvider;
use backend\master\models\HrEmployee;
use yii\debug\components\search\Filter;
use yii\debug\components\search\matchers;

/**
 * HrEmployeeSearch represents the model behind the search form about `backend\master\models\HrEmployee`.
 */
class HrEmployeeSearch extends HrEmployee
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['employee_id', 'employee_gender', 'employee_maritalstatus', 'employee_familystatus', 'ptkp_id', 'employee_religion', 'employee_jobstatus', 'employee_contractduration', 'employee_contracttype', 'employee_height', 'employee_weight', 'employee_status'], 'integer'],
            [['employee_nik', 'employee_nikhris', 'employee_identifikasi', 'employee_name', 'smartgroup_code', 'employee_birthplace', 'employee_birthdate', 'employee_age', 'employee_marrieddate', 'employee_race', 'employee_nationality', 'employee_emailpersonal', 'employee_emailoffice', 'employee_kodetelepon', 'employee_telepon', 'employee_mobile1', 'employee_mobile2', 'employee_joindate', 'employee_permanentdate', 'employee_contractexpired', 'employee_resigndate', 'employee_resignnote', 'employee_notactivedate', 'employee_foto', 'employee_fotoresize', 'employee_tahun'], 'safe'],
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
        $query = HrEmployee::find();

        // add conditions that should always apply here

       $dataProvider = new ArrayDataProvider([
            'allModels' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

     $filter = new Filter();
     $this->addCondition($filter, 'employee_id', true);
      $this->addCondition($filter, 'employee_nik', true);
     $dataProvider->allModels = $filter->filter($query);

        return $dataProvider;
    }

    public function addCondition(Filter $filter, $attribute, $partial = false)
    {
        $value = $this->$attribute;
        if (mb_strpos($value, '>') !== false) {
            $value = intval(str_replace('>', '', $value));
            $filter->addMatcher($attribute, new matchers\GreaterThan(['value' => $value]));
        } elseif (mb_strpos($value, '<') !== false) {
            $value = intval(str_replace('<', '', $value));
            $filter->addMatcher($attribute, new matchers\LowerThan(['value' => $value]));
        } else {
            $filter->addMatcher($attribute, new matchers\SameAs(['value' => $value, 'partial' => $partial]));
        }
    }   
}
