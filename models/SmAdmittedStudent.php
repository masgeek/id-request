<?php

namespace app\models;

use Yii;

/**
 * This is the base model class for table "smis.sm_admitted_student".
 *
 * @property integer $adm_refno
 * @property string $kcse_index_no
 * @property string $kcse_year
 * @property string $primary_phone_no
 * @property string $alternative_phone_no
 * @property string $primary_email
 * @property string $alternative_email
 * @property string $post_code
 * @property string $post_address
 * @property string $town
 * @property string $kuccps_prog_code
 * @property string $uon_prog_code
 * @property string $national_id
 * @property string $birth_cert_no
 * @property integer $source_id
 * @property string $passport_no
 * @property string $admission_status
 * @property integer $application_refno
 * @property integer $intake_code
 * @property integer $student_category_id
 * @property string $password
 * @property boolean $doc_submission_status
 * @property string $primary_email_salt
 * @property string $secondary_email_salt
 * @property string $primary_email_verified_date
 * @property string $secondary_email_verified_date
 * @property string $surname
 * @property string $other_names
 * @property string $primary_phone_country_code
 * @property string $alternative_phone_country_code
 * @property string $gender
 * @property string $clearance_status
 * @property string $password_changed_date
 *
 * @property \app\models\SmIntakeSource $source
 * @property \app\models\SmIntake $intakeCode
 * @property \app\models\SmStudSubmittedDocument[] $smStudSubmittedDocuments
 * @property \app\models\SmStudentProgrammeCurriculum[] $smStudentProgrammeCurriculums
 */
class SmAdmittedStudent extends \yii\db\ActiveRecord
{
    //use \mootensai\relation\RelationTrait;


    /**
    * This function helps \mootensai\relation\RelationTrait runs faster
    * @return array relation names of this model
    */
    /*public function relationNames()
    {
        return [
            'source',
            'intakeCode',
            'smStudSubmittedDocuments',
            'smStudentProgrammeCurriculums'
        ];
    }*/

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['uon_prog_code', 'source_id', 'intake_code', 'student_category_id', 'gender'], 'required'],
            [['source_id', 'application_refno', 'intake_code', 'student_category_id'], 'integer'],
            [['doc_submission_status'], 'boolean'],
            [['primary_email_verified_date', 'secondary_email_verified_date', 'password_changed_date'], 'safe'],
            [['kcse_index_no', 'post_address', 'kuccps_prog_code', 'uon_prog_code', 'national_id', 'birth_cert_no', 'passport_no'], 'string', 'max' => 20],
            [['kcse_year', 'post_code', 'primary_phone_country_code', 'alternative_phone_country_code'], 'string', 'max' => 10],
            [['primary_phone_no', 'alternative_phone_no', 'town', 'surname'], 'string', 'max' => 50],
            [['primary_email', 'alternative_email', 'password'], 'string', 'max' => 100],
            [['admission_status', 'clearance_status'], 'string', 'max' => 30],
            [['primary_email_salt', 'secondary_email_salt'], 'string', 'max' => 255],
            [['other_names'], 'string', 'max' => 150],
            [['gender'], 'string', 'max' => 1]
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'smis.sm_admitted_student';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'adm_refno' => 'Adm Refno',
            'kcse_index_no' => 'Kcse Index No',
            'kcse_year' => 'when uploading make this field mandatory',
            'primary_phone_no' => 'Primary Phone No',
            'alternative_phone_no' => 'Alternative Phone No',
            'primary_email' => 'Primary Email',
            'alternative_email' => 'Alternative Email',
            'post_code' => 'Post Code',
            'post_address' => 'Post Address',
            'town' => 'Town',
            'kuccps_prog_code' => 'Kuccps Prog Code',
            'uon_prog_code' => 'Uon Prog Code',
            'national_id' => 'National ID',
            'birth_cert_no' => 'Birth Cert No',
            'source_id' => 'Source ID',
            'passport_no' => 'Passport No',
            'admission_status' => 'to take care of a case where an admission is revoked or recalled for the sake of module II
default status pre-admission',
            'application_refno' => 'to link to applicant incase a report of admitted student is required',
            'intake_code' => 'Intake Code',
            'student_category_id' => 'Student Category ID',
            'password' => 'default refno',
            'doc_submission_status' => 'Doc Submission Status',
            'primary_email_salt' => 'Primary Email Salt',
            'secondary_email_salt' => 'Secondary Email Salt',
            'primary_email_verified_date' => 'Primary Email Verified Date',
            'secondary_email_verified_date' => 'Secondary Email Verified Date',
            'surname' => 'Surname',
            'other_names' => 'Other Names',
            'primary_phone_country_code' => 'Primary Phone Country Code',
            'alternative_phone_country_code' => 'Alternative Phone Country Code',
            'gender' => 'Gender',
            'clearance_status' => 'indicates clearance status of a student. PENDING, CLEARED, NOT CLEARED',
            'password_changed_date' => 'Password Changed Date',
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSource()
    {
        return $this->hasOne(\app\models\SmIntakeSource::className(), ['source_id' => 'source_id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIntakeCode()
    {
        return $this->hasOne(\app\models\SmIntake::className(), ['intake_code' => 'intake_code']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSmStudSubmittedDocuments()
    {
        return $this->hasMany(\app\models\SmStudSubmittedDocument::className(), ['adm_refno' => 'adm_refno']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSmStudentProgrammeCurriculums()
    {
        return $this->hasMany(\app\models\SmStudentProgrammeCurriculum::className(), ['adm_refno' => 'adm_refno']);
    }
    }
