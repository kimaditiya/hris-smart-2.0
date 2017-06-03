<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use kartik\widgets\DepDrop;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model backend\master\models\HrDepartment */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="hr-department-form">

    <?php $form = ActiveForm::begin([
    	'id'=> $model->formName()
    ]); ?>

     <!-- Normal select with ActiveForm & model -->
    <?= $form->field($model, 'direktorat_id')->widget(Select2::classname(), [
        'data' => $data_direktorat,
        'language' => 'en',
        'options' => ['placeholder' => 'Select a  ...'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ])->label('Direktorat') ?>

    <?= $form->field($model, 'devision_id')->widget(DepDrop::classname(), [
        'type'=>DepDrop::TYPE_SELECT2,
        'options'=>['placeholder'=>'Select ...'],
        'select2Options'=>['pluginOptions'=>['allowClear'=>true]],
        'pluginOptions'=>[
            'depends'=>['hrdepartment-direktorat_id'],
            'url'=>Url::toRoute(['/master/hr-department/list-division']),
             'loadingText' => 'Loading  ...',
              'initialize' => true,
        ]
    ])->label('divisi') ?>


    <?= $form->field($model, 'department_name')->textInput(['maxlength' => true]) ?>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
