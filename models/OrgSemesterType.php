<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "smis.org_semester_type".
 *
 * @property int $sem_type_id
 * @property string $sem_type
 */
class OrgSemesterType extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'smis.org_semester_type';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['sem_type'], 'required'],
            [['sem_type'], 'string', 'max' => 15],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'sem_type_id' => 'Sem Type ID',
            'sem_type' => 'Sem Type',
        ];
    }
}
