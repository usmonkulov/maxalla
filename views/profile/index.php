<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\search\ProfileSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Profiles';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="profile-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Profile', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'user_id',
            'avatar',
            'first_name',
            'second_name',
            //'middle_name',
            //'birthday',
            //'gender',
            //'passport',
            //'nation',
            //'region_id',
            //'city_id',
            //'town_block_id',
            //'address',
            //'phone',
            //'specialist',
            //'be_elected_den',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
