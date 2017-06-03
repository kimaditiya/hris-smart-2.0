<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\helpers\ArrayHelper;
use nterms\pagesize\PageSize;
use yii\helpers\Url;
use yii\web\View;


/*
 * Tombol Create
 *  create 
*/
function tombolCreate($id) : string 
{
  $title1 = Yii::t('app', 'New Hierarchy');
  $url = Url::toRoute(['/hierarchy/set-hirachy/create','id'=>$id]);
  $options1 = [
    'value'=>$url,
    'id'=>'hr-hirachy-id-create',
    'class'=>"btn btn-info btn-xs"  
  ];
  $icon1 = '<span class="fa fa-plus fa-lg"></span>';
  
  $label1 = $icon1 . ' ' . $title1;
  $content = Html::button($label1,$options1);
  return $content;
}



/**
 * GRID Hr Hirachy
 * @author wawan  [aditiya@lukison.com]
 * @since 1.0.0
*/
$attDinamik =[];
$headColomnBT=[
    ['ID' =>0, 'ATTR' =>['FIELD'=>'nameHirachy','SIZE' => '30px','label'=>'Hierarchy','align'=>'left','warna'=>'73, 162, 182, 1','grp'=>true]],
    ['ID' =>1, 'ATTR' =>['FIELD'=>'kd_ref','SIZE' => '30px','label'=>'Refensi Name','align'=>'left','warna'=>'73, 162, 182, 1','grp'=>true]],
    ];
$gvHeadColomnBT = ArrayHelper::map($headColomnBT, 'ID', 'ATTR');
$attDinamik[] =[
  'class'=>'kartik\grid\SerialColumn',
  //'contentOptions'=>['class'=>'kartik-sheet-style'],
  'width'=>'10px',
  'header'=>'No.',
  'headerOptions'=>[
    'style'=>[
      'text-align'=>'center',
      'width'=>'10px',
      'font-family'=>'verdana, arial, sans-serif',
      'font-size'=>'9pt',
      'background-color'=>'rgba(73, 162, 182, 1)',
    ]
  ],
  'contentOptions'=>[
    'style'=>[
      'text-align'=>'center',
      'width'=>'10px',
      'font-family'=>'tahoma, arial, sans-serif',
      'font-size'=>'9pt',
    ]
  ],
];
foreach($gvHeadColomnBT as $key =>$value[]){
      # code...
    $attDinamik[]=[
      'attribute'=>$value[$key]['FIELD'],
      'label'=>$value[$key]['label'],
      'filter'=>true,
      'hAlign'=>'right',
      'vAlign'=>'middle',
      'noWrap'=>true,
      'group'=>$value[$key]['grp'],
      'headerOptions'=>[
          'style'=>[
          'text-align'=>'center',
          'width'=>$value[$key]['SIZE'],
          'font-family'=>'tahoma, arial, sans-serif',
          'font-size'=>'8pt',
          'background-color'=>'rgba('.$value[$key]['warna'].')',
        ]
      ],
      'contentOptions'=>[
        'style'=>[
          'width'=>$value[$key]['SIZE'],
          'text-align'=>$value[$key]['align'],
          'font-family'=>'tahoma, arial, sans-serif',
          'font-size'=>'8pt',
        ]
      ],
    ];
};

  /*GRIDVIEW ARRAY ACTION*/
  $actionClass='btn btn-info btn-xs';
  $actionLabel='Action';
  $attDinamik[]=[
    'class'=>'kartik\grid\ActionColumn',
    'dropdown' => true,
    'template' => '{view}{update}{delete}',
    'dropdownOptions'=>['class'=>'pull-right dropup','style'=>['disable'=>true]],
    'dropdownButton'=>['class'=>'btn btn-default btn-xs'],
    'dropdownButton'=>[
      'class' => $actionClass,
      'label'=>$actionLabel,
      'caret'=>'<span class="caret"></span>',
    ],
     'buttons' => [
          // 'view' => function ($url, $model) {
          //         return tombolView($url, $model);
          //       },
          // 'update' => function ($url, $model) {
          //         return tombolUpdate($url, $model);
          //       },
          // 'review' => function($url,$model){
          //         return tombolReview($url,$model);
          // }
    ],
    'headerOptions'=>[
      'style'=>[
        'text-align'=>'center',
        'width'=>'10px',
        'font-family'=>'tahoma, arial, sans-serif',
        'font-size'=>'9pt',
        'background-color'=>'rgba(73, 162, 182, 1)',
      ]
    ],
    'contentOptions'=>[
      'style'=>[
        'text-align'=>'center',
        'width'=>'10px',
        'height'=>'10px',
        'font-family'=>'tahoma, arial, sans-serif',
        'font-size'=>'9pt',
      ]
    ],
  ];


// pagination
$page = PageSize::widget();
?>

<?= $grid_hirachy =GridView::widget([
    'id'=>'gv-hr-hirachy-id',
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'filterSelector' => 'select[name="per-page"]',  
    'filterRowOptions'=>['style'=>'background-color:rgba(97, 211, 96, 0.3); align:center'],
    'columns' => $attDinamik,
    'pjax'=>true,
    'pjaxSettings'=>[
      'options'=>[
          'enablePushState'=>false,
          'id'=>'gv-hr-hirachy-id',
      ],
    ],
    'panel' => [
          'heading'=>'',
          'type'=>'info',
          'before'=>tombolCreate($kd_source),
          'showFooter'=>false,
    ],
    /* 'export' =>['target' => GridView::TARGET_BLANK],
    'exportConfig' => [
      GridView::PDF => [ 'filename' => 'kategori'.'-'.date('ymdHis') ],
      GridView::EXCEL => [ 'filename' => 'kategori'.'-'.date('ymdHis') ],
    ], */
    'toolbar'=> [
        ['content'=>$page,
        ],
        // '{export}',
        // '{toggleData}',
          //'{export}',
      //'{items}',
    ],
      
    'hover'=>true, //cursor select
    'responsive'=>true,
    'responsiveWrap'=>true,
    'bordered'=>true,
    'striped'=>true,
  ]);

echo \Yii::$app->view->renderFile('@backend/Hierarchy/views/set-hirachy/modal_member.php'); // view modal
$this->registerJs($this->render('all_member.js'),View::POS_READY); // js all branch
?>

