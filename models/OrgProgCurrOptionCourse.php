<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "smis.org_prog_curr_option_courses".
 *
 * @property int $option_course_id
 * @property int $option_id
 * @property int $course_id
 * @property string $course_type
 */
class OrgProgCurrOptionCourse extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'smis.org_prog_curr_option_courses';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['option_course_id', 'option_id', 'course_id', 'course_type'], 'required'],
            [['option_course_id', 'option_id', 'course_id'], 'default', 'value' => null],
            [['option_course_id', 'option_id', 'course_id'], 'integer'],
            [['course_type'], 'string', 'max' => 15],
            [['option_course_id'], 'unique'],
            [['option_id'], 'exist', 'skipOnError' => true, 'targetClass' => OrgProgCurrOption::class, 'targetAttribute' => ['option_id' => 'option_id']],
        ];
    }

    /**
     * {@inheritdoc}
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
}
