<?php

namespace app\models;

use Yii;

/**
 * This is the base model class for table "smis.cr_prog_curr_timetable".
 *
 * @property integer $timetable_id
 * @property integer $prog_curriculum_course_id
 * @property integer $prog_curriculum_sem_group_id
 * @property string $exam_date
 * @property integer $exam_venue
 * @property integer $exam_mode
 *
 * @property \app\models\CrCourseRegistration[] $crCourseRegistrations
 * @property \app\models\ExMode $examMode
 * @property \app\models\OrgProgCurrSemesterGroup $progCurriculumSemGroup
 * @property \app\models\CrProgrammeCurrLectureTimetable[] $crProgrammeCurrLectureTimetables
 */
class CrProgCurrTimetable extends \yii\db\ActiveRecord
{
    //use \mootensai\relation\RelationTrait;


    /**
    * This function helps \mootensai\relation\RelationTrait runs faster
    * @return array relation names of this model
    */
    /*public function relationNames()
    {
        return [
            'crCourseRegistrations',
            'examMode',
            'progCurriculumSemGroup',
            'crProgrammeCurrLectureTimetables'
        ];
    }*/

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['prog_curriculum_course_id', 'prog_curriculum_sem_group_id', 'exam_mode'], 'required'],
            [['prog_curriculum_course_id', 'prog_curriculum_sem_group_id', 'exam_venue', 'exam_mode'], 'integer'],
            [['exam_date'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'smis.cr_prog_curr_timetable';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'timetable_id' => 'Timetable ID',
            'prog_curriculum_course_id' => 'Prog Curriculum Course ID',
            'prog_curriculum_sem_group_id' => 'Prog Curriculum Sem Group ID',
            'exam_date' => 'Exam Date',
            'exam_venue' => 'Exam Venue',
            'exam_mode' => 'Exam Mode',
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCrCourseRegistrations()
    {
        return $this->hasMany(\app\models\CrCourseRegistration::className(), ['timetable_id' => 'timetable_id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getExamMode()
    {
        return $this->hasOne(\app\models\ExMode::className(), ['exam_mode_id' => 'exam_mode']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProgCurriculumSemGroup()
    {
        return $this->hasOne(\app\models\OrgProgCurrSemesterGroup::className(), ['prog_curriculum_sem_group_id' => 'prog_curriculum_sem_group_id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCrProgrammeCurrLectureTimetables()
    {
        return $this->hasMany(\app\models\CrProgrammeCurrLectureTimetable::className(), ['timetable_id' => 'timetable_id']);
    }
    }
