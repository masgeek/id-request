<?php

namespace app\models;

use Yii;

/**
 * This is the base model class for table "smis.org_prog_curr_semester_group".
 *
 * @property integer $prog_curriculum_sem_group_id
 * @property integer $prog_curriculum_semester_id
 * @property integer $study_centre_group_id
 * @property string $start_date
 * @property string $end_date
 * @property string $registration_deadline
 * @property string $display_date
 * @property integer $programme_level
 * @property string $status
 *
 * @property \app\models\CrProgCurrTimetable[] $crProgCurrTimetables
 * @property \app\models\OrgProgCurrSemester $progCurriculumSemester
 * @property \app\models\OrgProgLevel $programmeLevel
 * @property \app\models\OrgStudyCentreGroup $studyCentreGroup
 */
class OrgProgCurrSemesterGroup extends \yii\db\ActiveRecord
{
    //use \mootensai\relation\RelationTrait;


    /**
    * This function helps \mootensai\relation\RelationTrait runs faster
    * @return array relation names of this model
    */
    /*public function relationNames()
    {
        return [
            'crProgCurrTimetables',
            'progCurriculumSemester',
            'programmeLevel',
            'studyCentreGroup'
        ];
    }*/

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['prog_curriculum_semester_id', 'study_centre_group_id', 'start_date', 'programme_level'], 'required'],
            [['prog_curriculum_semester_id', 'study_centre_group_id', 'programme_level'], 'integer'],
            [['start_date', 'end_date', 'registration_deadline', 'display_date'], 'safe'],
            [['status'], 'string', 'max' => 20]
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'smis.org_prog_curr_semester_group';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'prog_curriculum_sem_group_id' => 'Prog Curriculum Sem Group ID',
            'prog_curriculum_semester_id' => 'Prog Curriculum Semester ID',
            'study_centre_group_id' => 'Study Centre Group ID',
            'start_date' => 'Start Date',
            'end_date' => 'End Date',
            'registration_deadline' => 'Registration Deadline',
            'display_date' => 'Display Date',
            'programme_level' => 'Programme Level',
            'status' => 'Status',
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCrProgCurrTimetables()
    {
        return $this->hasMany(\app\models\CrProgCurrTimetable::className(), ['prog_curriculum_sem_group_id' => 'prog_curriculum_sem_group_id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProgCurriculumSemester()
    {
        return $this->hasOne(\app\models\OrgProgCurrSemester::className(), ['prog_curriculum_semester_id' => 'prog_curriculum_semester_id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProgrammeLevel()
    {
        return $this->hasOne(\app\models\OrgProgLevel::className(), ['programme_level_id' => 'programme_level']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStudyCentreGroup()
    {
        return $this->hasOne(\app\models\OrgStudyCentreGroup::className(), ['study_centre_group_id' => 'study_centre_group_id']);
    }
    }
