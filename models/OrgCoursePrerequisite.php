<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "smis.org_course_prerequisite".
 *
 * @property int $course_prerequisite_id
 * @property int $prog_curriculum_course_id
 * @property int $course_id
 * @property string|null $status
 */
class OrgCoursePrerequisite extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'smis.org_course_prerequisite';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['prog_curriculum_course_id', 'course_id'], 'required'],
            [['prog_curriculum_course_id', 'course_id'], 'default', 'value' => null],
            [['prog_curriculum_course_id', 'course_id'], 'integer'],
            [['status'], 'string', 'max' => 15],
            [['prog_curriculum_course_id'], 'exist', 'skipOnError' => true, 'targetClass' => OrgProgCurrCourse::class, 'targetAttribute' => ['prog_curriculum_course_id' => 'prog_curriculum_course_id']],
        ];
    }

    /**
     * {@inheritdoc}
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
}
