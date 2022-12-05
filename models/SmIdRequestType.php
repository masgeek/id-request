<?php

namespace app\models;

use Yii;

/**
 * This is the base model class for table "smis.sm_id_request_type".
 *
 * @property integer $request_type_id
 * @property string $id_type_desc
 *
 * @property \app\models\SmStudentIdRequest[] $smStudentIdRequests
 */
class SmIdRequestType extends \yii\db\ActiveRecord
{
    //use \mootensai\relation\RelationTrait;


    /**
    * This function helps \mootensai\relation\RelationTrait runs faster
    * @return array relation names of this model
    */
    /*public function relationNames()
    {
        return [
            'smStudentIdRequests'
        ];
    }*/

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['request_type_id'], 'required'],
            [['request_type_id'], 'integer'],
            [['id_type_desc'], 'string', 'max' => 30]
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'smis.sm_id_request_type';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'request_type_id' => 'Request Type ID',
            'id_type_desc' => 'Id Type Desc',
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSmStudentIdRequests()
    {
        return $this->hasMany(\app\models\SmStudentIdRequest::className(), ['request_type_id' => 'request_type_id']);
    }
    }
