<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use yii\web\View;
use nterms\pagesize\PageSize;
use kartik\export\ExportMenu;
use mdm\admin\components\Helper;

/* @var $this yii\web\View */
/* @var $searchModel backend\sistem\models\HrEmployeelogSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'User Login';
$this->params['breadcrumbs'][] = $this->title;

/*
 * Tombol Create
 *  create 
*/
function tombolCreate() : string {
      $title1 = Yii::t('app', 'New User');
      $url = Url::toRoute(['/sistem/hr-employeelog/create']);
      $options1 = [
                    'value'=>$url,
                    'id'=>'employeelog-id-create',
                    'class'=>"btn btn-info btn-xs"  
      ];
      $icon1 = '<span class="fa fa-plus fa-lg"></span>';
      
      $label1 = $icon1 . ' ' . $title1;
      $content = Html::button($label1,$options1);
      return $content;
     }

/*
   * Tombol View
  */
  function tombolView($url, $model) : string {
        $title = Yii::t('app', 'View');
        $icon = '<span class="fa fa-eye"></span>';
        $label = $icon . ' ' . $title;
        $url = Url::toRoute(['/sistem/hr-employeelog/view','id'=>$model->log_id]);
        $options1 = [
                    'id'=>'view-employeelog-id',   
                    'data-toggle'=>"modal",
                    'data-target'=>"#modaluser-view",
                ];
        $content = Html::a($label,$url,$options1);
        return '<li>'.$content.'</li>'. PHP_EOL;
    }


    /*
   * Tombol Update
  */
  function tombolUpdate($url, $model) : string {
        $title = Yii::t('app', 'Update');
        $icon = '<span class="fa fa-edit"></span>';
        $label = $icon . ' ' . $title;
        $url = Url::toRoute(['/sistem/hr-employeelog/update','id'=>$model->log_id]);
        $options1 = [
                    'id'=>'update-employeelog-id',   
                    'data-toggle'=>"modal",
                    'data-target'=>"#modaluser-update",
                ];
        $content = Html::a($label,$url,$options1);
        return '<li>'.$content.'</li>'. PHP_EOL;
    }


     #status data log
  function Status($model) : string {
      if ($model->log_tanda == 1){
            return html::label('<span class="fa fa-check fa-1x"></span>','',['style'=>['color'=>'green']]);
        }else if($model->log_tanda == 2){
            return html::label('<span class="fa fa-sign-out fa-1x"></span>','',['style'=>['color'=>'blue']]);
       }
  }

/**
 * GRID  User login
 * @author wawan  [aditiya@lukison.com]
 * @since 1.0
*/
$attDinamik =[];
$headColomnBT=[
    ['ID' =>0, 'ATTR' =>['FIELD'=>'nameEmploye','SIZE' => '30px','label'=>'Username','align'=>'left','warna'=>'73, 162, 182, 1','grp'=>false]],
    ['ID' =>1, 'ATTR' =>['FIELD'=>'employee_nik','SIZE' => '30px','label'=>'NIK','align'=>'left','warna'=>'73, 162, 182, 1','grp'=>false]],
    ['ID' =>2, 'ATTR' =>['FIELD'=>'log_tanda','SIZE' => '30px','label'=>'Status Log','align'=>'left','warna'=>'73, 162, 182, 1','grp'=>false]],
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

  if($value[$key]['FIELD'] == 'log_tanda')
  {
    $attDinamik[]=[
        'attribute'=>$value[$key]['FIELD'],
        'label'=>$value[$key]['label'],
        'filterType'=>GridView::FILTER_SELECT2,
        'filter' => $valStt,
        'filterWidgetOptions'=>[
          'pluginOptions'=>['allowClear'=>true],
        ],
        'filterInputOptions'=>['placeholder'=>'Pilih'],
         'format' => 'raw',
        'value'=>function($model){
                  return status($model);
                },
        'hAlign'=>'right',
        'vAlign'=>'middle',
        'noWrap'=>true,
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
  }else{
        $attDinamik[]=[
          'attribute'=>$value[$key]['FIELD'],
          'label'=>$value[$key]['label'],
          'filter'=>true,
          'hAlign'=>'right',
          'vAlign'=>'middle',
          'noWrap'=>true,
          //'group'=>$value[$key]['grp'],
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
    }
    
  };

  /*GRIDVIEW ARRAY ACTION*/
  $actionClass='btn btn-info btn-xs';
  $actionLabel='Action';
  $attDinamik[]=[
    'class'=>'kartik\grid\ActionColumn',
    'dropdown' => true,
    'template' => Helper::filterActionColumn('{view}{update}{delete}'),
    'dropdownOptions'=>['class'=>'pull-right dropup','style'=>['disable'=>true]],
    'dropdownButton'=>['class'=>'btn btn-default btn-xs'],
    'dropdownButton'=>[
      'class' => $actionClass,
      'label'=>$actionLabel,
      'caret'=>'<span class="caret"></span>',
    ],
     'buttons' => [
        /* View PO | Permissian All */
          'view' => function ($url, $model) {
                  return tombolView($url, $model);
                },
          'update' => function ($url, $model) {
                  return tombolUpdate($url, $model);
                },
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
  

?>
<div class="hr-employeelog-index">


    <h1><?= Html::encode($this->title) ?></h1>


  <?php
  // pagination
  $page = PageSize::widget();

    // Renders a export dropdown menu
   $export_menu =  ExportMenu::widget([
      'dataProvider' => $dataProvider,
      'columns' => $grid_export,
      'target'=>ExportMenu::TARGET_BLANK,
      'exportConfig'=>[
          'fontAwesome'=>true
          ]
  ]);

   // if(Helper::checkRoute('create')){
   //   $tombol_create = tombolCreate();
   // }else{
   //  $tombol_create = '';
   // }

  ?>


<?= $gvemployeelog=GridView::widget([
    'id'=>'gv-employeelog-id',
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'filterSelector' => 'select[name="per-page"]',  
    'filterRowOptions'=>['style'=>'background-color:rgba(97, 211, 96, 0.3); align:center'],
    'columns' => $attDinamik,
    'pjax'=>true,
    'pjaxSettings'=>[
      'options'=>[
          'enablePushState'=>false,
          'id'=>'gv-employeelog-id',
      ],
    ],
    'panel' => [
          'heading'=>$export_menu,
          'type'=>'info',
          'before'=>tombolCreate(),
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
?>

</div>

<?php
echo \Yii::$app->view->renderFile('@backend/sistem/views/hr-employeelog/modal_user.php'); // view modal


$this->registerJs($this->render('all_user.js'),View::POS_READY); // js all user