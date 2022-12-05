<?php

namespace app\models;

use Yii;

/**
 * This is the base model class for table "smis.org_kuccps_prog_map".
 *
 * @property integer $prog_map_id
 * @property string $uon_prog_code
 * @property string $academic_year
 * @property string $kuccps_prog_code
 * @property integer $cluster_id
 * @property integer $capacity
 * @property string $cut_off_points
 * @property integer $admitted
 * @property boolean $faculty_submit_status
 * @property boolean $validity_status
 * @property string $last_updated_date
 * @property string $last_updated_by
 */
class OrgKuccpsProgMap extends \yii\db\ActiveRecord
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
            [['uon_prog_code', 'academic_year'], 'required'],
            [['cluster_id', 'capacity', 'admitted'], 'integer'],
            [['cut_off_points'], 'number'],
            [['faculty_submit_status', 'validity_status'], 'boolean'],
            [['last_updated_date'], 'safe'],
            [['uon_prog_code', 'academic_year', 'kuccps_prog_code'], 'string', 'max' => 20],
            [['last_updated_by'], 'string', 'max' => 30]
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'smis.org_kuccps_prog_map';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'prog_map_id' => 'Prog Map ID',
            'uon_prog_code' => 'Uon Prog Code',
            'academic_year' => 'Academic Year',
            'kuccps_prog_code' => 'Kuccps Prog Code',
            'cluster_id' => 'Cluster ID',
            'capacity' => 'Capacity',
            'cut_off_points' => 'Cut Off Points',
            'admitted' => 'Admitted',
            'faculty_submit_status' => 'faculty final submission status',
            'validity_status' => 'registrar final submit status',
            'last_updated_date' => 'Last Updated Date',
            'last_updated_by' => 'Last Updated By',
        ];
    }
}
