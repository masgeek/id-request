<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "smis.org_prog_curr_semester_group".
 *
 * @property int $prog_curriculum_sem_group_id
 * @property int $prog_curriculum_semester_id
 * @property int $study_centre_group_id
 * @property string $start_date
 * @property string|null $end_date
 * @property string|null $registration_deadline
 * @property string|null $display_date
 * @property int $programme_level
 * @property string $status
 */
class OrgProgCurrSemesterGroup extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'smis.org_prog_curr_semester_group';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['prog_curriculum_semester_id', 'study_centre_group_id', 'start_date', 'programme_level'], 'required'],
            [['prog_curriculum_semester_id', 'study_centre_group_id', 'programme_level'], 'default', 'value' => null],
            [['prog_curriculum_semester_id', 'study_centre_group_id', 'programme_level'], 'integer'],
            [['start_date', 'end_date', 'registration_deadline', 'display_date'], 'safe'],
            [['status'], 'string', 'max' => 20],
            [['prog_curriculum_semester_id'], 'exist', 'skipOnError' => true, 'targetClass' => OrgProgCurrSemester::class, 'targetAttribute' => ['prog_curriculum_semester_id' => 'prog_curriculum_semester_id']],
            [['programme_level'], 'exist', 'skipOnError' => true, 'targetClass' => OrgProgLevel::class, 'targetAttribute' => ['programme_level' => 'programme_level_id']],
            [['study_centre_group_id'], 'exist', 'skipOnError' => true, 'targetClass' => OrgStudyCentreGroup::class, 'targetAttribute' => ['study_centre_group_id' => 'study_centre_group_id']],
        ];
    }

    /**
     * {@inheritdoc}
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
}
