<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "smis.sm_academic_progress_status".
 *
 * @property int $progress_status_id
 * @property string $progress_status_name
 */
class SmAcademicProgressStatus extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'smis.sm_academic_progress_status';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['progress_status_id', 'progress_status_name'], 'required'],
            [['progress_status_id'], 'default', 'value' => null],
            [['progress_status_id'], 'integer'],
            [['progress_status_name'], 'string', 'max' => 150],
            [['progress_status_id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'progress_status_id' => 'Progress Status ID',
            'progress_status_name' => 'Progress Status Name',
        ];
    }
}
