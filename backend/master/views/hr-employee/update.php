<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\master\models\HrEmployee */

$this->title = 'Update Hr Employee: ' . $model->employee_identifikasi;
$this->params['breadcrumbs'][] = ['label' => 'Hr Employees', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->employee_identifikasi, 'url' => ['view', 'id' => $model->employee_identifikasi]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="hr-employee-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
