<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "smis.cr_programme_curr_lecture_timetable".
 *
 * @property int $lecture_timetable_id
 * @property int $timetable_id
 * @property int|null $lecture_room_id
 * @property int|null $day_id
 * @property string|null $start_time
 * @property string|null $end_time
 * @property int|null $class_code
 */
class CrProgrammeCurrLectureTimetable extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'smis.cr_programme_curr_lecture_timetable';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['timetable_id'], 'required'],
            [['timetable_id', 'lecture_room_id', 'day_id', 'class_code'], 'default', 'value' => null],
            [['timetable_id', 'lecture_room_id', 'day_id', 'class_code'], 'integer'],
            [['start_time', 'end_time'], 'safe'],
            [['timetable_id'], 'exist', 'skipOnError' => true, 'targetClass' => CrProgCurrTimetable::class, 'targetAttribute' => ['timetable_id' => 'timetable_id']],
        ];
    }

    /**
     * {@inheritdoc}
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
}
