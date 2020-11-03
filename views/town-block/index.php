<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\User;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TownBlockSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('yii', 'Маҳаллалар');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="town-block-index">

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
    <?php if(User::isTheCreator() || User::isAdmin() || User::isRespublikaRaisi() || User::isRespublikaHodimi()):
    ?>
    <?php $region = \yii\helpers\ArrayHelper::map(\app\models\Region::find()->all(), 'id', 'name'); ?>
    <?php $city = \yii\helpers\ArrayHelper::map(\app\models\City::find()->all(), 'id', 'name'); ?>
    <?= GridView::widget([
        'options' => ['class' => 'grid-view table-responsive'],
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'tableOptions' => [
            'class' => 'table table-bordered table-condensed table-hover',
        ],
        'columns' => [
            [
              'class' => 'yii\grid\SerialColumn',
              // # rishotka o'rniga tartib raqam qo'yildi
              'header'=> Html::a(Yii::t('yii','t\r')), 
              // tepa qismi
              'headerOptions' => ['class' => 'info text-center'],
              // qidirishning chekkalariga ishlov berish
              'filterOptions' => ['class' => 'success'],
              // tartib raqamlar
              'contentOptions' =>['class' => 'warning text-center'],
              // Katakcha chizig'i
              'options' => ['class' => 'table-bordered'],
            ],
              [
                'filter' => $region,
                'label'=> Yii::t('yii', 'Viloyat'),
                'attribute'=>'region_id',
                'format' => 'html',
                'value'=> function ($model)
                {
                  return $model->region->name;
                },
              ],

              [
                'filter' => $city,
                'label'=> Yii::t('yii', 'Tuman'),
                'attribute'=>'city_id',
                'format' => 'html',
                'value'=> function ($model)
                {
                  return $model->city->name;
                },
              ],
            'name',
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
                    ],
                ],
            ],
        ]); ?>
    <?php  endif;?>

    <?php if(User::isViloyatRaisi() || User::isViloyatHodimi()):
    ?>

   <?php $region = Yii::$app->user->identity['region_id']?>
   
    <?php
        $cities = \yii\helpers\ArrayHelper::map(\app\models\City::findAll(['region_id' => $region]), 'id', 'name');
    ?>

    <?= GridView::widget([
        'options' => ['class' => 'grid-view table-responsive'],
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'tableOptions' => [
            'class' => 'table table-bordered table-condensed table-hover',
        ],
        'columns' => [
            [
              'class' => 'yii\grid\SerialColumn',
              // # rishotka o'rniga tartib raqam qo'yildi
              'header'=> Html::a(Yii::t('yii','t\r')), 
              // tepa qismi
              'headerOptions' => ['class' => 'info text-center'],
              // qidirishning chekkalariga ishlov berish
              'filterOptions' => ['class' => 'success'],
              // tartib raqamlar
              'contentOptions' =>['class' => 'warning text-center'],
              // Katakcha chizig'i
              'options' => ['class' => 'table-bordered'],
            ],

              [
                'filter' => $cities,
                'label'=> Yii::t('yii', 'Tuman'),
                'attribute'=>'city_id',
                'format' => 'html',
                'value'=> function ($model)
                {
                  return $model->city->name;
                },
              ],
            'name',
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
                    ],
                ],
            ],
        ]); ?>
    <?php  endif;?>

     <?php if(User::isTumanRaisi() || User::isTumanHodimi()):
    ?>

    <?= GridView::widget([
        'options' => ['class' => 'grid-view table-responsive'],
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'tableOptions' => [
            'class' => 'table table-bordered table-condensed table-hover',
        ],
        'columns' => [
            [
              'class' => 'yii\grid\SerialColumn',
              // # rishotka o'rniga tartib raqam qo'yildi
              'header'=> Html::a(Yii::t('yii','t\r')), 
              // tepa qismi
              'headerOptions' => ['class' => 'info text-center'],
              // qidirishning chekkalariga ishlov berish
              'filterOptions' => ['class' => 'success'],
              // tartib raqamlar
              'contentOptions' =>['class' => 'warning text-center'],
              // Katakcha chizig'i
              'options' => ['class' => 'table-bordered'],
            ],
            
            'name',
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
                    ],
                ],
            ],
        ]); ?>
    <?php  endif;?>
</div>
        </div>
      </div>

      <div class="clearfix"></div>

    </div>
  </div>
</div>