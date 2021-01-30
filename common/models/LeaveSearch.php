<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Leave;

/**
 * LeaveSearch represents the model behind the search form of `common\models\Leave`.
 */
class LeaveSearch extends Leave
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['staff_id', 'leave_year', 'leave_type', 'leave_day', 'leave_date_start', 'leave_date_end', 'leave_reason', 'leave_status'], 'safe'],
            [['leave_num'], 'number'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = Leave::find();

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
            'leave_date_start' => $this->leave_date_start,
            'leave_date_end' => $this->leave_date_end,
            'leave_num' => $this->leave_num,
        ]);

        $query->andFilterWhere(['like', 'staff_id', $this->staff_id])
            ->andFilterWhere(['like', 'leave_year', $this->leave_year])
            ->andFilterWhere(['like', 'leave_type', $this->leave_type])
            ->andFilterWhere(['like', 'leave_day', $this->leave_day])
            ->andFilterWhere(['like', 'leave_reason', $this->leave_reason])
            ->andFilterWhere(['like', 'leave_status', $this->leave_status]);

        return $dataProvider;
    }
}
