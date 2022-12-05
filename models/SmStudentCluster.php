<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "smis.sm_student_cluster".
 *
 * @property int $student_cluster_id
 * @property int $stud_prog_curr_id
 * @property int $cluster_no
 * @property float $cluster_weight
 * @property string|null $last_updated
 * @property string|null $last_updated_by
 */
class SmStudentCluster extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'smis.sm_student_cluster';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['student_cluster_id', 'stud_prog_curr_id', 'cluster_no', 'cluster_weight'], 'required'],
            [['student_cluster_id', 'stud_prog_curr_id', 'cluster_no'], 'default', 'value' => null],
            [['student_cluster_id', 'stud_prog_curr_id', 'cluster_no'], 'integer'],
            [['cluster_weight'], 'number'],
            [['last_updated'], 'safe'],
            [['last_updated_by'], 'string', 'max' => 30],
            [['student_cluster_id'], 'unique'],
            [['stud_prog_curr_id'], 'exist', 'skipOnError' => true, 'targetClass' => SmStudentProgrammeCurriculum::class, 'targetAttribute' => ['stud_prog_curr_id' => 'student_prog_curriculum_id']],
        ];
    }

    /**
     * {@inheritdoc}
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
}
