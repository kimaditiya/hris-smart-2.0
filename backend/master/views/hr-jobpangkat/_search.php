<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\master\models\HrJobpangkatSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="hr-jobpangkat-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'category_code') ?>

    <?= $form->field($model, 'pangkat_code') ?>

    <?= $form->field($model, 'pangkat_name') ?>

    <?= $form->field($model, 'pangkat_tanda') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
