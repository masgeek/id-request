<?php

namespace app\models;

use Yii;

/**
 * This is the base model class for table "smis.sm_stud_rel_types".
 *
 * @property integer $stud_rel_type_id
 * @property string $rel_name
 *
 * @property \app\models\SmStudentRelation[] $smStudentRelations
 */
class SmStudRelType extends \yii\db\ActiveRecord
{
    //use \mootensai\relation\RelationTrait;


    /**
    * This function helps \mootensai\relation\RelationTrait runs faster
    * @return array relation names of this model
    */
    /*public function relationNames()
    {
        return [
            'smStudentRelations'
        ];
    }*/

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['stud_rel_type_id', 'rel_name'], 'required'],
            [['stud_rel_type_id'], 'integer'],
            [['rel_name'], 'string']
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'smis.sm_stud_rel_types';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'stud_rel_type_id' => 'Stud Rel Type ID',
            'rel_name' => 'Rel Name',
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSmStudentRelations()
    {
        return $this->hasMany(\app\models\SmStudentRelation::className(), ['rel_type' => 'stud_rel_type_id']);
    }
    }
