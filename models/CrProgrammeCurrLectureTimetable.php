<?php

namespace app\models;

use Yii;

/**
 * This is the base model class for table "smis.cr_programme_curr_lecture_timetable".
 *
 * @property integer $lecture_timetable_id
 * @property integer $timetable_id
 * @property integer $lecture_room_id
 * @property integer $day_id
 * @property string $start_time
 * @property string $end_time
 * @property integer $class_code
 *
 * @property \app\models\CrProgCurrTimetable $timetable
 */
class CrProgrammeCurrLectureTimetable extends \yii\db\ActiveRecord
{
    //use \mootensai\relation\RelationTrait;


    /**
    * This function helps \mootensai\relation\RelationTrait runs faster
    * @return array relation names of this model
    */
    /*public function relationNames()
    {
        return [
            'timetable'
        ];
    }*/

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['timetable_id'], 'required'],
            [['timetable_id', 'lecture_room_id', 'day_id', 'class_code'], 'integer'],
            [['start_time', 'end_time'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'smis.cr_programme_curr_lecture_timetable';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'lecture_timetable_id' => 'Lecture Timetable ID',
            'timetable_id' => 'Timetable ID',
            'lecture_room_id' => 'Lecture Room ID',
            'day_id' => 'Day ID',
            'start_time' => 'Start Time',
            'end_time' => 'End Time',
            'class_code' => 'Class Code',
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTimetable()
    {
        return $this->hasOne(\app\models\CrProgCurrTimetable::className(), ['timetable_id' => 'timetable_id']);
    }
    }
