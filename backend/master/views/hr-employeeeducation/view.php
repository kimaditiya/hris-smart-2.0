<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\master\models\HrEmployeeeducation */

$this->title = $model->education_id;
$this->params['breadcrumbs'][] = ['label' => 'Hr Employeeeducations', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="hr-employeeeducation-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->education_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->education_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'education_id',
            'employee_identifikasi',
            'education_level',
            'education_institution',
            'education_majorin',
            'education_city',
            'education_startyear',
            'education_endyear',
            'education_tanda',
        ],
    ]) ?>

</div>
