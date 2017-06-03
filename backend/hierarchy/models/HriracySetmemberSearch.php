<?php

namespace backend\hierarchy\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\hierarchy\models\HriracySetmember;

/**
 * HriracySetmemberSearch represents the model behind the search form about `backend\hierarchy\models\HriracySetmember`.
 */
class HriracySetmemberSearch extends HriracySetmember
{
    /**
     * @inheritdoc
     */
    public $kd_hirachy;
    public $nameHirachy;
    public function rules()
    {
        return [
            [['id', 'root', 'kd_source'], 'integer'],
            [['kd_ref','nameHirachy'], 'safe'],
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

        $query = HriracySetmember::find()->where(['kd_source'=>$this->kd_hirachy]);

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
            'id' => $this->id,
            'root' => $this->root,
            'kd_source' => $this->kd_source,
        ]);

        $query->andFilterWhere(['like', 'kd_ref', $this->kd_ref]);

        return $dataProvider;
    }
}
