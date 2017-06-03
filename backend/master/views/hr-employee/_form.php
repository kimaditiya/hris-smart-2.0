<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\master\models\HrEmployee */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="hr-employee-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'employee_id')->textInput() ?>

    <?= $form->field($model, 'employee_nik')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'employee_nikhris')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'employee_identifikasi')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'employee_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'smartgroup_code')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'employee_gender')->textInput() ?>

    <?= $form->field($model, 'employee_birthplace')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'employee_birthdate')->textInput() ?>

    <?= $form->field($model, 'employee_age')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'employee_maritalstatus')->textInput() ?>

    <?= $form->field($model, 'employee_marrieddate')->textInput() ?>

    <?= $form->field($model, 'employee_familystatus')->textInput() ?>

    <?= $form->field($model, 'ptkp_id')->textInput() ?>

    <?= $form->field($model, 'employee_race')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'employee_religion')->textInput() ?>

    <?= $form->field($model, 'employee_nationality')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'employee_emailpersonal')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'employee_emailoffice')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'employee_kodetelepon')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'employee_telepon')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'employee_mobile1')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'employee_mobile2')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'employee_joindate')->textInput() ?>

    <?= $form->field($model, 'employee_jobstatus')->textInput() ?>

    <?= $form->field($model, 'employee_permanentdate')->textInput() ?>

    <?= $form->field($model, 'employee_contractduration')->textInput() ?>

    <?= $form->field($model, 'employee_contractexpired')->textInput() ?>

    <?= $form->field($model, 'employee_contracttype')->textInput() ?>

    <?= $form->field($model, 'employee_resigndate')->textInput() ?>

    <?= $form->field($model, 'employee_resignnote')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'employee_notactivedate')->textInput() ?>

    <?= $form->field($model, 'employee_foto')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'employee_fotoresize')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'employee_height')->textInput() ?>

    <?= $form->field($model, 'employee_weight')->textInput() ?>

    <?= $form->field($model, 'employee_tahun')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'employee_status')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
