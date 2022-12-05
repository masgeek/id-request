<?php

namespace app\models;

use Yii;

/**
 * This is the base model class for table "smis.cr_course_reg_type".
 *
 * @property integer $course_reg_type_id
 * @property string $course_reg_type_code
 * @property string $course_reg_type_name
 * @property string $course_reg_entry_type
 *
 * @property \app\models\CrCourseRegistration[] $crCourseRegistrations
 * @property \app\models\FsProgCourseFeeStructure[] $fsProgCourseFeeStructures
 */
class CrCourseRegType extends \yii\db\ActiveRecord
{
    //use \mootensai\relation\RelationTrait;


    /**
    * This function helps \mootensai\relation\RelationTrait runs faster
    * @return array relation names of this model
    */
    /*public function relationNames()
    {
        return [
            'crCourseRegistrations',
            'fsProgCourseFeeStructures'
        ];
    }*/

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['course_reg_type_code'], 'required'],
            [['course_reg_type_code'], 'string', 'max' => 10],
            [['course_reg_type_name', 'course_reg_entry_type'], 'string', 'max' => 20]
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'smis.cr_course_reg_type';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'course_reg_type_id' => 'Course Reg Type ID',
            'course_reg_type_code' => 'FA,SUPP,RETAKE',
            'course_reg_type_name' => 'FIRST ATTEMPT, SUPPLIMENTARY,RETAKE',
            'course_reg_entry_type' => 'ORIGINAL,PASSMARK',
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCrCourseRegistrations()
    {
        return $this->hasMany(\app\models\CrCourseRegistration::className(), ['course_registration_type_id' => 'course_reg_type_id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFsProgCourseFeeStructures()
    {
        return $this->hasMany(\app\models\FsProgCourseFeeStructure::className(), ['registration_type_id' => 'course_reg_type_id']);
    }
    }
