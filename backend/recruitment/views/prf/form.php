<?php

use yii\helpers\Html;
use kartik\widgets\ActiveForm;
use kartik\widgets\Select2;
use kartik\date\DatePicker;
use kartik\touchspin\TouchSpin;
use kartik\money\MaskMoney;
use kartik\builder\Form;


/* @var $this yii\web\View */
/* @var $model backend\sistem\models\HrEmployeelog */
/* @var $form yii\widgets\ActiveForm */
$list = [0 => 'Penambahan', 1 => 'Pengantian', 2 => 'Posisi Baru'];

$this->title = 'Test MockUp';
?>

<div class="hr-prf-form">

    <?php $form = ActiveForm::begin([
        'id'=>$model->formName(),
        'type' => ActiveForm::TYPE_HORIZONTAL,
        'formConfig' => ['labelSpan' => 3, 'deviceSize' => ActiveForm::SIZE_SMALL]

    ]); ?>

    <?= $form->field($model, 'noprf',['template' => '{label} <div class="row"><div class="col-sm-4">{input}{error}{hint}</div></div>'])->textInput(['readonly' => true,'value'=>'RCRYMM-xxxxxxx'])
        ->label('Nomer Permintaan Pengrekrutan') ?>

    <?= $form->field($model, 'tgl_request',['template' => '{label} <div class="row"><div class="col-sm-5">{input}{error}{hint}</div></div>'])->widget(DatePicker::classname(), [
        'options' => ['placeholder' => 'Enter date ...'],
        'pluginOptions' => [
            'autoclose'=>true
        ]
    ])->label('Tanggal Permintaan') ?>

    <?= $form->field($model, 'reason_request')->radio()->label('Alasan Permintaan'); ?>

    <?= $form->field($model, 'posisi',['template' => '{label} <div class="row"><div class="col-sm-5">{input}{error}{hint}</div></div>'])->widget(Select2::classname(), [
        'data' => $data_posisi,
        'options' => ['placeholder' => 'Select ...'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ])->label('Posisi') ?>

    <?= $form->field($model, 'jumlah_pegawai',['template' => '{label} <div class="row"><div class="col-sm-5">{input}{error}{hint}</div></div>'])->widget(TouchSpin::classname(), [
        'options' => ['placeholder' => 'jumlah pegawai ...'],
            'pluginOptions' => [
            'buttonup_class' => 'btn btn-primary', 
            'buttondown_class' => 'btn btn-info', 
            'buttonup_txt' => '<i class="glyphicon glyphicon-plus-sign"></i>', 
            'buttondown_txt' => '<i class="glyphicon glyphicon-minus-sign"></i>'
        ],
    ])->label('Jumlah pegawai yang Dibutuhkan') ?>

     <?= $form->field($model, 'tipe_pegawai',['template' => '{label} <div class="row"><div class="col-sm-5">{input}{error}{hint}</div></div>'])->widget(Select2::classname(), [
        'data' => $data_pegawai,
        'options' => ['placeholder' => 'Select ...'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ])->label('Tipe Kepegawaian') ?>

    <?= $form->field($model, 'efektif_date',['template' => '{label} <div class="row"><div class="col-sm-5">{input}{error}{hint}</div></div>'])->widget(DatePicker::classname(), [
        'options' => ['placeholder' => 'Enter date ...'],
        'pluginOptions' => [
            'autoclose'=>true
        ]
    ])->label('Tanggal Efektif') ?>


    <div class="row">
        <div class="col-sm-2">
            
        </div>
        <div class="col-sm-4">
    <?= $form->field($model, 'salary_start')->widget(MaskMoney::classname(), [
        'pluginOptions' => [
            'prefix' => 'Rp ',
            'allowNegative' => false
        ]
    ])->label('Rentang Gaji') ?>
    </div>

        <div class="col-sm-4">
        <?= $form->field($model, 'salary_end')->widget(MaskMoney::classname(), [
            'pluginOptions' => [
                'prefix' => 'Rp ',
                'allowNegative' => false
            ]
        ])->label(false) ?>
        </div>
    </div>

    <?= $form->field($model, 'reason_penerimaan')->radioList($list) ?>



    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
