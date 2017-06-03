<?php

namespace backend\master\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\master\models\HrJobgroupjabatan;

/**
 * HrJobgroupjabatanSearch represents the model behind the search form about `backend\master\models\HrJobgroupjabatan`.
 */
class HrJobgroupjabatanSearch extends HrJobgroupjabatan
{
    /**
     * @inheritdoc
     */
    public $nameCompany;
    public $nameCategory;
    public function rules()
    {
        return [
            [['category_code', 'groupjabatan_name','nameCompany','nameCategory'], 'safe'],
            [['groupjabatan_code', 'groupjabatan_tanda'], 'integer'],
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
        $query = HrJobgroupjabatan::find();

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
            'groupjabatan_code' => $this->groupjabatan_code,
            'groupjabatan_tanda' => $this->groupjabatan_tanda,
        ]);

        $query->andFilterWhere(['like', 'category_code', $this->category_code])
            ->andFilterWhere(['like', 'groupjabatan_name', $this->groupjabatan_name]);

        return $dataProvider;
    }
}
