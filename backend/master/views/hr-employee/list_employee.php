<?php
use yii\helpers\Html;
use kartik\grid\GridView;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use yii\web\View;
use nterms\pagesize\PageSize;
use kartik\export\ExportMenu;


#status data employee_jobstatus
  function Status_job($model) : string {
      if ($model->employee_jobstatus == 1){
          return html::label('<span class="fa fa-check fa-1x">Probation</span>','',['style'=>['color'=>'blue']]);
        }else if($model->employee_jobstatus == 2){
          return html::label('<span class="fa fa-check fa-1x">Contract</span>','',['style'=>['color'=>'green']]);
       }else{
        return html::label('<span class="fa fa-check fa-1x">Permanent</span>','',['style'=>['color'=>'red']]);
       }
  }

  #status data employee_gender
  function Status_gender($model) : string {
      if ($model->employee_gender == 1){
          return html::label('<span class="fa fa-check fa-1x">Male</span>','',['style'=>['color'=>'blue']]);
        }else{
        return html::label('<span class="fa fa-check fa-1x">Female</span>','',['style'=>['color'=>'red']]);
       }
  }

  #status data employee_gender
function Status_Education($model) : string {
    if($model->nameEducation == 1){
        return 'SD';
    }elseif($model->nameEducation == 2){
        return 'SMP';
    }elseif ($model->nameEducation == 3) {
        # code...
        return 'SMA';
    }elseif ($model->nameEducation == 4) {
        # code...
        return 'S1';
    }elseif ($model->nameEducation == 5) {
        # code...
        return 'S2';
    }elseif ($model->nameEducation == 6) {
        # code...
        return 'S3';
    }elseif ($model->nameEducation == 7) {
        # code...
        return 'SMK';
    }elseif ($model->nameEducation == 8) {
        # code...
        return 'D1';
    }elseif ($model->nameEducation == 9) {
        # code...
        return 'D2';
    }else{
        # code...
        return 'D3';
    }
}


  
  #status data employee_maritalstatus
function Status_maritalstatus($model) : string {
    if($model->employee_maritalstatus == 1){
        return 'Single';
    }elseif($model->employee_maritalstatus == 2){
        return 'Married';
    }else{
        # code...
        return 'Widow';
    }
}


