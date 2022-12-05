<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "smis.sm_withdrawal_request".
 *
 * @property int $withdrawal_request_id
 * @property int $withdrawal_type_id
 * @property string $request_date
 * @property string $reason
 * @property string $approval_status
 * @property int $student_id
 * @property string|null $supporting_doc_url
 */
class SmWithdrawalRequest extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'smis.sm_withdrawal_request';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['withdrawal_request_id', 'withdrawal_type_id', 'request_date', 'reason', 'approval_status', 'student_id'], 'required'],
            [['withdrawal_request_id', 'withdrawal_type_id', 'student_id'], 'default', 'value' => null],
            [['withdrawal_request_id', 'withdrawal_type_id', 'student_id'], 'integer'],
            [['request_date'], 'safe'],
            [['approval_status'], 'string'],
            [['reason'], 'string', 'max' => 250],
            [['supporting_doc_url'], 'string', 'max' => 200],
            [['withdrawal_request_id'], 'unique'],
            [['student_id'], 'exist', 'skipOnError' => true, 'targetClass' => SmStudent::class, 'targetAttribute' => ['student_id' => 'student_id']],
            [['withdrawal_type_id'], 'exist', 'skipOnError' => true, 'targetClass' => SmWithdrawalType::class, 'targetAttribute' => ['withdrawal_type_id' => 'withdrawal_type_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'withdrawal_request_id' => 'Withdrawal Request ID',
            'withdrawal_type_id' => 'Withdrawal Type ID',
            'request_date' => 'Request Date',
            'reason' => 'Reason',
            'approval_status' => 'Approval Status',
            'student_id' => 'Student ID',
            'supporting_doc_url' => 'Supporting Doc Url',
        ];
    }
}
