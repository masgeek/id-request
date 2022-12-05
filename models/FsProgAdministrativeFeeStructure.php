<?php

namespace app\models;

use Yii;

/**
 * This is the base model class for table "smis.fs_prog_administrative_fee_structure".
 *
 * @property integer $prog_admin_fee_id
 * @property integer $prog_curr_fee_structure_id
 * @property integer $billing_frequency_id
 * @property integer $admin_fee_id
 * @property string $amount
 * @property string $status
 *
 * @property \app\models\FsAdminFee $adminFee
 * @property \app\models\FsBillingFrequency $billingFrequency
 * @property \app\models\FsProgCurrFeesStructure $progCurrFeeStructure
 */
class FsProgAdministrativeFeeStructure extends \yii\db\ActiveRecord
{
    //use \mootensai\relation\RelationTrait;


    /**
    * This function helps \mootensai\relation\RelationTrait runs faster
    * @return array relation names of this model
    */
    /*public function relationNames()
    {
        return [
            'adminFee',
            'billingFrequency',
            'progCurrFeeStructure'
        ];
    }*/

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['prog_admin_fee_id', 'prog_curr_fee_structure_id', 'billing_frequency_id', 'admin_fee_id'], 'required'],
            [['prog_admin_fee_id', 'prog_curr_fee_structure_id', 'billing_frequency_id', 'admin_fee_id'], 'integer'],
            [['amount'], 'number'],
            [['status'], 'string', 'max' => 30]
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'smis.fs_prog_administrative_fee_structure';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'prog_admin_fee_id' => 'Prog Admin Fee ID',
            'prog_curr_fee_structure_id' => 'Prog Curr Fee Structure ID',
            'billing_frequency_id' => 'Billing Frequency ID',
            'admin_fee_id' => 'Admin Fee ID',
            'amount' => 'Amount',
            'status' => 'Status',
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAdminFee()
    {
        return $this->hasOne(\app\models\FsAdminFee::className(), ['admin_fee_id' => 'admin_fee_id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBillingFrequency()
    {
        return $this->hasOne(\app\models\FsBillingFrequency::className(), ['billing_frequency_id' => 'billing_frequency_id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProgCurrFeeStructure()
    {
        return $this->hasOne(\app\models\FsProgCurrFeesStructure::className(), ['prog_curr_fee_structure_id' => 'prog_curr_fee_structure_id']);
    }
    }
