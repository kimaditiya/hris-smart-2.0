<?php

namespace backend\master\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\master\models\HrDirektorat;

/**
 * HrDirektoratSearch represents the model behind the search form about `backend\master\models\HrDirektorat`.
 */
class HrDirektoratSearch extends HrDirektorat
{
    /**
     * @inheritdoc
     */
    public $nameBranch;
    public function rules()
    {
        return [
            [['direktorat_id', 'direktorat_tanda', 'log_id'], 'integer'],
            [['branch_code', 'direktorat_name','nameBranch'], 'safe'],
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
        $query = HrDirektorat::find();

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
            'direktorat_id' => $this->direktorat_id,
            'direktorat_tanda' => $this->direktorat_tanda,
            'log_id' => $this->log_id,
        ]);

        $query->andFilterWhere(['like', 'branch_code', $this->nameBranch])
            ->andFilterWhere(['like', 'direktorat_name', $this->direktorat_name]);

        return $dataProvider;
    }
}
