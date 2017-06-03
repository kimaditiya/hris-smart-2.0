<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\master\models\HrRegion */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="hr-region-form">

    <?php $form = ActiveForm::begin([
    	'id'=>$model->formName()
    ]); ?>

    <?= $form->field($model, 'region_name')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
