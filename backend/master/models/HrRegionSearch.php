<?php

namespace backend\master\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\master\models\HrRegion;

/**
 * HrRegionSearch represents the model behind the search form about `backend\master\models\HrRegion`.
 */
class HrRegionSearch extends HrRegion
{
    /**
     * @inheritdoc
     */
    public $companyName;
    public function rules()
    {
        return [
            [['region_name', 'smartgroup_code','companyName'], 'safe'],
            [['region_code', 'region_tanda'], 'integer'],
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
        $query = HrRegion::find();

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
            'region_code' => $this->region_code,
            'region_tanda' => $this->region_tanda,
        ]);

        $query->andFilterWhere(['like', 'region_name', $this->region_name])
            ->andFilterWhere(['like', 'smartgroup_code', $this->companyName]);

        return $dataProvider;
    }
}
