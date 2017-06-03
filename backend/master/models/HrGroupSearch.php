<?php

namespace backend\master\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\master\models\HrGroup;

/**
 * HrGroupSearch represents the model behind the search form about `backend\master\models\HrGroup`.
 */
class HrGroupSearch extends HrGroup
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['smartgroup_code', 'smartgroup_name', 'smartgroup_shortname', 'smartgroup_url'], 'safe'],
            [['smartgroup_tanda'], 'integer'],
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
        $query = HrGroup::find();

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
            'smartgroup_tanda' => $this->smartgroup_tanda,
        ]);

        $query->andFilterWhere(['like', 'smartgroup_code', $this->smartgroup_code])
            ->andFilterWhere(['like', 'smartgroup_name', $this->smartgroup_name])
            ->andFilterWhere(['like', 'smartgroup_shortname', $this->smartgroup_shortname])
            ->andFilterWhere(['like', 'smartgroup_url', $this->smartgroup_url]);

        return $dataProvider;
    }
}
