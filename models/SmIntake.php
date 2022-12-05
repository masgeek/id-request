<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "smis.sm_intakes".
 *
 * @property int $intake_code
 * @property string $intake_name
 * @property int|null $acad_session_id
 */
class SmIntake extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'smis.sm_intakes';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['intake_code', 'intake_name'], 'required'],
            [['intake_code', 'acad_session_id'], 'default', 'value' => null],
            [['intake_code', 'acad_session_id'], 'integer'],
            [['intake_name'], 'string'],
            [['intake_code'], 'unique'],
            [['acad_session_id'], 'exist', 'skipOnError' => true, 'targetClass' => OrgAcademicSession::class, 'targetAttribute' => ['acad_session_id' => 'acad_session_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'intake_code' => 'Intake Code',
            'intake_name' => 'Intake Name',
            'acad_session_id' => 'Acad Session ID',
        ];
    }
}
