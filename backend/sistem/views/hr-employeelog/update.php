<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\sistem\models\HrEmployeelog */

$this->title = 'Update Hr Employeelog: ' . $model->log_id;
$this->params['breadcrumbs'][] = ['label' => 'Hr Employeelogs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->log_id, 'url' => ['view', 'id' => $model->log_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="hr-employeelog-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'data_employee'=>$data_employee
    ]) ?>

</div>
