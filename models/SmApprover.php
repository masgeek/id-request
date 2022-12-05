<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "smis.sm_approver".
 *
 * @property int $approver_id
 * @property string $approver
 * @property int $level
 * @property string $status
 */
class SmApprover extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'smis.sm_approver';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['approver', 'level', 'status'], 'required'],
            [['level'], 'default', 'value' => null],
            [['level'], 'integer'],
            [['status'], 'string'],
            [['approver'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'approver_id' => 'Approver ID',
            'approver' => 'Approver',
            'level' => 'Level',
            'status' => 'Status',
        ];
    }
}
