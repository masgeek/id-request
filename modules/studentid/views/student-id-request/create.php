<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\studentid\models\StudentIdRequest */
/* @var $hasEnoughFunds boolean */

$this->params['breadcrumbs'][] = ['label' => 'Student ID request', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="student-id-request-create">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php if ($hasEnoughFunds): ?>
        <?= $this->render('_form', [
            'model' => $model,
        ]) ?>
    <?php else: ?>
        <div class="mt-4 p-5 bg-primary text-white rounded">
            <h1>Insufficient balance</h1>
            <p>You have insufficient balance to place an id request, kindly top up your student account with at least
                100KES to proceed</p>
        </div>
    <?php endif; ?>
</div>
