<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\master\models\HrEmployeeeducationSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Hr Employeeeducations';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="hr-employeeeducation-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Hr Employeeeducation', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'education_id',
            'employee_identifikasi',
            'education_level',
            'education_institution',
            'education_majorin',
            // 'education_city',
            // 'education_startyear',
            // 'education_endyear',
            // 'education_tanda',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
