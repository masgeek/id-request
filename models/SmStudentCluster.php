<?php

namespace app\models;

use Yii;

/**
 * This is the base model class for table "smis.sm_student_cluster".
 *
 * @property integer $student_cluster_id
 * @property integer $stud_prog_curr_id
 * @property integer $cluster_no
 * @property double $cluster_weight
 * @property string $last_updated
 * @property string $last_updated_by
 *
 * @property \app\models\SmStudentProgrammeCurriculum $studProgCurr
 */
class SmStudentCluster extends \yii\db\ActiveRecord
{
    //use \mootensai\relation\RelationTrait;


    /**
    * This function helps \mootensai\relation\RelationTrait runs faster
    * @return array relation names of this model
    */
    /*public function relationNames()
    {
        return [
            'studProgCurr'
        ];
    }*/

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['student_cluster_id', 'stud_prog_curr_id', 'cluster_no', 'cluster_weight'], 'required'],
            [['student_cluster_id', 'stud_prog_curr_id', 'cluster_no'], 'integer'],
            [['cluster_weight'], 'number'],
            [['last_updated'], 'safe'],
            [['last_updated_by'], 'string', 'max' => 30]
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'smis.sm_student_cluster';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'student_cluster_id' => 'Student Cluster ID',
            'stud_prog_curr_id' => 'Stud Prog Curr ID',
            'cluster_no' => 'Cluster No',
            'cluster_weight' => 'Cluster Weight',
            'last_updated' => 'Last Updated',
            'last_updated_by' => 'Last Updated By',
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStudProgCurr()
    {
        return $this->hasOne(\app\models\SmStudentProgrammeCurriculum::className(), ['student_prog_curriculum_id' => 'stud_prog_curr_id']);
    }
    }
