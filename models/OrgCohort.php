<?php

namespace app\models;

use Yii;

/**
 * This is the base model class for table "smis.org_cohort".
 *
 * @property integer $cohort_id
 * @property string $cohort_desc
 *
 * @property \app\models\OrgCohortSession[] $orgCohortSessions
 * @property \app\models\SmStudentCohortHistory[] $smStudentCohortHistories
 */
class OrgCohort extends \yii\db\ActiveRecord
{
    //use \mootensai\relation\RelationTrait;


    /**
    * This function helps \mootensai\relation\RelationTrait runs faster
    * @return array relation names of this model
    */
    /*public function relationNames()
    {
        return [
            'orgCohortSessions',
            'smStudentCohortHistories'
        ];
    }*/

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cohort_desc'], 'required'],
            [['cohort_desc'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'smis.org_cohort';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'cohort_id' => 'Cohort ID',
            'cohort_desc' => 'Cohort Desc',
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrgCohortSessions()
    {
        return $this->hasMany(\app\models\OrgCohortSession::className(), ['cohort_id' => 'cohort_id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSmStudentCohortHistories()
    {
        return $this->hasMany(\app\models\SmStudentCohortHistory::className(), ['cohort_id' => 'cohort_id']);
    }
    }
