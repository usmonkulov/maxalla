<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use app\models\User;

/* @var $this yii\web\View */
/* @var $model app\models\Population */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="population-form">

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

    <div class="text-center">
        <?php if($model->image):?>
        <?= $form->field($model, 'image', ['template' => (!$model->isNewRecord)?'<label class="upload-label" '.'style="background-image:url(\''.\yii\helpers\Url::base().'/web/'.$model->image.'\')">{input}{error}{hint}</label>{label}':'<label class="upload-label">{input}{error}{hint}</label>{label}','inputOptions' => ['class' => 'upload-image'],'labelOptions' => ['class' => 'btn btn-default','style'=>'display:block;margin:auto;width:120px;margin-top:10px'], ])->fileInput(); ?>
        <?php else:?>
        <?= $form->field($model, 'image', ['template' => ($model->isNewRecord && !$model->isNewRecord)?'<label class="upload-label" '.'style="background-image:url(\''.\yii\helpers\Url::base().'/web/'.$model->image.'\')">{input}{error}{hint}</label>{label}':'<label class="upload-label">{input}{error}{hint}</label>{label}','inputOptions' => ['class' => 'upload-image'],'labelOptions' => ['class' => 'btn btn-default','style'=>'display:block;margin:auto;width:120px;margin-top:10px'], ])->fileInput(); ?>
        <?php endif?>
    </div>

    <?= $form->field($model, 'first_name',
        [
        'options' => [
          'tag' => 'div',
          'class' => 'item form-group'
        ],
        'template' => '<label class="col-form-label col-md-3 col-sm-3 label-align" for="population-first_name">'.Yii::t('yii', 'Фамилия').' <span class="required">*</span></label><div class="col-md-6 col-sm-6 ">{input}<ul id="parsley-id-5" class="parsley-errors-list filled">{error}</ul>{hint}</div>',
        'errorOptions' => [
            'tag' => 'li',
            'class' => 'parsley-required',
        ],
      ]
    )->textInput(
        [
            'placeholder' => Yii::t('yii', 'Фамилияси'),
            'id' => 'population-first_name',
            'name' => 'Population[first_name]',
            'class' => 'form-control',
            'maxlength' => true,
        ]
    )?>

    <?= $form->field($model, 'second_name',
        [
        'options' => [
          'tag' => 'div',
          'class' => 'item form-group'
        ],
        'template' => '<label class="col-form-label col-md-3 col-sm-3 label-align" for="population-second_name">'.Yii::t('yii', 'Исм').' <span class="required">*</span></label><div class="col-md-6 col-sm-6 ">{input}<ul id="parsley-id-7" class="parsley-errors-list filled">{error}</ul>{hint}</div>',
        'errorOptions' => [
            'tag' => 'li',
            'class' => 'parsley-required',
        ],
      ]
    )->textInput(
        [
            'placeholder' => Yii::t('yii', 'Исми'),
            'id' => 'population-second_name',
            'name' => 'Population[second_name]',
            'class' => 'form-control',
            'maxlength' => true,
        ]
    )?>

    <?= $form->field($model, 'middle_name',
        [
        'options' => [
          'tag' => 'div',
          'class' => 'item form-group',
        ],
        'template' => '<label class="col-form-label col-md-3 col-sm-3 label-align" for="population-middle_name">'.Yii::t('yii', 'Отаси').' <span class="required">*</span></label><div class="col-md-6 col-sm-6 ">{input}<ul id="parsley-id-9" class="parsley-errors-list filled">{error}</ul>{hint}</div>',
        'errorOptions' => [
            'tag' => 'li',
            'class' => 'parsley-required',
        ],
      ]
    )->textInput(
        [
            'placeholder' => Yii::t('yii', 'Отасининг исми'),
            'id' => 'population-middle_name',
            'name' => 'Population[middle_name]',
            'class' => 'form-control',
            'maxlength' => true,
        ]
    )?>

    <?= $form->field($model, 'birthday',
        [
        'options' => [
          'tag' => 'div',
          'class' => 'field item form-group',
        ],
        'template' => '<label class="col-form-label col-md-3 col-sm-3 label-align">'.Yii::t('yii', 'Туғилган санаси').' <span class="required">*</span></label><div class="col-md-6 col-sm-6 ">{input}<ul id="parsley-id-9" class="parsley-errors-list filled">{error}</ul>{hint}</div>',
        'errorOptions' => [
            'tag' => 'li',
            'class' => 'parsley-required',
        ],
      ]
    )->textInput(
        [
            'id' => 'population-birthday',
            'name' => 'Population[birthday]',
            'placeholder' => Yii::t('yii', 'КУН ОЙ ЙИЛ'),
            'class' => 'form-control',
            'data-inputmask' => "'mask' : '99.99.9999'",
        ]
    )?>



    <?= $form->field($model, 'gender',
        [
            'options' => [
              'tag' => 'div',
              'class' => 'item form-group'
            ],
            'template' => '<label class="col-form-label col-md-3 col-sm-3 label-align" for="population-second_name">'.Yii::t('yii', 'Жинси').' <span class="required">*</span></label><div class="col-md-6 col-sm-6 ">{input}<ul id="parsley-id-7" class="parsley-errors-list filled">{error}</ul>{hint}</div>',
            'errorOptions' => [
                'tag' => 'li',
                'class' => 'parsley-required',
            ],
        ])->dropDownList($model->gender(),
            [
                'id' => 'population-gender',
                'name' => 'Population[gender]',
                'class' => 'form-control',
                'prompt' => Yii::t('yii','Жинсини танланг'),
            ]
        ) ?>

    <?= $form->field($model, 'passport',
        [
            'options' => [
              'tag' => 'div',
              'class' => 'item form-group'
            ],
            'template' => '<label class="col-form-label col-md-3 col-sm-3 label-align" for="population-second_name">'.Yii::t('yii', 'Пасспорт').' <span class="required">*</span></label><div class="col-md-6 col-sm-6 ">{input}<ul id="parsley-id-7" class="parsley-errors-list filled">{error}</ul>{hint}</div>',
            'errorOptions' => [
                'tag' => 'li',
                'class' => 'parsley-required',
            ],
        ]
    )->textInput(
        [
            'id' => 'population-passport',
            'name' => 'Population[passport]',
            'placeholder' => Yii::t('yii', 'AA 1234567'),
            'class' => 'form-control',
            'data-inputmask' => "'mask' : 'AA 9999999'",
            'maxlength' => true
        ]
    ) ?>

    <?= $form->field($model, 'nation',
        [
            'options' => [
              'tag' => 'div',
              'class' => 'item form-group'
            ],
            'template' => '<label class="col-form-label col-md-3 col-sm-3 label-align" for="population-second_name">'.Yii::t('yii', 'Миллати').' <span class="required">*</span></label><div class="col-md-6 col-sm-6 ">{input}<ul id="parsley-id-7" class="parsley-errors-list filled">{error}</ul>{hint}</div>',
            'errorOptions' => [
                'tag' => 'li',
                'class' => 'parsley-required',
            ],
        ]
    )->textInput(
        [
            'id' => 'population-nation',
            'name' => 'Population[nation]',
            'class' => 'form-control',
            'placeholder' => Yii::t('yii', 'Ўзбек, Қозоқ, Рус, ...'),
            'maxlength' => true
        ]
    ) ?>

    <?php $region = \yii\helpers\ArrayHelper::map(\app\models\Region::find()->all(), 'id', 'name'); ?>

    <?= $form->field($model, 'region_id',
        [
            'options' => [
              'tag' => 'div',
              'class' => 'item form-group'
            ],
            'template' => '<label class="col-form-label col-md-3 col-sm-3 label-align" for="population-region_id">'.Yii::t('yii', 'Вилоят').' <span class="required">*</span></label><div class="col-md-6 col-sm-6 ">{input}<ul class="parsley-errors-list filled">{error}</ul>{hint}</div>',
            'errorOptions' => [
                'tag' => 'li',
                'class' => 'parsley-required',
            ],
        ]
    )->dropDownList($region, 
        [
            'id' => 'population-region_id',
            'name' => 'Population[region_id]',
            'class' => 'form-control',
            'prompt' => Yii::t('yii','Вилоятни танланг'),
            'onchange' => '$.post("'.Yii::$app->urlManager->createUrl('population/city?id=').'"+$(this).val(),function(data){$("#population-city_id").html(data);});'
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
            'template' => '<label class="col-form-label col-md-3 col-sm-3 label-align" for="population-city_id">'.Yii::t('yii', 'Туман').' <span class="required">*</span></label><div class="col-md-6 col-sm-6 ">{input}<ul class="parsley-errors-list filled">{error}</ul>{hint}</div>',
            'errorOptions' => [
                'tag' => 'li',
                'class' => 'parsley-required',
            ],
        ]
    )->dropDownList($cities,
        [
            'id' => 'population-city_id',
            'name' => 'Population[city_id]',
            'class' => 'form-control',
            'prompt' => Yii::t('yii','Туман ёки Шаҳарни танланг'),
            'onchange' => '$.post("'.Yii::$app->urlManager->createUrl('population/town-block?id=').'"+$(this).val(),function(data){$("#population-town_block_id").html(data);});'
        ]
    ) ?>

    <?php
        $town_block = \yii\helpers\ArrayHelper::map(\app\models\TownBlock::findAll(['city_id' => $model->city_id]), 'id', 'name');
    ?>

    <?= $form->field($model, 'town_block_id',
        [
            'options' => [
              'tag' => 'div',
              'class' => 'item form-group'
            ],
            'template' => '<label class="col-form-label col-md-3 col-sm-3 label-align" for="population-town_block_id">'.Yii::t('yii', 'Маҳалла').' <span class="required">*</span></label><div class="col-md-6 col-sm-6 ">{input}<ul class="parsley-errors-list filled">{error}</ul>{hint}</div>',
            'errorOptions' => [
                'tag' => 'li',
                'class' => 'parsley-required',
            ],
        ]
    )->dropDownList($town_block,
        [
            'id' => 'population-town_block_id',
            'name' => 'Population[town_block_id]',
            'class' => 'form-control',
            'prompt' => Yii::t('yii','Маҳаллани танланг'),
        ]
    ) ?>

    <?= $form->field($model, 'address',
        [
            'options' => [
              'tag' => 'div',
              'class' => 'item form-group'
            ],
            'template' => '<label class="col-form-label col-md-3 col-sm-3 label-align" for="population-second_name">'.Yii::t('yii', 'Манзил').' <span class="required">*</span></label><div class="col-md-6 col-sm-6 ">{input}<ul id="parsley-id-7" class="parsley-errors-list filled">{error}</ul>{hint}</div>',
            'errorOptions' => [
                'tag' => 'li',
                'class' => 'parsley-required',
            ],
        ]
    )->textInput(
        [
            'id' => 'population-address',
            'name' => 'Population[address]',
            'class' => 'form-control',
            'placeholder' => Yii::t('yii', 'Қишлоқ, Овул, Даҳа, Кўча, уй, ...'),
            'maxlength' => true
        ]
    ) ?>

    <?= $form->field($model, 'phone',
        [
            'options' => [
              'tag' => 'div',
              'class' => 'item form-group'
            ],
            'template' => '<label class="col-form-label col-md-3 col-sm-3 label-align" for="population-second_name">'.Yii::t('yii', 'Телефон').' <span class="required">*</span></label><div class="col-md-6 col-sm-6 ">{input}<ul id="parsley-id-7" class="parsley-errors-list filled">{error}</ul>{hint}</div>',
            'errorOptions' => [
                'tag' => 'li',
                'class' => 'parsley-required',
            ],
        ]
    )->textInput(
        [
            'id' => 'population-phone',
            'name' => 'Population[phone]',
            'class' => 'form-control',
            'data-inputmask' => "'mask' : '(99) 999-99-99'",
            'maxlength' => true,
            'placeholder' => Yii::t('yii', '(99) (999-99-99)'),
        ]
    ) ?>

    <?= $form->field($model, 'email',
        [
            'options' => [
              'tag' => 'div',
              'class' => 'item form-group'
            ],
            'template' => '<label class="col-form-label col-md-3 col-sm-3 label-align" for="population-second_name">'.Yii::t('yii', 'Электрон почта').' <span class="required">*</span></label><div class="col-md-6 col-sm-6 ">{input}<ul id="parsley-id-7" class="parsley-errors-list filled">{error}</ul>{hint}</div>',
            'errorOptions' => [
                'tag' => 'li',
                'class' => 'parsley-required',
            ],
        ]
    )->textInput(
        [
            'id' => 'population-email',
            'name' => 'Population[email]',
            'class' => 'form-control',
            'maxlength' => true,
            'placeholder' => Yii::t('yii', 'mahalla.mail.ru'),
        ]
    ) ?>

    <?php  endif;?>

    <?php if(User::isViloyatRaisi() || User::isViloyatHodimi()):
    ?>

    <div class="text-center">
        <?php if($model->image):?>
        <?= $form->field($model, 'image', ['template' => (!$model->isNewRecord)?'<label class="upload-label" '.'style="background-image:url(\''.\yii\helpers\Url::base().'/web/'.$model->image.'\')">{input}{error}{hint}</label>{label}':'<label class="upload-label">{input}{error}{hint}</label>{label}','inputOptions' => ['class' => 'upload-image'],'labelOptions' => ['class' => 'btn btn-default','style'=>'display:block;margin:auto;width:120px;margin-top:10px'], ])->fileInput(); ?>
        <?php else:?>
        <?= $form->field($model, 'image', ['template' => ($model->isNewRecord && !$model->isNewRecord)?'<label class="upload-label" '.'style="background-image:url(\''.\yii\helpers\Url::base().'/web/'.$model->image.'\')">{input}{error}{hint}</label>{label}':'<label class="upload-label">{input}{error}{hint}</label>{label}','inputOptions' => ['class' => 'upload-image'],'labelOptions' => ['class' => 'btn btn-default','style'=>'display:block;margin:auto;width:120px;margin-top:10px'], ])->fileInput(); ?>
        <?php endif?>
    </div>

    <?= $form->field($model, 'first_name',
        [
        'options' => [
          'tag' => 'div',
          'class' => 'item form-group'
        ],
        'template' => '<label class="col-form-label col-md-3 col-sm-3 label-align" for="population-first_name">'.Yii::t('yii', 'Фамилия').' <span class="required">*</span></label><div class="col-md-6 col-sm-6 ">{input}<ul id="parsley-id-5" class="parsley-errors-list filled">{error}</ul>{hint}</div>',
        'errorOptions' => [
            'tag' => 'li',
            'class' => 'parsley-required',
        ],
      ]
    )->textInput(
        [
            'placeholder' => Yii::t('yii', 'Фамилияси'),
            'id' => 'population-first_name',
            'name' => 'Population[first_name]',
            'class' => 'form-control',
            'maxlength' => true,
        ]
    )?>

    <?= $form->field($model, 'second_name',
        [
        'options' => [
          'tag' => 'div',
          'class' => 'item form-group'
        ],
        'template' => '<label class="col-form-label col-md-3 col-sm-3 label-align" for="population-second_name">'.Yii::t('yii', 'Исм').' <span class="required">*</span></label><div class="col-md-6 col-sm-6 ">{input}<ul id="parsley-id-7" class="parsley-errors-list filled">{error}</ul>{hint}</div>',
        'errorOptions' => [
            'tag' => 'li',
            'class' => 'parsley-required',
        ],
      ]
    )->textInput(
        [
            'placeholder' => Yii::t('yii', 'Исми'),
            'id' => 'population-second_name',
            'name' => 'Population[second_name]',
            'class' => 'form-control',
            'maxlength' => true,
        ]
    )?>

    <?= $form->field($model, 'middle_name',
        [
        'options' => [
          'tag' => 'div',
          'class' => 'item form-group',
        ],
        'template' => '<label class="col-form-label col-md-3 col-sm-3 label-align" for="population-middle_name">'.Yii::t('yii', 'Отаси').' <span class="required">*</span></label><div class="col-md-6 col-sm-6 ">{input}<ul id="parsley-id-9" class="parsley-errors-list filled">{error}</ul>{hint}</div>',
        'errorOptions' => [
            'tag' => 'li',
            'class' => 'parsley-required',
        ],
      ]
    )->textInput(
        [
            'placeholder' => Yii::t('yii', 'Отасининг исми'),
            'id' => 'population-middle_name',
            'name' => 'Population[middle_name]',
            'class' => 'form-control',
            'maxlength' => true,
        ]
    )?>

    <?= $form->field($model, 'birthday',
        [
        'options' => [
          'tag' => 'div',
          'class' => 'field item form-group',
        ],
        'template' => '<label class="col-form-label col-md-3 col-sm-3 label-align">'.Yii::t('yii', 'Туғилган санаси').' <span class="required">*</span></label><div class="col-md-6 col-sm-6 ">{input}<ul id="parsley-id-9" class="parsley-errors-list filled">{error}</ul>{hint}</div>',
        'errorOptions' => [
            'tag' => 'li',
            'class' => 'parsley-required',
        ],
      ]
    )->textInput(
        [
            'id' => 'population-birthday',
            'name' => 'Population[birthday]',
            'placeholder' => Yii::t('yii', 'КУН ОЙ ЙИЛ'),
            'class' => 'form-control',
            'data-inputmask' => "'mask' : '99.99.9999'",
        ]
    )?>



    <?= $form->field($model, 'gender',
        [
            'options' => [
              'tag' => 'div',
              'class' => 'item form-group'
            ],
            'template' => '<label class="col-form-label col-md-3 col-sm-3 label-align" for="population-second_name">'.Yii::t('yii', 'Жинси').' <span class="required">*</span></label><div class="col-md-6 col-sm-6 ">{input}<ul id="parsley-id-7" class="parsley-errors-list filled">{error}</ul>{hint}</div>',
            'errorOptions' => [
                'tag' => 'li',
                'class' => 'parsley-required',
            ],
        ])->dropDownList($model->gender(),
            [
                'id' => 'population-gender',
                'name' => 'Population[gender]',
                'class' => 'form-control',
                'prompt' => Yii::t('yii','Жинсини танланг'),
            ]
        ) ?>

    <?= $form->field($model, 'passport',
        [
            'options' => [
              'tag' => 'div',
              'class' => 'item form-group'
            ],
            'template' => '<label class="col-form-label col-md-3 col-sm-3 label-align" for="population-second_name">'.Yii::t('yii', 'Пасспорт').' <span class="required">*</span></label><div class="col-md-6 col-sm-6 ">{input}<ul id="parsley-id-7" class="parsley-errors-list filled">{error}</ul>{hint}</div>',
            'errorOptions' => [
                'tag' => 'li',
                'class' => 'parsley-required',
            ],
        ]
    )->textInput(
        [
            'id' => 'population-passport',
            'name' => 'Population[passport]',
            'placeholder' => Yii::t('yii', 'AA 1234567'),
            'class' => 'form-control',
            'data-inputmask' => "'mask' : 'AA 9999999'",
            'maxlength' => true
        ]
    ) ?>

    <?= $form->field($model, 'nation',
        [
            'options' => [
              'tag' => 'div',
              'class' => 'item form-group'
            ],
            'template' => '<label class="col-form-label col-md-3 col-sm-3 label-align" for="population-second_name">'.Yii::t('yii', 'Миллати').' <span class="required">*</span></label><div class="col-md-6 col-sm-6 ">{input}<ul id="parsley-id-7" class="parsley-errors-list filled">{error}</ul>{hint}</div>',
            'errorOptions' => [
                'tag' => 'li',
                'class' => 'parsley-required',
            ],
        ]
    )->textInput(
        [
            'id' => 'population-nation',
            'name' => 'Population[nation]',
            'class' => 'form-control',
            'placeholder' => Yii::t('yii', 'Ўзбек, Қозоқ, Рус, ...'),
            'maxlength' => true
        ]
    ) ?>

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
            'template' => '<label class="col-form-label col-md-3 col-sm-3 label-align" for="population-city_id">'.Yii::t('yii', 'Туман').' <span class="required">*</span></label><div class="col-md-6 col-sm-6 ">{input}<ul class="parsley-errors-list filled">{error}</ul>{hint}</div>',
            'errorOptions' => [
                'tag' => 'li',
                'class' => 'parsley-required',
            ],
        ]
    )->dropDownList($cities,
        [
            'id' => 'population-city_id',
            'name' => 'Population[city_id]',
            'class' => 'form-control',
            'prompt' => Yii::t('yii','Туман ёки Шаҳарни танланг'),
            'onchange' => '$.post("'.Yii::$app->urlManager->createUrl('population/town-block?id=').'"+$(this).val(),function(data){$("#population-town_block_id").html(data);});'
        ]
    ) ?>

    <?php
        $town_block = \yii\helpers\ArrayHelper::map(\app\models\TownBlock::findAll(['city_id' => $model->city_id]), 'id', 'name');
    ?>

    <?= $form->field($model, 'town_block_id',
        [
            'options' => [
              'tag' => 'div',
              'class' => 'item form-group'
            ],
            'template' => '<label class="col-form-label col-md-3 col-sm-3 label-align" for="population-town_block_id">'.Yii::t('yii', 'Маҳалла').' <span class="required">*</span></label><div class="col-md-6 col-sm-6 ">{input}<ul class="parsley-errors-list filled">{error}</ul>{hint}</div>',
            'errorOptions' => [
                'tag' => 'li',
                'class' => 'parsley-required',
            ],
        ]
    )->dropDownList($town_block,
        [
            'id' => 'population-town_block_id',
            'name' => 'Population[town_block_id]',
            'class' => 'form-control',
            'prompt' => Yii::t('yii','Маҳаллани танланг'),
        ]
    ) ?>

    <?= $form->field($model, 'address',
        [
            'options' => [
              'tag' => 'div',
              'class' => 'item form-group'
            ],
            'template' => '<label class="col-form-label col-md-3 col-sm-3 label-align" for="population-second_name">'.Yii::t('yii', 'Манзил').' <span class="required">*</span></label><div class="col-md-6 col-sm-6 ">{input}<ul id="parsley-id-7" class="parsley-errors-list filled">{error}</ul>{hint}</div>',
            'errorOptions' => [
                'tag' => 'li',
                'class' => 'parsley-required',
            ],
        ]
    )->textInput(
        [
            'id' => 'population-address',
            'name' => 'Population[address]',
            'class' => 'form-control',
            'placeholder' => Yii::t('yii', 'Қишлоқ, Овул, Даҳа, Кўча, уй, ...'),
            'maxlength' => true
        ]
    ) ?>

    <?= $form->field($model, 'phone',
        [
            'options' => [
              'tag' => 'div',
              'class' => 'item form-group'
            ],
            'template' => '<label class="col-form-label col-md-3 col-sm-3 label-align" for="population-second_name">'.Yii::t('yii', 'Телефон').' <span class="required">*</span></label><div class="col-md-6 col-sm-6 ">{input}<ul id="parsley-id-7" class="parsley-errors-list filled">{error}</ul>{hint}</div>',
            'errorOptions' => [
                'tag' => 'li',
                'class' => 'parsley-required',
            ],
        ]
    )->textInput(
        [
            'id' => 'population-phone',
            'name' => 'Population[phone]',
            'class' => 'form-control',
            'data-inputmask' => "'mask' : '(99) 999-99-99'",
            'maxlength' => true,
            'placeholder' => Yii::t('yii', '(99) (999-99-99)'),
        ]
    ) ?>

    <?= $form->field($model, 'email',
        [
            'options' => [
              'tag' => 'div',
              'class' => 'item form-group'
            ],
            'template' => '<label class="col-form-label col-md-3 col-sm-3 label-align" for="population-second_name">'.Yii::t('yii', 'Электрон почта').' <span class="required">*</span></label><div class="col-md-6 col-sm-6 ">{input}<ul id="parsley-id-7" class="parsley-errors-list filled">{error}</ul>{hint}</div>',
            'errorOptions' => [
                'tag' => 'li',
                'class' => 'parsley-required',
            ],
        ]
    )->textInput(
        [
            'id' => 'population-email',
            'name' => 'Population[email]',
            'class' => 'form-control',
            'maxlength' => true,
            'placeholder' => Yii::t('yii', 'mahalla.mail.ru'),
        ]
    ) ?>

    <?php  endif;?>

       
     <?php 
      if(User::isTumanRaisi() || User::isTumanHodimi()):
    ?>

    <div class="text-center">
        <?php if($model->image):?>
        <?= $form->field($model, 'image', ['template' => (!$model->isNewRecord)?'<label class="upload-label" '.'style="background-image:url(\''.\yii\helpers\Url::base().'/web/'.$model->image.'\')">{input}{error}{hint}</label>{label}':'<label class="upload-label">{input}{error}{hint}</label>{label}','inputOptions' => ['class' => 'upload-image'],'labelOptions' => ['class' => 'btn btn-default','style'=>'display:block;margin:auto;width:120px;margin-top:10px'], ])->fileInput(); ?>
        <?php else:?>
        <?= $form->field($model, 'image', ['template' => ($model->isNewRecord && !$model->isNewRecord)?'<label class="upload-label" '.'style="background-image:url(\''.\yii\helpers\Url::base().'/web/'.$model->image.'\')">{input}{error}{hint}</label>{label}':'<label class="upload-label">{input}{error}{hint}</label>{label}','inputOptions' => ['class' => 'upload-image'],'labelOptions' => ['class' => 'btn btn-default','style'=>'display:block;margin:auto;width:120px;margin-top:10px'], ])->fileInput(); ?>
        <?php endif?>
    </div>

    <?= $form->field($model, 'first_name',
        [
        'options' => [
          'tag' => 'div',
          'class' => 'item form-group'
        ],
        'template' => '<label class="col-form-label col-md-3 col-sm-3 label-align" for="population-first_name">'.Yii::t('yii', 'Фамилия').' <span class="required">*</span></label><div class="col-md-6 col-sm-6 ">{input}<ul id="parsley-id-5" class="parsley-errors-list filled">{error}</ul>{hint}</div>',
        'errorOptions' => [
            'tag' => 'li',
            'class' => 'parsley-required',
        ],
      ]
    )->textInput(
        [
            'placeholder' => Yii::t('yii', 'Фамилияси'),
            'id' => 'population-first_name',
            'name' => 'Population[first_name]',
            'class' => 'form-control',
            'maxlength' => true,
        ]
    )?>

    <?= $form->field($model, 'second_name',
        [
        'options' => [
          'tag' => 'div',
          'class' => 'item form-group'
        ],
        'template' => '<label class="col-form-label col-md-3 col-sm-3 label-align" for="population-second_name">'.Yii::t('yii', 'Исм').' <span class="required">*</span></label><div class="col-md-6 col-sm-6 ">{input}<ul id="parsley-id-7" class="parsley-errors-list filled">{error}</ul>{hint}</div>',
        'errorOptions' => [
            'tag' => 'li',
            'class' => 'parsley-required',
        ],
      ]
    )->textInput(
        [
            'placeholder' => Yii::t('yii', 'Исми'),
            'id' => 'population-second_name',
            'name' => 'Population[second_name]',
            'class' => 'form-control',
            'maxlength' => true,
        ]
    )?>

    <?= $form->field($model, 'middle_name',
        [
        'options' => [
          'tag' => 'div',
          'class' => 'item form-group',
        ],
        'template' => '<label class="col-form-label col-md-3 col-sm-3 label-align" for="population-middle_name">'.Yii::t('yii', 'Отаси').' <span class="required">*</span></label><div class="col-md-6 col-sm-6 ">{input}<ul id="parsley-id-9" class="parsley-errors-list filled">{error}</ul>{hint}</div>',
        'errorOptions' => [
            'tag' => 'li',
            'class' => 'parsley-required',
        ],
      ]
    )->textInput(
        [
            'placeholder' => Yii::t('yii', 'Отасининг исми'),
            'id' => 'population-middle_name',
            'name' => 'Population[middle_name]',
            'class' => 'form-control',
            'maxlength' => true,
        ]
    )?>

    <?= $form->field($model, 'birthday',
        [
        'options' => [
          'tag' => 'div',
          'class' => 'field item form-group',
        ],
        'template' => '<label class="col-form-label col-md-3 col-sm-3 label-align">'.Yii::t('yii', 'Туғилган санаси').' <span class="required">*</span></label><div class="col-md-6 col-sm-6 ">{input}<ul id="parsley-id-9" class="parsley-errors-list filled">{error}</ul>{hint}</div>',
        'errorOptions' => [
            'tag' => 'li',
            'class' => 'parsley-required',
        ],
      ]
    )->textInput(
        [
            'id' => 'population-birthday',
            'name' => 'Population[birthday]',
            'placeholder' => Yii::t('yii', 'КУН ОЙ ЙИЛ'),
            'class' => 'form-control',
            'data-inputmask' => "'mask' : '99.99.9999'",
        ]
    )?>



    <?= $form->field($model, 'gender',
        [
            'options' => [
              'tag' => 'div',
              'class' => 'item form-group'
            ],
            'template' => '<label class="col-form-label col-md-3 col-sm-3 label-align" for="population-second_name">'.Yii::t('yii', 'Жинси').' <span class="required">*</span></label><div class="col-md-6 col-sm-6 ">{input}<ul id="parsley-id-7" class="parsley-errors-list filled">{error}</ul>{hint}</div>',
            'errorOptions' => [
                'tag' => 'li',
                'class' => 'parsley-required',
            ],
        ])->dropDownList($model->gender(),
            [
                'id' => 'population-gender',
                'name' => 'Population[gender]',
                'class' => 'form-control',
                'prompt' => Yii::t('yii','Жинсини танланг'),
            ]
        ) ?>

    <?= $form->field($model, 'passport',
        [
            'options' => [
              'tag' => 'div',
              'class' => 'item form-group'
            ],
            'template' => '<label class="col-form-label col-md-3 col-sm-3 label-align" for="population-second_name">'.Yii::t('yii', 'Пасспорт').' <span class="required">*</span></label><div class="col-md-6 col-sm-6 ">{input}<ul id="parsley-id-7" class="parsley-errors-list filled">{error}</ul>{hint}</div>',
            'errorOptions' => [
                'tag' => 'li',
                'class' => 'parsley-required',
            ],
        ]
    )->textInput(
        [
            'id' => 'population-passport',
            'name' => 'Population[passport]',
            'placeholder' => Yii::t('yii', 'AA 1234567'),
            'class' => 'form-control',
            'data-inputmask' => "'mask' : 'AA 9999999'",
            'maxlength' => true
        ]
    ) ?>

    <?= $form->field($model, 'nation',
        [
            'options' => [
              'tag' => 'div',
              'class' => 'item form-group'
            ],
            'template' => '<label class="col-form-label col-md-3 col-sm-3 label-align" for="population-second_name">'.Yii::t('yii', 'Миллати').' <span class="required">*</span></label><div class="col-md-6 col-sm-6 ">{input}<ul id="parsley-id-7" class="parsley-errors-list filled">{error}</ul>{hint}</div>',
            'errorOptions' => [
                'tag' => 'li',
                'class' => 'parsley-required',
            ],
        ]
    )->textInput(
        [
            'id' => 'population-nation',
            'name' => 'Population[nation]',
            'class' => 'form-control',
            'placeholder' => Yii::t('yii', 'Ўзбек, Қозоқ, Рус, ...'),
            'maxlength' => true
        ]
    ) ?>

    <?php $city = Yii::$app->user->identity['city_id']?>

    <?php
        $town_block = \yii\helpers\ArrayHelper::map(\app\models\TownBlock::findAll(['city_id' => $city]), 'id', 'name');
    ?>

    <?= $form->field($model, 'town_block_id',
        [
            'options' => [
              'tag' => 'div',
              'class' => 'item form-group'
            ],
            'template' => '<label class="col-form-label col-md-3 col-sm-3 label-align" for="population-town_block_id">'.Yii::t('yii', 'Маҳалла').' <span class="required">*</span></label><div class="col-md-6 col-sm-6 ">{input}<ul class="parsley-errors-list filled">{error}</ul>{hint}</div>',
            'errorOptions' => [
                'tag' => 'li',
                'class' => 'parsley-required',
            ],
        ]
    )->dropDownList($town_block,
        [
            'id' => 'population-town_block_id',
            'name' => 'Population[town_block_id]',
            'class' => 'form-control',
            'prompt' => Yii::t('yii','Маҳаллани танланг'),
        ]
    ) ?>

    <?= $form->field($model, 'address',
        [
            'options' => [
              'tag' => 'div',
              'class' => 'item form-group'
            ],
            'template' => '<label class="col-form-label col-md-3 col-sm-3 label-align" for="population-second_name">'.Yii::t('yii', 'Манзил').' <span class="required">*</span></label><div class="col-md-6 col-sm-6 ">{input}<ul id="parsley-id-7" class="parsley-errors-list filled">{error}</ul>{hint}</div>',
            'errorOptions' => [
                'tag' => 'li',
                'class' => 'parsley-required',
            ],
        ]
    )->textInput(
        [
            'id' => 'population-address',
            'name' => 'Population[address]',
            'class' => 'form-control',
            'placeholder' => Yii::t('yii', 'Қишлоқ, Овул, Даҳа, Кўча, уй, ...'),
            'maxlength' => true
        ]
    ) ?>

    <?= $form->field($model, 'phone',
        [
            'options' => [
              'tag' => 'div',
              'class' => 'item form-group'
            ],
            'template' => '<label class="col-form-label col-md-3 col-sm-3 label-align" for="population-second_name">'.Yii::t('yii', 'Телефон').' <span class="required">*</span></label><div class="col-md-6 col-sm-6 ">{input}<ul id="parsley-id-7" class="parsley-errors-list filled">{error}</ul>{hint}</div>',
            'errorOptions' => [
                'tag' => 'li',
                'class' => 'parsley-required',
            ],
        ]
    )->textInput(
        [
            'id' => 'population-phone',
            'name' => 'Population[phone]',
            'class' => 'form-control',
            'data-inputmask' => "'mask' : '(99) 999-99-99'",
            'maxlength' => true,
            'placeholder' => Yii::t('yii', '(99) (999-99-99)'),
        ]
    ) ?>

    <?= $form->field($model, 'email',
        [
            'options' => [
              'tag' => 'div',
              'class' => 'item form-group'
            ],
            'template' => '<label class="col-form-label col-md-3 col-sm-3 label-align" for="population-second_name">'.Yii::t('yii', 'Электрон почта').' <span class="required">*</span></label><div class="col-md-6 col-sm-6 ">{input}<ul id="parsley-id-7" class="parsley-errors-list filled">{error}</ul>{hint}</div>',
            'errorOptions' => [
                'tag' => 'li',
                'class' => 'parsley-required',
            ],
        ]
    )->textInput(
        [
            'id' => 'population-email',
            'name' => 'Population[email]',
            'class' => 'form-control',
            'maxlength' => true,
            'placeholder' => Yii::t('yii', 'mahalla.mail.ru'),
        ]
    ) ?>

    <?php  endif;?>

    <?php if(User::isMahhallaRaisi() || User::isKotib() || User::isMaslahatchi() || User::isPospon() || User::isInspektor()):?>

    <div class="text-center">
        <?php if($model->image):?>
        <?= $form->field($model, 'image', ['template' => (!$model->isNewRecord)?'<label class="upload-label" '.'style="background-image:url(\''.\yii\helpers\Url::base().'/web/'.$model->image.'\')">{input}{error}{hint}</label>{label}':'<label class="upload-label">{input}{error}{hint}</label>{label}','inputOptions' => ['class' => 'upload-image'],'labelOptions' => ['class' => 'btn btn-default','style'=>'display:block;margin:auto;width:120px;margin-top:10px'], ])->fileInput(); ?>
        <?php else:?>
        <?= $form->field($model, 'image', ['template' => ($model->isNewRecord && !$model->isNewRecord)?'<label class="upload-label" '.'style="background-image:url(\''.\yii\helpers\Url::base().'/web/'.$model->image.'\')">{input}{error}{hint}</label>{label}':'<label class="upload-label">{input}{error}{hint}</label>{label}','inputOptions' => ['class' => 'upload-image'],'labelOptions' => ['class' => 'btn btn-default','style'=>'display:block;margin:auto;width:120px;margin-top:10px'], ])->fileInput(); ?>
        <?php endif?>
    </div>

    <?= $form->field($model, 'first_name',
        [
        'options' => [
          'tag' => 'div',
          'class' => 'item form-group'
        ],
        'template' => '<label class="col-form-label col-md-3 col-sm-3 label-align" for="population-first_name">'.Yii::t('yii', 'Фамилия').' <span class="required">*</span></label><div class="col-md-6 col-sm-6 ">{input}<ul id="parsley-id-5" class="parsley-errors-list filled">{error}</ul>{hint}</div>',
        'errorOptions' => [
            'tag' => 'li',
            'class' => 'parsley-required',
        ],
      ]
    )->textInput(
        [
            'placeholder' => Yii::t('yii', 'Фамилияси'),
            'id' => 'population-first_name',
            'name' => 'Population[first_name]',
            'class' => 'form-control',
            'maxlength' => true,
        ]
    )?>

    <?= $form->field($model, 'second_name',
        [
        'options' => [
          'tag' => 'div',
          'class' => 'item form-group'
        ],
        'template' => '<label class="col-form-label col-md-3 col-sm-3 label-align" for="population-second_name">'.Yii::t('yii', 'Исм').' <span class="required">*</span></label><div class="col-md-6 col-sm-6 ">{input}<ul id="parsley-id-7" class="parsley-errors-list filled">{error}</ul>{hint}</div>',
        'errorOptions' => [
            'tag' => 'li',
            'class' => 'parsley-required',
        ],
      ]
    )->textInput(
        [
            'placeholder' => Yii::t('yii', 'Исми'),
            'id' => 'population-second_name',
            'name' => 'Population[second_name]',
            'class' => 'form-control',
            'maxlength' => true,
        ]
    )?>

    <?= $form->field($model, 'middle_name',
        [
        'options' => [
          'tag' => 'div',
          'class' => 'item form-group',
        ],
        'template' => '<label class="col-form-label col-md-3 col-sm-3 label-align" for="population-middle_name">'.Yii::t('yii', 'Отаси').' <span class="required">*</span></label><div class="col-md-6 col-sm-6 ">{input}<ul id="parsley-id-9" class="parsley-errors-list filled">{error}</ul>{hint}</div>',
        'errorOptions' => [
            'tag' => 'li',
            'class' => 'parsley-required',
        ],
      ]
    )->textInput(
        [
            'placeholder' => Yii::t('yii', 'Отасининг исми'),
            'id' => 'population-middle_name',
            'name' => 'Population[middle_name]',
            'class' => 'form-control',
            'maxlength' => true,
        ]
    )?>

    <?= $form->field($model, 'birthday',
        [
        'options' => [
          'tag' => 'div',
          'class' => 'field item form-group',
        ],
        'template' => '<label class="col-form-label col-md-3 col-sm-3 label-align">'.Yii::t('yii', 'Туғилган санаси').' <span class="required">*</span></label><div class="col-md-6 col-sm-6 ">{input}<ul id="parsley-id-9" class="parsley-errors-list filled">{error}</ul>{hint}</div>',
        'errorOptions' => [
            'tag' => 'li',
            'class' => 'parsley-required',
        ],
      ]
    )->textInput(
        [
            'id' => 'population-birthday',
            'name' => 'Population[birthday]',
            'placeholder' => Yii::t('yii', 'КУН ОЙ ЙИЛ'),
            'class' => 'form-control',
            'data-inputmask' => "'mask' : '99.99.9999'",
        ]
    )?>



    <?= $form->field($model, 'gender',
        [
            'options' => [
              'tag' => 'div',
              'class' => 'item form-group'
            ],
            'template' => '<label class="col-form-label col-md-3 col-sm-3 label-align" for="population-second_name">'.Yii::t('yii', 'Жинси').' <span class="required">*</span></label><div class="col-md-6 col-sm-6 ">{input}<ul id="parsley-id-7" class="parsley-errors-list filled">{error}</ul>{hint}</div>',
            'errorOptions' => [
                'tag' => 'li',
                'class' => 'parsley-required',
            ],
        ])->dropDownList($model->gender(),
            [
                'id' => 'population-gender',
                'name' => 'Population[gender]',
                'class' => 'form-control',
                'prompt' => Yii::t('yii','Жинсини танланг'),
            ]
        ) ?>

    <?= $form->field($model, 'passport',
        [
            'options' => [
              'tag' => 'div',
              'class' => 'item form-group'
            ],
            'template' => '<label class="col-form-label col-md-3 col-sm-3 label-align" for="population-second_name">'.Yii::t('yii', 'Пасспорт').' <span class="required">*</span></label><div class="col-md-6 col-sm-6 ">{input}<ul id="parsley-id-7" class="parsley-errors-list filled">{error}</ul>{hint}</div>',
            'errorOptions' => [
                'tag' => 'li',
                'class' => 'parsley-required',
            ],
        ]
    )->textInput(
        [
            'id' => 'population-passport',
            'name' => 'Population[passport]',
            'placeholder' => Yii::t('yii', 'AA 1234567'),
            'class' => 'form-control',
            'data-inputmask' => "'mask' : 'AA 9999999'",
            'maxlength' => true
        ]
    ) ?>

    <?= $form->field($model, 'nation',
        [
            'options' => [
              'tag' => 'div',
              'class' => 'item form-group'
            ],
            'template' => '<label class="col-form-label col-md-3 col-sm-3 label-align" for="population-second_name">'.Yii::t('yii', 'Миллати').' <span class="required">*</span></label><div class="col-md-6 col-sm-6 ">{input}<ul id="parsley-id-7" class="parsley-errors-list filled">{error}</ul>{hint}</div>',
            'errorOptions' => [
                'tag' => 'li',
                'class' => 'parsley-required',
            ],
        ]
    )->textInput(
        [
            'id' => 'population-nation',
            'name' => 'Population[nation]',
            'class' => 'form-control',
            'placeholder' => Yii::t('yii', 'Ўзбек, Қозоқ, Рус, ...'),
            'maxlength' => true
        ]
    ) ?>

    <?= $form->field($model, 'address',
        [
            'options' => [
              'tag' => 'div',
              'class' => 'item form-group'
            ],
            'template' => '<label class="col-form-label col-md-3 col-sm-3 label-align" for="population-second_name">'.Yii::t('yii', 'Манзил').' <span class="required">*</span></label><div class="col-md-6 col-sm-6 ">{input}<ul id="parsley-id-7" class="parsley-errors-list filled">{error}</ul>{hint}</div>',
            'errorOptions' => [
                'tag' => 'li',
                'class' => 'parsley-required',
            ],
        ]
    )->textInput(
        [
            'id' => 'population-address',
            'name' => 'Population[address]',
            'class' => 'form-control',
            'placeholder' => Yii::t('yii', 'Қишлоқ, Овул, Даҳа, Кўча, уй, ...'),
            'maxlength' => true
        ]
    ) ?>

    <?= $form->field($model, 'phone',
        [
            'options' => [
              'tag' => 'div',
              'class' => 'item form-group'
            ],
            'template' => '<label class="col-form-label col-md-3 col-sm-3 label-align" for="population-second_name">'.Yii::t('yii', 'Телефон').' <span class="required">*</span></label><div class="col-md-6 col-sm-6 ">{input}<ul id="parsley-id-7" class="parsley-errors-list filled">{error}</ul>{hint}</div>',
            'errorOptions' => [
                'tag' => 'li',
                'class' => 'parsley-required',
            ],
        ]
    )->textInput(
        [
            'id' => 'population-phone',
            'name' => 'Population[phone]',
            'class' => 'form-control',
            'data-inputmask' => "'mask' : '(99) 999-99-99'",
            'maxlength' => true,
            'placeholder' => Yii::t('yii', '(99) (999-99-99)'),
        ]
    ) ?>

    <?= $form->field($model, 'email',
        [
            'options' => [
              'tag' => 'div',
              'class' => 'item form-group'
            ],
            'template' => '<label class="col-form-label col-md-3 col-sm-3 label-align" for="population-second_name">'.Yii::t('yii', 'Электрон почта').' <span class="required">*</span></label><div class="col-md-6 col-sm-6 ">{input}<ul id="parsley-id-7" class="parsley-errors-list filled">{error}</ul>{hint}</div>',
            'errorOptions' => [
                'tag' => 'li',
                'class' => 'parsley-required',
            ],
        ]
    )->textInput(
        [
            'id' => 'population-email',
            'name' => 'Population[email]',
            'class' => 'form-control',
            'maxlength' => true,
            'placeholder' => Yii::t('yii', 'mahalla.mail.ru'),
        ]
    ) ?>

    <?php  endif;?>

    <div class="item form-group">
        <div class="col-md-6 col-sm-6 offset-md-3">
            <?= Html::submitButton($model->isNewRecord ? Yii::t('yii', 'Сақлаш') 
                : Yii::t('yii', 'Янгилаш'), ['class' => $model->isNewRecord 
                ? 'btn btn-success' : 'btn btn-primary']) ?>
            <?= Html::a(Yii::t('yii', 'Орқага'), ['site/index'], ['class' => 'btn btn-default']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<style>
.has-error .form-control {
    background: #FAEDEC;
    border: 1px solid #E85445;
}
</style>
<style>
.btn-default {
  color: #333;
  background-color: #fff;
  border-color: #ccc;
}
.btn-default:focus,
.btn-default.focus {
  color: #333;
  background-color: #e6e6e6;
  border-color: #8c8c8c;
}
.btn-default:hover {
  color: #333;
  background-color: #e6e6e6;
  border-color: #adadad;
}
.btn-default:active,
.btn-default.active,
.open > .dropdown-toggle.btn-default {
  color: #333;
  background-color: #e6e6e6;
  background-image: none;
  border-color: #adadad;
}
.btn-default:active:hover,
.btn-default.active:hover,
.open > .dropdown-toggle.btn-default:hover,
.btn-default:active:focus,
.btn-default.active:focus,
.open > .dropdown-toggle.btn-default:focus,
.btn-default:active.focus,
.btn-default.active.focus,
.open > .dropdown-toggle.btn-default.focus {
  color: #333;
  background-color: #d4d4d4;
  border-color: #8c8c8c;
}
.btn-default.disabled:hover,
.btn-default[disabled]:hover,
fieldset[disabled] .btn-default:hover,
.btn-default.disabled:focus,
.btn-default[disabled]:focus,
fieldset[disabled] .btn-default:focus,
.btn-default.disabled.focus,
.btn-default[disabled].focus,
fieldset[disabled] .btn-default.focus {
  background-color: #fff;
  border-color: #ccc;
}
.btn-default .badge {
  color: #fff;
  background-color: #333;
}
</style>
