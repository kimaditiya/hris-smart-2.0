<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\master\models\HrGroup */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="hr-group-form">

    <?php $form = ActiveForm::begin([
        'id'=>$model->formName()
    ]); ?>

    <?= $form->field($model, 'smartgroup_code')->textInput(['value' =>$kd_group,'readonly'=>true]) ?>

    <?= $form->field($model, 'smartgroup_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'smartgroup_shortname')->textInput(['maxlength' => true])?>

    <?= $form->field($model, 'smartgroup_url')->textInput(['maxlength' => true]) ?>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
