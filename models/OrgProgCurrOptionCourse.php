<?php

namespace app\models;

use Yii;

/**
 * This is the base model class for table "smis.org_prog_curr_option_courses".
 *
 * @property integer $option_course_id
 * @property integer $option_id
 * @property integer $course_id
 * @property string $course_type
 *
 * @property \app\models\OrgProgCurrOption $option
 */
class OrgProgCurrOptionCourse extends \yii\db\ActiveRecord
{
    //use \mootensai\relation\RelationTrait;


    /**
    * This function helps \mootensai\relation\RelationTrait runs faster
    * @return array relation names of this model
    */
    /*public function relationNames()
    {
        return [
            'option'
        ];
    }*/

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['option_course_id', 'option_id', 'course_id', 'course_type'], 'required'],
            [['option_course_id', 'option_id', 'course_id'], 'integer'],
            [['course_type'], 'string', 'max' => 15]
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'smis.org_prog_curr_option_courses';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'option_course_id' => 'Option Course ID',
            'option_id' => 'Option ID',
            'course_id' => 'Course ID',
            'course_type' => 'Course Type',
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOption()
    {
        return $this->hasOne(\app\models\OrgProgCurrOption::className(), ['option_id' => 'option_id']);
    }
    }
