<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\master\models\HrJobgradeSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="hr-jobgrade-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'pangkat_code') ?>

    <?= $form->field($model, 'grade_id') ?>

    <?= $form->field($model, 'grade_value') ?>

    <?= $form->field($model, 'smartgroup_code') ?>

    <?= $form->field($model, 'grade_tanda') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
