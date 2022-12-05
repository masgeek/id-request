<?php

namespace app\models;

use Yii;

/**
 * This is the base model class for table "smis.sm_id_request_status".
 *
 * @property integer $status_id
 * @property string $status_name
 *
 * @property \app\models\SmStudentIdRequest[] $smStudentIdRequests
 */
class SmIdRequestStatus extends \yii\db\ActiveRecord
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
            [['status_id', 'status_name'], 'required'],
            [['status_id'], 'integer'],
            [['status_name'], 'string', 'max' => 30]
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'smis.sm_id_request_status';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'status_id' => 'Status ID',
            'status_name' => 'Status Name',
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSmStudentIdRequests()
    {
        return $this->hasMany(\app\models\SmStudentIdRequest::className(), ['status_id' => 'status_id']);
    }
    }
