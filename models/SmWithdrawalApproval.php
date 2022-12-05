<?php

namespace app\models;

use Yii;

/**
 * This is the base model class for table "smis.sm_withdrawal_approval".
 *
 * @property integer $withdrawal_approval_id
 * @property integer $withdrawal_request_id
 * @property integer $approver_id
 * @property string $comments
 * @property string $approval_status
 *
 * @property \app\models\SmApprover $approver
 * @property \app\models\SmWithdrawalRequest $withdrawalRequest
 */
class SmWithdrawalApproval extends \yii\db\ActiveRecord
{
    //use \mootensai\relation\RelationTrait;


    /**
    * This function helps \mootensai\relation\RelationTrait runs faster
    * @return array relation names of this model
    */
    /*public function relationNames()
    {
        return [
            'approver',
            'withdrawalRequest'
        ];
    }*/

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['withdrawal_request_id', 'approver_id', 'approval_status'], 'required'],
            [['withdrawal_request_id', 'approver_id'], 'integer'],
            [['comments'], 'string'],
            [['approval_status'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'smis.sm_withdrawal_approval';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'withdrawal_approval_id' => 'Withdrawal Approval ID',
            'withdrawal_request_id' => 'Withdrawal Request ID',
            'approver_id' => 'Approver ID',
            'comments' => 'Comments',
            'approval_status' => 'Approval Status',
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getApprover()
    {
        return $this->hasOne(\app\models\SmApprover::className(), ['approver_id' => 'approver_id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWithdrawalRequest()
    {
        return $this->hasOne(\app\models\SmWithdrawalRequest::className(), ['withdrawal_request_id' => 'withdrawal_request_id']);
    }
    }
