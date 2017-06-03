<?php
use yii\web\JsExpression;
use yii\web\View;
use yii\helpers\Url;
use kartik\widgets\Spinner;

$this->title = 'Setting Member';
?>
<div class="row">
	<div class="col-sm-6">
		
<?php

echo \wbraganca\fancytree\FancytreeWidget::widget([
	'id'=>'tree',
	'options' =>[
		'source' => $data_tree,
		'extensions' => ['dnd','wide','filter',"glyph",'childcounter'],
		' aria'=> true,
		 'childcounter'=> [
		        'deep'=> true,
		        'hideZeros'=> true,
		        'hideExpanded'=> true
      ],
		 'themeroller'=> [
		        'addClass'=> "Flick",  // no rounded corners
		        'selectedClass'=> "ui-state-active"
		      ],
		'dnd' => [
			
			'preventVoidMoves' => true,
			'preventRecursiveMoves' => true,
			'autoExpandMS' => 400,
			'dragStart' => new JsExpression('function(node, data) {
				return true;
			}'),
			'dragEnter' => new JsExpression('function(node, data) {
				return true;
			}'),
			'dragDrop' => new JsExpression('function(node, data) {
				data.otherNode.moveTo(node, data.hitMode);
			}'),
		],
	]
]);

#spinner_loading
  $loading_spinner = Spinner::widget(['preset' => 'large', 'align' => 'center','color' => 'blue', 'caption' => 'Loading','id'=>'member-loading-id','hidden'=>true]);
?>
	</div>
	
	<div class="col-sm-6">
	<?= $loading_spinner ?>
	<div id="output" class="jumbotron">
		  <p class="text-center">Mapping Hierarchy</p> 
	</div>

	</div>
</div>

<?php

 $urls = [
        'setmember' => Url::toRoute(['/hierarchy/set-hirachy/view-member']),
        ];
    $this->registerJs(
        "var yiiOptions = ".\yii\helpers\Json::htmlEncode($urls).";",
        View::POS_HEAD,
        'yiiOptions'
    );

$this->registerJs($this->render('tree.js'),View::POS_READY); // js all tree