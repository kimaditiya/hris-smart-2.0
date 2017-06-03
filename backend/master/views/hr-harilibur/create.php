<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\master\models\HrHarillibur */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="hr-harilibur-form">

    <?php $form = ActiveForm::begin([
        'id'=>$model->formName()
    ]); ?>

    <?= $form->field($model, 'harilibur_keterangan')->textArea() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
