<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "org_unit_head".
 *
 * @property int $unit_head_id
 *
 * @property OrgUnitHistory[] $orgUnitHistories
 */
class OrgUnitHead extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'org_unit_head';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['unit_head_id'], 'required'],
            [['unit_head_id'], 'default', 'value' => null],
            [['unit_head_id'], 'integer'],
            [['unit_head_id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'unit_head_id' => 'Unit Head ID',
        ];
    }

    /**
     * Gets query for [[OrgUnitHistories]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrgUnitHistories()
    {
        return $this->hasMany(OrgUnitHistory::class, ['unit_head_id' => 'unit_head_id']);
    }
}
