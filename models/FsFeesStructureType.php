<?php

namespace app\models;

use Yii;

/**
 * This is the base model class for table "smis.fs_fees_structure_types".
 *
 * @property integer $fee_structure_type_id
 * @property string $name
 * @property string $description
 * @property string $currency
 * @property string $status
 * @property string $date_entered
 * @property double $exchange_rate
 *
 * @property \app\models\FsProgCurrFeesStructure[] $fsProgCurrFeesStructures
 * @property \app\models\SmSmStudentFeeStructure[] $smSmStudentFeeStructures
 */
class FsFeesStructureType extends \yii\db\ActiveRecord
{
    //use \mootensai\relation\RelationTrait;


    /**
    * This function helps \mootensai\relation\RelationTrait runs faster
    * @return array relation names of this model
    */
    /*public function relationNames()
    {
        return [
            'fsProgCurrFeesStructures',
            'smSmStudentFeeStructures'
        ];
    }*/

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fee_structure_type_id', 'name', 'description', 'currency', 'status', 'date_entered'], 'required'],
            [['fee_structure_type_id'], 'integer'],
            [['date_entered'], 'safe'],
            [['exchange_rate'], 'number'],
            [['name'], 'string', 'max' => 150],
            [['description'], 'string', 'max' => 255],
            [['currency'], 'string', 'max' => 10],
            [['status'], 'string', 'max' => 15]
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'smis.fs_fees_structure_types';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'fee_structure_type_id' => 'Fee Structure Type ID',
            'name' => 'Name',
            'description' => 'Description',
            'currency' => 'Currency',
            'status' => 'Status',
            'date_entered' => 'Date Entered',
            'exchange_rate' => 'Exchange Rate',
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFsProgCurrFeesStructures()
    {
        return $this->hasMany(\app\models\FsProgCurrFeesStructure::className(), ['fee_structure_type_id' => 'fee_structure_type_id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSmSmStudentFeeStructures()
    {
        return $this->hasMany(\app\models\SmSmStudentFeeStructure::className(), ['fee_structure_type_id' => 'fee_structure_type_id']);
    }
    }
