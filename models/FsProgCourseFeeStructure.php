<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "smis.fs_prog_course_fee_structure".
 *
 * @property int $prog_course_fee_structure_id
 * @property int $prog_curr_fee_structure_id
 * @property int $registration_type_id
 * @property float $amount
 * @property int $course_category_id
 * @property string $status
 */
class FsProgCourseFeeStructure extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'smis.fs_prog_course_fee_structure';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['prog_course_fee_structure_id', 'prog_curr_fee_structure_id', 'registration_type_id', 'amount', 'course_category_id', 'status'], 'required'],
            [['prog_course_fee_structure_id', 'prog_curr_fee_structure_id', 'registration_type_id', 'course_category_id'], 'default', 'value' => null],
            [['prog_course_fee_structure_id', 'prog_curr_fee_structure_id', 'registration_type_id', 'course_category_id'], 'integer'],
            [['amount'], 'number'],
            [['status'], 'string', 'max' => 15],
            [['prog_course_fee_structure_id'], 'unique'],
            [['course_category_id'], 'exist', 'skipOnError' => true, 'targetClass' => CrCourseCategory::class, 'targetAttribute' => ['course_category_id' => 'category_id']],
            [['registration_type_id'], 'exist', 'skipOnError' => true, 'targetClass' => CrCourseRegType::class, 'targetAttribute' => ['registration_type_id' => 'course_reg_type_id']],
            [['prog_curr_fee_structure_id'], 'exist', 'skipOnError' => true, 'targetClass' => FsProgCurrFeesStructure::class, 'targetAttribute' => ['prog_curr_fee_structure_id' => 'prog_curr_fee_structure_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'prog_course_fee_structure_id' => 'Prog Course Fee Structure ID',
            'prog_curr_fee_structure_id' => 'Prog Curr Fee Structure ID',
            'registration_type_id' => 'Registration Type ID',
            'amount' => 'Amount',
            'course_category_id' => 'Course Category ID',
            'status' => 'Status',
        ];
    }
}
