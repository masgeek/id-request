<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "smis.org_prog_curr_course".
 *
 * @property int $prog_curriculum_course_id
 * @property int $prog_curriculum_id
 * @property int $course_id
 * @property int $credit_factor
 * @property float $credit_hours
 * @property int $level_of_study
 * @property int|null $semester
 * @property string $status
 * @property bool|null $has_course_work
 */
class OrgProgCurrCourse extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'smis.org_prog_curr_course';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['prog_curriculum_id', 'course_id', 'credit_hours', 'level_of_study'], 'required'],
            [['prog_curriculum_id', 'course_id', 'credit_factor', 'level_of_study', 'semester'], 'default', 'value' => null],
            [['prog_curriculum_id', 'course_id', 'credit_factor', 'level_of_study', 'semester'], 'integer'],
            [['credit_hours'], 'number'],
            [['has_course_work'], 'boolean'],
            [['status'], 'string', 'max' => 10],
            [['course_id'], 'exist', 'skipOnError' => true, 'targetClass' => OrgCourse::class, 'targetAttribute' => ['course_id' => 'course_id']],
            [['prog_curriculum_id'], 'exist', 'skipOnError' => true, 'targetClass' => OrgProgrammeCurriculum::class, 'targetAttribute' => ['prog_curriculum_id' => 'prog_curriculum_id']],
        ];
    }

    /**
     * {@inheritdoc}
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
}
