<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\master\models\HrDepartmentSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="hr-department-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'department_id') ?>

    <?= $form->field($model, 'direktorat_id') ?>

    <?= $form->field($model, 'devision_id') ?>

    <?= $form->field($model, 'department_name') ?>

    <?= $form->field($model, 'department_tanda') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
