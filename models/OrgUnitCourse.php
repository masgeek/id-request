<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "smis.org_unit_course".
 *
 * @property int $org_unit_course_id
 * @property int $course_id
 * @property int $org_unit_id
 * @property int $org_teaching_id
 * @property string $start_date
 * @property string|null $end_date
 * @property int $user_id
 */
class OrgUnitCourse extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'smis.org_unit_course';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['course_id', 'org_unit_id', 'org_teaching_id', 'start_date', 'user_id'], 'required'],
            [['course_id', 'org_unit_id', 'org_teaching_id', 'user_id'], 'default', 'value' => null],
            [['course_id', 'org_unit_id', 'org_teaching_id', 'user_id'], 'integer'],
            [['start_date', 'end_date'], 'safe'],
            [['course_id'], 'exist', 'skipOnError' => true, 'targetClass' => OrgCourse::class, 'targetAttribute' => ['course_id' => 'course_id']],
        ];
    }

    /**
     * {@inheritdoc}
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
}
