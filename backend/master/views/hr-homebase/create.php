<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\master\models\HrHomebase */

$this->title = 'Create Hr Homebase';
$this->params['breadcrumbs'][] = ['label' => 'Hr Homebases', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="hr-homebase-create">

    <?= $this->render('_form', [
        'model' => $model,
        'kode_homebase'=>$kode_homebase
    ]) ?>

</div>
