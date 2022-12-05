<?php

namespace app\models;

use Yii;

/**
 * This is the base model class for table "smis.fs_prog_course_fee_structure".
 *
 * @property integer $prog_course_fee_structure_id
 * @property integer $prog_curr_fee_structure_id
 * @property integer $registration_type_id
 * @property string $amount
 * @property integer $course_category_id
 * @property string $status
 *
 * @property \app\models\CrCourseCategory $courseCategory
 * @property \app\models\CrCourseRegType $registrationType
 * @property \app\models\FsProgCurrFeesStructure $progCurrFeeStructure
 */
class FsProgCourseFeeStructure extends \yii\db\ActiveRecord
{
    //use \mootensai\relation\RelationTrait;


    /**
    * This function helps \mootensai\relation\RelationTrait runs faster
    * @return array relation names of this model
    */
    /*public function relationNames()
    {
        return [
            'courseCategory',
            'registrationType',
            'progCurrFeeStructure'
        ];
    }*/

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['prog_course_fee_structure_id', 'prog_curr_fee_structure_id', 'registration_type_id', 'amount', 'course_category_id', 'status'], 'required'],
            [['prog_course_fee_structure_id', 'prog_curr_fee_structure_id', 'registration_type_id', 'course_category_id'], 'integer'],
            [['amount'], 'number'],
            [['status'], 'string', 'max' => 15]
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'smis.fs_prog_course_fee_structure';
    }

    /**
     * @inheritdoc
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
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCourseCategory()
    {
        return $this->hasOne(\app\models\CrCourseCategory::className(), ['category_id' => 'course_category_id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRegistrationType()
    {
        return $this->hasOne(\app\models\CrCourseRegType::className(), ['course_reg_type_id' => 'registration_type_id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProgCurrFeeStructure()
    {
        return $this->hasOne(\app\models\FsProgCurrFeesStructure::className(), ['prog_curr_fee_structure_id' => 'prog_curr_fee_structure_id']);
    }
    }
