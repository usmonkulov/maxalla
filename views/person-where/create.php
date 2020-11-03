<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PersonWhere */

$this->title = 'Create Person Where';
$this->params['breadcrumbs'][] = ['label' => 'Person Wheres', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="person-where-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
