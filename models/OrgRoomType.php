<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "smis.org_room_type".
 *
 * @property int $room_type_id
 * @property string $room_type_name
 */
class OrgRoomType extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'smis.org_room_type';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['room_type_name'], 'required'],
            [['room_type_name'], 'string', 'max' => 80],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'room_type_id' => 'Room Type ID',
            'room_type_name' => 'Room Type Name',
        ];
    }
}
