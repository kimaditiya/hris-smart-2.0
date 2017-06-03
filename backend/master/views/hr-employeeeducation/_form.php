<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\master\models\HrEmployeeeducation */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="hr-employeeeducation-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'employee_identifikasi')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'education_level')->textInput() ?>

    <?= $form->field($model, 'education_institution')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'education_majorin')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'education_city')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'education_startyear')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'education_endyear')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'education_tanda')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
