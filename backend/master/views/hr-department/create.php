<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\master\models\HrDepartment */

$this->title = 'Create Hr Department';
$this->params['breadcrumbs'][] = ['label' => 'Hr Departments', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="hr-department-create">

    <?= $this->render('_form', [
        'model' => $model,
        'data_direktorat'=>$data_direktorat,
        'data_division'=>$data_division
    ]) ?>

</div>
