<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "smis.cr_course_registration".
 *
 * @property int $student_course_reg_id
 * @property int $timetable_id
 * @property int $student_semester_session_id
 * @property int $course_registration_type_id
 * @property string $registration_date
 * @property int $course_reg_status_id
 * @property string|null $source_ipaddress
 * @property string|null $userid
 */
class CrCourseRegistration extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'smis.cr_course_registration';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['timetable_id', 'student_semester_session_id', 'course_registration_type_id', 'course_reg_status_id'], 'required'],
            [['timetable_id', 'student_semester_session_id', 'course_registration_type_id', 'course_reg_status_id'], 'default', 'value' => null],
            [['timetable_id', 'student_semester_session_id', 'course_registration_type_id', 'course_reg_status_id'], 'integer'],
            [['registration_date'], 'safe'],
            [['source_ipaddress'], 'string', 'max' => 100],
            [['userid'], 'string', 'max' => 30],
            [['course_reg_status_id'], 'exist', 'skipOnError' => true, 'targetClass' => CrCourseRegStatus::class, 'targetAttribute' => ['course_reg_status_id' => 'course_reg_status_id']],
            [['course_registration_type_id'], 'exist', 'skipOnError' => true, 'targetClass' => CrCourseRegType::class, 'targetAttribute' => ['course_registration_type_id' => 'course_reg_type_id']],
            [['timetable_id'], 'exist', 'skipOnError' => true, 'targetClass' => CrProgCurrTimetable::class, 'targetAttribute' => ['timetable_id' => 'timetable_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'student_course_reg_id' => 'Student Course Reg ID',
            'timetable_id' => 'Timetable ID',
            'student_semester_session_id' => 'Student Semester Session ID',
            'course_registration_type_id' => 'Course Registration Type ID',
            'registration_date' => 'Registration Date',
            'course_reg_status_id' => 'Course Reg Status ID',
            'source_ipaddress' => 'Source Ipaddress',
            'userid' => 'Userid',
        ];
    }
}
