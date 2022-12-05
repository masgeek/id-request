<?php

namespace app\models;

use Yii;

/**
 * This is the base model class for table "smis.org_academic_levels".
 *
 * @property integer $academic_level_id
 * @property integer $academic_level
 * @property string $academic_level_name
 * @property integer $academic_level_order
 * @property string $status
 *
 * @property \app\models\FsProgCurrFeesStructure[] $fsProgCurrFeesStructures
 * @property \app\models\SmAcademicProgress[] $smAcademicProgresses
 */
class OrgAcademicLevel extends \yii\db\ActiveRecord
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
            'smAcademicProgresses'
        ];
    }*/

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['academic_level', 'academic_level_name'], 'required'],
            [['academic_level', 'academic_level_order'], 'integer'],
            [['academic_level_name'], 'string', 'max' => 20],
            [['status'], 'string', 'max' => 10]
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'smis.org_academic_levels';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'academic_level_id' => 'Academic Level ID',
            'academic_level' => 'Academic Level',
            'academic_level_name' => 'Academic Level Name',
            'academic_level_order' => 'Academic Level Order',
            'status' => 'Status',
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFsProgCurrFeesStructures()
    {
        return $this->hasMany(\app\models\FsProgCurrFeesStructure::className(), ['academic_level_id' => 'academic_level_id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSmAcademicProgresses()
    {
        return $this->hasMany(\app\models\SmAcademicProgress::className(), ['academic_level_id' => 'academic_level_id']);
    }
    }
