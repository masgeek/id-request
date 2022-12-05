<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "smis.sm_student_id_request".
 *
 * @property int $request_id
 * @property int $request_type_id
 * @property int $student_prog_curr_id
 * @property string $request_date
 * @property int $status_id
 * @property string $source
 */
class SmStudentIdRequest extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'smis.sm_student_id_request';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['request_id', 'request_type_id', 'student_prog_curr_id', 'request_date', 'status_id', 'source'], 'required'],
            [['request_id', 'request_type_id', 'student_prog_curr_id', 'status_id'], 'default', 'value' => null],
            [['request_id', 'request_type_id', 'student_prog_curr_id', 'status_id'], 'integer'],
            [['request_date'], 'safe'],
            [['source'], 'string', 'max' => 30],
            [['request_id'], 'unique'],
            [['status_id'], 'exist', 'skipOnError' => true, 'targetClass' => SmIdRequestStatus::class, 'targetAttribute' => ['status_id' => 'status_id']],
            [['request_type_id'], 'exist', 'skipOnError' => true, 'targetClass' => SmIdRequestType::class, 'targetAttribute' => ['request_type_id' => 'request_type_id']],
            [['student_prog_curr_id'], 'exist', 'skipOnError' => true, 'targetClass' => SmStudentProgrammeCurriculum::class, 'targetAttribute' => ['student_prog_curr_id' => 'student_prog_curriculum_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'request_id' => 'Request ID',
            'request_type_id' => 'Request Type ID',
            'student_prog_curr_id' => 'Student Prog Curr ID',
            'request_date' => 'Request Date',
            'status_id' => 'Status ID',
            'source' => 'Source',
        ];
    }
}
