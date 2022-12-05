<?php

namespace app\models;

use Yii;

/**
 * This is the base model class for table "smis.sm_student_sponsor".
 *
 * @property integer $sponsor_id
 * @property string $sponsor_code
 * @property string $sponsor_name
 * @property string $status
 */
class SmStudentSponsor extends \yii\db\ActiveRecord
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
            [['sponsor_code', 'sponsor_name'], 'required'],
            [['sponsor_code', 'status'], 'string', 'max' => 10],
            [['sponsor_name'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'smis.sm_student_sponsor';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'sponsor_id' => 'Sponsor ID',
            'sponsor_code' => 'Sponsor Code',
            'sponsor_name' => 'Sponsor Name',
            'status' => 'Status',
        ];
    }
}
