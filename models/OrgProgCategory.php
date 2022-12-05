<?php

namespace app\models;

use Yii;

/**
 * This is the base model class for table "smis.org_prog_category".
 *
 * @property integer $prog_cat_id
 * @property string $prog_cat_code
 * @property string $prog_cat_name
 * @property integer $prog_cat_order
 * @property string $status
 *
 * @property \app\models\OrgProgramme[] $orgProgrammes
 */
class OrgProgCategory extends \yii\db\ActiveRecord
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
            [['prog_cat_code', 'prog_cat_name'], 'required'],
            [['prog_cat_order'], 'integer'],
            [['prog_cat_code', 'status'], 'string', 'max' => 20],
            [['prog_cat_name'], 'string', 'max' => 150]
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'smis.org_prog_category';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'prog_cat_id' => 'Prog Cat ID',
            'prog_cat_code' => 'Prog Cat Code',
            'prog_cat_name' => 'Prog Cat Name',
            'prog_cat_order' => 'Prog Cat Order',
            'status' => 'Status',
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrgProgrammes()
    {
        return $this->hasMany(\app\models\OrgProgramme::className(), ['prog_cat_id' => 'prog_cat_id']);
    }
    }
