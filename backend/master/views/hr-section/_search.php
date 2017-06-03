<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\master\models\HrSectionSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="hr-section-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'section_id') ?>

    <?= $form->field($model, 'smartgroup_code') ?>

    <?= $form->field($model, 'department_id') ?>

    <?= $form->field($model, 'section_name') ?>

    <?= $form->field($model, 'section_tanda') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
