<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\master\models\HrJobjabatan */

$this->title = 'Create Hr Jobjabatan';
$this->params['breadcrumbs'][] = ['label' => 'Hr Jobjabatans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="hr-jobjabatan-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
