<?php

namespace backend\master\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\master\models\HrJobpangkat;

/**
 * HrJobpangkatSearch represents the model behind the search form about `backend\master\models\HrJobpangkat`.
 */
class HrJobpangkatSearch extends HrJobpangkat
{
    /**
     * @inheritdoc
     */
    public $nameCompany;
    public $nameCategory;
    public function rules()
    {
        return [
            [['category_code', 'pangkat_code', 'pangkat_name','nameCompany','nameCategory'], 'safe'],
            [['pangkat_tanda'], 'integer'],
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
        $query = HrJobpangkat::find();

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
            'pangkat_tanda' => $this->pangkat_tanda,
        ]);

        $query->andFilterWhere(['like', 'category_code',$this->nameCategory])
            ->andFilterWhere(['like', 'pangkat_code', $this->pangkat_code])
            ->andFilterWhere(['like', 'smartgroup_code', $this->nameCompany])
            ->andFilterWhere(['like', 'pangkat_name', $this->pangkat_name]);

        return $dataProvider;
    }
}
