<?php

namespace app\models;

use Yii;

/**
 * This is the base model class for table "smis.org_programme_curriculum".
 *
 * @property integer $prog_curriculum_id
 * @property integer $prog_id
 * @property string $prog_curriculum_desc
 * @property integer $duration
 * @property integer $pass_mark
 * @property integer $annual_semesters
 * @property integer $max_units_per_semester
 * @property string $average_type
 * @property string $award_rounding
 * @property string $start_date
 * @property string $end_date
 * @property string $prog_cur_prefix
 * @property string $date_created
 * @property integer $grading_system_id
 * @property string $status
 * @property string $approval_date
 *
 * @property \app\models\OrgProgCurrCourse[] $orgProgCurrCourses
 * @property \app\models\OrgProgCurrOption[] $orgProgCurrOptions
 * @property \app\models\OrgProgCurrSemester[] $orgProgCurrSemesters
 * @property \app\models\OrgProgCurrUnit[] $orgProgCurrUnits
 * @property \app\models\ExGradingSystem $gradingSystem
 * @property \app\models\OrgProgramme $prog
 * @property \app\models\SmInterfacultyTransfer[] $smInterfacultyTransfers
 * @property \app\models\SmStudentProgrammeCurriculum[] $smStudentProgrammeCurriculums
 */
class OrgProgrammeCurriculum extends \yii\db\ActiveRecord
{
    //use \mootensai\relation\RelationTrait;


    /**
    * This function helps \mootensai\relation\RelationTrait runs faster
    * @return array relation names of this model
    */
    /*public function relationNames()
    {
        return [
            'orgProgCurrCourses',
            'orgProgCurrOptions',
            'orgProgCurrSemesters',
            'orgProgCurrUnits',
            'gradingSystem',
            'prog',
            'smInterfacultyTransfers',
            'smStudentProgrammeCurriculums'
        ];
    }*/

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['prog_id', 'prog_curriculum_desc', 'duration', 'pass_mark', 'start_date', 'prog_cur_prefix', 'grading_system_id'], 'required'],
            [['prog_id', 'duration', 'pass_mark', 'annual_semesters', 'max_units_per_semester', 'grading_system_id'], 'integer'],
            [['start_date', 'end_date', 'date_created', 'approval_date'], 'safe'],
            [['prog_curriculum_desc'], 'string', 'max' => 300],
            [['average_type', 'prog_cur_prefix', 'status'], 'string', 'max' => 10],
            [['award_rounding'], 'string', 'max' => 20]
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'smis.org_programme_curriculum';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'prog_curriculum_id' => 'Prog Curriculum ID',
            'prog_id' => 'Prog ID',
            'prog_curriculum_desc' => 'Prog Curriculum Desc',
            'duration' => 'ACADEMIC SESSIONS',
            'pass_mark' => 'Pass Mark',
            'annual_semesters' => 'Annual Semesters',
            'max_units_per_semester' => 'Max Units Per Semester',
            'average_type' => 'Average Type',
            'award_rounding' => 'ROUNDOFF, TRUNCATE',
            'start_date' => 'Start Date',
            'end_date' => 'End Date',
            'prog_cur_prefix' => 'Programme curriculum prefix',
            'date_created' => 'Date Created',
            'grading_system_id' => 'Grading System ID',
            'status' => 'Status',
            'approval_date' => 'Approval Date',
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrgProgCurrCourses()
    {
        return $this->hasMany(\app\models\OrgProgCurrCourse::className(), ['prog_curriculum_id' => 'prog_curriculum_id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrgProgCurrOptions()
    {
        return $this->hasMany(\app\models\OrgProgCurrOption::className(), ['prog_cur_id' => 'prog_curriculum_id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrgProgCurrSemesters()
    {
        return $this->hasMany(\app\models\OrgProgCurrSemester::className(), ['prog_curriculum_id' => 'prog_curriculum_id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrgProgCurrUnits()
    {
        return $this->hasMany(\app\models\OrgProgCurrUnit::className(), ['prog_curriculum_id' => 'prog_curriculum_id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGradingSystem()
    {
        return $this->hasOne(\app\models\ExGradingSystem::className(), ['grading_system_id' => 'grading_system_id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProg()
    {
        return $this->hasOne(\app\models\OrgProgramme::className(), ['prog_id' => 'prog_id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSmInterfacultyTransfers()
    {
        return $this->hasMany(\app\models\SmInterfacultyTransfer::className(), ['prog_curriculum_id' => 'prog_curriculum_id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSmStudentProgrammeCurriculums()
    {
        return $this->hasMany(\app\models\SmStudentProgrammeCurriculum::className(), ['prog_curriculum_id' => 'prog_curriculum_id']);
    }
    }
