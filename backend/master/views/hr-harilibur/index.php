<?php
use yii\helpers\Url;
use yii\bootstrap\Modal;
use yii\web\JsExpression;
use yii\web\View;
use yii\helpers\Html;
use backend\master\models\HrHarilibur;

$this->title = 'Hari Libur';


$urls = ['createlibur' => Url::toRoute(['/master/hr-harilibur/create'])]; // url
$this->registerJs(
        "var yiiOptions = ".\yii\helpers\Json::htmlEncode($urls).";",
        View::POS_HEAD,
        'yiiOptions'
    );

$JSCode = <<<EOF
function(start, end) {
	var dateTime2 = new Date(end);
	var dateTime1 = new Date(start);
	var tgl1 = moment(dateTime1).format("YYYY-MM-DD");
	var tgl2 = moment(dateTime2).subtract(1, "days").format("YYYY-MM-DD");
		$.get(yiiOptions.createlibur,{'tgl1':tgl1,'tgl2':tgl2},function(data){
						$('#modal').modal('show')
						.find('#modalContent').html('<i class=\"fa fa-2x fa-spinner fa-spin\"></i>')
						.html(data);
		});
}
EOF;

Modal::begin([
		  'header' => '<div style="float:left;margin-right:10px" class="fa fa-2x fa-plus"></div><div><h4 class="modal-title">'.Html::encode('Create Hari Libur').'</h4></div>', 
     // 'size' => Modal::SIZE_, 
         'headerOptions'=>[
         		'id' => 'modalHeader',
                 'style'=> 'border-radius:5px; background-color: rgba(90, 171, 255, 0.7)',    
         ],
	'id' => 'modal',
	'size' => 'modal-sm',
	//keeps from closing modal with esc key or by clicking out of the modal.
	// user must click cancel or X to close
	// 'clientOptions' => ['backdrop' => 'static', 'keyboard' => FALSE]
]);
echo "<div id='modalContent'></div>";
Modal::end();

?>

<?= yii2fullcalendar\yii2fullcalendar::widget([
      'options' => [
        'lang' => 'en',
        //... more options to be defined here!
      ],
      'ajaxEvents' => Url::to(['/master/hr-harilibur/calender-libur']),
      'clientOptions' => [
			'selectable' => true,
			'selectHelper' => true,
			// 'droppable' => true,
			// 'editable' => true,
			//'drop' => new JsExpression($JSDropEvent),
			// 'selectHelper'=>true,
			'select' => new JsExpression($JSCode),
			// 'eventClick' => new JsExpression($JSCode),
			//'defaultDate' => date('Y-m-d')
		],
    ]);
?>