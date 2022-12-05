<?php

namespace app\models;

use Yii;

/**
 * This is the base model class for table "smis.sm_intake_source".
 *
 * @property integer $source_id
 * @property string $source
 *
 * @property \app\models\SmAdmittedStudent[] $smAdmittedStudents
 */
class SmIntakeSource extends \yii\db\ActiveRecord
{
    //use \mootensai\relation\RelationTrait;


    /**
    * This function helps \mootensai\relation\RelationTrait runs faster
    * @return array relation names of this model
    */
    /*public function relationNames()
    {
        return [
            'smAdmittedStudents'
        ];
    }*/

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['source_id', 'source'], 'required'],
            [['source_id'], 'integer'],
            [['source'], 'string', 'max' => 15]
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'smis.sm_intake_source';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'source_id' => 'Source ID',
            'source' => 'Source',
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSmAdmittedStudents()
    {
        return $this->hasMany(\app\models\SmAdmittedStudent::className(), ['source_id' => 'source_id']);
    }
    }
