<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "smis.sm_stud_rel_types".
 *
 * @property int $stud_rel_type_id
 * @property string $rel_name
 */
class SmStudRelType extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'smis.sm_stud_rel_types';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['stud_rel_type_id', 'rel_name'], 'required'],
            [['stud_rel_type_id'], 'default', 'value' => null],
            [['stud_rel_type_id'], 'integer'],
            [['rel_name'], 'string'],
            [['stud_rel_type_id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'stud_rel_type_id' => 'Stud Rel Type ID',
            'rel_name' => 'Rel Name',
        ];
    }
}
