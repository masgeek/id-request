<?php

namespace app\models;

use Yii;

/**
 * This is the base model class for table "smis.org_prog_curr_semester".
 *
 * @property integer $prog_curriculum_semester_id
 * @property integer $prog_curriculum_id
 * @property integer $acad_session_semester_id
 * @property integer $semester_type_id
 *
 * @property \app\models\OrgCohortSession[] $orgCohortSessions
 * @property \app\models\OrgAcademicSessionSemester $acadSessionSemester
 * @property \app\models\OrgProgrammeCurriculum $progCurriculum
 * @property \app\models\OrgSemesterType $semesterType
 * @property \app\models\OrgProgCurrSemesterGroup[] $orgProgCurrSemesterGroups
 * @property \app\models\SmStudentSemesterGroup[] $smStudentSemesterGroups
 */
class OrgProgCurrSemester extends \yii\db\ActiveRecord
{
    //use \mootensai\relation\RelationTrait;


    /**
    * This function helps \mootensai\relation\RelationTrait runs faster
    * @return array relation names of this model
    */
    /*public function relationNames()
    {
        return [
            'orgCohortSessions',
            'acadSessionSemester',
            'progCurriculum',
            'semesterType',
            'orgProgCurrSemesterGroups',
            'smStudentSemesterGroups'
        ];
    }*/

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['prog_curriculum_id', 'acad_session_semester_id'], 'required'],
            [['prog_curriculum_id', 'acad_session_semester_id', 'semester_type_id'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'smis.org_prog_curr_semester';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'prog_curriculum_semester_id' => 'Prog Curriculum Semester ID',
            'prog_curriculum_id' => 'Prog Curriculum ID',
            'acad_session_semester_id' => 'Acad Session Semester ID',
            'semester_type_id' => 'teaching, supplementary',
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrgCohortSessions()
    {
        return $this->hasMany(\app\models\OrgCohortSession::className(), ['prog_curriculum_semester_id' => 'prog_curriculum_semester_id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAcadSessionSemester()
    {
        return $this->hasOne(\app\models\OrgAcademicSessionSemester::className(), ['acad_session_semester_id' => 'acad_session_semester_id']);
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
    public function getSemesterType()
    {
        return $this->hasOne(\app\models\OrgSemesterType::className(), ['sem_type_id' => 'semester_type_id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrgProgCurrSemesterGroups()
    {
        return $this->hasMany(\app\models\OrgProgCurrSemesterGroup::className(), ['prog_curriculum_semester_id' => 'prog_curriculum_semester_id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSmStudentSemesterGroups()
    {
        return $this->hasMany(\app\models\SmStudentSemesterGroup::className(), ['prog_curriculum_semester_id' => 'prog_curriculum_semester_id']);
    }
    }
