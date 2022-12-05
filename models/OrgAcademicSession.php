<?php

namespace app\models;

use Yii;

/**
 * This is the base model class for table "smis.org_academic_session".
 *
 * @property integer $acad_session_id
 * @property string $acad_session_name
 * @property string $acad_session_desc
 * @property string $start_date
 * @property string $end_date
 *
 * @property \app\models\FsProgCurrFeesStructure[] $fsProgCurrFeesStructures
 * @property \app\models\OrgAcademicSessionSemester[] $orgAcademicSessionSemesters
 * @property \app\models\SmAcademicProgress[] $smAcademicProgresses
 * @property \app\models\SmIntake[] $smIntakes
 */
class OrgAcademicSession extends \yii\db\ActiveRecord
{
    //use \mootensai\relation\RelationTrait;


    /**
    * This function helps \mootensai\relation\RelationTrait runs faster
    * @return array relation names of this model
    */
    /*public function relationNames()
    {
        return [
            'fsProgCurrFeesStructures',
            'orgAcademicSessionSemesters',
            'smAcademicProgresses',
            'smIntakes'
        ];
    }*/

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['acad_session_name', 'start_date', 'end_date'], 'required'],
            [['start_date', 'end_date'], 'safe'],
            [['acad_session_name'], 'string', 'max' => 50],
            [['acad_session_desc'], 'string', 'max' => 150]
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'smis.org_academic_session';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'acad_session_id' => 'Acad Session ID',
            'acad_session_name' => 'Acad Session Name',
            'acad_session_desc' => 'Acad Session Desc',
            'start_date' => 'Start Date',
            'end_date' => 'End Date',
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFsProgCurrFeesStructures()
    {
        return $this->hasMany(\app\models\FsProgCurrFeesStructure::className(), ['academic_session_id' => 'acad_session_id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrgAcademicSessionSemesters()
    {
        return $this->hasMany(\app\models\OrgAcademicSessionSemester::className(), ['acad_session_id' => 'acad_session_id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSmAcademicProgresses()
    {
        return $this->hasMany(\app\models\SmAcademicProgress::className(), ['acad_session_id' => 'acad_session_id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSmIntakes()
    {
        return $this->hasMany(\app\models\SmIntake::className(), ['acad_session_id' => 'acad_session_id']);
    }
    }
