<?php

namespace app\models;

use Yii;

/**
 * This is the base model class for table "smis.org_unit_course".
 *
 * @property integer $org_unit_course_id
 * @property integer $course_id
 * @property integer $org_unit_id
 * @property integer $org_teaching_id
 * @property string $start_date
 * @property string $end_date
 * @property integer $user_id
 *
 * @property \app\models\OrgCourse $course
 */
class OrgUnitCourse extends \yii\db\ActiveRecord
{
    //use \mootensai\relation\RelationTrait;


    /**
    * This function helps \mootensai\relation\RelationTrait runs faster
    * @return array relation names of this model
    */
    /*public function relationNames()
    {
        return [
            'course'
        ];
    }*/

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['course_id', 'org_unit_id', 'org_teaching_id', 'start_date', 'user_id'], 'required'],
            [['course_id', 'org_unit_id', 'org_teaching_id', 'user_id'], 'integer'],
            [['start_date', 'end_date'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'smis.org_unit_course';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'org_unit_course_id' => 'Org Unit Course ID',
            'course_id' => 'Course ID',
            'org_unit_id' => 'Org Unit ID',
            'org_teaching_id' => 'Org Teaching ID',
            'start_date' => 'Start Date',
            'end_date' => 'End Date',
            'user_id' => 'User ID',
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCourse()
    {
        return $this->hasOne(\app\models\OrgCourse::className(), ['course_id' => 'course_id']);
    }
    }
