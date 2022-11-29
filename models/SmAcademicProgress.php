<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "sm_academic_progress".
 *
 * @property int $academic_progress_id
 * @property int $acad_session_id
 * @property int $academic_level_id
 * @property int $student_prog_curriculum_id
 * @property int $progress_status_id
 * @property int $current_status
 *
 * @property OrgAcademicSession $acadSession
 * @property OrgAcademicLevel $academicLevel
 * @property SmAcademicProgressStatus $progressStatus
 * @property SmStudentProgrammeCurriculum $studentProgCurriculum
 */
class SmAcademicProgress extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'sm_academic_progress';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['academic_progress_id', 'acad_session_id', 'academic_level_id', 'student_prog_curriculum_id', 'progress_status_id', 'current_status'], 'required'],
            [['academic_progress_id', 'acad_session_id', 'academic_level_id', 'student_prog_curriculum_id', 'progress_status_id', 'current_status'], 'default', 'value' => null],
            [['academic_progress_id', 'acad_session_id', 'academic_level_id', 'student_prog_curriculum_id', 'progress_status_id', 'current_status'], 'integer'],
            [['academic_progress_id'], 'unique'],
            [['academic_level_id'], 'exist', 'skipOnError' => true, 'targetClass' => OrgAcademicLevel::class, 'targetAttribute' => ['academic_level_id' => 'academic_level_id']],
            [['acad_session_id'], 'exist', 'skipOnError' => true, 'targetClass' => OrgAcademicSession::class, 'targetAttribute' => ['acad_session_id' => 'acad_session_id']],
            [['progress_status_id'], 'exist', 'skipOnError' => true, 'targetClass' => SmAcademicProgressStatus::class, 'targetAttribute' => ['progress_status_id' => 'progress_status_id']],
            [['student_prog_curriculum_id'], 'exist', 'skipOnError' => true, 'targetClass' => SmStudentProgrammeCurriculum::class, 'targetAttribute' => ['student_prog_curriculum_id' => 'student_prog_curriculum_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'academic_progress_id' => 'Academic Progress ID',
            'acad_session_id' => 'Acad Session ID',
            'academic_level_id' => 'Academic Level ID',
            'student_prog_curriculum_id' => 'Student Prog Curriculum ID',
            'progress_status_id' => 'Progress Status ID',
            'current_status' => 'Current Status',
        ];
    }

    /**
     * Gets query for [[AcadSession]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAcadSession()
    {
        return $this->hasOne(OrgAcademicSession::class, ['acad_session_id' => 'acad_session_id']);
    }

    /**
     * Gets query for [[AcademicLevel]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAcademicLevel()
    {
        return $this->hasOne(OrgAcademicLevel::class, ['academic_level_id' => 'academic_level_id']);
    }

    /**
     * Gets query for [[ProgressStatus]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProgressStatus()
    {
        return $this->hasOne(SmAcademicProgressStatus::class, ['progress_status_id' => 'progress_status_id']);
    }

    /**
     * Gets query for [[StudentProgCurriculum]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getStudentProgCurriculum()
    {
        return $this->hasOne(SmStudentProgrammeCurriculum::class, ['student_prog_curriculum_id' => 'student_prog_curriculum_id']);
    }
}
