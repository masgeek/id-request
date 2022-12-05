<?php

namespace app\models;

use Yii;

/**
 * This is the base model class for table "smis.sm_student_sem_session_progress".
 *
 * @property integer $student_semester_session_id
 * @property integer $semester_progress
 * @property string $registration_date
 * @property integer $academic_progress_id
 * @property integer $sem_progress_number
 * @property integer $billable
 * @property string $promotion_status
 * @property integer $reporting_status_id
 *
 * @property \app\models\SmAcademicProgress $academicProgress
 * @property \app\models\SmStudentSemesterSessionStatus $reportingStatus
 * @property \app\models\SmStudentSessionDetail[] $smStudentSessionDetails
 */
class SmStudentSemSessionProgress extends \yii\db\ActiveRecord
{
    //use \mootensai\relation\RelationTrait;


    /**
    * This function helps \mootensai\relation\RelationTrait runs faster
    * @return array relation names of this model
    */
    /*public function relationNames()
    {
        return [
            'academicProgress',
            'reportingStatus',
            'smStudentSessionDetails'
        ];
    }*/

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['semester_progress', 'academic_progress_id', 'sem_progress_number', 'billable', 'reporting_status_id'], 'integer'],
            [['registration_date'], 'safe'],
            [['academic_progress_id', 'sem_progress_number', 'promotion_status', 'reporting_status_id'], 'required'],
            [['promotion_status'], 'string', 'max' => 20]
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'smis.sm_student_sem_session_progress';
    }

    /**
     * @inheritdoc
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
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAcademicProgress()
    {
        return $this->hasOne(\app\models\SmAcademicProgress::className(), ['academic_progress_id' => 'academic_progress_id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getReportingStatus()
    {
        return $this->hasOne(\app\models\SmStudentSemesterSessionStatus::className(), ['status_id' => 'reporting_status_id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSmStudentSessionDetails()
    {
        return $this->hasMany(\app\models\SmStudentSessionDetail::className(), ['student_semester_session_id' => 'student_semester_session_id']);
    }
    }
