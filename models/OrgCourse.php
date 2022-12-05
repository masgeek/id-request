<?php

namespace app\models;

use Yii;

/**
 * This is the base model class for table "smis.org_courses".
 *
 * @property integer $course_id
 * @property string $course_code
 * @property string $course_name
 * @property integer $level_of_study
 * @property integer $semester
 * @property integer $academic_hours
 * @property string $status
 * @property integer $org_unit_id
 * @property integer $billing_factor
 * @property integer $category_id
 *
 * @property \app\models\CrCourseCategory $category
 * @property \app\models\OrgProgCurrCourse[] $orgProgCurrCourses
 * @property \app\models\OrgUnitCourse[] $orgUnitCourses
 */
class OrgCourse extends \yii\db\ActiveRecord
{
    //use \mootensai\relation\RelationTrait;


    /**
    * This function helps \mootensai\relation\RelationTrait runs faster
    * @return array relation names of this model
    */
    /*public function relationNames()
    {
        return [
            'category',
            'orgProgCurrCourses',
            'orgUnitCourses'
        ];
    }*/

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['course_code', 'course_name', 'level_of_study', 'semester', 'academic_hours', 'org_unit_id', 'category_id'], 'required'],
            [['level_of_study', 'semester', 'academic_hours', 'org_unit_id', 'billing_factor', 'category_id'], 'integer'],
            [['course_code'], 'string', 'max' => 8],
            [['course_name'], 'string', 'max' => 150],
            [['status'], 'string', 'max' => 10]
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'smis.org_courses';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'course_id' => 'Course ID',
            'course_code' => 'Course Code',
            'course_name' => 'Course Name',
            'level_of_study' => 'Level Of Study',
            'semester' => 'Semester',
            'academic_hours' => 'Academic Hours',
            'status' => 'Status',
            'org_unit_id' => 'Org Unit ID',
            'billing_factor' => 'Billing Factor',
            'category_id' => 'Category ID',
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(\app\models\CrCourseCategory::className(), ['category_id' => 'category_id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrgProgCurrCourses()
    {
        return $this->hasMany(\app\models\OrgProgCurrCourse::className(), ['course_id' => 'course_id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrgUnitCourses()
    {
        return $this->hasMany(\app\models\OrgUnitCourse::className(), ['course_id' => 'course_id']);
    }
    }
