<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model backend\master\models\HrBranch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="hr-grouphrirachy-form">

    <?php $form = ActiveForm::begin([
        'id'=>$model->formName(),
        'enableClientValidation' => true,
    ]); ?>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
