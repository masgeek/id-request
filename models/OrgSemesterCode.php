<?php

namespace app\models;

use Yii;

/**
 * This is the base model class for table "smis.org_semester_code".
 *
 * @property integer $semester_code
 * @property string $semster_name
 *
 * @property \app\models\OrgAcademicSessionSemester[] $orgAcademicSessionSemesters
 */
class OrgSemesterCode extends \yii\db\ActiveRecord
{
    //use \mootensai\relation\RelationTrait;


    /**
    * This function helps \mootensai\relation\RelationTrait runs faster
    * @return array relation names of this model
    */
    /*public function relationNames()
    {
        return [
            'orgAcademicSessionSemesters'
        ];
    }*/

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['semester_code', 'semster_name'], 'required'],
            [['semester_code'], 'integer'],
            [['semster_name'], 'string', 'max' => 30]
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'smis.org_semester_code';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'semester_code' => 'Semester Code',
            'semster_name' => 'Semster Name',
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrgAcademicSessionSemesters()
    {
        return $this->hasMany(\app\models\OrgAcademicSessionSemester::className(), ['semester_code' => 'semester_code']);
    }
    }
