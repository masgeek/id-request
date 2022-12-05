<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "smis.sm_interfaculty_transfer".
 *
 * @property int $interfaculty_transfer_id
 * @property int|null $student_prog_curriculum_id
 * @property int|null $prog_curriculum_id
 * @property string|null $approval_status
 * @property string|null $userid
 * @property string|null $application_date
 * @property string|null $validity
 * @property float|null $kcse_year
 * @property float|null $weighted_cluster_points
 * @property string|null $academic_year
 * @property int|null $transfer_status
 * @property string|null $processing_date
 */
class SmInterfacultyTransfer extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'smis.sm_interfaculty_transfer';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['student_prog_curriculum_id', 'prog_curriculum_id', 'transfer_status'], 'default', 'value' => null],
            [['student_prog_curriculum_id', 'prog_curriculum_id', 'transfer_status'], 'integer'],
            [['application_date', 'processing_date'], 'safe'],
            [['kcse_year', 'weighted_cluster_points'], 'number'],
            [['approval_status'], 'string', 'max' => 12],
            [['userid'], 'string', 'max' => 30],
            [['validity'], 'string', 'max' => 20],
            [['academic_year'], 'string', 'max' => 15],
            [['prog_curriculum_id'], 'exist', 'skipOnError' => true, 'targetClass' => OrgProgrammeCurriculum::class, 'targetAttribute' => ['prog_curriculum_id' => 'prog_curriculum_id']],
            [['student_prog_curriculum_id'], 'exist', 'skipOnError' => true, 'targetClass' => SmStudentProgrammeCurriculum::class, 'targetAttribute' => ['student_prog_curriculum_id' => 'student_prog_curriculum_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'interfaculty_transfer_id' => 'Interfaculty Transfer ID',
            'student_prog_curriculum_id' => 'Student Prog Curriculum ID',
            'prog_curriculum_id' => 'Prog Curriculum ID',
            'approval_status' => 'Approval Status',
            'userid' => 'Userid',
            'application_date' => 'Application Date',
            'validity' => 'Validity',
            'kcse_year' => 'Kcse Year',
            'weighted_cluster_points' => 'Weighted Cluster Points',
            'academic_year' => 'Academic Year',
            'transfer_status' => 'Transfer Status',
            'processing_date' => 'Processing Date',
        ];
    }
}
