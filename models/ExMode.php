<?php

namespace app\models;

use Yii;

/**
 * This is the base model class for table "smis.ex_mode".
 *
 * @property integer $exam_mode_id
 * @property string $exam_mode_name
 *
 * @property \app\models\CrProgCurrTimetable[] $crProgCurrTimetables
 */
class ExMode extends \yii\db\ActiveRecord
{
    //use \mootensai\relation\RelationTrait;


    /**
    * This function helps \mootensai\relation\RelationTrait runs faster
    * @return array relation names of this model
    */
    /*public function relationNames()
    {
        return [
            'crProgCurrTimetables'
        ];
    }*/

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['exam_mode_name'], 'required'],
            [['exam_mode_name'], 'string', 'max' => 30]
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'smis.ex_mode';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'exam_mode_id' => 'Exam Mode ID',
            'exam_mode_name' => 'Exam Mode Name',
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCrProgCurrTimetables()
    {
        return $this->hasMany(\app\models\CrProgCurrTimetable::className(), ['exam_mode' => 'exam_mode_id']);
    }
    }
