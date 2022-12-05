<?php

namespace app\models;

use Yii;

/**
 * This is the base model class for table "smis.sm_intakes".
 *
 * @property integer $intake_code
 * @property string $intake_name
 * @property integer $acad_session_id
 *
 * @property \app\models\SmAdmittedStudent[] $smAdmittedStudents
 * @property \app\models\OrgAcademicSession $acadSession
 */
class SmIntake extends \yii\db\ActiveRecord
{
    //use \mootensai\relation\RelationTrait;


    /**
    * This function helps \mootensai\relation\RelationTrait runs faster
    * @return array relation names of this model
    */
    /*public function relationNames()
    {
        return [
            'smAdmittedStudents',
            'acadSession'
        ];
    }*/

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['intake_code', 'intake_name'], 'required'],
            [['intake_code', 'acad_session_id'], 'integer'],
            [['intake_name'], 'string']
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'smis.sm_intakes';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'intake_code' => 'Intake Code',
            'intake_name' => 'Intake Name',
            'acad_session_id' => 'Acad Session ID',
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSmAdmittedStudents()
    {
        return $this->hasMany(\app\models\SmAdmittedStudent::className(), ['intake_code' => 'intake_code']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAcadSession()
    {
        return $this->hasOne(\app\models\OrgAcademicSession::className(), ['acad_session_id' => 'acad_session_id']);
    }
    }
