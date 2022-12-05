<?php

namespace app\models;

use Yii;

/**
 * This is the base model class for table "smis.org_acad_session_status".
 *
 * @property integer $acad_session_status_id
 * @property string $acad_session_status_name
 * @property string $session_status
 */
class OrgAcadSessionStatus extends \yii\db\ActiveRecord
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
            [['acad_session_status_name'], 'required'],
            [['acad_session_status_name', 'session_status'], 'string', 'max' => 10]
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'smis.org_acad_session_status';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'acad_session_status_id' => 'Acad Session Status ID',
            'acad_session_status_name' => 'Acad Session Status Name',
            'session_status' => 'Session Status',
        ];
    }
}
