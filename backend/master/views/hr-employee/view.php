<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\master\models\HrEmployee */

$this->title = $model->employee_identifikasi;
$this->params['breadcrumbs'][] = ['label' => 'Hr Employees', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="hr-employee-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->employee_identifikasi], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->employee_identifikasi], [
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
            'employee_id',
            'employee_nik',
            'employee_nikhris',
            'employee_identifikasi',
            'employee_name',
            'smartgroup_code',
            'employee_gender',
            'employee_birthplace',
            'employee_birthdate',
            'employee_age',
            'employee_maritalstatus',
            'employee_marrieddate',
            'employee_familystatus',
            'ptkp_id',
            'employee_race',
            'employee_religion',
            'employee_nationality',
            'employee_emailpersonal:email',
            'employee_emailoffice:email',
            'employee_kodetelepon',
            'employee_telepon',
            'employee_mobile1',
            'employee_mobile2',
            'employee_joindate',
            'employee_jobstatus',
            'employee_permanentdate',
            'employee_contractduration',
            'employee_contractexpired',
            'employee_contracttype',
            'employee_resigndate',
            'employee_resignnote:ntext',
            'employee_notactivedate',
            'employee_foto',
            'employee_fotoresize',
            'employee_height',
            'employee_weight',
            'employee_tahun',
            'employee_status',
        ],
    ]) ?>

</div>
