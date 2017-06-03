<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use kartik\label\LabelInPlace;


/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */


$this->title = 'Log In';

$config = ['template'=>"{input}\n{error}\n{hint}"]; // config to deactivate label for ActiveField

?>

<div class="login-box">
    <div class="login-logo">
        <a href="#"><b>Hris</b>Smart</a>
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">
        <p class="login-box-msg">Login</p>

        <?php $form = ActiveForm::begin(['id' => 'login-form', 'enableClientValidation' => false]); ?>

        <?= $form->field($model, 'nik', $config)->widget(LabelInPlace::classname(),[
            'label'=>'<i class="fa fa-user-o"></i> NIK',
             'encodeLabel'=>false,
             'pluginOptions'=>[
                'labelPosition'=>'down',
                'labelArrowDown'=>' <i class="glyphicon glyphicon-chevron-down"></i>',
                'labelArrowUp'=>' <i class="glyphicon glyphicon-chevron-up"></i>',
                'labelArrowRight'=>' <i class="glyphicon glyphicon-chevron-right"></i>',
            ]

            ]);  ?>

        <?= $form
            ->field($model, 'password')
            ->label(false)
            ->passwordInput(['data-toggle'=>'password','placeholder'=>'Password']) ?>

        <div class="row">
            <div class="col-xs-8">
                
            </div>
            <!-- /.col -->
            <div class="col-xs-4">
                <?= Html::submitButton('Login', ['class' => 'btn btn-primary btn-block btn-flat', 'name' => 'login-button']) ?>
            </div>
            <!-- /.col -->
        </div>


        <?php ActiveForm::end(); ?>


    </div>
    <!-- /.login-box-body -->
</div><!-- /.login-box -->

