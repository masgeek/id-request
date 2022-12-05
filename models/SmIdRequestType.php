<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "smis.sm_id_request_type".
 *
 * @property int $request_type_id
 * @property string|null $id_type_desc
 */
class SmIdRequestType extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'smis.sm_id_request_type';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['request_type_id'], 'required'],
            [['request_type_id'], 'default', 'value' => null],
            [['request_type_id'], 'integer'],
            [['id_type_desc'], 'string', 'max' => 30],
            [['request_type_id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'request_type_id' => 'Request Type ID',
            'id_type_desc' => 'Id Type Desc',
        ];
    }
}
