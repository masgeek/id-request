<?php

namespace app\models;

use Yii;

/**
 * This is the base model class for table "smis.org_course_prerequisite".
 *
 * @property integer $course_prerequisite_id
 * @property integer $prog_curriculum_course_id
 * @property integer $course_id
 * @property string $status
 *
 * @property \app\models\OrgProgCurrCourse $progCurriculumCourse
 */
class OrgCoursePrerequisite extends \yii\db\ActiveRecord
{
    //use \mootensai\relation\RelationTrait;


    /**
    * This function helps \mootensai\relation\RelationTrait runs faster
    * @return array relation names of this model
    */
    /*public function relationNames()
    {
        return [
            'progCurriculumCourse'
        ];
    }*/

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['prog_curriculum_course_id', 'course_id'], 'required'],
            [['prog_curriculum_course_id', 'course_id'], 'integer'],
            [['status'], 'string', 'max' => 15]
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'smis.org_course_prerequisite';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'course_prerequisite_id' => 'Course Prerequisite ID',
            'prog_curriculum_course_id' => 'Prog Curriculum Course ID',
            'course_id' => 'Course ID',
            'status' => 'Status',
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProgCurriculumCourse()
    {
        return $this->hasOne(\app\models\OrgProgCurrCourse::className(), ['prog_curriculum_course_id' => 'prog_curriculum_course_id']);
    }
    }
