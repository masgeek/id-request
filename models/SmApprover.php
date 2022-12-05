<?php

namespace app\models;

use Yii;

/**
 * This is the base model class for table "smis.sm_approver".
 *
 * @property integer $approver_id
 * @property string $approver
 * @property integer $level
 * @property string $status
 *
 * @property \app\models\SmWithdrawalApproval[] $smWithdrawalApprovals
 */
class SmApprover extends \yii\db\ActiveRecord
{
    //use \mootensai\relation\RelationTrait;


    /**
    * This function helps \mootensai\relation\RelationTrait runs faster
    * @return array relation names of this model
    */
    /*public function relationNames()
    {
        return [
            'smWithdrawalApprovals'
        ];
    }*/

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['approver', 'level', 'status'], 'required'],
            [['level'], 'integer'],
            [['status'], 'string'],
            [['approver'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'smis.sm_approver';
    }

    /**
     * @inheritdoc
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
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSmWithdrawalApprovals()
    {
        return $this->hasMany(\app\models\SmWithdrawalApproval::className(), ['approver_id' => 'approver_id']);
    }
    }
