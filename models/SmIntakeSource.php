<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "smis.sm_intake_source".
 *
 * @property int $source_id
 * @property string $source
 */
class SmIntakeSource extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'smis.sm_intake_source';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['source_id', 'source'], 'required'],
            [['source_id'], 'default', 'value' => null],
            [['source_id'], 'integer'],
            [['source'], 'string', 'max' => 15],
            [['source_id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'source_id' => 'Source ID',
            'source' => 'Source',
        ];
    }
}
