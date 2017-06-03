<?php

namespace backend\master\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\master\models\HrJobgrade;

/**
 * HrJobgradeSearch represents the model behind the search form about `backend\master\models\HrJobgrade`.
 */
class HrJobgradeSearch extends HrJobgrade
{
    /**
     * @inheritdoc
     */
    public $namePangkat;
    public $nameCompany;
    public function rules()
    {
        return [
            [['pangkat_code', 'grade_value', 'smartgroup_code','namePangkat','nameCompany'], 'safe'],
            [['grade_id', 'grade_tanda'], 'integer'],
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
        $query = HrJobgrade::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => false,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'grade_id' => $this->grade_id,
            'grade_tanda' => $this->grade_tanda,
        ]);

        $query->andFilterWhere(['like', 'pangkat_code', $this->pangkat_code])
            ->andFilterWhere(['like', 'grade_value', $this->grade_value])
            ->andFilterWhere(['like', 'smartgroup_code', $this->smartgroup_code]);

        return $dataProvider;
    }
}
