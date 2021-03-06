<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\master\models\HrJobjabatanSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="hr-jobjabatan-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'category_code') ?>

    <?= $form->field($model, 'groupjabatan_code') ?>

    <?= $form->field($model, 'jabatan_code') ?>

    <?= $form->field($model, 'jabatan_name') ?>

    <?= $form->field($model, 'jabatan_tanda') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
