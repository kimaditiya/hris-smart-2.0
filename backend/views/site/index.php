<?php
use ptrnov\fusionchart\ChartAsset;
use yii\web\View;
use yii\helpers\Json;
ChartAsset::register($this); // asset chart

/* @var $this yii\web\View */
$this->title = 'Smart';

?>
<div class="row">
	<div class="col-sm-6">
			<div id="chartContainer"></div>
		</div>
	<div class="col-sm-6">
		<div id="chartContainer-martial"></div>
	</div>
</div>

<div class="row" style="margin-top: 20px">
    <div class="col-sm-6">
        <div id="chart-Container-education"></div>
    </div>
</div>
<?php

    $result = [
        'data_result' =>$result_gender,
        'data_martial'=>$result_martial,
        'data_education'=>$result_education
        ];

    $this->registerJs(
        "var yiioptions = ".Json::Encode($result).";",
        View::POS_HEAD,
        'yiioptions'
    );
$this->registerJs($this->render('chart_gender.js'),View::POS_READY); // js all branch
