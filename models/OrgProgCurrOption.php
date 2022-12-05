<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "smis.org_prog_curr_option".
 *
 * @property int $option_id
 * @property string $option_code
 * @property string $option_name
 * @property int $prog_cur_id
 * @property string|null $option_desc
 * @property string $option_status
 * @property string|null $progress_type
 */
class OrgProgCurrOption extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'smis.org_prog_curr_option';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['option_code', 'option_name', 'prog_cur_id', 'option_status'], 'required'],
            [['prog_cur_id'], 'default', 'value' => null],
            [['prog_cur_id'], 'integer'],
            [['option_code'], 'string', 'max' => 10],
            [['option_name'], 'string', 'max' => 25],
            [['option_desc'], 'string', 'max' => 150],
            [['option_status', 'progress_type'], 'string', 'max' => 12],
            [['prog_cur_id'], 'exist', 'skipOnError' => true, 'targetClass' => OrgProgrammeCurriculum::class, 'targetAttribute' => ['prog_cur_id' => 'prog_curriculum_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'option_id' => 'Option ID',
            'option_code' => 'Option Code',
            'option_name' => 'Option Name',
            'prog_cur_id' => 'Prog Cur ID',
            'option_desc' => 'Option Desc',
            'option_status' => 'Option Status',
            'progress_type' => 'Progress Type',
        ];
    }
}
