<?php

namespace app\models;

use Yii;

/**
 * This is the base model class for table "smis.org_prog_type".
 *
 * @property integer $prog_type_id
 * @property string $prog_type_code
 * @property string $prog_type_name
 * @property integer $prog_type_order
 * @property string $status
 *
 * @property \app\models\OrgProgramme[] $orgProgrammes
 */
class OrgProgType extends \yii\db\ActiveRecord
{
    //use \mootensai\relation\RelationTrait;


    /**
    * This function helps \mootensai\relation\RelationTrait runs faster
    * @return array relation names of this model
    */
    /*public function relationNames()
    {
        return [
            'orgProgrammes'
        ];
    }*/

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['prog_type_code', 'prog_type_name', 'prog_type_order'], 'required'],
            [['prog_type_order'], 'integer'],
            [['prog_type_code'], 'string', 'max' => 15],
            [['prog_type_name'], 'string', 'max' => 150],
            [['status'], 'string', 'max' => 20]
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'smis.org_prog_type';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'prog_type_id' => 'Prog Type ID',
            'prog_type_code' => 'Prog Type Code',
            'prog_type_name' => 'Prog Type Name',
            'prog_type_order' => 'Prog Type Order',
            'status' => 'Status',
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrgProgrammes()
    {
        return $this->hasMany(\app\models\OrgProgramme::className(), ['prog_type_id' => 'prog_type_id']);
    }
    }
