<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "smis.fs_prog_curr_fees_structure".
 *
 * @property int $prog_curr_fee_structure_id
 * @property int $fee_structure_type_id
 * @property int $academic_session_id
 * @property int|null $academic_level_id
 */
class FsProgCurrFeesStructure extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'smis.fs_prog_curr_fees_structure';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['prog_curr_fee_structure_id', 'fee_structure_type_id', 'academic_session_id'], 'required'],
            [['prog_curr_fee_structure_id', 'fee_structure_type_id', 'academic_session_id', 'academic_level_id'], 'default', 'value' => null],
            [['prog_curr_fee_structure_id', 'fee_structure_type_id', 'academic_session_id', 'academic_level_id'], 'integer'],
            [['prog_curr_fee_structure_id'], 'unique'],
            [['fee_structure_type_id'], 'exist', 'skipOnError' => true, 'targetClass' => FsFeesStructureType::class, 'targetAttribute' => ['fee_structure_type_id' => 'fee_structure_type_id']],
            [['academic_level_id'], 'exist', 'skipOnError' => true, 'targetClass' => OrgAcademicLevel::class, 'targetAttribute' => ['academic_level_id' => 'academic_level_id']],
            [['academic_session_id'], 'exist', 'skipOnError' => true, 'targetClass' => OrgAcademicSession::class, 'targetAttribute' => ['academic_session_id' => 'acad_session_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'prog_curr_fee_structure_id' => 'Prog Curr Fee Structure ID',
            'fee_structure_type_id' => 'Fee Structure Type ID',
            'academic_session_id' => 'Academic Session ID',
            'academic_level_id' => 'Academic Level ID',
        ];
    }
}
