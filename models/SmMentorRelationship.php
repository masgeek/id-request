<?php

namespace app\models;

use Yii;

/**
 * This is the base model class for table "smis.sm_mentor_relationship".
 *
 * @property integer $mentor_relationship_id
 * @property string $relationship_name
 * @property string $description
 */
class SmMentorRelationship extends \yii\db\ActiveRecord
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
            [['mentor_relationship_id', 'relationship_name', 'description'], 'required'],
            [['mentor_relationship_id'], 'integer'],
            [['relationship_name', 'description'], 'string']
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'smis.sm_mentor_relationship';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'mentor_relationship_id' => 'Mentor Relationship ID',
            'relationship_name' => 'Relationship Name',
            'description' => 'Description',
        ];
    }
}
