<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Staff;

/**
 * StaffSearch represents the model behind the search form of `backend\models\Staff`.
 */
class StaffSearch extends Staff
{

    public $prefix;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['staff_id', 'prefix_id', 'staff_firstname', 'staff_lastname', 'staff_date_work_start', 'department_id', 'staff_address', 'staff_tel', 'staff_picture', 'staff_work_status', 'prefix'], 'safe'],
            [['position_id'], 'integer'],
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
        $query = Staff::find()->joinWith(['prefix', 'position','department'])->orderBy('staff_id asc');

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
            'staff_date_work_start' => $this->staff_date_work_start,
            'position_id' => $this->position_id,
        ]);

        $query->andFilterWhere(['like', 'staff_id', $this->staff_id])
            ->andFilterWhere(['like', 'prefix_id', $this->prefix_id])
            ->andFilterWhere(['like', 'staff_firstname', $this->staff_firstname])
            ->andFilterWhere(['like', 'staff_lastname', $this->staff_lastname])
            ->andFilterWhere(['like', 'department_id', $this->department_id])
            ->andFilterWhere(['like', 'staff_address', $this->staff_address])
            ->andFilterWhere(['like', 'staff_tel', $this->staff_tel])
            ->andFilterWhere(['like', 'staff_picture', $this->staff_picture])
            ->andFilterWhere(['like', 'staff_work_status', $this->staff_work_status])
            ->andFilterWhere(['=', 'prefix.prefix_name', $this->prefix]);

        return $dataProvider;
    }
}
