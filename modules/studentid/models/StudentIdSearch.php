<?php

namespace app\modules\studentid\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\studentid\models\StudentId;

/**
 * app\modules\studentid\models\StudentIdSearch represents the model behind the search form about `app\modules\studentid\models\StudentId`.
 */
 class StudentIdSearch extends StudentId
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['student_id_serial_no', 'student_prog_curr_id', 'barcode', 'request_id'], 'integer'],
            [['issuance_date', 'valid_from', 'valid_to', 'id_status'], 'safe'],
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
        $query = StudentId::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'student_id_serial_no' => $this->student_id_serial_no,
            'student_prog_curr_id' => $this->student_prog_curr_id,
            'issuance_date' => $this->issuance_date,
            'valid_from' => $this->valid_from,
            'valid_to' => $this->valid_to,
            'barcode' => $this->barcode,
            'request_id' => $this->request_id,
        ]);

        $query->andFilterWhere(['like', 'id_status', $this->id_status]);

        return $dataProvider;
    }
}
