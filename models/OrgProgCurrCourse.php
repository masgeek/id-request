<?php

namespace app\models;

use Yii;

/**
 * This is the base model class for table "smis.org_prog_curr_course".
 *
 * @property integer $prog_curriculum_course_id
 * @property integer $prog_curriculum_id
 * @property integer $course_id
 * @property integer $credit_factor
 * @property string $credit_hours
 * @property integer $level_of_study
 * @property integer $semester
 * @property string $status
 * @property boolean $has_course_work
 *
 * @property \app\models\OrgCoursePrerequisite[] $orgCoursePrerequisites
 * @property \app\models\OrgCourse $course
 * @property \app\models\OrgProgrammeCurriculum $progCurriculum
 */
class OrgProgCurrCourse extends \yii\db\ActiveRecord
{
    //use \mootensai\relation\RelationTrait;


    /**
    * This function helps \mootensai\relation\RelationTrait runs faster
    * @return array relation names of this model
    */
    /*public function relationNames()
    {
        return [
            'orgCoursePrerequisites',
            'course',
            'progCurriculum'
        ];
    }*/

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['prog_curriculum_id', 'course_id', 'credit_hours', 'level_of_study'], 'required'],
            [['prog_curriculum_id', 'course_id', 'credit_factor', 'level_of_study', 'semester'], 'integer'],
            [['credit_hours'], 'number'],
            [['has_course_work'], 'boolean'],
            [['status'], 'string', 'max' => 10]
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'smis.org_prog_curr_course';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'prog_curriculum_course_id' => 'Prog Curriculum Course ID',
            'prog_curriculum_id' => 'Prog Curriculum ID',
            'course_id' => 'Course ID',
            'credit_factor' => 'Credit Factor',
            'credit_hours' => 'Credit Hours',
            'level_of_study' => 'Level Of Study',
            'semester' => 'Semester',
            'status' => 'Status',
            'has_course_work' => 'Has Course Work',
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrgCoursePrerequisites()
    {
        return $this->hasMany(\app\models\OrgCoursePrerequisite::className(), ['prog_curriculum_course_id' => 'prog_curriculum_course_id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCourse()
    {
        return $this->hasOne(\app\models\OrgCourse::className(), ['course_id' => 'course_id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProgCurriculum()
    {
        return $this->hasOne(\app\models\OrgProgrammeCurriculum::className(), ['prog_curriculum_id' => 'prog_curriculum_id']);
    }
    }
