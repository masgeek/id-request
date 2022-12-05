<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "smis.org_kuccps_prog_map".
 *
 * @property int $prog_map_id
 * @property string $uon_prog_code
 * @property string $academic_year
 * @property string|null $kuccps_prog_code
 * @property int|null $cluster_id
 * @property int|null $capacity
 * @property float|null $cut_off_points
 * @property int|null $admitted
 * @property bool|null $faculty_submit_status faculty final submission status
 * @property bool|null $validity_status registrar final submit status
 * @property string|null $last_updated_date
 * @property string|null $last_updated_by
 */
class OrgKuccpsProgMap extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'smis.org_kuccps_prog_map';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['uon_prog_code', 'academic_year'], 'required'],
            [['cluster_id', 'capacity', 'admitted'], 'default', 'value' => null],
            [['cluster_id', 'capacity', 'admitted'], 'integer'],
            [['cut_off_points'], 'number'],
            [['faculty_submit_status', 'validity_status'], 'boolean'],
            [['last_updated_date'], 'safe'],
            [['uon_prog_code', 'academic_year', 'kuccps_prog_code'], 'string', 'max' => 20],
            [['last_updated_by'], 'string', 'max' => 30],
        ];
    }

    /**
     * {@inheritdoc}
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
