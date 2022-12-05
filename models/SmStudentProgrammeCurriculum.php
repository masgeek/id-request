<?php

namespace app\models;

use Yii;

/**
 * This is the base model class for table "smis.sm_student_programme_curriculum".
 *
 * @property integer $student_prog_curriculum_id
 * @property integer $student_id
 * @property string $registration_number
 * @property integer $prog_curriculum_id
 * @property integer $student_category_id
 * @property integer $adm_refno
 * @property integer $status_id
 *
 * @property \app\models\SmAcademicProgress[] $smAcademicProgresses
 * @property \app\models\SmInterfacultyTransfer[] $smInterfacultyTransfers
 * @property \app\models\SmSmStudentFeeStructure[] $smSmStudentFeeStructures
 * @property \app\models\SmStudentCluster[] $smStudentClusters
 * @property \app\models\SmStudentId[] $smStudents
 * @property \app\models\SmStudentIdRequest[] $smStudentIdRequests
 * @property \app\models\OrgProgrammeCurriculum $progCurriculum
 * @property \app\models\SmAdmittedStudent $admRefno
 * @property \app\models\SmStudent $student
 * @property \app\models\SmStudentCategory $studentCategory
 * @property \app\models\SmStudentStatus $status
 * @property \app\models\SmStudentRelation[] $smStudentRelations
 */
class SmStudentProgrammeCurriculum extends \yii\db\ActiveRecord
{
    //use \mootensai\relation\RelationTrait;


    /**
    * This function helps \mootensai\relation\RelationTrait runs faster
    * @return array relation names of this model
    */
    /*public function relationNames()
    {
        return [
            'smAcademicProgresses',
            'smInterfacultyTransfers',
            'smSmStudentFeeStructures',
            'smStudentClusters',
            'smStudents',
            'smStudentIdRequests',
            'progCurriculum',
            'admRefno',
            'student',
            'studentCategory',
            'status',
            'smStudentRelations'
        ];
    }*/

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['student_id', 'registration_number', 'prog_curriculum_id', 'student_category_id', 'adm_refno', 'status_id'], 'required'],
            [['student_id', 'prog_curriculum_id', 'student_category_id', 'adm_refno', 'status_id'], 'integer'],
            [['registration_number'], 'string', 'max' => 20]
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'smis.sm_student_programme_curriculum';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'student_prog_curriculum_id' => 'Student Prog Curriculum ID',
            'student_id' => 'Student ID',
            'registration_number' => 'Registration Number',
            'prog_curriculum_id' => 'Prog Curriculum ID',
            'student_category_id' => 'Student Category ID',
            'adm_refno' => 'Adm Refno',
            'status_id' => 'Status ID',
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSmAcademicProgresses()
    {
        return $this->hasMany(\app\models\SmAcademicProgress::className(), ['student_prog_curriculum_id' => 'student_prog_curriculum_id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSmInterfacultyTransfers()
    {
        return $this->hasMany(\app\models\SmInterfacultyTransfer::className(), ['student_prog_curriculum_id' => 'student_prog_curriculum_id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSmSmStudentFeeStructures()
    {
        return $this->hasMany(\app\models\SmSmStudentFeeStructure::className(), ['student_prog_curr_id' => 'student_prog_curriculum_id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSmStudentClusters()
    {
        return $this->hasMany(\app\models\SmStudentCluster::className(), ['stud_prog_curr_id' => 'student_prog_curriculum_id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSmStudents()
    {
        return $this->hasMany(\app\models\SmStudentId::className(), ['student_prog_curr_id' => 'student_prog_curriculum_id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSmStudentIdRequests()
    {
        return $this->hasMany(\app\models\SmStudentIdRequest::className(), ['student_prog_curr_id' => 'student_prog_curriculum_id']);
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
    public function getAdmRefno()
    {
        return $this->hasOne(\app\models\SmAdmittedStudent::className(), ['adm_refno' => 'adm_refno']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStudent()
    {
        return $this->hasOne(\app\models\SmStudent::className(), ['student_id' => 'student_id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStudentCategory()
    {
        return $this->hasOne(\app\models\SmStudentCategory::className(), ['std_category_id' => 'student_category_id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStatus()
    {
        return $this->hasOne(\app\models\SmStudentStatus::className(), ['status_id' => 'status_id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSmStudentRelations()
    {
        return $this->hasMany(\app\models\SmStudentRelation::className(), ['student_prog_curriculum_id' => 'student_prog_curriculum_id']);
    }
    }
