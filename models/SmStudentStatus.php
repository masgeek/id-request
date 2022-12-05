<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "smis.sm_student_status".
 *
 * @property int $status_id
 * @property string $status
 * @property bool $current_status
 */
class SmStudentStatus extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'smis.sm_student_status';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['status_id', 'status', 'current_status'], 'required'],
            [['status_id'], 'default', 'value' => null],
            [['status_id'], 'integer'],
            [['current_status'], 'boolean'],
            [['status'], 'string', 'max' => 12],
            [['status_id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'status_id' => 'Status ID',
            'status' => 'Status',
            'current_status' => 'Current Status',
        ];
    }
}
