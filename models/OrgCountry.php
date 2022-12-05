<?php

namespace app\models;

use Yii;

/**
 * This is the base model class for table "smis.org_country".
 *
 * @property string $country_code
 * @property string $country_name
 * @property string $continent
 * @property string $region
 * @property string $code2
 * @property string $nationality
 *
 * @property \app\models\SmStudent[] $smStudents
 */
class OrgCountry extends \yii\db\ActiveRecord
{
    //use \mootensai\relation\RelationTrait;


    /**
    * This function helps \mootensai\relation\RelationTrait runs faster
    * @return array relation names of this model
    */
    /*public function relationNames()
    {
        return [
            'smStudents'
        ];
    }*/

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['country_code', 'country_name', 'code2'], 'required'],
            [['country_code', 'code2'], 'string', 'max' => 5],
            [['country_name', 'continent', 'region', 'nationality'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'smis.org_country';
    }

    /**
     * @inheritdoc
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
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSmStudents()
    {
        return $this->hasMany(\app\models\SmStudent::className(), ['country_code' => 'country_code']);
    }
    }
