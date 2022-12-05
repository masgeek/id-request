<?php

namespace app\models;

use Yii;

/**
 * This is the base model class for table "smis.sm_name_change_approval".
 *
 * @property integer $name_change_approval_id
 * @property integer $name_change_id
 * @property string $approval_status
 * @property string $remarks
 * @property string $approved_by
 * @property string $approval_date
 *
 * @property \app\models\SmNameChange $nameChange
 */
class SmNameChangeApproval extends \yii\db\ActiveRecord
{
    //use \mootensai\relation\RelationTrait;


    /**
    * This function helps \mootensai\relation\RelationTrait runs faster
    * @return array relation names of this model
    */
    /*public function relationNames()
    {
        return [
            'nameChange'
        ];
    }*/

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name_change_id', 'approval_status', 'approved_by', 'approval_date'], 'required'],
            [['name_change_id'], 'integer'],
            [['approval_date'], 'safe'],
            [['approval_status'], 'string', 'max' => 30],
            [['remarks'], 'string', 'max' => 250],
            [['approved_by'], 'string', 'max' => 15]
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'smis.sm_name_change_approval';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'name_change_approval_id' => 'Name Change Approval ID',
            'name_change_id' => 'Name Change ID',
            'approval_status' => 'pending, review, closed',
            'remarks' => 'Remarks',
            'approved_by' => 'Approved By',
            'approval_date' => 'Approval Date',
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNameChange()
    {
        return $this->hasOne(\app\models\SmNameChange::className(), ['name_change_id' => 'name_change_id']);
    }
    }
