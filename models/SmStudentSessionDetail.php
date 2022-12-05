<?php

namespace app\models;

use Yii;

/**
 * This is the base model class for table "smis.sm_student_session_details".
 *
 * @property integer $student_session_details_id
 * @property integer $student_semester_session_id
 *
 * @property \app\models\SmStudentSemSessionProgress $studentSemesterSession
 */
class SmStudentSessionDetail extends \yii\db\ActiveRecord
{
    //use \mootensai\relation\RelationTrait;


    /**
    * This function helps \mootensai\relation\RelationTrait runs faster
    * @return array relation names of this model
    */
    /*public function relationNames()
    {
        return [
            'studentSemesterSession'
        ];
    }*/

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['student_session_details_id'], 'required'],
            [['student_session_details_id', 'student_semester_session_id'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'smis.sm_student_session_details';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'student_session_details_id' => 'Student Session Details ID',
            'student_semester_session_id' => 'Student Semester Session ID',
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStudentSemesterSession()
    {
        return $this->hasOne(\app\models\SmStudentSemSessionProgress::className(), ['student_semester_session_id' => 'student_semester_session_id']);
    }
    }
