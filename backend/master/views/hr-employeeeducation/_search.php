<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\master\models\HrEmployeeeducationSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="hr-employeeeducation-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'education_id') ?>

    <?= $form->field($model, 'employee_identifikasi') ?>

    <?= $form->field($model, 'education_level') ?>

    <?= $form->field($model, 'education_institution') ?>

    <?= $form->field($model, 'education_majorin') ?>

    <?php // echo $form->field($model, 'education_city') ?>

    <?php // echo $form->field($model, 'education_startyear') ?>

    <?php // echo $form->field($model, 'education_endyear') ?>

    <?php // echo $form->field($model, 'education_tanda') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
