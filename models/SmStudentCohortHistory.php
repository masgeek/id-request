<?php

namespace app\models;

use Yii;

/**
 * This is the base model class for table "smis.sm_student_cohort_history".
 *
 * @property integer $stud_cohort_hist_id
 * @property integer $stud_id
 * @property integer $cohort_id
 *
 * @property \app\models\OrgCohort $cohort
 */
class SmStudentCohortHistory extends \yii\db\ActiveRecord
{
    //use \mootensai\relation\RelationTrait;


    /**
    * This function helps \mootensai\relation\RelationTrait runs faster
    * @return array relation names of this model
    */
    /*public function relationNames()
    {
        return [
            'cohort'
        ];
    }*/

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['stud_cohort_hist_id', 'stud_id', 'cohort_id'], 'required'],
            [['stud_cohort_hist_id', 'stud_id', 'cohort_id'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'smis.sm_student_cohort_history';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'stud_cohort_hist_id' => 'Stud Cohort Hist ID',
            'stud_id' => 'Stud ID',
            'cohort_id' => 'Cohort ID',
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCohort()
    {
        return $this->hasOne(\app\models\OrgCohort::className(), ['cohort_id' => 'cohort_id']);
    }
    }
