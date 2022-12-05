<?php

namespace app\models;

use Yii;

/**
 * This is the base model class for table "smis.fs_admin_fees".
 *
 * @property integer $admin_fee_id
 * @property string $name
 * @property string $description
 * @property string $status
 *
 * @property \app\models\FsProgAdministrativeFeeStructure[] $fsProgAdministrativeFeeStructures
 */
class FsAdminFee extends \yii\db\ActiveRecord
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
            [['admin_fee_id', 'name', 'description', 'status'], 'required'],
            [['admin_fee_id'], 'integer'],
            [['name'], 'string', 'max' => 150],
            [['description'], 'string', 'max' => 255],
            [['status'], 'string', 'max' => 15]
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'smis.fs_admin_fees';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'admin_fee_id' => 'Admin Fee ID',
            'name' => 'Name',
            'description' => 'Description',
            'status' => 'Status',
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFsProgAdministrativeFeeStructures()
    {
        return $this->hasMany(\app\models\FsProgAdministrativeFeeStructure::className(), ['admin_fee_id' => 'admin_fee_id']);
    }
    }