/**
 * GRID Hr employee
 * @author wawan  [aditiya@lukison.com]
 * @since 1.0
*/ 
$attDinamik =[];
$headColomnBT=[
    ['ID' =>0, 'ATTR' =>['FIELD'=>'employee_nik','SIZE' => '30px','label'=>'NIK','align'=>'left','warna'=>'73, 162, 182, 1','grp'=>true]],
    ['ID' =>1, 'ATTR' =>['FIELD'=>'employee_name','SIZE' => '30px','label'=>'Name','align'=>'left','warna'=>'73, 162, 182, 1','grp'=>false]],
    ['ID' =>2, 'ATTR' =>['FIELD'=>'nameCompany','SIZE' => '30px','label'=>'Company','align'=>'left','warna'=>'73, 162, 182, 1','grp'=>true]],
    ['ID' =>3, 'ATTR' =>['FIELD'=>'employee_joindate','SIZE' => '30px','label'=>'Join Date','align'=>'left','warna'=>'73, 162, 182, 1','grp'=>false]],
    ['ID' =>4, 'ATTR' =>['FIELD'=>'employee_resigndate','SIZE' => '30px','label'=>'Resign Date','align'=>'left','warna'=>'73, 162, 182, 1','grp'=>false]],
    ['ID' =>5, 'ATTR' =>['FIELD'=>'employee_jobstatus','SIZE' => '30px','label'=>'Status Working','align'=>'left','warna'=>'73, 162, 182, 1','grp'=>false]],
    ['ID' =>5, 'ATTR' =>['FIELD'=>'employee_contractexpired','SIZE' => '30px','label'=>'Contract Expired','align'=>'left','warna'=>'73, 162, 182, 1','grp'=>false]],
    ['ID' =>6, 'ATTR' =>['FIELD'=>'employee_gender','SIZE' => '30px','label'=>'Gender','align'=>'left','warna'=>'73, 162, 182, 1','grp'=>false]],
    ['ID' =>7, 'ATTR' =>['FIELD'=>'placeBrith','SIZE' => '30px','label'=>'Birth Place','align'=>'left','warna'=>'73, 162, 182, 1','grp'=>false]],
    ['ID' =>8, 'ATTR' =>['FIELD'=>'employee_birthdate','SIZE' => '30px','label'=>'Birth Date','align'=>'left','warna'=>'73, 162, 182, 1','grp'=>false]],
    ['ID' =>8, 'ATTR' =>['FIELD'=>'nameEducation','SIZE' => '30px','label'=>'Education','align'=>'left','warna'=>'73, 162, 182, 1','grp'=>false]],
    ['ID' =>9, 'ATTR' =>['FIELD'=>'employee_maritalstatus','SIZE' => '30px','label'=>'Martial Status','align'=>'left','warna'=>'73, 162, 182, 1','grp'=>false]],
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

  if($value[$key]['FIELD'] == 'employee_jobstatus')
  {
    $attDinamik[]=[
        'attribute'=>$value[$key]['FIELD'],
        'label'=>$value[$key]['label'],
        'filterType'=>GridView::FILTER_SELECT2,
        // 'filter' => $valStt,
        'filterWidgetOptions'=>[
          'pluginOptions'=>['allowClear'=>true],
        ],
        'filterInputOptions'=>['placeholder'=>'Pilih'],
         'format' => 'raw',
        'value'=>function($model){
                  return Status_job($model);
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
  }elseif($value[$key]['FIELD'] == 'nameCompany'){
    $attDinamik[]=[
        'attribute'=>$value[$key]['FIELD'],
        'label'=>$value[$key]['label'],
        'filterType'=>GridView::FILTER_SELECT2,
        // 'filter' => $data_branch,
        'filterWidgetOptions'=>[
          'pluginOptions'=>['allowClear'=>true],
        ],
        'filterInputOptions'=>['placeholder'=>'Pilih'],
         'format' => 'raw',
        'hAlign'=>'right',
        'vAlign'=>'middle',
        'group'=>$value[$key]['grp'],
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

  }elseif($value[$key]['FIELD'] == 'employee_gender'){
  	$attDinamik[]=[
        'attribute'=>$value[$key]['FIELD'],
        'label'=>$value[$key]['label'],
        'filterType'=>GridView::FILTER_SELECT2,
        // 'filter' => $valStt,
        'filterWidgetOptions'=>[
          'pluginOptions'=>['allowClear'=>true],
        ],
        'filterInputOptions'=>['placeholder'=>'Pilih'],
         'format' => 'raw',
        'value'=>function($model){
                  return Status_gender($model);
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
  }elseif($value[$key]['FIELD'] == 'nameEducation'){
  	$attDinamik[]=[
        'attribute'=>$value[$key]['FIELD'],
        'label'=>$value[$key]['label'],
        'filterType'=>GridView::FILTER_SELECT2,
        // 'filter' => $valStt,
        'filterWidgetOptions'=>[
          'pluginOptions'=>['allowClear'=>true],
        ],
        'filterInputOptions'=>['placeholder'=>'Pilih'],
         'format' => 'raw',
        'value'=>function($model){
                  return Status_Education($model);
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
  }elseif($value[$key]['FIELD'] == 'employee_maritalstatus'){
  	$attDinamik[]=[
        'attribute'=>$value[$key]['FIELD'],
        'label'=>$value[$key]['label'],
        'filterType'=>GridView::FILTER_SELECT2,
        // 'filter' => $valStt,
        'filterWidgetOptions'=>[
          'pluginOptions'=>['allowClear'=>true],
        ],
        'filterInputOptions'=>['placeholder'=>'Pilih'],
         'format' => 'raw',
        'value'=>function($model){
                  return Status_maritalstatus($model);
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
?>

  <?= $grid_direktorat=GridView::widget([
    'id'=>'gv-hr-employee-id',
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'filterSelector' => 'select[name="per-page"]',  
    'filterRowOptions'=>['style'=>'background-color:rgba(97, 211, 96, 0.3); align:center'],
    'columns' => $attDinamik,
    'pjax'=>true,
    'pjaxSettings'=>[
      'options'=>[
          'enablePushState'=>false,
          'id'=>'gv-hr-employee-id',
      ],
    ],
    'panel' => [
          'heading'=>'',
          'type'=>'info',
          'before'=>'',
          'showFooter'=>false,
    ],
    /* 'export' =>['target' => GridView::TARGET_BLANK],
    'exportConfig' => [
      GridView::PDF => [ 'filename' => 'kategori'.'-'.date('ymdHis') ],
      GridView::EXCEL => [ 'filename' => 'kategori'.'-'.date('ymdHis') ],
    ], */
    'toolbar'=> [
        ['content'=>'',
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