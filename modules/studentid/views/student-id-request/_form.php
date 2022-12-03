<?php /** @noinspection PhpUnhandledExceptionInspection */

use app\models\SmIdRequestStatus;
use app\models\SmIdRequestType;
use app\models\SmStudentProgrammeCurriculum;
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

    <?= $form->field($model, 'request_type_id')->widget(Select2::class, [
        'data' => ArrayHelper::map(SmIdRequestType::find()->orderBy('request_type_id')->asArray()->all(), 'request_type_id', 'id_type_desc'),
        'options' => ['placeholder' => 'Choose ' . strtolower($model->getAttributeLabel('request_type_id'))],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>

    <?= $form->field($model, 'student_prog_curr_id')->widget(Select2::class, [
        'data' => ArrayHelper::map(SmStudentProgrammeCurriculum::find()->orderBy('student_prog_curriculum_id')->asArray()->all(), 'student_prog_curriculum_id', 'student_prog_curriculum_id'),
        'options' => ['placeholder' => 'Choose Sm student programme curriculum'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>

    <?= $form->field($model, 'request_date')->textInput(['placeholder' => 'Request Date']) ?>

    <?= $form->field($model, 'status_id')->widget(Select2::class, [
        'data' => ArrayHelper::map(SmIdRequestStatus::find()->orderBy('status_id')->asArray()->all(), 'status_id', 'status_id'),
        'options' => ['placeholder' => 'Choose Sm id request status'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>

    <?= $form->field($model, 'source')->textInput([
        'placeholder' => $model->getAttributeHint('source')
    ])->hint(false) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
