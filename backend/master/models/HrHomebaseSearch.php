<?php

namespace backend\master\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\master\models\HrHomebase;

/**
 * HrHomebaseSearch represents the model behind the search form about `backend\master\models\HrHomebase`.
 */
class HrHomebaseSearch extends HrHomebase
{
    /**
     * @inheritdoc
     */
    public $nameCompany;
    public function rules()
    {
        return [
            [['homebase_id', 'homebase_tanda'], 'integer'],
            [['smartgroup_code', 'homebase_code', 'homebase_name','nameCompany'], 'safe'],
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
        $query = HrHomebase::find();

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
            'homebase_id' => $this->homebase_id,
            'homebase_tanda' => $this->homebase_tanda,
        ]);

        $query->andFilterWhere(['like', 'smartgroup_code', $this->nameCompany])
            ->andFilterWhere(['like', 'homebase_code', $this->homebase_code])
            ->andFilterWhere(['like', 'homebase_name', $this->homebase_name]);

        return $dataProvider;
    }
}
