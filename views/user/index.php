<?php
use app\helpers\CssHelper;
use yii\helpers\Html;
use yii\grid\GridView;
use app\models\User;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('yii', 'Фойдаланувчилар');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">
  <div class="">
    <div class="page-title">
      <div class="title_left">
       <p>
          <?= Html::a('<i class="fa fa-plus"></i>', ['create'], ['class' => 'btn btn-success','title'=>Yii::t('yii','Яратиш')]) ?>
          <?= Html::a('<i class="fa fa-home"></i>', ['/'], ['class' => 'btn btn-default','title'=>Yii::t('yii','Бош саҳифа')]) ?>
        </p>
      </div>

     <!--  <div class="title_right">
        <div class="col-md-5 col-sm-5   form-group pull-right top_search">
          <div class="input-group">
            <input type="text" class="form-control" placeholder="<?//=Yii::t('yii','Қидириш')?>...">
            <span class="input-group-btn">
              <button class="btn btn-default" type="button">OK</button>
            </span>
          </div>
        </div>
      </div> -->
    </div>

    <div class="clearfix"></div>

    <div class="row" style="display: block;">


      <div style="margin-bottom: 50px" class="col-md-12 col-sm-12">
        <div class="x_panel">
          <div class="x_title">
            <h2><?= Html::encode($this->title) ?></h2>
            <ul class="nav navbar-right panel_toolbox">
              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
              </li>
            </ul>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">

        <?php if(User::isTheCreator() || User::isAdmin()):?>
        <?= GridView::widget([
            'options' => ['class' => 'grid-view table-responsive'],
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'tableOptions' => [
                'class' => 'table table-bordered table-condensed table-hover table-responsive',
            ],
            'rowOptions' => function($model){
                    if($model->status == 1)
                      return [
                        'class' => 'danger'
                    ];
                    if($model->status == 10)
                      return [
                        'class' => 'active'
                    ];
                },
            'columns' => [
                [
                  'class' => 'yii\grid\SerialColumn',
                  // # rishotka o'rniga tartib raqam qo'yildi
                  'header'=> Html::a(Yii::t('yii','т\р')), 
                  // tepa qismi
                  'headerOptions' => ['class' => 'info text-center'],
                  // qidirishning chekkalariga ishlov berish
                  'filterOptions' => ['class' => 'success'],
                  // tartib raqamlar
                  'contentOptions' =>['class' => 'warning text-center'],
                  // Katakcha chizig'i
                  'options' => ['class' => 'table-bordered'],
                ],
                'second_name',
                'email:email',
                'passport',
                'phone',
                // status
                [
                    'attribute'=>'status',
                    'filter' => $searchModel->statusList,
                    'value' => function ($data) {
                        return $data->getStatusName($data->status);
                    },
                    'contentOptions'=>function($model, $key, $index, $column) {
                        return ['class'=>CssHelper::userStatusCss($model->status)];
                    }
                ],
                // role
                [
                    'attribute'=>'item_name',
                    'filter' => $searchModel->rolesList,
                    'value' => function ($data) {
                        return $data->roleName;
                    },
                    'contentOptions'=>function($model, $key, $index, $column) {
                        return ['class'=>CssHelper::roleCss($model->roleName)];
                    }
                ],
                // buttons
               [
                    'class' => 'yii\grid\ActionColumn',
                    'header'=> Html::a(Yii::t('yii','Меню')), 
                    'headerOptions' => ['class' => 'info text-center','width' => '128'],
                    'filterOptions' => ['class' => 'success text-center','width' => '128'],
                    'contentOptions' =>['class' => 'text-center','width' => '128',],
                    'template' => '{view} {update} {delete} {activate}',
                    'buttons' => [
                        'view' => function($url,$model){
                            return Html::a('<i class="ace-icon fa fa-eye bigger-130"></i>',['view','id' => $model->id],['title'=>Yii::t('yii','Кўриш'),'class'=>'dark text-black']);
                        },
                        'update' => function($url,$model){
                            return Html::a('<i class="ace-icon fa fa-pencil bigger-130"></i>',$url,['title'=>Yii::t('yii','Таҳрирлаш')]);
                        },
                        'delete' => function($url,$model){
                            return Html::a('<i class="ace-icon fa fa-trash-o bigger-130"></i>',$url,
                                [
                                    'title'=>Yii::t('yii','Ўчириш'),
                                    'data' => [
                                        'confirm' => Yii::t('yii','Сиз ростдан ҳам ушбу элементни ўчирмоқчимисиз?'),
                                        'method'=>'post'
                                    ],
                                    'class'=>'text-danger'
                                ]);
                        },
                        'activate' => function($url,$model,$key){
                            return Html::a('<i class="ace-icon fa fa-flag bigger-130"></i>',$url,['title'=>Yii::t('yii','Фаоллаштириш'),'class'=>'green text-success']);
                        },
                    ],
                ],
            ],
        ]); ?>
        <?php endif;?>
        <?php if(User::isRespublikaRaisi()):?>
        <?= GridView::widget([
            'options' => ['class' => 'grid-view table-responsive'],
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'tableOptions' => [
                'class' => 'table table-bordered table-condensed table-hover table-responsive',
            ],
            'rowOptions' => function($model){
                    if($model->status == 1)
                      return [
                        'class' => 'danger'
                    ];
                    if($model->status == 10)
                      return [
                        'class' => 'active'
                    ];
                },
            'columns' => [
                [
                  'class' => 'yii\grid\SerialColumn',
                  // # rishotka o'rniga tartib raqam qo'yildi
                  'header'=> Html::a(Yii::t('yii','т\р')), 
                  // tepa qismi
                  'headerOptions' => ['class' => 'info text-center'],
                  // qidirishning chekkalariga ishlov berish
                  'filterOptions' => ['class' => 'success'],
                  // tartib raqamlar
                  'contentOptions' =>['class' => 'warning text-center'],
                  // Katakcha chizig'i
                  'options' => ['class' => 'table-bordered'],
                ],
                'second_name',
                'email:email',
                'passport',
                'phone',
                [

                  'label'=> Yii::t('yii', 'Вилоят'),
                  'attribute'=>'region_id',
                  'format' => 'html',
                  'value'=> function ($model) 
                  {
                    if($model->region):
                      return $model->region->name;
                    else:
                      return Yii::t('yii', '(қийматланмаган)');
                    endif;
                  },
                ],

                [
                    'attribute'=>'status',
                    'filter' => $searchModel->statusList,
                    'value' => function ($data) {
                        return $data->getStatusName($data->status);
                    },
                    'contentOptions'=>function($model, $key, $index, $column) {
                        return ['class'=>CssHelper::userStatusCss($model->status)];
                    }
                ],
                // role
                [
                    'attribute'=>'item_name',
                    'filter' => $searchModel->rolesList,
                    'value' => function ($data) {
                        return $data->roleName;
                    },
                    'contentOptions'=>function($model, $key, $index, $column) {
                        return ['class'=>CssHelper::roleCss($model->roleName)];
                    }
                ],
                // buttons
               [
                    'class' => 'yii\grid\ActionColumn',
                    'header'=> Html::a(Yii::t('yii','Меню')), 
                    'headerOptions' => ['class' => 'info text-center','width' => '128'],
                    'filterOptions' => ['class' => 'success text-center','width' => '128'],
                    'contentOptions' =>['class' => 'text-center','width' => '128',],
                    'template' => '{view} {update} {delete} {activate}',
                    'buttons' => [
                        'view' => function($url,$model){
                            return Html::a('<i class="ace-icon fa fa-eye bigger-130"></i>',['view','id' => $model->id],['title'=>Yii::t('yii','Кўриш'),'class'=>'dark text-black']);
                        },
                        'update' => function($url,$model){
                            return Html::a('<i class="ace-icon fa fa-pencil bigger-130"></i>',$url,['title'=>Yii::t('yii','Таҳрирлаш')]);
                        },
                        'delete' => function($url,$model){
                            return Html::a('<i class="ace-icon fa fa-trash-o bigger-130"></i>',$url,
                                [
                                    'title'=>Yii::t('yii','Ўчириш'),
                                    'data' => [
                                        'confirm' => Yii::t('yii','Сиз ростдан ҳам ушбу элементни ўчирмоқчимисиз?'),
                                        'method'=>'post'
                                    ],
                                    'class'=>'text-danger'
                                ]);
                        },
                        'activate' => function($url,$model,$key){
                            return Html::a('<i class="ace-icon fa fa-flag bigger-130"></i>',$url,['title'=>Yii::t('yii','Фаоллаштириш'),'class'=>'green text-success']);
                        },
                    ],
                ],
            ],
        ]); ?>
        <?php endif;?>

         <?php if(User::isRespublikaHodimi()):?>
        <?= GridView::widget([
            'options' => ['class' => 'grid-view table-responsive'],
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'tableOptions' => [
                'class' => 'table table-bordered table-condensed table-hover table-responsive',
            ],
            'rowOptions' => function($model){
                    if($model->status == 1)
                      return [
                        'class' => 'danger'
                    ];
                    if($model->status == 10)
                      return [
                        'class' => 'active'
                    ];
                },
            'columns' => [
                [
                  'class' => 'yii\grid\SerialColumn',
                  // # rishotka o'rniga tartib raqam qo'yildi
                  'header'=> Html::a(Yii::t('yii','т\р')), 
                  // tepa qismi
                  'headerOptions' => ['class' => 'info text-center'],
                  // qidirishning chekkalariga ishlov berish
                  'filterOptions' => ['class' => 'success'],
                  // tartib raqamlar
                  'contentOptions' =>['class' => 'warning text-center'],
                  // Katakcha chizig'i
                  'options' => ['class' => 'table-bordered'],
                ],
                'second_name',
                'email:email',
                'passport',
                'phone',
                [

                  'label'=> Yii::t('yii', 'Вилоят'),
                  'attribute'=>'region_id',
                  'format' => 'html',
                  'value'=> function ($model) 
                  {
                    if($model->region):
                      return $model->region->name;
                    else:
                      return Yii::t('yii', '(қийматланмаган)');
                    endif;
                  },
                ],

                [
                    'attribute'=>'status',
                    'filter' => $searchModel->statusList,
                    'value' => function ($data) {
                        return $data->getStatusName($data->status);
                    },
                    'contentOptions'=>function($model, $key, $index, $column) {
                        return ['class'=>CssHelper::userStatusCss($model->status)];
                    }
                ],
                // role
                [
                    'attribute'=>'item_name',
                    'filter' => $searchModel->rolesList,
                    'value' => function ($data) {
                        return $data->roleName;
                    },
                    'contentOptions'=>function($model, $key, $index, $column) {
                        return ['class'=>CssHelper::roleCss($model->roleName)];
                    }
                ],
                // buttons
               [
                    'class' => 'yii\grid\ActionColumn',
                    'header'=> Html::a(Yii::t('yii','Меню')), 
                    'headerOptions' => ['class' => 'info text-center','width' => '128'],
                    'filterOptions' => ['class' => 'success text-center','width' => '128'],
                    'contentOptions' =>['class' => 'text-center','width' => '128',],
                    'template' => '{view} {update} {activate}',
                    'buttons' => [
                        'view' => function($url,$model){
                            return Html::a('<i class="ace-icon fa fa-eye bigger-130"></i>',['view','id' => $model->id],['title'=>Yii::t('yii','Кўриш'),'class'=>'dark text-black']);
                        },
                        'update' => function($url,$model){
                            return Html::a('<i class="ace-icon fa fa-pencil bigger-130"></i>',$url,['title'=>Yii::t('yii','Таҳрирлаш')]);
                        },
                        'activate' => function($url,$model,$key){
                            return Html::a('<i class="ace-icon fa fa-flag bigger-130"></i>',$url,['title'=>Yii::t('yii','Фаоллаштириш'),'class'=>'green text-success']);
                        },
                    ],
                ],
            ],
        ]); ?>
        <?php endif;?>

         <?php if(User::isViloyatRaisi()):?>
        <?= GridView::widget([
            'options' => ['class' => 'grid-view table-responsive'],
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'tableOptions' => [
                'class' => 'table table-bordered table-condensed table-hover table-responsive',
            ],
            'rowOptions' => function($model){
                    if($model->status == 1)
                      return [
                        'class' => 'danger'
                    ];
                    if($model->status == 10)
                      return [
                        'class' => 'active'
                    ];
                },
            'columns' => [
                [
                  'class' => 'yii\grid\SerialColumn',
                  // # rishotka o'rniga tartib raqam qo'yildi
                  'header'=> Html::a(Yii::t('yii','т\р')), 
                  // tepa qismi
                  'headerOptions' => ['class' => 'info text-center'],
                  // qidirishning chekkalariga ishlov berish
                  'filterOptions' => ['class' => 'success'],
                  // tartib raqamlar
                  'contentOptions' =>['class' => 'warning text-center'],
                  // Katakcha chizig'i
                  'options' => ['class' => 'table-bordered'],
                ],
                'second_name',
                'email:email',
                'passport',
                'phone',
                [
                  'label'=> Yii::t('yii', 'Туман'),
                  'attribute'=>'city_id',
                  'format' => 'html',
                  'value'=> function ($model) 
                  {
                    if($model->city):
                      return $model->city->name;
                    else:
                      return Yii::t('yii', '(қийматланмаган)');
                    endif;
                  },
                ],

                [
                    'attribute'=>'status',
                    'filter' => $searchModel->statusList,
                    'value' => function ($data) {
                        return $data->getStatusName($data->status);
                    },
                    'contentOptions'=>function($model, $key, $index, $column) {
                        return ['class'=>CssHelper::userStatusCss($model->status)];
                    }
                ],
                // role
                [
                    'attribute'=>'item_name',
                    'filter' => $searchModel->rolesList,
                    'value' => function ($data) {
                        return $data->roleName;
                    },
                    'contentOptions'=>function($model, $key, $index, $column) {
                        return ['class'=>CssHelper::roleCss($model->roleName)];
                    }
                ],
                // buttons
               [
                    'class' => 'yii\grid\ActionColumn',
                    'header'=> Html::a(Yii::t('yii','Меню')), 
                    'headerOptions' => ['class' => 'info text-center','width' => '128'],
                    'filterOptions' => ['class' => 'success text-center','width' => '128'],
                    'contentOptions' =>['class' => 'text-center','width' => '128',],
                    'template' => '{view} {update} {delete} {activate}',
                    'buttons' => [
                        'view' => function($url,$model){
                            return Html::a('<i class="ace-icon fa fa-eye bigger-130"></i>',['view','id' => $model->id],['title'=>Yii::t('yii','Кўриш'),'class'=>'dark text-black']);
                        },
                        'update' => function($url,$model){
                            return Html::a('<i class="ace-icon fa fa-pencil bigger-130"></i>',$url,['title'=>Yii::t('yii','Таҳрирлаш')]);
                        },
                        'delete' => function($url,$model){
                            return Html::a('<i class="ace-icon fa fa-trash-o bigger-130"></i>',$url,
                                [
                                    'title'=>Yii::t('yii','Ўчириш'),
                                    'data' => [
                                        'confirm' => Yii::t('yii','Сиз ростдан ҳам ушбу элементни ўчирмоқчимисиз?'),
                                        'method'=>'post'
                                    ],
                                    'class'=>'text-danger'
                                ]);
                        },
                        'activate' => function($url,$model,$key){
                            return Html::a('<i class="ace-icon fa fa-flag bigger-130"></i>',$url,['title'=>Yii::t('yii','Фаоллаштириш'),'class'=>'green text-success']);
                        },
                    ],
                ],
            ],
        ]); ?>
        <?php endif;?>

        <?php if(User::isViloyatHodimi()):?>
        <?= GridView::widget([
            'options' => ['class' => 'grid-view table-responsive'],
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'tableOptions' => [
                'class' => 'table table-bordered table-condensed table-hover table-responsive',
            ],
            'rowOptions' => function($model){
                    if($model->status == 1)
                      return [
                        'class' => 'danger'
                    ];
                    if($model->status == 10)
                      return [
                        'class' => 'active'
                    ];
                },
            'columns' => [
                [
                  'class' => 'yii\grid\SerialColumn',
                  // # rishotka o'rniga tartib raqam qo'yildi
                  'header'=> Html::a(Yii::t('yii','т\р')), 
                  // tepa qismi
                  'headerOptions' => ['class' => 'info text-center'],
                  // qidirishning chekkalariga ishlov berish
                  'filterOptions' => ['class' => 'success'],
                  // tartib raqamlar
                  'contentOptions' =>['class' => 'warning text-center'],
                  // Katakcha chizig'i
                  'options' => ['class' => 'table-bordered'],
                ],
                'second_name',
                'email:email',
                'passport',
                'phone',
                [
                  'label'=> Yii::t('yii', 'Туман'),
                  'attribute'=>'city_id',
                  'format' => 'html',
                  'value'=> function ($model) 
                  {
                    if($model->city):
                      return $model->city->name;
                    else:
                      return Yii::t('yii', '(қийматланмаган)');
                    endif;
                  },
                ],

                [
                    'attribute'=>'status',
                    'filter' => $searchModel->statusList,
                    'value' => function ($data) {
                        return $data->getStatusName($data->status);
                    },
                    'contentOptions'=>function($model, $key, $index, $column) {
                        return ['class'=>CssHelper::userStatusCss($model->status)];
                    }
                ],
                // role
                [
                    'attribute'=>'item_name',
                    'filter' => $searchModel->rolesList,
                    'value' => function ($data) {
                        return $data->roleName;
                    },
                    'contentOptions'=>function($model, $key, $index, $column) {
                        return ['class'=>CssHelper::roleCss($model->roleName)];
                    }
                ],
                // buttons
               [
                    'class' => 'yii\grid\ActionColumn',
                    'header'=> Html::a(Yii::t('yii','Меню')), 
                    'headerOptions' => ['class' => 'info text-center','width' => '128'],
                    'filterOptions' => ['class' => 'success text-center','width' => '128'],
                    'contentOptions' =>['class' => 'text-center','width' => '128',],
                    'template' => '{view} {update} {activate}',
                    'buttons' => [
                        'view' => function($url,$model){
                            return Html::a('<i class="ace-icon fa fa-eye bigger-130"></i>',['view','id' => $model->id],['title'=>Yii::t('yii','Кўриш'),'class'=>'dark text-black']);
                        },
                        'update' => function($url,$model){
                            return Html::a('<i class="ace-icon fa fa-pencil bigger-130"></i>',$url,['title'=>Yii::t('yii','Таҳрирлаш')]);
                        },
                        'activate' => function($url,$model,$key){
                            return Html::a('<i class="ace-icon fa fa-flag bigger-130"></i>',$url,['title'=>Yii::t('yii','Фаоллаштириш'),'class'=>'green text-success']);
                        },
                    ],
                ],
            ],
        ]); ?>
        <?php endif;?>

         <?php if(User::isTumanRaisi()):?>
        <?php $city = Yii::$app->user->identity['city_id']?>
        <?php
            $town_block = \yii\helpers\ArrayHelper::map(\app\models\TownBlock::findAll(['city_id' => $city]), 'id', 'name');
        ?>
        <?= GridView::widget([
            'options' => ['class' => 'grid-view table-responsive'],
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'tableOptions' => [
                'class' => 'table table-bordered table-condensed table-hover table-responsive',
            ],
            'rowOptions' => function($model){
                    if($model->status == 1)
                      return [
                        'class' => 'danger'
                    ];
                    if($model->status == 10)
                      return [
                        'class' => 'active'
                    ];
                },
            'columns' => [
                [
                  'class' => 'yii\grid\SerialColumn',
                  // # rishotka o'rniga tartib raqam qo'yildi
                  'header'=> Html::a(Yii::t('yii','т\р')), 
                  // tepa qismi
                  'headerOptions' => ['class' => 'info text-center'],
                  // qidirishning chekkalariga ishlov berish
                  'filterOptions' => ['class' => 'success'],
                  // tartib raqamlar
                  'contentOptions' =>['class' => 'warning text-center'],
                  // Katakcha chizig'i
                  'options' => ['class' => 'table-bordered'],
                ],
                'second_name',
                'email:email',
                'passport',
                'phone',
                [
                  'label'=> Yii::t('yii', 'Маҳалла'),
                  'attribute'=>'town_block_id',
                  'filter' => $town_block,
                  'format' => 'html',
                  'value'=> function ($model) 
                  {
                    if($model->townBlock):
                      return $model->townBlock->name;
                    else:
                      return Yii::t('yii', '(қийматланмаган)');
                    endif;
                  },
                ],

                [
                    'attribute'=>'status',
                    'filter' => $searchModel->statusList,
                    'value' => function ($data) {
                        return $data->getStatusName($data->status);
                    },
                    'contentOptions'=>function($model, $key, $index, $column) {
                        return ['class'=>CssHelper::userStatusCss($model->status)];
                    }
                ],
                // role
                [
                    'attribute'=>'item_name',
                    'filter' => $searchModel->rolesList,
                    'value' => function ($data) {
                        return $data->roleName;
                    },
                    'contentOptions'=>function($model, $key, $index, $column) {
                        return ['class'=>CssHelper::roleCss($model->roleName)];
                    }
                ],
                // buttons
               [
                    'class' => 'yii\grid\ActionColumn',
                    'header'=> Html::a(Yii::t('yii','Меню')), 
                    'headerOptions' => ['class' => 'info text-center','width' => '128'],
                    'filterOptions' => ['class' => 'success text-center','width' => '128'],
                    'contentOptions' =>['class' => 'text-center','width' => '128',],
                    'template' => '{view} {update} {delete} {activate}',
                    'buttons' => [
                        'view' => function($url,$model){
                            return Html::a('<i class="ace-icon fa fa-eye bigger-130"></i>',['view','id' => $model->id],['title'=>Yii::t('yii','Кўриш'),'class'=>'dark text-black']);
                        },
                        'update' => function($url,$model){
                            return Html::a('<i class="ace-icon fa fa-pencil bigger-130"></i>',$url,['title'=>Yii::t('yii','Таҳрирлаш')]);
                        },
                        'delete' => function($url,$model){
                          return Html::a('<i class="ace-icon fa fa-trash-o bigger-130"></i>',$url,
                              [
                                  'title'=>Yii::t('yii','Ўчириш'),
                                  'data' => [
                                      'confirm' => Yii::t('yii','Сиз ростдан ҳам ушбу элементни ўчирмоқчимисиз?'),
                                      'method'=>'post'
                                  ],
                                  'class'=>'text-danger'
                                ]);
                        },
                        'activate' => function($url,$model,$key){
                            return Html::a('<i class="ace-icon fa fa-flag bigger-130"></i>',$url,['title'=>Yii::t('yii','Фаоллаштириш'),'class'=>'green text-success']);
                        },
                    ],
                ],
            ],
        ]); ?>
        <?php endif;?>

        <?php if(User::isTumanHodimi()):?>
          <?php $city = Yii::$app->user->identity['city_id']?>
        <?php
            $town_block = \yii\helpers\ArrayHelper::map(\app\models\TownBlock::findAll(['city_id' => $city]), 'id', 'name');
        ?>
        <?= GridView::widget([
            'options' => ['class' => 'grid-view table-responsive'],
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'tableOptions' => [
                'class' => 'table table-bordered table-condensed table-hover table-responsive',
            ],
            'rowOptions' => function($model){
                    if($model->status == 1)
                      return [
                        'class' => 'danger'
                    ];
                    if($model->status == 10)
                      return [
                        'class' => 'active'
                    ];
                },
            'columns' => [
                [
                  'class' => 'yii\grid\SerialColumn',
                  // # rishotka o'rniga tartib raqam qo'yildi
                  'header'=> Html::a(Yii::t('yii','т\р')), 
                  // tepa qismi
                  'headerOptions' => ['class' => 'info text-center'],
                  // qidirishning chekkalariga ishlov berish
                  'filterOptions' => ['class' => 'success'],
                  // tartib raqamlar
                  'contentOptions' =>['class' => 'warning text-center'],
                  // Katakcha chizig'i
                  'options' => ['class' => 'table-bordered'],
                ],
                'second_name',
                'email:email',
                'passport',
                'phone',
                [
                  'label'=> Yii::t('yii', 'Маҳалла'),
                  'filter' => $town_block,
                  'attribute'=>'town_block_id',
                  'format' => 'html',
                  'value'=> function ($model) 
                  {
                    if($model->townBlock):
                      return $model->townBlock->name;
                    else:
                      return Yii::t('yii', '(қийматланмаган)');
                    endif;
                  },
                ],

                [
                    'attribute'=>'status',
                    'filter' => $searchModel->statusList,
                    'value' => function ($data) {
                        return $data->getStatusName($data->status);
                    },
                    'contentOptions'=>function($model, $key, $index, $column) {
                        return ['class'=>CssHelper::userStatusCss($model->status)];
                    }
                ],
                // role
                [
                    'attribute'=>'item_name',
                    'filter' => $searchModel->rolesList,
                    'value' => function ($data) {
                        return $data->roleName;
                    },
                    'contentOptions'=>function($model, $key, $index, $column) {
                        return ['class'=>CssHelper::roleCss($model->roleName)];
                    }
                ],
                // buttons
               [
                    'class' => 'yii\grid\ActionColumn',
                    'header'=> Html::a(Yii::t('yii','Меню')), 
                    'headerOptions' => ['class' => 'info text-center','width' => '128'],
                    'filterOptions' => ['class' => 'success text-center','width' => '128'],
                    'contentOptions' =>['class' => 'text-center','width' => '128',],
                    'template' => '{view} {update} {activate}',
                    'buttons' => [
                        'view' => function($url,$model){
                            return Html::a('<i class="ace-icon fa fa-eye bigger-130"></i>',['view','id' => $model->id],['title'=>Yii::t('yii','Кўриш'),'class'=>'dark text-black']);
                        },
                        'update' => function($url,$model){
                            return Html::a('<i class="ace-icon fa fa-pencil bigger-130"></i>',$url,['title'=>Yii::t('yii','Таҳрирлаш')]);
                        },
                        'activate' => function($url,$model,$key){
                            return Html::a('<i class="ace-icon fa fa-flag bigger-130"></i>',$url,['title'=>Yii::t('yii','Фаоллаштириш'),'class'=>'green text-success']);
                        },
                    ],
                ],
            ],
        ]); ?>
        <?php endif;?>

         <?php if(User::isMahhallaRaisi()):?>
         
        <?= GridView::widget([
            'options' => ['class' => 'grid-view table-responsive'],
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'tableOptions' => [
                'class' => 'table table-bordered table-condensed table-hover table-responsive',
            ],
            'rowOptions' => function($model){
                    if($model->status == 1)
                      return [
                        'class' => 'danger'
                    ];
                    if($model->status == 10)
                      return [
                        'class' => 'active'
                    ];
                },
            'columns' => [
                [
                  'class' => 'yii\grid\SerialColumn',
                  // # rishotka o'rniga tartib raqam qo'yildi
                  'header'=> Html::a(Yii::t('yii','т\р')), 
                  // tepa qismi
                  'headerOptions' => ['class' => 'info text-center'],
                  // qidirishning chekkalariga ishlov berish
                  'filterOptions' => ['class' => 'success'],
                  // tartib raqamlar
                  'contentOptions' =>['class' => 'warning text-center'],
                  // Katakcha chizig'i
                  'options' => ['class' => 'table-bordered'],
                ],
                'second_name',
                'email:email',
                'passport',
                'phone',

                [
                    'attribute'=>'status',
                    'filter' => $searchModel->statusList,
                    'value' => function ($data) {
                        return $data->getStatusName($data->status);
                    },
                    'contentOptions'=>function($model, $key, $index, $column) {
                        return ['class'=>CssHelper::userStatusCss($model->status)];
                    }
                ],
                // role
                [
                    'attribute'=>'item_name',
                    'filter' => $searchModel->rolesList,
                    'value' => function ($data) {
                        return $data->roleName;
                    },
                    'contentOptions'=>function($model, $key, $index, $column) {
                        return ['class'=>CssHelper::roleCss($model->roleName)];
                    }
                ],
                // buttons
               [
                    'class' => 'yii\grid\ActionColumn',
                    'header'=> Html::a(Yii::t('yii','Меню')), 
                    'headerOptions' => ['class' => 'info text-center','width' => '128'],
                    'filterOptions' => ['class' => 'success text-center','width' => '128'],
                    'contentOptions' =>['class' => 'text-center','width' => '128',],
                    'template' => '{view} {update} {delete} {activate}',
                    'buttons' => [
                        'view' => function($url,$model){
                            return Html::a('<i class="ace-icon fa fa-eye bigger-130"></i>',['view','id' => $model->id],['title'=>Yii::t('yii','Кўриш'),'class'=>'dark text-black']);
                        },
                         'delete' => function($url,$model){
                            return Html::a('<i class="ace-icon fa fa-trash-o bigger-130"></i>',$url,
                                [
                                    'title'=>Yii::t('yii','Ўчириш'),
                                    'data' => [
                                        'confirm' => Yii::t('yii','Сиз ростдан ҳам ушбу элементни ўчирмоқчимисиз?'),
                                        'method'=>'post'
                                    ],
                                    'class'=>'text-danger'
                                ]);
                        },
                        'update' => function($url,$model){
                            return Html::a('<i class="ace-icon fa fa-pencil bigger-130"></i>',$url,['title'=>Yii::t('yii','Таҳрирлаш')]);
                        },
                        'activate' => function($url,$model,$key){
                            return Html::a('<i class="ace-icon fa fa-flag bigger-130"></i>',$url,['title'=>Yii::t('yii','Фаоллаштириш'),'class'=>'green text-success']);
                        },
                    ],
                ],
            ],
        ]); ?>
        <?php endif;?>
          </div>
        </div>
      </div>

      <div class="clearfix"></div>

    </div>
  </div>
</div>