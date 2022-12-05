<?php

namespace app\models;

use Yii;

/**
 * This is the base model class for table "smis.org_unit_head".
 *
 * @property integer $unit_head_id
 * @property string $unit_head_name
 * @property string $status
 *
 * @property \app\models\OrgUnitHistory[] $orgUnitHistories
 */
class OrgUnitHead extends \yii\db\ActiveRecord
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
            [['unit_head_name'], 'required'],
            [['unit_head_name'], 'string', 'max' => 50],
            [['status'], 'string', 'max' => 10]
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'smis.org_unit_head';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'unit_head_id' => 'Unit Head ID',
            'unit_head_name' => 'PRINCIPAL,DIRECTOR,CHAIRMAN',
            'status' => 'Status',
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrgUnitHistories()
    {
        return $this->hasMany(\app\models\OrgUnitHistory::className(), ['unit_head_id' => 'unit_head_id']);
    }
    }
