<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\sistem\models\HrEmployeelog */

$this->title = 'Create User Login';
$this->params['breadcrumbs'][] = ['label' => 'Hr Employeelogs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="hr-employeelog-create">

    <?= $this->render('_form', [
        'model' => $model,
        'data_employee'=>$data_employee
    ]) ?>

</div>
