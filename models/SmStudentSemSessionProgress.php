<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "smis.sm_student_sem_session_progress".
 *
 * @property int $student_semester_session_id
 * @property int|null $semester_progress
 * @property string $registration_date
 * @property int $academic_progress_id
 * @property int $sem_progress_number The student semester progression..ie 1,2,3
 * @property int|null $billable
 * @property string $promotion_status
 * @property int $reporting_status_id
 */
class SmStudentSemSessionProgress extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'smis.sm_student_sem_session_progress';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['semester_progress', 'academic_progress_id', 'sem_progress_number', 'billable', 'reporting_status_id'], 'default', 'value' => null],
            [['semester_progress', 'academic_progress_id', 'sem_progress_number', 'billable', 'reporting_status_id'], 'integer'],
            [['registration_date'], 'safe'],
            [['academic_progress_id', 'sem_progress_number', 'promotion_status', 'reporting_status_id'], 'required'],
            [['promotion_status'], 'string', 'max' => 20],
            [['academic_progress_id'], 'exist', 'skipOnError' => true, 'targetClass' => SmAcademicProgress::class, 'targetAttribute' => ['academic_progress_id' => 'academic_progress_id']],
            [['reporting_status_id'], 'exist', 'skipOnError' => true, 'targetClass' => SmStudentSemesterSessionStatus::class, 'targetAttribute' => ['reporting_status_id' => 'status_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'student_semester_session_id' => 'Student Semester Session ID',
            'semester_progress' => 'Semester Progress',
            'registration_date' => 'Registration Date',
            'academic_progress_id' => 'Academic Progress ID',
            'sem_progress_number' => 'The student semester progression..ie 1,2,3',
            'billable' => 'Billable',
            'promotion_status' => 'Promotion Status',
            'reporting_status_id' => 'Reporting Status ID',
        ];
    }
}
