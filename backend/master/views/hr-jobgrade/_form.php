<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\master\models\HrJobgrade */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="hr-jobgrade-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'pangkat_code')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'grade_value')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'smartgroup_code')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'grade_tanda')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
