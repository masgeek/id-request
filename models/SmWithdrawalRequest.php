<?php

namespace app\models;

use Yii;

/**
 * This is the base model class for table "smis.sm_withdrawal_request".
 *
 * @property integer $withdrawal_request_id
 * @property integer $withdrawal_type_id
 * @property string $request_date
 * @property string $reason
 * @property string $approval_status
 * @property integer $student_id
 * @property string $supporting_doc_url
 *
 * @property \app\models\SmWithdrawalApproval[] $smWithdrawalApprovals
 * @property \app\models\SmStudent $student
 * @property \app\models\SmWithdrawalType $withdrawalType
 */
class SmWithdrawalRequest extends \yii\db\ActiveRecord
{
    //use \mootensai\relation\RelationTrait;


    /**
    * This function helps \mootensai\relation\RelationTrait runs faster
    * @return array relation names of this model
    */
    /*public function relationNames()
    {
        return [
            'smWithdrawalApprovals',
            'student',
            'withdrawalType'
        ];
    }*/

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['withdrawal_request_id', 'withdrawal_type_id', 'request_date', 'reason', 'approval_status', 'student_id'], 'required'],
            [['withdrawal_request_id', 'withdrawal_type_id', 'student_id'], 'integer'],
            [['request_date'], 'safe'],
            [['approval_status'], 'string'],
            [['reason'], 'string', 'max' => 250],
            [['supporting_doc_url'], 'string', 'max' => 200]
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'smis.sm_withdrawal_request';
    }

    /**
     * @inheritdoc
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
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSmWithdrawalApprovals()
    {
        return $this->hasMany(\app\models\SmWithdrawalApproval::className(), ['withdrawal_request_id' => 'withdrawal_request_id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStudent()
    {
        return $this->hasOne(\app\models\SmStudent::className(), ['student_id' => 'student_id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWithdrawalType()
    {
        return $this->hasOne(\app\models\SmWithdrawalType::className(), ['withdrawal_type_id' => 'withdrawal_type_id']);
    }
    }
