<?php

namespace backend\master\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\master\models\HrJobjabatan;

/**
 * HrJobjabatanSearch represents the model behind the search form about `backend\master\models\HrJobjabatan`.
 */
class HrJobjabatanSearch extends HrJobjabatan
{
    /**
     * @inheritdoc
     */
    public $nameCompany;
    public $nameCategory;
    public $namegroupjabatan;
    public function rules()
    {
        return [
            [['category_code', 'jabatan_name','nameCompany','nameCategory','namegroupjabatan'], 'safe'],
            [['groupjabatan_code', 'jabatan_code', 'jabatan_tanda'], 'integer'],
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
        $query = HrJobjabatan::find();

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
            'groupjabatan_code' => $this->groupjabatan_code,
            'jabatan_code' => $this->jabatan_code,
            'jabatan_tanda' => $this->jabatan_tanda,
        ]);

        $query->andFilterWhere(['like', 'category_code', $this->category_code])
            ->andFilterWhere(['like', 'jabatan_name', $this->jabatan_name]);

        return $dataProvider;
    }
}
