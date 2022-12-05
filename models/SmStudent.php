<?php

namespace app\models;

use Yii;

/**
 * This is the base model class for table "smis.sm_student".
 *
 * @property integer $student_id
 * @property string $student_number
 * @property string $surname
 * @property string $other_names
 * @property string $gender
 * @property string $country_code
 * @property string $dob
 * @property string $id_no
 * @property string $passport_no
 * @property string $service_number
 * @property string $blood_group
 * @property integer $sponsor
 * @property string $registration_date
 *
 * @property \app\models\SmNameChange[] $smNameChanges
 * @property \app\models\OrgCountry $countryCode
 * @property \app\models\SmStudentProgrammeCurriculum[] $smStudentProgrammeCurriculums
 * @property \app\models\SmWithdrawalRequest[] $smWithdrawalRequests
 */
class SmStudent extends \yii\db\ActiveRecord
{
    //use \mootensai\relation\RelationTrait;


    /**
    * This function helps \mootensai\relation\RelationTrait runs faster
    * @return array relation names of this model
    */
    /*public function relationNames()
    {
        return [
            'smNameChanges',
            'countryCode',
            'smStudentProgrammeCurriculums',
            'smWithdrawalRequests'
        ];
    }*/

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['student_number', 'surname', 'other_names', 'gender', 'country_code', 'dob'], 'required'],
            [['dob', 'registration_date'], 'safe'],
            [['sponsor'], 'integer'],
            [['student_number', 'passport_no', 'service_number'], 'string', 'max' => 20],
            [['surname'], 'string', 'max' => 50],
            [['other_names'], 'string', 'max' => 100],
            [['gender'], 'string', 'max' => 1],
            [['country_code'], 'string', 'max' => 3],
            [['id_no'], 'string', 'max' => 10],
            [['blood_group'], 'string', 'max' => 5]
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'smis.sm_student';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'student_id' => 'Student ID',
            'student_number' => 'Student Number',
            'surname' => 'Surname',
            'other_names' => 'Other Names',
            'gender' => 'Gender',
            'country_code' => 'Country Code',
            'dob' => 'Dob',
            'id_no' => 'Id No',
            'passport_no' => 'Passport No',
            'service_number' => 'Service Number',
            'blood_group' => 'Blood Group',
            'sponsor' => 'Sponsor',
            'registration_date' => 'Registration Date',
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSmNameChanges()
    {
        return $this->hasMany(\app\models\SmNameChange::className(), ['student_id' => 'student_id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCountryCode()
    {
        return $this->hasOne(\app\models\OrgCountry::className(), ['country_code' => 'country_code']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSmStudentProgrammeCurriculums()
    {
        return $this->hasMany(\app\models\SmStudentProgrammeCurriculum::className(), ['student_id' => 'student_id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSmWithdrawalRequests()
    {
        return $this->hasMany(\app\models\SmWithdrawalRequest::className(), ['student_id' => 'student_id']);
    }
    }
