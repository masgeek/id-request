<?php

namespace app\models;

use Yii;

/**
 * This is the base model class for table "smis.sm_withdrawal_type".
 *
 * @property integer $withdrawal_type_id
 * @property string $withdrawal_type_name
 *
 * @property \app\models\SmWithdrawalRequest[] $smWithdrawalRequests
 */
class SmWithdrawalType extends \yii\db\ActiveRecord
{
    //use \mootensai\relation\RelationTrait;


    /**
    * This function helps \mootensai\relation\RelationTrait runs faster
    * @return array relation names of this model
    */
    /*public function relationNames()
    {
        return [
            'smWithdrawalRequests'
        ];
    }*/

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['withdrawal_type_name'], 'required'],
            [['withdrawal_type_name'], 'string', 'max' => 60]
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'smis.sm_withdrawal_type';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'withdrawal_type_id' => 'Withdrawal Type ID',
            'withdrawal_type_name' => 'Withdrawal Type Name',
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSmWithdrawalRequests()
    {
        return $this->hasMany(\app\models\SmWithdrawalRequest::className(), ['withdrawal_type_id' => 'withdrawal_type_id']);
    }
    }
