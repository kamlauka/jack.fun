<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Dispute;

/**
 * DisputeSearch represents the model behind the search form of `common\models\Dispute`.
 */
class DisputeSearch extends Dispute
{
    public $date;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'executor_id', 'initiator_id', 'moderator_id'], 'integer'],
            [['name', 'img', 'type', 'active', 'date_start', 'date_end', 'result', 'status', 'description'], 'safe'],
            //[['date'], 'date', 'format' => 'php:Y-m-d'],
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
        $date = date('Y-m-d', strtotime(date('Y-m-d h:i:s')));
        $time = date('H:i:s', strtotime(date('Y-m-d h:i:s')));
        $date1 = str_replace('-', '/', $date);
        $this->date = isset($params['DisputeSearch']['date'])?$params['DisputeSearch']['date']:null;
        if($this->date == 'day'){

            $this->date = date('Y-m-d',strtotime($date1 . "+1 days"));
            // $day = $day.' '.$time;

        }elseif($this->date == 'week'){
            $this->date= date('Y-m-d',strtotime($date1 . "+1 week"));
            //$week = $week.' '.$time;

        }elseif ($this->date == 'month'){
            $this->date = date('Y-m-d',strtotime($date1 . "+1 month"));
            // $month = $month.' '.$time;
        }
        $query = Dispute::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
             $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'rate' => $this->rate,
            'executor_id' => $this->executor_id,
            'initiator_id' => $this->initiator_id,
            'moderator_id' => $this->moderator_id,
           // 'date_start' => $this->date_start,
            'date_end' => $this->date_end,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'img', $this->img])
            ->andFilterWhere(['like', 'type', $this->type])
            ->andFilterWhere(['like', 'active', $this->active])
            ->andFilterWhere(['like', 'result', $this->result])
            ->andFilterWhere(['like', 'status', $this->status])
            ->andFilterWhere(['like', 'date_start', $this->date_start])
            ->andFilterWhere(['<=', 'date_start', $this->date])
            ->andFilterWhere(['like', 'description', $this->description]);

        return $dataProvider;
    }
}
