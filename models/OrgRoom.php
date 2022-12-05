<?php

namespace app\models;

use Yii;

/**
 * This is the base model class for table "smis.org_rooms".
 *
 * @property integer $room_id
 * @property string $room_code
 * @property string $room_name
 * @property integer $fk_building_id
 * @property integer $fk_floor_id
 * @property integer $room_capacity
 * @property integer $fk_room_type
 * @property integer $fk_room_status_id
 */
class OrgRoom extends \yii\db\ActiveRecord
{
    //use \mootensai\relation\RelationTrait;


    /**
    * This function helps \mootensai\relation\RelationTrait runs faster
    * @return array relation names of this model
    */
    /*public function relationNames()
    {
        return [
            ''
        ];
    }*/

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['room_id'], 'required'],
            [['room_id', 'fk_building_id', 'fk_floor_id', 'room_capacity', 'fk_room_type', 'fk_room_status_id'], 'integer'],
            [['room_code'], 'string', 'max' => 40],
            [['room_name'], 'string', 'max' => 80]
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'smis.org_rooms';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'room_id' => 'Room ID',
            'room_code' => 'Room Code',
            'room_name' => 'Room Name',
            'fk_building_id' => 'Fk Building ID',
            'fk_floor_id' => 'Fk Floor ID',
            'room_capacity' => 'Room Capacity',
            'fk_room_type' => 'Fk Room Type',
            'fk_room_status_id' => 'Fk Room Status ID',
        ];
    }
}
