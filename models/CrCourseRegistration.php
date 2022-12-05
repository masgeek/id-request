<?php

namespace app\models;

use Yii;

/**
 * This is the base model class for table "smis.cr_course_registration".
 *
 * @property integer $student_course_reg_id
 * @property integer $timetable_id
 * @property integer $student_semester_session_id
 * @property integer $course_registration_type_id
 * @property string $registration_date
 * @property integer $course_reg_status_id
 * @property string $source_ipaddress
 * @property string $userid
 *
 * @property \app\models\CrCourseRegStatus $courseRegStatus
 * @property \app\models\CrCourseRegType $courseRegistrationType
 * @property \app\models\CrProgCurrTimetable $timetable
 * @property \app\models\ExMarksheet[] $exMarksheets
 */
class CrCourseRegistration extends \yii\db\ActiveRecord
{
    //use \mootensai\relation\RelationTrait;


    /**
    * This function helps \mootensai\relation\RelationTrait runs faster
    * @return array relation names of this model
    */
    /*public function relationNames()
    {
        return [
            'courseRegStatus',
            'courseRegistrationType',
            'timetable',
            'exMarksheets'
        ];
    }*/

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['timetable_id', 'student_semester_session_id', 'course_registration_type_id', 'course_reg_status_id'], 'required'],
            [['timetable_id', 'student_semester_session_id', 'course_registration_type_id', 'course_reg_status_id'], 'integer'],
            [['registration_date'], 'safe'],
            [['source_ipaddress'], 'string', 'max' => 100],
            [['userid'], 'string', 'max' => 30]
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'smis.cr_course_registration';
    }

    /**
     * @inheritdoc
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
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCourseRegStatus()
    {
        return $this->hasOne(\app\models\CrCourseRegStatus::className(), ['course_reg_status_id' => 'course_reg_status_id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCourseRegistrationType()
    {
        return $this->hasOne(\app\models\CrCourseRegType::className(), ['course_reg_type_id' => 'course_registration_type_id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTimetable()
    {
        return $this->hasOne(\app\models\CrProgCurrTimetable::className(), ['timetable_id' => 'timetable_id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getExMarksheets()
    {
        return $this->hasMany(\app\models\ExMarksheet::className(), ['student_course_reg_id' => 'student_course_reg_id']);
    }
    }
