<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\master\models\HrDepartment */

$this->title = 'Update Hr Department: ' . $model->department_id;
$this->params['breadcrumbs'][] = ['label' => 'Hr Departments', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->department_id, 'url' => ['view', 'id' => $model->department_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="hr-department-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
