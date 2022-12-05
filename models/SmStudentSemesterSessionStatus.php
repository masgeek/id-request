<?php

namespace app\models;

use Yii;

/**
 * This is the base model class for table "smis.sm_student_semester_session_status".
 *
 * @property integer $status_id
 * @property string $status_name
 *
 * @property \app\models\SmStudentSemSessionProgress[] $smStudentSemSessionProgresses
 */
class SmStudentSemesterSessionStatus extends \yii\db\ActiveRecord
{
    //use \mootensai\relation\RelationTrait;


    /**
    * This function helps \mootensai\relation\RelationTrait runs faster
    * @return array relation names of this model
    */
    /*public function relationNames()
    {
        return [
            'smStudentSemSessionProgresses'
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
            [['status_name'], 'string']
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'smis.sm_student_semester_session_status';
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
    public function getSmStudentSemSessionProgresses()
    {
        return $this->hasMany(\app\models\SmStudentSemSessionProgress::className(), ['reporting_status_id' => 'status_id']);
    }
    }
