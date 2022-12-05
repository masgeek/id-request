<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "smis.org_cohort_session".
 *
 * @property int $cohort_session_id
 * @property string $cohort_session_name
 * @property int $cohort_id
 * @property int $prog_curriculum_semester_id
 * @property string $status
 */
class OrgCohortSession extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'smis.org_cohort_session';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['cohort_session_name', 'cohort_id', 'prog_curriculum_semester_id'], 'required'],
            [['cohort_id', 'prog_curriculum_semester_id'], 'default', 'value' => null],
            [['cohort_id', 'prog_curriculum_semester_id'], 'integer'],
            [['cohort_session_name'], 'string', 'max' => 50],
            [['status'], 'string', 'max' => 10],
            [['cohort_id'], 'exist', 'skipOnError' => true, 'targetClass' => OrgCohort::class, 'targetAttribute' => ['cohort_id' => 'cohort_id']],
            [['prog_curriculum_semester_id'], 'exist', 'skipOnError' => true, 'targetClass' => OrgProgCurrSemester::class, 'targetAttribute' => ['prog_curriculum_semester_id' => 'prog_curriculum_semester_id']],
        ];
    }

    /**
     * {@inheritdoc}
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
}
