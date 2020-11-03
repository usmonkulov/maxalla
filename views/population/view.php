<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Population */

$this->title = $model->first_name.' '.$model->second_name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('yii', 'Fuqorolar'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="population-view">

<div class="">
    <div class="page-title">
      <div class="title_left">
        <p>
            <?= Html::a(Yii::t('yii', 'Таҳрирлаш'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
            <?= Html::a(Yii::t('yii', 'Ўчириш'), ['delete', 'id' => $model->id], ['class' => 'btn btn-danger',
                'data' => [
                    'confirm' => Yii::t('yii', 'Сиз ростдан ҳам ушбу элементни ўчирмоқчимисиз?'),
                    'method' => 'post',
                ],
            ]) ?>
            <?= Html::a(Yii::t('yii','Яратиш'), ['create'], ['class' => 'btn btn-success']) ?>
            <?= Html::a(Yii::t('yii', 'Орқага'), ['index'], ['class' => 'btn btn-warning']) ?>
            <?php
              echo Html::a(Yii::t('yii', 'Print'), ['/population/report', 'id' => $model->id], [
                  'class' => 'btn btn-info',
                  'target' => '_blank',
                  'data-toggle' => 'tooltip',
                  'title' => Yii::t('yii', 'Пиринтерда чиқаринг'),
              ]);
            ?>
        </p>
      </div>
    </div>
  <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
          <div class="x_title">
            <h2> <?= Html::encode($this->title) ?></h2>
            <ul class="nav navbar-right panel_toolbox">
              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
              </li>
            </ul>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <br />
                <?= DetailView::widget([
                    'options' => ['class' => 'table table-bordered detail-view'],
                    'model' => $model,
                    'attributes' => [
                        'id',
                         [
                          'label'=> Yii::t('yii', 'Фойдаланувчи'),
                          'attribute'=>'user',
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
                        [
                          'label'=> Yii::t('yii', 'Jinsi'),
                          'attribute'=>'gender',
                          'format' => 'html',
                          'value' => function($data){
                            return ($data->getGender($data->gender))?$data->getGender($data->gender) : $data->gender;
                          },
                        ],
                        'passport',
                        'nation',
                        [
                          'label'=> Yii::t('yii', 'Viloyat'),
                          'attribute'=>'region',
                          'format' => 'html',
                          'value'=> function ($model)
                          {
                            return $model->region->name;
                          },
                        ],

                        [
                          'label'=> Yii::t('yii', 'Tuman'),
                          'attribute'=>'city',
                          'format' => 'html',
                          'value'=> function ($model)
                          {
                            return $model->city->name;
                          },
                        ],

                        [
                          'label'=> Yii::t('yii', 'Mahalla'),
                          'attribute'=>'town_block',
                          'format' => 'html',
                          'value'=> function ($model)
                          {
                            return $model->townBlock->name;
                          },
                        ],
                      
                        'address',
                        'phone',
                        'email:email',
                       [
                          'attribute'=>'image',
                          'format'=>'raw', // raw, html
                          'value' => function($data)
                          {
                            if($data->image):
                              return ($data->image != NULL && $data->image != '' && !empty($data->image)) ? Html::a(Html::img(\yii\helpers\Url::base().'/'.$data->image, ['alt'=>$data->image,'class'=>'profil-index-image']),(\yii\helpers\Url::base().'/'.$data->image)) : '';
                            else:
                              return (Html::img('@web/images/user.png',['class'=>'profil-index-image']));
                            endif;
                          }
                        ],
                        'created_at',
                        'updated_at',
                    ],
                ]) ?>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>

<style>
  .profil-index-image {
    max-height: 120px;
    min-height: 120px;
    max-width: 120px;
    min-width: 120px;
    /*width: 10%;*/
}
</style>
