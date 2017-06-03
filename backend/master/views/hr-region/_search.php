<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\master\models\HrRegionSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="hr-region-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'region_name') ?>

    <?= $form->field($model, 'region_code') ?>

    <?= $form->field($model, 'smartgroup_code') ?>

    <?= $form->field($model, 'region_tanda') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
