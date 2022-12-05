<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "smis.org_prog_curr_semester".
 *
 * @property int $prog_curriculum_semester_id
 * @property int $prog_curriculum_id
 * @property int $acad_session_semester_id
 * @property int|null $semester_type_id teaching, supplementary
 */
class OrgProgCurrSemester extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'smis.org_prog_curr_semester';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['prog_curriculum_id', 'acad_session_semester_id'], 'required'],
            [['prog_curriculum_id', 'acad_session_semester_id', 'semester_type_id'], 'default', 'value' => null],
            [['prog_curriculum_id', 'acad_session_semester_id', 'semester_type_id'], 'integer'],
            [['acad_session_semester_id'], 'exist', 'skipOnError' => true, 'targetClass' => OrgAcademicSessionSemester::class, 'targetAttribute' => ['acad_session_semester_id' => 'acad_session_semester_id']],
            [['prog_curriculum_id'], 'exist', 'skipOnError' => true, 'targetClass' => OrgProgrammeCurriculum::class, 'targetAttribute' => ['prog_curriculum_id' => 'prog_curriculum_id']],
            [['semester_type_id'], 'exist', 'skipOnError' => true, 'targetClass' => OrgSemesterType::class, 'targetAttribute' => ['semester_type_id' => 'sem_type_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'prog_curriculum_semester_id' => 'Prog Curriculum Semester ID',
            'prog_curriculum_id' => 'Prog Curriculum ID',
            'acad_session_semester_id' => 'Acad Session Semester ID',
            'semester_type_id' => 'teaching, supplementary',
        ];
    }
}
