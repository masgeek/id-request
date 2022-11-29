<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\studentid\models\StudentIdRequest */

$this->title = 'Create Student Id Request';
$this->params['breadcrumbs'][] = ['label' => 'Student Id Requests', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="student-id-request-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
