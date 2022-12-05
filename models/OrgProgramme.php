<?php

namespace app\models;

use Yii;

/**
 * This is the base model class for table "smis.org_programmes".
 *
 * @property integer $prog_id
 * @property string $prog_code
 * @property string $prog_short_name
 * @property string $prog_full_name
 * @property integer $prog_type_id
 * @property integer $prog_cat_id
 * @property string $status
 *
 * @property \app\models\OrgProgrammeCurriculum[] $orgProgrammeCurriculums
 * @property \app\models\OrgProgCategory $progCat
 * @property \app\models\OrgProgType $progType
 */
class OrgProgramme extends \yii\db\ActiveRecord
{
    //use \mootensai\relation\RelationTrait;


    /**
    * This function helps \mootensai\relation\RelationTrait runs faster
    * @return array relation names of this model
    */
    /*public function relationNames()
    {
        return [
            'orgProgrammeCurriculums',
            'progCat',
            'progType'
        ];
    }*/

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['prog_code', 'prog_short_name', 'prog_full_name', 'prog_type_id', 'prog_cat_id'], 'required'],
            [['prog_type_id', 'prog_cat_id'], 'integer'],
            [['prog_code'], 'string', 'max' => 6],
            [['prog_short_name'], 'string', 'max' => 100],
            [['prog_full_name'], 'string', 'max' => 200],
            [['status'], 'string', 'max' => 20]
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'smis.org_programmes';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'prog_id' => 'Prog ID',
            'prog_code' => 'Prog Code',
            'prog_short_name' => 'Prog Short Name',
            'prog_full_name' => 'Prog Full Name',
            'prog_type_id' => 'Prog Type ID',
            'prog_cat_id' => 'Prog Cat ID',
            'status' => 'Status',
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrgProgrammeCurriculums()
    {
        return $this->hasMany(\app\models\OrgProgrammeCurriculum::className(), ['prog_id' => 'prog_id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProgCat()
    {
        return $this->hasOne(\app\models\OrgProgCategory::className(), ['prog_cat_id' => 'prog_cat_id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProgType()
    {
        return $this->hasOne(\app\models\OrgProgType::className(), ['prog_type_id' => 'prog_type_id']);
    }
    }
