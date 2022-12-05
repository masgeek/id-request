<?php

namespace app\models;

use Yii;

/**
 * This is the base model class for table "smis.org_building".
 *
 * @property integer $building_id
 * @property string $building_code
 * @property string $building_name
 * @property integer $floors
 * @property integer $study_center
 */
class OrgBuilding extends \yii\db\ActiveRecord
{
    //use \mootensai\relation\RelationTrait;


    /**
    * This function helps \mootensai\relation\RelationTrait runs faster
    * @return array relation names of this model
    */
    /*public function relationNames()
    {
        return [
            ''
        ];
    }*/

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['floors', 'study_center'], 'integer'],
            [['building_code'], 'string', 'max' => 30],
            [['building_name'], 'string', 'max' => 80]
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'smis.org_building';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'building_id' => 'Building ID',
            'building_code' => 'Building Code',
            'building_name' => 'Building Name',
            'floors' => 'Floors',
            'study_center' => 'Study Center',
        ];
    }
}
