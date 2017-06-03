<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use yii\web\View;
use nterms\pagesize\PageSize;
use kartik\export\ExportMenu;

/* @var $this yii\web\View */
/* @var $searchModel backend\master\models\HrJobjabatanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Hr Jobjabatan';
$this->params['breadcrumbs'][] = $this->title;


/*
 * Tombol Create
 *  create 
*/
function tombolCreate(){
      $title1 = Yii::t('app', 'New job Jabatan');
      $url = Url::toRoute(['/master/hr-group/create']);
      $options1 = [
                    'value'=>$url,
                    'id'=>'hrgroup-id-create',
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
  function tombolView($url, $model){
        $title = Yii::t('app', 'View');
        $icon = '<span class="fa fa-eye"></span>';
        $label = $icon . ' ' . $title;
        $url = Url::toRoute(['/master/hr-group/view','id'=>$model->jabatan_code]);
        $options1 = [
                    'id'=>'view-hrgroup-id',   
                    'data-toggle'=>"modal",
                    'data-target'=>"#modal-hrgroup-view",
                ];
        $content = Html::a($label,$url,$options1);
        return '<li>'.$content.'</li>'. PHP_EOL;
    }


/*
   * Tombol Update
  */
  function tombolUpdate($url, $model){
        $title = Yii::t('app', 'Update');
        $icon = '<span class="fa fa-edit"></span>';
        $label = $icon . ' ' . $title;
        $url = Url::toRoute(['/master/hr-group/update','id'=>$model->jabatan_code]);
        $options1 = [
                    'id'=>'update-hrgroup-id',   
                    'data-toggle'=>"modal",
                    'data-target'=>"#modal-group-update",
                ];
        $content = Html::a($label,$url,$options1);
        return '<li>'.$content.'</li>'. PHP_EOL;
    }


#status data jabatan_tanda
  function Status($model){
      if ($model->jabatan_tanda == 1 || $model->jabatan_tanda == 2 ){
            return html::label('<span class="fa fa-check fa-1x"></span>','',['style'=>['color'=>'green']]);
        }else if($model->jabatan_tanda == 3){
            return html::label('<span class="fa fa-times fa-1x"></span>','',['style'=>['color'=>'red']]);
       }
  }

/**
 * GRID Hr jobjabatan
 * @author wawan  [aditiya@lukison.com]
 * @since 1.0
*/
$attDinamik =[];
$headColomnBT=[
    ['ID' =>0, 'ATTR' =>['FIELD'=>'nameCompany','SIZE' => '30px','label'=>'Group','align'=>'left','warna'=>'73, 162, 182, 1','grp'=>true]],
    ['ID' =>1, 'ATTR' =>['FIELD'=>'nameCategory','SIZE' => '30px','label'=>'Kategori','align'=>'left','warna'=>'73, 162, 182, 1','grp'=>true]],
    ['ID' =>2, 'ATTR' =>['FIELD'=>'namegroupjabatan','SIZE' => '30px','label'=>'Jabatan Group','align'=>'left','warna'=>'73, 162, 182, 1','grp'=>true]],
    ['ID' =>3, 'ATTR' =>['FIELD'=>'jabatan_name','SIZE' => '30px','label'=>'Jabatan Name','align'=>'left','warna'=>'73, 162, 182, 1','grp'=>false]],
    ['ID' =>4, 'ATTR' =>['FIELD'=>'jabatan_code','SIZE' => '30px','label'=>'Jabatan Code','align'=>'left','warna'=>'73, 162, 182, 1','grp'=>false]],
    ['ID' =>5, 'ATTR' =>['FIELD'=>'jabatan_tanda','SIZE' => '30px','label'=>'status','align'=>'left','warna'=>'73, 162, 182, 1','grp'=>false]],
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

  if($value[$key]['FIELD'] == 'jabatan_tanda')
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
    }
    
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
<div class="hr-jobjabatan-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

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

  ?>


    <?= $grid_jobjabatan=GridView::widget([
        'id'=>'gv-hr-jabatan-id',
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'filterSelector' => 'select[name="per-page"]',  
        'filterRowOptions'=>['style'=>'background-color:rgba(97, 211, 96, 0.3); align:center'],
        'columns' => $attDinamik,
        'pjax'=>true,
        'pjaxSettings'=>[
          'options'=>[
              'enablePushState'=>false,
              'id'=>'gv-hr-jabatan-id',
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
