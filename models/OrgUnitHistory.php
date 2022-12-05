<?php

namespace app\models;

use Yii;

/**
 * This is the base model class for table "smis.org_unit_history".
 *
 * @property integer $org_unit_history_id
 * @property integer $org_unit_id
 * @property integer $org_type_id
 * @property integer $parent_id
 * @property integer $successor_id
 * @property integer $unit_head_id
 * @property integer $unit_head_user_id
 * @property string $start_date
 * @property string $end_date
 * @property integer $user_id
 * @property string $date_created
 *
 * @property \app\models\OrgProgCurrUnit[] $orgProgCurrUnits
 * @property \app\models\OrgUnit $orgUnit
 * @property \app\models\OrgUnitHead $unitHead
 * @property \app\models\OrgUnitType $orgType
 */
class OrgUnitHistory extends \yii\db\ActiveRecord
{
    //use \mootensai\relation\RelationTrait;


    /**
    * This function helps \mootensai\relation\RelationTrait runs faster
    * @return array relation names of this model
    */
    /*public function relationNames()
    {
        return [
            'orgProgCurrUnits',
            'orgUnit',
            'unitHead',
            'orgType'
        ];
    }*/

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['org_unit_id', 'org_type_id', 'start_date'], 'required'],
            [['org_unit_id', 'org_type_id', 'parent_id', 'successor_id', 'unit_head_id', 'unit_head_user_id', 'user_id'], 'integer'],
            [['start_date', 'end_date', 'date_created'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'smis.org_unit_history';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'org_unit_history_id' => 'Org Unit History ID',
            'org_unit_id' => 'Org Unit ID',
            'org_type_id' => 'Org Type ID',
            'parent_id' => 'Parent ID',
            'successor_id' => 'Successor ID',
            'unit_head_id' => 'Unit Head ID',
            'unit_head_user_id' => 'Unit Head User ID',
            'start_date' => 'Start Date',
            'end_date' => 'End Date',
            'user_id' => 'User ID',
            'date_created' => 'Date Created',
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrgProgCurrUnits()
    {
        return $this->hasMany(\app\models\OrgProgCurrUnit::className(), ['org_unit_history_id' => 'org_unit_history_id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrgUnit()
    {
        return $this->hasOne(\app\models\OrgUnit::className(), ['unit_id' => 'org_unit_id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUnitHead()
    {
        return $this->hasOne(\app\models\OrgUnitHead::className(), ['unit_head_id' => 'unit_head_id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrgType()
    {
        return $this->hasOne(\app\models\OrgUnitType::className(), ['unit_type_id' => 'org_type_id']);
    }
    }
