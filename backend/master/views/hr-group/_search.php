<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\master\models\HrGroupSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="hr-group-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'smartgroup_code') ?>

    <?= $form->field($model, 'smartgroup_name') ?>

    <?= $form->field($model, 'smartgroup_shortname') ?>

    <?= $form->field($model, 'smartgroup_url') ?>

    <?= $form->field($model, 'smartgroup_tanda') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
