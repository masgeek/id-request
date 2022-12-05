<?php

namespace app\models;

use Yii;

/**
 * This is the base model class for table "smis.sm_academic_progress".
 *
 * @property integer $academic_progress_id
 * @property integer $acad_session_id
 * @property integer $academic_level_id
 * @property integer $student_prog_curriculum_id
 * @property integer $progress_status_id
 * @property integer $current_status
 *
 * @property \app\models\OrgAcademicLevel $academicLevel
 * @property \app\models\OrgAcademicSession $acadSession
 * @property \app\models\SmAcademicProgressStatus $progressStatus
 * @property \app\models\SmStudentProgrammeCurriculum $studentProgCurriculum
 * @property \app\models\SmStudentSemSessionProgress[] $smStudentSemSessionProgresses
 */
class SmAcademicProgress extends \yii\db\ActiveRecord
{
    //use \mootensai\relation\RelationTrait;


    /**
    * This function helps \mootensai\relation\RelationTrait runs faster
    * @return array relation names of this model
    */
    /*public function relationNames()
    {
        return [
            'academicLevel',
            'acadSession',
            'progressStatus',
            'studentProgCurriculum',
            'smStudentSemSessionProgresses'
        ];
    }*/

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['acad_session_id', 'academic_level_id', 'student_prog_curriculum_id', 'progress_status_id', 'current_status'], 'required'],
            [['acad_session_id', 'academic_level_id', 'student_prog_curriculum_id', 'progress_status_id', 'current_status'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'smis.sm_academic_progress';
    }

    /**
     * @inheritdoc
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
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAcademicLevel()
    {
        return $this->hasOne(\app\models\OrgAcademicLevel::className(), ['academic_level_id' => 'academic_level_id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAcadSession()
    {
        return $this->hasOne(\app\models\OrgAcademicSession::className(), ['acad_session_id' => 'acad_session_id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProgressStatus()
    {
        return $this->hasOne(\app\models\SmAcademicProgressStatus::className(), ['progress_status_id' => 'progress_status_id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStudentProgCurriculum()
    {
        return $this->hasOne(\app\models\SmStudentProgrammeCurriculum::className(), ['student_prog_curriculum_id' => 'student_prog_curriculum_id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSmStudentSemSessionProgresses()
    {
        return $this->hasMany(\app\models\SmStudentSemSessionProgress::className(), ['academic_progress_id' => 'academic_progress_id']);
    }
    }
