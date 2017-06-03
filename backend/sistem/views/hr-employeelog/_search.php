<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\sistem\models\HrEmployeelogSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="hr-employeelog-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'log_id') ?>

    <?= $form->field($model, 'employee_identifikasi') ?>

    <?= $form->field($model, 'employee_nik') ?>

    <?= $form->field($model, 'smartgroup_code') ?>

    <?= $form->field($model, 'smf') ?>

    <?php // echo $form->field($model, 'rajamokas') ?>

    <?php // echo $form->field($model, 'sma') ?>

    <?php // echo $form->field($model, 'smabadi') ?>

    <?php // echo $form->field($model, 'smauto') ?>

    <?php // echo $form->field($model, 'bas') ?>

    <?php // echo $form->field($model, 'ssm') ?>

    <?php // echo $form->field($model, 'employeelog_gradedari') ?>

    <?php // echo $form->field($model, 'employeelog_gradesampai') ?>

    <?php // echo $form->field($model, 'employee_pass') ?>

    <?php // echo $form->field($model, 'employee_passori') ?>

    <?php // echo $form->field($model, 'log_status') ?>

    <?php // echo $form->field($model, 'log_tanda') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
