<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\master\models\HrBranchSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="hr-branch-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'branch_id') ?>

    <?= $form->field($model, 'region_code') ?>

    <?= $form->field($model, 'branch_code') ?>

    <?= $form->field($model, 'branch_name') ?>

    <?= $form->field($model, 'smartgroup_code') ?>

    <?php // echo $form->field($model, 'branch_tanda') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
