<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "smis.sm_student_relations".
 *
 * @property int $stud_rel_id
 * @property string $student_rel_name
 * @property int|null $rel_type
 * @property string|null $tel_no
 * @property string|null $tel_no2
 * @property string|null $email_addr
 * @property bool|null $mentor_status
 * @property string|null $record_status Active, innactive, invalid
 * @property int|null $student_prog_curriculum_id
 */
class SmStudentRelation extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'smis.sm_student_relations';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['stud_rel_id', 'student_rel_name'], 'required'],
            [['stud_rel_id', 'rel_type', 'student_prog_curriculum_id'], 'default', 'value' => null],
            [['stud_rel_id', 'rel_type', 'student_prog_curriculum_id'], 'integer'],
            [['tel_no', 'tel_no2', 'email_addr', 'record_status'], 'string'],
            [['mentor_status'], 'boolean'],
            [['student_rel_name'], 'string', 'max' => 150],
            [['stud_rel_id'], 'unique'],
            [['rel_type'], 'exist', 'skipOnError' => true, 'targetClass' => SmStudRelType::class, 'targetAttribute' => ['rel_type' => 'stud_rel_type_id']],
            [['student_prog_curriculum_id'], 'exist', 'skipOnError' => true, 'targetClass' => SmStudentProgrammeCurriculum::class, 'targetAttribute' => ['student_prog_curriculum_id' => 'student_prog_curriculum_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'stud_rel_id' => 'Stud Rel ID',
            'student_rel_name' => 'Student Rel Name',
            'rel_type' => 'Rel Type',
            'tel_no' => 'Tel No',
            'tel_no2' => 'Tel No2',
            'email_addr' => 'Email Addr',
            'mentor_status' => 'Mentor Status',
            'record_status' => 'Active, innactive, invalid',
            'student_prog_curriculum_id' => 'Student Prog Curriculum ID',
        ];
    }
}
