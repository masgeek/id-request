<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "smis.org_prog_level".
 *
 * @property int $programme_level_id
 * @property string $programme_level_name
 */
class OrgProgLevel extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'smis.org_prog_level';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['programme_level_name'], 'required'],
            [['programme_level_name'], 'string', 'max' => 30],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'programme_level_id' => 'Programme Level ID',
            'programme_level_name' => 'Programme Level Name',
        ];
    }
}
