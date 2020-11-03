<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PersonWhere */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="person-where-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'republic')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'region')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'city')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'address')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'working_place')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'education')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'export')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'import')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'population_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
