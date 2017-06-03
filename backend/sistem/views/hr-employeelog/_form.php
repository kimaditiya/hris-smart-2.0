<?php

use yii\helpers\Html;
use kartik\widgets\ActiveForm;
use kartik\checkbox\CheckboxX;
use kartik\password\PasswordInput;
use kartik\widgets\Select2;
use yii\web\JsExpression;


/* @var $this yii\web\View */
/* @var $model backend\sistem\models\HrEmployeelog */
/* @var $form yii\widgets\ActiveForm */
$url = \yii\helpers\Url::to(['employee-aviliable']);
?>

<div class="hr-employeelog-form">

    <?php $form = ActiveForm::begin([
        'id'=>$model->formName()
    ]); ?>
    

  <?= $form->field($model, 'employee_identifikasi')->widget(Select2::classname(), [
        'options' => ['placeholder' => 'Search for a Employee ...'],
    'pluginOptions' => [
        'allowClear' => true,
        'minimumInputLength' => 3,
        'language' => [
            'errorLoading' => new JsExpression("function () { return 'Waiting for results...'; }"),
        ],
        'ajax' => [
            'url' => $url,
            'dataType' => 'json',
            'data' => new JsExpression('function(params) { return {q:params.term}; }')
        ],
        'escapeMarkup' => new JsExpression('function (markup) { return markup; }'),
    ],
    ]) ?>

    <?= $form->field($model, 'employee_pass')->widget(PasswordInput::classname(), []); ?>

    <?php
        if(!$model->isNewRecord){
     ?>

    <?=  $form->field($model, 'log_status')->widget(CheckboxX::classname(), [
        'pluginOptions'=>['threeState'=>false]
    ]) ?>


    <?php
        }
    ?>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
