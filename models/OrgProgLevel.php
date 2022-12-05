<?php

namespace app\models;

use Yii;

/**
 * This is the base model class for table "smis.org_prog_level".
 *
 * @property integer $programme_level_id
 * @property string $programme_level_name
 *
 * @property \app\models\OrgProgCurrSemesterGroup[] $orgProgCurrSemesterGroups
 */
class OrgProgLevel extends \yii\db\ActiveRecord
{
    //use \mootensai\relation\RelationTrait;


    /**
    * This function helps \mootensai\relation\RelationTrait runs faster
    * @return array relation names of this model
    */
    /*public function relationNames()
    {
        return [
            'orgProgCurrSemesterGroups'
        ];
    }*/

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['programme_level_name'], 'required'],
            [['programme_level_name'], 'string', 'max' => 30]
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'smis.org_prog_level';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'programme_level_id' => 'Programme Level ID',
            'programme_level_name' => 'Programme Level Name',
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrgProgCurrSemesterGroups()
    {
        return $this->hasMany(\app\models\OrgProgCurrSemesterGroup::className(), ['programme_level' => 'programme_level_id']);
    }
    }
