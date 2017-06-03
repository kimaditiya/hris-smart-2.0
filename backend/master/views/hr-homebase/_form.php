<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\master\models\HrHomebase */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="hr-homebase-form">

    <?php $form = ActiveForm::begin([
    	'id'=>$model->formName(),
    ]); ?>

    <?= $form->field($model, 'homebase_code')->textInput(['value' =>$kode_homebase,'readOnly'=>true]) ?>

    <?= $form->field($model, 'homebase_name')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
