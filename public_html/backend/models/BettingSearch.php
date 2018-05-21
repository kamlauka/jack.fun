<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Betting;

/**
 * BettingSearch represents the model behind the search form of `common\models\Betting`.
 */
class BettingSearch extends Betting
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'user_id', 'target_id'], 'integer'],
            [['rate', 'pc_target', 'pc_jackpot', 'pc_transaction', 'pc_keep', 'pc_organizer'], 'number'],
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
        $query = Betting::find();

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
            'user_id' => $this->user_id,
            'target_id' => $this->target_id,
            'rate' => $this->rate,
            'pc_target' => $this->pc_target,
            'pc_jackpot' => $this->pc_jackpot,
            'pc_transaction' => $this->pc_transaction,
            'pc_keep' => $this->pc_keep,
            'pc_organizer' => $this->pc_organizer,
        ]);

        return $dataProvider;
    }
}
