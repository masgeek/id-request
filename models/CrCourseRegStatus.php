<?php

namespace app\models;

use Yii;

/**
 * This is the base model class for table "smis.cr_course_reg_status".
 *
 * @property integer $course_reg_status_id
 * @property string $course_reg_status_name
 *
 * @property \app\models\CrCourseRegistration[] $crCourseRegistrations
 */
class CrCourseRegStatus extends \yii\db\ActiveRecord
{
    //use \mootensai\relation\RelationTrait;


    /**
    * This function helps \mootensai\relation\RelationTrait runs faster
    * @return array relation names of this model
    */
    /*public function relationNames()
    {
        return [
            'crCourseRegistrations'
        ];
    }*/

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['course_reg_status_id', 'course_reg_status_name'], 'required'],
            [['course_reg_status_id'], 'integer'],
            [['course_reg_status_name'], 'string']
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'smis.cr_course_reg_status';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'course_reg_status_id' => 'Course Reg Status ID',
            'course_reg_status_name' => 'Course Reg Status Name',
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCrCourseRegistrations()
    {
        return $this->hasMany(\app\models\CrCourseRegistration::className(), ['course_reg_status_id' => 'course_reg_status_id']);
    }
    }
