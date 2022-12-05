<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "smis.ex_mode".
 *
 * @property int $exam_mode_id
 * @property string $exam_mode_name
 */
class ExMode extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'smis.ex_mode';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['exam_mode_name'], 'required'],
            [['exam_mode_name'], 'string', 'max' => 30],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'exam_mode_id' => 'Exam Mode ID',
            'exam_mode_name' => 'Exam Mode Name',
        ];
    }
}
