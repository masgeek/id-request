<?php

namespace app\models;

use Yii;

/**
 * This is the base model class for table "smis.org_prog_curr_unit".
 *
 * @property integer $prog_curriculum_unit_id
 * @property integer $org_unit_history_id
 * @property integer $prog_curriculum_id
 * @property string $start_date
 * @property string $end_date
 * @property string $status
 *
 * @property \app\models\OrgProgrammeCurriculum $progCurriculum
 * @property \app\models\OrgUnitHistory $orgUnitHistory
 */
class OrgProgCurrUnit extends \yii\db\ActiveRecord
{
    //use \mootensai\relation\RelationTrait;


    /**
    * This function helps \mootensai\relation\RelationTrait runs faster
    * @return array relation names of this model
    */
    /*public function relationNames()
    {
        return [
            'progCurriculum',
            'orgUnitHistory'
        ];
    }*/

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['org_unit_history_id', 'prog_curriculum_id', 'start_date'], 'required'],
            [['org_unit_history_id', 'prog_curriculum_id'], 'integer'],
            [['start_date', 'end_date'], 'safe'],
            [['status'], 'string', 'max' => 20]
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'smis.org_prog_curr_unit';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'prog_curriculum_unit_id' => 'Prog Curriculum Unit ID',
            'org_unit_history_id' => 'Org Unit History ID',
            'prog_curriculum_id' => 'Prog Curriculum ID',
            'start_date' => 'Start Date',
            'end_date' => 'End Date',
            'status' => 'Status',
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProgCurriculum()
    {
        return $this->hasOne(\app\models\OrgProgrammeCurriculum::className(), ['prog_curriculum_id' => 'prog_curriculum_id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrgUnitHistory()
    {
        return $this->hasOne(\app\models\OrgUnitHistory::className(), ['org_unit_history_id' => 'org_unit_history_id']);
    }
    }
