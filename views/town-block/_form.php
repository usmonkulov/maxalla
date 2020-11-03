<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\User;

/* @var $this yii\web\View */
/* @var $model app\models\TownBlock */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="town-block-form">

    <?php $form = ActiveForm::begin(
        [
            'options' => [
                'id' => 'demo-form2', 
                'data-parsley-validate class' => 'form-horizontal form-label-left'
            ]
        ]
    )?>

    <?php if(User::isTheCreator() || User::isAdmin() || User::isRespublikaRaisi() || User::isRespublikaHodimi()):
    ?>
    <?php $region = \yii\helpers\ArrayHelper::map(\app\models\Region::find()->all(), 'id', 'name'); ?>

    <?= $form->field($model, 'region_id',
        [
            'options' => [
              'tag' => 'div',
              'class' => 'item form-group'
            ],
            'template' => '<label class="col-form-label col-md-3 col-sm-3 label-align" for="townblock-region_id">'.Yii::t('yii', 'Вилоят').' <span class="required">*</span></label><div class="col-md-6 col-sm-6 ">{input}<ul class="parsley-errors-list filled">{error}</ul>{hint}</div>',
            'errorOptions' => [
                'tag' => 'li',
                'class' => 'parsley-required',
            ],
        ]
    )->dropDownList($region, 
        [
            'id' => 'townblock-region_id',
            'name' => 'TownBlock[region_id]',
            'class' => 'form-control',
            'prompt' => Yii::t('yii','Вилоятни танланг'),
            'onchange' => '$.post("'.Yii::$app->urlManager->createUrl('town-block/city?id=').'"+$(this).val(),function(data){$("#townblock-city_id").html(data);});'
        ]
    ) ?>

    <?php
        $cities = \yii\helpers\ArrayHelper::map(\app\models\City::findAll(['region_id' => $model->region_id]), 'id', 'name');
    ?>

    <?= $form->field($model, 'city_id',
        [
            'options' => [
              'tag' => 'div',
              'class' => 'item form-group'
            ],
            'template' => '<label class="col-form-label col-md-3 col-sm-3 label-align" for="townblock-city_id">'.Yii::t('yii', 'Туман').' <span class="required">*</span></label><div class="col-md-6 col-sm-6 ">{input}<ul class="parsley-errors-list filled">{error}</ul>{hint}</div>',
            'errorOptions' => [
                'tag' => 'li',
                'class' => 'parsley-required',
            ],
        ]
    )->dropDownList($cities,
        [
            'id' => 'townblock-city_id',
            'name' => 'TownBlock[city_id]',
            'class' => 'form-control',
            'prompt' => Yii::t('yii','Туман ёки Шаҳарни танланг'),
        ]
    ) ?>

    <?= $form->field($model, 'name',
        [
        'options' => [
          'tag' => 'div',
          'class' => 'item form-group'
        ],
        'template' => '<label class="col-form-label col-md-3 col-sm-3 label-align" for="townblock-name">'.Yii::t('yii', 'Маҳалла').' <span class="required">*</span></label><div class="col-md-6 col-sm-6 ">{input}<ul class="parsley-errors-list filled">{error}</ul>{hint}</div>',
        'errorOptions' => [
            'tag' => 'li',
            'class' => 'parsley-required',
        ],
      ]
    )->textInput(
        [
            'placeholder' => Yii::t('yii', 'Маҳалла номи'),
            'id' => 'townblock-name',
            'name' => 'TownBlock[name]',
            'class' => 'form-control',
            'maxlength' => true,
        ]
    )?>
    <?php  endif;?>

        <?php if(User::isViloyatRaisi() || User::isViloyatHodimi()):
    ?>

   <?php $region = Yii::$app->user->identity['region_id']?>
   
    <?php
        $cities = \yii\helpers\ArrayHelper::map(\app\models\City::findAll(['region_id' => $region]), 'id', 'name');
    ?>

    <?= $form->field($model, 'city_id',
        [
            'options' => [
              'tag' => 'div',
              'class' => 'item form-group'
            ],
            'template' => '<label class="col-form-label col-md-3 col-sm-3 label-align" for="townblock-city_id">'.Yii::t('yii', 'Туман').' <span class="required">*</span></label><div class="col-md-6 col-sm-6 ">{input}<ul class="parsley-errors-list filled">{error}</ul>{hint}</div>',
            'errorOptions' => [
                'tag' => 'li',
                'class' => 'parsley-required',
            ],
        ]
    )->dropDownList($cities,
        [
            'id' => 'townblock-city_id',
            'name' => 'TownBlock[city_id]',
            'class' => 'form-control',
            'prompt' => Yii::t('yii','Туман ёки Шаҳарни танланг'),
        ]
    ) ?>

    <?= $form->field($model, 'name',
        [
        'options' => [
          'tag' => 'div',
          'class' => 'item form-group'
        ],
        'template' => '<label class="col-form-label col-md-3 col-sm-3 label-align" for="townblock-name">'.Yii::t('yii', 'Маҳалла').' <span class="required">*</span></label><div class="col-md-6 col-sm-6 ">{input}<ul class="parsley-errors-list filled">{error}</ul>{hint}</div>',
        'errorOptions' => [
            'tag' => 'li',
            'class' => 'parsley-required',
        ],
      ]
    )->textInput(
        [
            'placeholder' => Yii::t('yii', 'Маҳалла номи'),
            'id' => 'townblock-name',
            'name' => 'TownBlock[name]',
            'class' => 'form-control',
            'maxlength' => true,
        ]
    )?>
    <?php  endif;?>

        <?php if(User::isTumanRaisi() || User::isTumanHodimi()):
    ?>

    <?= $form->field($model, 'name',
        [
        'options' => [
          'tag' => 'div',
          'class' => 'item form-group'
        ],
        'template' => '<label class="col-form-label col-md-3 col-sm-3 label-align" for="townblock-name">'.Yii::t('yii', 'Маҳалла').' <span class="required">*</span></label><div class="col-md-6 col-sm-6 ">{input}<ul class="parsley-errors-list filled">{error}</ul>{hint}</div>',
        'errorOptions' => [
            'tag' => 'li',
            'class' => 'parsley-required',
        ],
      ]
    )->textInput(
        [
            'placeholder' => Yii::t('yii', 'Маҳалла номи'),
            'id' => 'townblock-name',
            'name' => 'TownBlock[name]',
            'class' => 'form-control',
            'maxlength' => true,
        ]
    )?>
    <?php  endif;?>

    <div class="ln_solid"></div>

        <div class="item form-group">
            <div class="col-md-6 col-sm-6 offset-md-3">
                 <?= Html::submitButton($model->isNewRecord ? Yii::t('yii', 'Сақлаш') 
                : Yii::t('yii', 'Янгилаш'), ['class' => $model->isNewRecord 
                ? 'btn btn-success' : 'btn btn-primary']) ?>
                <?= Html::a(Yii::t('yii', 'Орқага'), ['town-block/index'], ['class' => 'btn btn-default']) ?>
            </div>   
        </div>

    <?php ActiveForm::end(); ?>

</div>

