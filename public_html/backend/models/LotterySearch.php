<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Lottery;

/**
 * LotterySearch represents the model behind the search form of `common\models\Lottery`.
 */
class LotterySearch extends Lottery
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'total'], 'integer'],
            [['name', 'status', 'date_start', 'result', 'description', 'name_prize', 'img'], 'safe'],
            [['rate'], 'number'],
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
        $query = Lottery::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
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
            'total' => $this->total,
            'date_start' => $this->date_start,
            'rate' => $this->rate,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'status', $this->status])
            ->andFilterWhere(['like', 'result', $this->result])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'name_prize', $this->name_prize])
            ->andFilterWhere(['like', 'img', $this->img]);

        return $dataProvider;
    }
}
