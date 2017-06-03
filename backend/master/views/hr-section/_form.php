<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model backend\master\models\HrSection */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="hr-section-form">

    <?php $form = ActiveForm::begin([
    	'id'=>$model->formName()
    ]); ?>


     <!-- Normal select with ActiveForm & model -->
    <?= $form->field($model, 'department_id')->widget(Select2::classname(), [
        'data' => $data_department,
        'language' => 'en',
        'options' => ['placeholder' => 'Select a  ...'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ])->label('Department') ?>


    <?= $form->field($model, 'section_name')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
