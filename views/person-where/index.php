<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PersonWhereSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Person Wheres';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="person-where-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Person Where', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'republic',
            'region',
            'city',
            'address:ntext',
            //'working_place',
            //'education',
            //'export',
            //'import',
            //'population_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
