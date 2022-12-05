<?php

namespace app\models;

use Yii;

/**
 * This is the base model class for table "smis.org_unit_types".
 *
 * @property integer $unit_type_id
 * @property string $unit_type_name
 * @property string $status
 *
 * @property \app\models\OrgUnitHistory[] $orgUnitHistories
 */
class OrgUnitType extends \yii\db\ActiveRecord
{
    //use \mootensai\relation\RelationTrait;


    /**
    * This function helps \mootensai\relation\RelationTrait runs faster
    * @return array relation names of this model
    */
    /*public function relationNames()
    {
        return [
            'orgUnitHistories'
        ];
    }*/

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['unit_type_name'], 'required'],
            [['unit_type_name'], 'string', 'max' => 50],
            [['status'], 'string', 'max' => 20]
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'smis.org_unit_types';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'unit_type_id' => 'Unit Type ID',
            'unit_type_name' => 'Unit Type Name',
            'status' => 'Status',
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrgUnitHistories()
    {
        return $this->hasMany(\app\models\OrgUnitHistory::className(), ['org_type_id' => 'unit_type_id']);
    }
    }
