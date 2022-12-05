<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "smis.fs_prog_administrative_fee_structure".
 *
 * @property int $prog_admin_fee_id
 * @property int $prog_curr_fee_structure_id
 * @property int $billing_frequency_id
 * @property int $admin_fee_id
 * @property float|null $amount
 * @property string|null $status
 */
class FsProgAdministrativeFeeStructure extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'smis.fs_prog_administrative_fee_structure';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['prog_admin_fee_id', 'prog_curr_fee_structure_id', 'billing_frequency_id', 'admin_fee_id'], 'required'],
            [['prog_admin_fee_id', 'prog_curr_fee_structure_id', 'billing_frequency_id', 'admin_fee_id'], 'default', 'value' => null],
            [['prog_admin_fee_id', 'prog_curr_fee_structure_id', 'billing_frequency_id', 'admin_fee_id'], 'integer'],
            [['amount'], 'number'],
            [['status'], 'string', 'max' => 30],
            [['admin_fee_id'], 'exist', 'skipOnError' => true, 'targetClass' => FsAdminFee::class, 'targetAttribute' => ['admin_fee_id' => 'admin_fee_id']],
            [['billing_frequency_id'], 'exist', 'skipOnError' => true, 'targetClass' => FsBillingFrequency::class, 'targetAttribute' => ['billing_frequency_id' => 'billing_frequency_id']],
            [['prog_curr_fee_structure_id'], 'exist', 'skipOnError' => true, 'targetClass' => FsProgCurrFeesStructure::class, 'targetAttribute' => ['prog_curr_fee_structure_id' => 'prog_curr_fee_structure_id']],
        ];
    }

    /**
     * {@inheritdoc}
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
}
