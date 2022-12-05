<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "smis.sm_name_change".
 *
 * @property int $name_change_id
 * @property string $request_date
 * @property int $student_id
 * @property string|null $new_surname
 * @property string|null $new_othernames
 * @property string $reason
 * @property string|null $document_url
 * @property string|null $current_surname
 * @property string|null $current_othernames
 * @property string $status PENDING, REVIEW, APPROVED, DISAPPROVED
 */
class SmNameChange extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'smis.sm_name_change';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['request_date', 'student_id', 'reason', 'status'], 'required'],
            [['request_date'], 'safe'],
            [['student_id'], 'default', 'value' => null],
            [['student_id'], 'integer'],
            [['new_surname', 'current_surname', 'status'], 'string', 'max' => 20],
            [['new_othernames', 'current_othernames'], 'string', 'max' => 50],
            [['reason', 'document_url'], 'string', 'max' => 200],
            [['student_id'], 'exist', 'skipOnError' => true, 'targetClass' => SmStudent::class, 'targetAttribute' => ['student_id' => 'student_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'name_change_id' => 'Name Change ID',
            'request_date' => 'Request Date',
            'student_id' => 'Student ID',
            'new_surname' => 'New Surname',
            'new_othernames' => 'New Othernames',
            'reason' => 'Reason',
            'document_url' => 'Document Url',
            'current_surname' => 'Current Surname',
            'current_othernames' => 'Current Othernames',
            'status' => 'PENDING, REVIEW, APPROVED, DISAPPROVED',
        ];
    }
}
