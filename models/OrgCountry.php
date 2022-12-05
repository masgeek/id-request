<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "smis.org_country".
 *
 * @property string $country_code
 * @property string $country_name
 * @property string|null $continent
 * @property string|null $region
 * @property string $code2
 * @property string|null $nationality
 */
class OrgCountry extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'smis.org_country';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['country_code', 'country_name', 'code2'], 'required'],
            [['country_code', 'code2'], 'string', 'max' => 5],
            [['country_name', 'continent', 'region', 'nationality'], 'string', 'max' => 100],
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
            'continent' => 'Continent',
            'region' => 'Region',
            'code2' => 'Code2',
            'nationality' => 'Nationality',
        ];
    }
}
