<?php

namespace app\models;

use Yii;

/**
 * This is the base model class for table "smis.org_unit".
 *
 * @property integer $unit_id
 * @property string $unit_code
 * @property string $unit_name
 *
 * @property \app\models\OrgUnitHistory[] $orgUnitHistories
 */
class OrgUnit extends \yii\db\ActiveRecord
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
            [['unit_code', 'unit_name'], 'required'],
            [['unit_code'], 'string', 'max' => 6],
            [['unit_name'], 'string', 'max' => 150]
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'smis.org_unit';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'unit_id' => 'Unit ID',
            'unit_code' => 'Unit Code',
            'unit_name' => 'Unit Name',
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrgUnitHistories()
    {
        return $this->hasMany(\app\models\OrgUnitHistory::className(), ['org_unit_id' => 'unit_id']);
    }
    }
