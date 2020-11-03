<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\TownBlock */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('yii', 'Маҳаллалар'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="town-block-view">

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
            'name',
            [
              'label'=> Yii::t('yii', 'Tuman'),
              'attribute'=>'city',
              'format' => 'html',
              'value'=> function ($model)
              {
                return $model->city->name;
              },
            ],

        ],
    ]) ?>

</div>
        </div>
      </div>
    </div>
  </div>

</div>
