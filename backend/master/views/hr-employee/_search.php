<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\master\models\HrEmployeeSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="hr-employee-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'employee_id') ?>

    <?= $form->field($model, 'employee_nik') ?>

    <?= $form->field($model, 'employee_nikhris') ?>

    <?= $form->field($model, 'employee_identifikasi') ?>

    <?= $form->field($model, 'employee_name') ?>

    <?php // echo $form->field($model, 'smartgroup_code') ?>

    <?php // echo $form->field($model, 'employee_gender') ?>

    <?php // echo $form->field($model, 'employee_birthplace') ?>

    <?php // echo $form->field($model, 'employee_birthdate') ?>

    <?php // echo $form->field($model, 'employee_age') ?>

    <?php // echo $form->field($model, 'employee_maritalstatus') ?>

    <?php // echo $form->field($model, 'employee_marrieddate') ?>

    <?php // echo $form->field($model, 'employee_familystatus') ?>

    <?php // echo $form->field($model, 'ptkp_id') ?>

    <?php // echo $form->field($model, 'employee_race') ?>

    <?php // echo $form->field($model, 'employee_religion') ?>

    <?php // echo $form->field($model, 'employee_nationality') ?>

    <?php // echo $form->field($model, 'employee_emailpersonal') ?>

    <?php // echo $form->field($model, 'employee_emailoffice') ?>

    <?php // echo $form->field($model, 'employee_kodetelepon') ?>

    <?php // echo $form->field($model, 'employee_telepon') ?>

    <?php // echo $form->field($model, 'employee_mobile1') ?>

    <?php // echo $form->field($model, 'employee_mobile2') ?>

    <?php // echo $form->field($model, 'employee_joindate') ?>

    <?php // echo $form->field($model, 'employee_jobstatus') ?>

    <?php // echo $form->field($model, 'employee_permanentdate') ?>

    <?php // echo $form->field($model, 'employee_contractduration') ?>

    <?php // echo $form->field($model, 'employee_contractexpired') ?>

    <?php // echo $form->field($model, 'employee_contracttype') ?>

    <?php // echo $form->field($model, 'employee_resigndate') ?>

    <?php // echo $form->field($model, 'employee_resignnote') ?>

    <?php // echo $form->field($model, 'employee_notactivedate') ?>

    <?php // echo $form->field($model, 'employee_foto') ?>

    <?php // echo $form->field($model, 'employee_fotoresize') ?>

    <?php // echo $form->field($model, 'employee_height') ?>

    <?php // echo $form->field($model, 'employee_weight') ?>

    <?php // echo $form->field($model, 'employee_tahun') ?>

    <?php // echo $form->field($model, 'employee_status') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
