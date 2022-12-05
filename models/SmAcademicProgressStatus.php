<?php

namespace app\models;

use Yii;

/**
 * This is the base model class for table "smis.sm_academic_progress_status".
 *
 * @property integer $progress_status_id
 * @property string $progress_status_name
 *
 * @property \app\models\SmAcademicProgress[] $smAcademicProgresses
 */
class SmAcademicProgressStatus extends \yii\db\ActiveRecord
{
    //use \mootensai\relation\RelationTrait;


    /**
    * This function helps \mootensai\relation\RelationTrait runs faster
    * @return array relation names of this model
    */
    /*public function relationNames()
    {
        return [
            'smAcademicProgresses'
        ];
    }*/

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['progress_status_id', 'progress_status_name'], 'required'],
            [['progress_status_id'], 'integer'],
            [['progress_status_name'], 'string', 'max' => 150]
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'smis.sm_academic_progress_status';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'progress_status_id' => 'Progress Status ID',
            'progress_status_name' => 'Progress Status Name',
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSmAcademicProgresses()
    {
        return $this->hasMany(\app\models\SmAcademicProgress::className(), ['progress_status_id' => 'progress_status_id']);
    }
    }
