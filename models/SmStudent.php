<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "sm_student".
 *
 * @property int $student_id
 * @property string $student_number
 * @property string $surname
 * @property string $other_names
 * @property string $gender
 * @property string $country_code
 * @property string $dob
 * @property string|null $id_no
 * @property string|null $passport_no
 * @property string|null $service_number
 * @property string|null $blood_group
 * @property int|null $sponsor
 * @property string|null $registration_date
 *
 * @property OrgCountry $countryCode
 * @property SmStudentProgrammeCurriculum[] $smStudentProgrammeCurriculums
 */
class SmStudent extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'sm_student';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['student_id', 'student_number', 'surname', 'other_names', 'gender', 'country_code', 'dob'], 'required'],
            [['student_id', 'sponsor'], 'default', 'value' => null],
            [['student_id', 'sponsor'], 'integer'],
            [['dob', 'registration_date'], 'safe'],
            [['student_number', 'passport_no', 'service_number'], 'string', 'max' => 20],
            [['surname'], 'string', 'max' => 50],
            [['other_names'], 'string', 'max' => 100],
            [['gender'], 'string', 'max' => 1],
            [['country_code'], 'string', 'max' => 3],
            [['id_no'], 'string', 'max' => 10],
            [['blood_group'], 'string', 'max' => 5],
            [['student_id'], 'unique'],
            [['country_code'], 'exist', 'skipOnError' => true, 'targetClass' => OrgCountry::class, 'targetAttribute' => ['country_code' => 'country_code']],
        ];
    }

    /**
     * {@inheritdoc}
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
     * Gets query for [[CountryCode]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCountryCode()
    {
        return $this->hasOne(OrgCountry::class, ['country_code' => 'country_code']);
    }

    /**
     * Gets query for [[SmStudentProgrammeCurriculums]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSmStudentProgrammeCurriculums()
    {
        return $this->hasMany(SmStudentProgrammeCurriculum::class, ['student_id' => 'student_id']);
    }
}
