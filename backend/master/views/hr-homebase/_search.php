<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\master\models\HrHomebaseSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="hr-homebase-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'homebase_id') ?>

    <?= $form->field($model, 'smartgroup_code') ?>

    <?= $form->field($model, 'homebase_code') ?>

    <?= $form->field($model, 'homebase_name') ?>

    <?= $form->field($model, 'homebase_tanda') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
