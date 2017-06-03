<?php

namespace backend\master\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\master\models\HrDevision;

/**
 * HrDevisionSearch represents the model behind the search form about `backend\master\models\HrDevision`.
 */
class HrDevisionSearch extends HrDevision
{
    /**
     * @inheritdoc
     */
    public $nameDirektorat;
    public $nameCompany;
    public function rules()
    {
        return [
            [['devision_id', 'direktorat_id', 'devision_tanda'], 'integer'],
            [['smartgroup_code', 'devision_name','nameDirektorat','nameCompany'], 'safe'],
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
        $query = HrDevision::find();

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
            'devision_id' => $this->devision_id,
            'direktorat_id' => $this->nameDirektorat,
            'devision_tanda' => $this->devision_tanda,
        ]);

        $query->andFilterWhere(['like', 'smartgroup_code', $this->nameCompany])
            ->andFilterWhere(['like', 'devision_name', $this->devision_name]);

        return $dataProvider;
    }
}
