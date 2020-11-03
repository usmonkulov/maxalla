<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PersonWhereSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="person-where-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'republic') ?>

    <?= $form->field($model, 'region') ?>

    <?= $form->field($model, 'city') ?>

    <?= $form->field($model, 'address') ?>

    <?php // echo $form->field($model, 'working_place') ?>

    <?php // echo $form->field($model, 'education') ?>

    <?php // echo $form->field($model, 'export') ?>

    <?php // echo $form->field($model, 'import') ?>

    <?php // echo $form->field($model, 'population_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
