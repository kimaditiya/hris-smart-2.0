<?php

namespace backend\master\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\master\models\HrBranch;

/**
 * HrBranchSearch represents the model behind the search form about `backend\master\models\HrBranch`.
 */
class HrBranchSearch extends HrBranch
{
    /**
     * @inheritdoc
     */
    public $nameRegion;
    public $nameCompany;
    public function rules()
    {
        return [
            [['branch_id', 'region_code', 'branch_tanda'], 'integer'],
            [['branch_code', 'branch_name','nameRegion','nameCompany'], 'safe'],
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
        $query = HrBranch::find()->orderby('region_code');

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
            'branch_id' => $this->branch_id,
            'region_code' => $this->nameRegion,
            'branch_tanda' => $this->branch_tanda,
        ]);

        $query->andFilterWhere(['like', 'branch_code', $this->branch_code])
            ->andFilterWhere(['like', 'smartgroup_code', $this->nameCompany])
            ->andFilterWhere(['like', 'branch_name', $this->branch_name]);

        return $dataProvider;
    }
}
