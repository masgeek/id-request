<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "org_unit_types".
 *
 * @property int $unit_type_id
 *
 * @property OrgUnitHistory[] $orgUnitHistories
 */
class OrgUnitType extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'org_unit_types';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['unit_type_id'], 'required'],
            [['unit_type_id'], 'default', 'value' => null],
            [['unit_type_id'], 'integer'],
            [['unit_type_id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'unit_type_id' => 'Unit Type ID',
        ];
    }

    /**
     * Gets query for [[OrgUnitHistories]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrgUnitHistories()
    {
        return $this->hasMany(OrgUnitHistory::class, ['org_type_id' => 'unit_type_id']);
    }
}
