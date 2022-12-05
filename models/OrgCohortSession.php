<?php

namespace app\models;

use Yii;

/**
 * This is the base model class for table "smis.org_cohort_session".
 *
 * @property integer $cohort_session_id
 * @property string $cohort_session_name
 * @property integer $cohort_id
 * @property integer $prog_curriculum_semester_id
 * @property string $status
 *
 * @property \app\models\OrgCohort $cohort
 * @property \app\models\OrgProgCurrSemester $progCurriculumSemester
 */
class OrgCohortSession extends \yii\db\ActiveRecord
{
    //use \mootensai\relation\RelationTrait;


    /**
    * This function helps \mootensai\relation\RelationTrait runs faster
    * @return array relation names of this model
    */
    /*public function relationNames()
    {
        return [
            'cohort',
            'progCurriculumSemester'
        ];
    }*/

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cohort_session_name', 'cohort_id', 'prog_curriculum_semester_id'], 'required'],
            [['cohort_id', 'prog_curriculum_semester_id'], 'integer'],
            [['cohort_session_name'], 'string', 'max' => 50],
            [['status'], 'string', 'max' => 10]
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'smis.org_cohort_session';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'cohort_session_id' => 'Cohort Session ID',
            'cohort_session_name' => 'Cohort Session Name',
            'cohort_id' => 'Cohort ID',
            'prog_curriculum_semester_id' => 'Prog Curriculum Semester ID',
            'status' => 'Status',
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCohort()
    {
        return $this->hasOne(\app\models\OrgCohort::className(), ['cohort_id' => 'cohort_id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProgCurriculumSemester()
    {
        return $this->hasOne(\app\models\OrgProgCurrSemester::className(), ['prog_curriculum_semester_id' => 'prog_curriculum_semester_id']);
    }
    }
