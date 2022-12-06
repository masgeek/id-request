<?php

/* @var $this yii\web\View */
/* @var $searchModel app\modules\studentid\models\StudentIdRequestSearch */

/* @var $dataProvider yii\data\ActiveDataProvider */

use kartik\tabs\TabsX;
use yii\helpers\Html;

$this->title = 'Student Id Requests';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="student-id-request-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('New ID Request', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= TabsX::widget([
        'position' => TabsX::POS_ABOVE,
        'bordered'=>true,
//        'align' => TabsX::ALIGN_LEFT,
        'enableStickyTabs' => true,
        'stickyTabsOptions' => [
            'selectorAttribute' => 'data-target',
            'backToTop' => true,
        ],
        'items' => [
            [
                'label' => 'New ID',
//                'active' => true,
                'content' => $this->render('grid/_grid', [
                    'tab' => 0,
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
                    'title' => 'New id requests'])
            ],
            [
                'label' => 'ID renewal',
                'content' => $this->render('grid/_grid', [
                    'tab' => 1,
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
                    'title' => 'Renewal requests'])
            ],
            [
                'label' => 'ID replacement',
                'content' => $this->render('grid/_grid', [
                    'tab' => 2,
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
                    'title' => 'Id replacement requests'])
            ]
        ]
    ]) ?>
</div>
