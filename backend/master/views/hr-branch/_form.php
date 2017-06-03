<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model backend\master\models\HrBranch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="hr-branch-form">

    <?php $form = ActiveForm::begin([
        'id'=>$model->formName(),
        'enableClientValidation' => true,
        'enableAjaxValidation'=>true,
        'validationUrl'=>Url::toRoute('/master/hr-branch/valid-branch')
    ]); ?>

    <!-- Normal select with ActiveForm & model -->
    <?= $form->field($model, 'region_code')->widget(Select2::classname(), [
        'data' => $data_region,
        'language' => 'en',
        'options' => ['placeholder' => 'Select a  ...'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]) ?>

    <?= $form->field($model, 'branch_code')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'branch_name')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
