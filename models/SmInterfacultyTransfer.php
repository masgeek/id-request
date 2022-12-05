<?php

namespace app\models;

use Yii;

/**
 * This is the base model class for table "smis.sm_interfaculty_transfer".
 *
 * @property integer $interfaculty_transfer_id
 * @property integer $student_prog_curriculum_id
 * @property integer $prog_curriculum_id
 * @property string $approval_status
 * @property string $userid
 * @property string $application_date
 * @property string $validity
 * @property string $kcse_year
 * @property string $weighted_cluster_points
 * @property string $academic_year
 * @property integer $transfer_status
 * @property string $processing_date
 *
 * @property \app\models\OrgProgrammeCurriculum $progCurriculum
 * @property \app\models\SmStudentProgrammeCurriculum $studentProgCurriculum
 */
class SmInterfacultyTransfer extends \yii\db\ActiveRecord
{
    //use \mootensai\relation\RelationTrait;


    /**
    * This function helps \mootensai\relation\RelationTrait runs faster
    * @return array relation names of this model
    */
    /*public function relationNames()
    {
        return [
            'progCurriculum',
            'studentProgCurriculum'
        ];
    }*/

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['student_prog_curriculum_id', 'prog_curriculum_id', 'transfer_status'], 'integer'],
            [['application_date', 'processing_date'], 'safe'],
            [['kcse_year', 'weighted_cluster_points'], 'number'],
            [['approval_status'], 'string', 'max' => 12],
            [['userid'], 'string', 'max' => 30],
            [['validity'], 'string', 'max' => 20],
            [['academic_year'], 'string', 'max' => 15]
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'smis.sm_interfaculty_transfer';
    }

    /**
     * @inheritdoc
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
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProgCurriculum()
    {
        return $this->hasOne(\app\models\OrgProgrammeCurriculum::className(), ['prog_curriculum_id' => 'prog_curriculum_id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStudentProgCurriculum()
    {
        return $this->hasOne(\app\models\SmStudentProgrammeCurriculum::className(), ['student_prog_curriculum_id' => 'student_prog_curriculum_id']);
    }
    }
