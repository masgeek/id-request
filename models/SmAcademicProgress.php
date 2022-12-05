<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "smis.sm_academic_progress".
 *
 * @property int $academic_progress_id
 * @property int $acad_session_id
 * @property int $academic_level_id
 * @property int $student_prog_curriculum_id how_the_student_acquired_the_status
 * @property int $progress_status_id
 * @property int $current_status
 */
class SmAcademicProgress extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'smis.sm_academic_progress';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['acad_session_id', 'academic_level_id', 'student_prog_curriculum_id', 'progress_status_id', 'current_status'], 'required'],
            [['acad_session_id', 'academic_level_id', 'student_prog_curriculum_id', 'progress_status_id', 'current_status'], 'default', 'value' => null],
            [['acad_session_id', 'academic_level_id', 'student_prog_curriculum_id', 'progress_status_id', 'current_status'], 'integer'],
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
            'student_prog_curriculum_id' => 'how_the_student_acquired_the_status',
            'progress_status_id' => 'Progress Status ID',
            'current_status' => 'Current Status',
        ];
    }
}
