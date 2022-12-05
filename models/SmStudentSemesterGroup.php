<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "smis.sm_student_semester_group".
 *
 * @property int $student_semester_group_id
 * @property int $prog_curriculum_semester_id
 * @property int $student_semester_session_id
 * @property string $status
 */
class SmStudentSemesterGroup extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'smis.sm_student_semester_group';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['prog_curriculum_semester_id', 'student_semester_session_id'], 'required'],
            [['prog_curriculum_semester_id', 'student_semester_session_id'], 'default', 'value' => null],
            [['prog_curriculum_semester_id', 'student_semester_session_id'], 'integer'],
            [['status'], 'string', 'max' => 10],
            [['prog_curriculum_semester_id'], 'exist', 'skipOnError' => true, 'targetClass' => OrgProgCurrSemester::class, 'targetAttribute' => ['prog_curriculum_semester_id' => 'prog_curriculum_semester_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'student_semester_group_id' => 'Student Semester Group ID',
            'prog_curriculum_semester_id' => 'Prog Curriculum Semester ID',
            'student_semester_session_id' => 'Student Semester Session ID',
            'status' => 'Status',
        ];
    }
}
