<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "smis.sm_student".
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
 */
class SmStudent extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'smis.sm_student';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['student_number', 'surname', 'other_names', 'gender', 'country_code', 'dob'], 'required'],
            [['dob', 'registration_date'], 'safe'],
            [['sponsor'], 'default', 'value' => null],
            [['sponsor'], 'integer'],
            [['student_number', 'passport_no', 'service_number'], 'string', 'max' => 20],
            [['surname'], 'string', 'max' => 50],
            [['other_names'], 'string', 'max' => 100],
            [['gender'], 'string', 'max' => 1],
            [['country_code'], 'string', 'max' => 3],
            [['id_no'], 'string', 'max' => 10],
            [['blood_group'], 'string', 'max' => 5],
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
}
