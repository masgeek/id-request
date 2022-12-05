<?php

namespace app\models;

use Yii;

/**
 * This is the base model class for table "smis.fs_billing_frequency".
 *
 * @property integer $billing_frequency_id
 * @property string $name
 * @property string $description
 *
 * @property \app\models\FsProgAdministrativeFeeStructure[] $fsProgAdministrativeFeeStructures
 */
class FsBillingFrequency extends \yii\db\ActiveRecord
{
    //use \mootensai\relation\RelationTrait;


    /**
    * This function helps \mootensai\relation\RelationTrait runs faster
    * @return array relation names of this model
    */
    /*public function relationNames()
    {
        return [
            'fsProgAdministrativeFeeStructures'
        ];
    }*/

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['billing_frequency_id', 'name', 'description'], 'required'],
            [['billing_frequency_id'], 'integer'],
            [['name'], 'string', 'max' => 150],
            [['description'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'smis.fs_billing_frequency';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'billing_frequency_id' => 'Billing Frequency ID',
            'name' => 'Name',
            'description' => 'Description',
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFsProgAdministrativeFeeStructures()
    {
        return $this->hasMany(\app\models\FsProgAdministrativeFeeStructure::className(), ['billing_frequency_id' => 'billing_frequency_id']);
    }
    }
