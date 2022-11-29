<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "org_prog_curr_unit".
 *
 * @property int $prog_curriculum_unit_id
 * @property int $org_unit_history_id
 * @property int $prog_curriculum_id
 * @property string $start_date
 * @property string|null $end_date
 * @property string $status
 *
 * @property OrgUnitHistory $orgUnitHistory
 * @property OrgProgrammeCurriculum $progCurriculum
 */
class OrgProgCurrUnit extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'org_prog_curr_unit';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['prog_curriculum_unit_id', 'org_unit_history_id', 'prog_curriculum_id', 'start_date'], 'required'],
            [['prog_curriculum_unit_id', 'org_unit_history_id', 'prog_curriculum_id'], 'default', 'value' => null],
            [['prog_curriculum_unit_id', 'org_unit_history_id', 'prog_curriculum_id'], 'integer'],
            [['start_date', 'end_date'], 'safe'],
            [['status'], 'string', 'max' => 20],
            [['prog_curriculum_unit_id'], 'unique'],
            [['prog_curriculum_id'], 'exist', 'skipOnError' => true, 'targetClass' => OrgProgrammeCurriculum::class, 'targetAttribute' => ['prog_curriculum_id' => 'prog_curriculum_id']],
            [['org_unit_history_id'], 'exist', 'skipOnError' => true, 'targetClass' => OrgUnitHistory::class, 'targetAttribute' => ['org_unit_history_id' => 'org_unit_history_id']],
        ];
    }

    /**
     * {@inheritdoc}
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
     * Gets query for [[OrgUnitHistory]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrgUnitHistory()
    {
        return $this->hasOne(OrgUnitHistory::class, ['org_unit_history_id' => 'org_unit_history_id']);
    }

    /**
     * Gets query for [[ProgCurriculum]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProgCurriculum()
    {
        return $this->hasOne(OrgProgrammeCurriculum::class, ['prog_curriculum_id' => 'prog_curriculum_id']);
    }
}
