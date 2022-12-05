<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "smis.fs_billing_frequency".
 *
 * @property int $billing_frequency_id
 * @property string $name
 * @property string $description
 */
class FsBillingFrequency extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'smis.fs_billing_frequency';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['billing_frequency_id', 'name', 'description'], 'required'],
            [['billing_frequency_id'], 'default', 'value' => null],
            [['billing_frequency_id'], 'integer'],
            [['name'], 'string', 'max' => 150],
            [['description'], 'string', 'max' => 255],
            [['billing_frequency_id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'billing_frequency_id' => 'Billing Frequency ID',
            'name' => 'Name',
            'description' => 'Description',
        ];
    }
}
