<?php

namespace app\models;

use Yii;

/**
 * This is the base model class for table "smis.org_academic_session_semester".
 *
 * @property integer $acad_session_semester_id
 * @property integer $acad_session_id
 * @property integer $semester_code
 * @property string $acad_session_semester_desc
 *
 * @property \app\models\OrgAcademicSession $acadSession
 * @property \app\models\OrgSemesterCode $semesterCode
 * @property \app\models\OrgProgCurrSemester[] $orgProgCurrSemesters
 */
class OrgAcademicSessionSemester extends \yii\db\ActiveRecord
{
    //use \mootensai\relation\RelationTrait;


    /**
    * This function helps \mootensai\relation\RelationTrait runs faster
    * @return array relation names of this model
    */
    /*public function relationNames()
    {
        return [
            'acadSession',
            'semesterCode',
            'orgProgCurrSemesters'
        ];
    }*/

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['acad_session_id', 'semester_code'], 'required'],
            [['acad_session_id', 'semester_code'], 'integer'],
            [['acad_session_semester_desc'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'smis.org_academic_session_semester';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'acad_session_semester_id' => 'Acad Session Semester ID',
            'acad_session_id' => 'Acad Session ID',
            'semester_code' => 'Semester Code',
            'acad_session_semester_desc' => 'Acad Session Semester Desc',
        ];
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
    public function getSemesterCode()
    {
        return $this->hasOne(\app\models\OrgSemesterCode::className(), ['semester_code' => 'semester_code']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrgProgCurrSemesters()
    {
        return $this->hasMany(\app\models\OrgProgCurrSemester::className(), ['acad_session_semester_id' => 'acad_session_semester_id']);
    }
    }
