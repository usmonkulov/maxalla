 <?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\User;

/* @var $this yii\web\View */
/* @var $searchModel app\search\PopulationSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('yii', 'Аҳолилар');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="population-index">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <p>
          <?= Html::a('<i class="fa fa-plus"></i>', ['create'], ['class' => 'btn btn-success','title'=>Yii::t('yii','Create')]) ?>
          <?= Html::a('<i class="fa fa-home"></i>', ['/'], ['class' => 'btn btn-default','title'=>Yii::t('yii','Home')]) ?>
        </p>
      </div>
    </div>

    <div class="clearfix"></div>

    <div class="row" style="display: block;">

      <div style="margin-bottom: 50px" class="col-md-12 col-sm-12">
        <div class="x_panel">
          <div class="x_title">
            <h2> <?= Html::encode($this->title) ?></h2>
            <ul class="nav navbar-right panel_toolbox">
              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
              </li>
             <!--  <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="#">Settings 1</a>
                    <a class="dropdown-item" href="#">Settings 2</a>
                  </div>
              </li> -->
              <!-- <li><a class="close-link"><i class="fa fa-close"></i></a>
              </li> -->
            </ul>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
      <?php  if(User::isTheCreator() || User::isAdmin() || User::isRespublikaRaisi() || User::isRespublikaHodimi()):?>
     <?php $region = \yii\helpers\ArrayHelper::map(\app\models\Region::find()->all(), 'id', 'name'); ?>
     <?php $city = \yii\helpers\ArrayHelper::map(\app\models\City::find()->all(), 'id', 'name'); ?>
     <?php $town_block = \yii\helpers\ArrayHelper::map(\app\models\TownBlock::find()->all(), 'id', 'name'); ?>
        <?= GridView::widget([
            'options' => ['class' => 'grid-view table-responsive'],
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'tableOptions' => [
                'class' => 'table table-bordered table-condensed table-hover',
            ],
            // 'rowOptions' => function($model){
            //     if($model->status == 0)
            //       return [
            //         'class' => 'danger'
            //     ];
            //     if($model->status == 1)
            //       return [
            //         'class' => 'active'
            //     ];
            // },
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
                  'label'=> Yii::t('yii', 'Фойдаланувчи'),
                  'attribute'=>'user_id',
                  'format' => 'html',
                  'value'=> function ($model)
                  {
                    return $model->user->first_name.' '.$model->user->second_name.' '.$model->user->middle_name;
                  },
                ],
                'first_name',
                'second_name',
                'middle_name',
                'birthday',
                'passport',
                'nation',
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

                [
                  'filter' => $town_block,
                  'label'=> Yii::t('yii', 'Mahalla'),
                  'attribute'=>'town_block_id',
                  'format' => 'html',
                  'value'=> function ($model)
                  {
                    return $model->townBlock->name;
                  },
                ],
                'address',
                'created_at',

               [
                    'class' => 'yii\grid\ActionColumn',
                    'header'=> Html::a(Yii::t('yii','Меню')), 
                    'headerOptions' => ['class' => 'info text-center','width' => '128'],
                    'filterOptions' => ['class' => 'success text-center','width' => '128'],
                    'contentOptions' =>['class' => 'text-center','width' => '128',],
                    'template' => '{view} {update} {delete}',
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
      <?php endif?>

      <?php  if(User::isViloyatRaisi() || User::isViloyatHodimi()):?>
    
      <?php $region = Yii::$app->user->identity['region_id']?>

      <?php
          $city = \yii\helpers\ArrayHelper::map(\app\models\City::findAll(['region_id' => $region]), 'id', 'name');
      ?>

     <?php $town_block = \yii\helpers\ArrayHelper::map(\app\models\TownBlock::findAll(['region_id' => $region]), 'id', 'name');?>

        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
              'options' => ['class' => 'grid-view table-responsive'],
              'tableOptions' => [
                'class' => 'table table-bordered table-condensed table-hover',
              ],
            // 'rowOptions' => function($model){
            //     if($model->status == 0)
            //       return [
            //         'class' => 'danger'
            //     ];
            //     if($model->status == 1)
            //       return [
            //         'class' => 'active'
            //     ];
            // },
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
                  'label'=> Yii::t('yii', 'Фойдаланувчи'),
                  'attribute'=>'user_id',
                  'format' => 'html',
                  'value'=> function ($model)
                  {
                    return $model->user->first_name.' '.$model->user->second_name.' '.$model->user->middle_name;
                  },
                ],
                'first_name',
                'second_name',
                'middle_name',
                'birthday',
                'passport',
                'nation',
        
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

                [
                  'filter' => $town_block,
                  'label'=> Yii::t('yii', 'Mahalla'),
                  'attribute'=>'town_block_id',
                  'format' => 'html',
                  'value'=> function ($model)
                  {
                    return $model->townBlock->name;
                  },
                ],
                'address',
                'created_at',

               [
                    'class' => 'yii\grid\ActionColumn',
                    'header'=> Html::a(Yii::t('yii','Меню')), 
                    'headerOptions' => ['class' => 'info text-center','width' => '128'],
                    'filterOptions' => ['class' => 'success text-center','width' => '128'],
                    'contentOptions' =>['class' => 'text-center','width' => '128',],
                    'template' => '{view} {update} {delete}',
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
      <?php endif?>

       <?php  if(User::isTumanRaisi() || User::isTumanHodimi()):?>

      <?php $cities = Yii::$app->user->identity['city_id']?>
   
      <?php
          $town_block = \yii\helpers\ArrayHelper::map(\app\models\TownBlock::findAll(['city_id' => $cities]), 'id', 'name');
      ?>

        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            // 'rowOptions' => function($model){
            //     if($model->status == 0)
            //       return [
            //         'class' => 'danger'
            //     ];
            //     if($model->status == 1)
            //       return [
            //         'class' => 'active'
            //     ];
            // },
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
                  'label'=> Yii::t('yii', 'Фойдаланувчи'),
                  'attribute'=>'user_id',
                  'format' => 'html',
                  'value'=> function ($model)
                  {
                    return $model->user->first_name.' '.$model->user->second_name.' '.$model->user->middle_name;
                  },
                ],
                'first_name',
                'second_name',
                'middle_name',
                'birthday',
                'passport',
                'nation',

                [
                  'filter' => $town_block,
                  'label'=> Yii::t('yii', 'Mahalla'),
                  'attribute'=>'town_block_id',
                  'format' => 'html',
                  'value'=> function ($model)
                  {
                    return $model->townBlock->name;
                  },
                ],
                'address',
                'created_at',

               [
                    'class' => 'yii\grid\ActionColumn',
                    'header'=> Html::a(Yii::t('yii','Меню')), 
                    'headerOptions' => ['class' => 'info text-center','width' => '128'],
                    'filterOptions' => ['class' => 'success text-center','width' => '128'],
                    'contentOptions' =>['class' => 'text-center','width' => '128',],
                    'template' => '{view} {update} {delete}',
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
      <?php endif?>

      <?php  if(!User::isTheCreator() && !User::isAdmin() && !User::isRespublikaRaisi() && !User::isRespublikaHodimi() && !User::isViloyatRaisi() && !User::isViloyatHodimi() && !User::isTumanRaisi() && !User::isTumanHodimi()):?>
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
             'options' => ['class' => 'grid-view table-responsive'],
              'tableOptions' => [
                'class' => 'table table-bordered table-condensed table-hover',
              ],
            // 'rowOptions' => function($model){
            //     if($model->status == 0)
            //       return [
            //         'class' => 'danger'
            //     ];
            //     if($model->status == 1)
            //       return [
            //         'class' => 'active'
            //     ];
            // },
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
                  'label'=> Yii::t('yii', 'Фойдаланувчи'),
                  'attribute'=>'user_id',
                  'format' => 'html',
                  'value'=> function ($model)
                  {
                    return $model->user->first_name.' '.$model->user->second_name.' '.$model->user->middle_name;
                  },
                ],
                'first_name',
                'second_name',
                'middle_name',
                'birthday',
                'passport',
                'nation',
                'address',
                'created_at',

               [
                    'class' => 'yii\grid\ActionColumn',
                    'header'=> Html::a(Yii::t('yii','Меню')), 
                    'headerOptions' => ['class' => 'info text-center','width' => '128'],
                    'filterOptions' => ['class' => 'success text-center','width' => '128'],
                    'contentOptions' =>['class' => 'text-center','width' => '128',],
                    'template' => '{view} {update} {delete}',
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

        <?php endif;?>
          </div>
        </div>
      </div>
      <div class="clearfix"></div>

    </div>
  </div>
</div>
<style>
.btn-xs{
  padding: 1px 5px;
  font-size: 12px;
  line-height: 1.5;
  border-radius: 3px;
  margin: 1px 0;
}
</style>