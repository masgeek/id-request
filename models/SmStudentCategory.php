<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "smis.sm_student_category".
 *
 * @property int $std_category_id
 * @property string $std_category_name
 */
class SmStudentCategory extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'smis.sm_student_category';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['std_category_id', 'std_category_name'], 'required'],
            [['std_category_id'], 'default', 'value' => null],
            [['std_category_id'], 'integer'],
            [['std_category_name'], 'string', 'max' => 100],
            [['std_category_id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'std_category_id' => 'Std Category ID',
            'std_category_name' => 'Std Category Name',
        ];
    }
}
