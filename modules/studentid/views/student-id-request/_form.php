<?php /** @noinspection PhpUnhandledExceptionInspection */

use app\models\SmIdRequestStatus;
use app\models\SmIdRequestType;
use app\modules\studentid\models\StudentProgrammeCurriculum;
use kartik\form\ActiveForm;
use kartik\widgets\Select2;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\studentid\models\StudentIdRequest */
/* @var $form kartik\form\ActiveForm */

?>

<div class="student-id-request-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->errorSummary($model); ?>

    <div class="row">
        <div class="col-md">
            <?= $form->field($model, 'request_type_id')->widget(Select2::class, [
                'data' => ArrayHelper::map(SmIdRequestType::find()->orderBy('request_type_id')->asArray()->all(), 'request_type_id', 'id_type_desc'),
                'options' => ['placeholder' => 'Choose ' . strtolower($model->getAttributeLabel('request_type_id'))],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]); ?>
        </div>
        <div class="col-md">
            <?= $form->field($model, 'student_prog_curr_id')->widget(Select2::class, [
                'data' => StudentProgrammeCurriculum::getCurriculum(),
                'options' => ['placeholder' => 'Choose ' . strtolower($model->getAttributeLabel('student_prog_curr_id'))],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]); ?>
        </div>

        <div class="row">
            <div class="col-md">
                <?= $form->field($model, 'status_id')->widget(Select2::class, [
                    'data' => ArrayHelper::map(SmIdRequestStatus::find()->orderBy('status_id')->asArray()->all(), 'status_id', 'status_name'),
                    'options' => ['placeholder' => 'Choose ' . strtolower($model->getAttributeLabel('status_id'))],
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
                ]); ?>
            </div>
            <div class="col-md">
                <?= $form->field($model, 'source')->textInput([
                    'placeholder' => $model->getAttributeHint('source')
                ])->hint(false) ?>
            </div>
        </div>
        <?= $form->field($model, 'request_date')->textInput([
            'placeholder' => 'Request Date',
            'readonly' => true
        ]) ?>


        <div class="form-group">
            <?= Html::submitButton($model->isNewRecord ? 'Submit request' : 'Update request', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>
