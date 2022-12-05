<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "smis.sm_sm_student_fee_structure".
 *
 * @property int $student_fee_structure_id
 * @property int $student_prog_curr_id
 * @property int $fee_structure_type_id
 * @property string|null $effective_date
 */
class SmSmStudentFeeStructure extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'smis.sm_sm_student_fee_structure';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['student_fee_structure_id', 'student_prog_curr_id', 'fee_structure_type_id'], 'required'],
            [['student_fee_structure_id', 'student_prog_curr_id', 'fee_structure_type_id'], 'default', 'value' => null],
            [['student_fee_structure_id', 'student_prog_curr_id', 'fee_structure_type_id'], 'integer'],
            [['effective_date'], 'safe'],
            [['student_fee_structure_id'], 'unique'],
            [['fee_structure_type_id'], 'exist', 'skipOnError' => true, 'targetClass' => FsFeesStructureType::class, 'targetAttribute' => ['fee_structure_type_id' => 'fee_structure_type_id']],
            [['student_prog_curr_id'], 'exist', 'skipOnError' => true, 'targetClass' => SmStudentProgrammeCurriculum::class, 'targetAttribute' => ['student_prog_curr_id' => 'student_prog_curriculum_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'student_fee_structure_id' => 'Student Fee Structure ID',
            'student_prog_curr_id' => 'Student Prog Curr ID',
            'fee_structure_type_id' => 'Fee Structure Type ID',
            'effective_date' => 'Effective Date',
        ];
    }
}
