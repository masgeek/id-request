<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "smis.org_courses".
 *
 * @property int $course_id
 * @property string $course_code
 * @property string $course_name
 * @property int $level_of_study
 * @property int $semester
 * @property int $academic_hours
 * @property string $status
 * @property int $org_unit_id
 * @property int|null $billing_factor
 * @property int $category_id
 */
class OrgCourse extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'smis.org_courses';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['course_code', 'course_name', 'level_of_study', 'semester', 'academic_hours', 'org_unit_id', 'category_id'], 'required'],
            [['level_of_study', 'semester', 'academic_hours', 'org_unit_id', 'billing_factor', 'category_id'], 'default', 'value' => null],
            [['level_of_study', 'semester', 'academic_hours', 'org_unit_id', 'billing_factor', 'category_id'], 'integer'],
            [['course_code'], 'string', 'max' => 8],
            [['course_name'], 'string', 'max' => 150],
            [['status'], 'string', 'max' => 10],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => CrCourseCategory::class, 'targetAttribute' => ['category_id' => 'category_id']],
        ];
    }

    /**
     * {@inheritdoc}
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
}
