<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "org_country".
 *
 * @property string $country_code
 * @property string|null $country_name
 *
 * @property SmStudent[] $smStudents
 */
class OrgCountry extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'org_country';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['country_code'], 'required'],
            [['country_code'], 'string', 'max' => 3],
            [['country_name'], 'string', 'max' => 50],
            [['country_code'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'country_code' => 'Country Code',
            'country_name' => 'Country Name',
        ];
    }

    /**
     * Gets query for [[SmStudents]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSmStudents()
    {
        return $this->hasMany(SmStudent::class, ['country_code' => 'country_code']);
    }
}
