<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "smis.sm_student_session_details".
 *
 * @property int $student_session_details_id
 * @property int|null $student_semester_session_id
 */
class SmStudentSessionDetail extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'smis.sm_student_session_details';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['student_session_details_id'], 'required'],
            [['student_session_details_id', 'student_semester_session_id'], 'default', 'value' => null],
            [['student_session_details_id', 'student_semester_session_id'], 'integer'],
            [['student_session_details_id'], 'unique'],
            [['student_semester_session_id'], 'exist', 'skipOnError' => true, 'targetClass' => SmStudentSemSessionProgress::class, 'targetAttribute' => ['student_semester_session_id' => 'student_semester_session_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'student_session_details_id' => 'Student Session Details ID',
            'student_semester_session_id' => 'Student Semester Session ID',
        ];
    }
}
