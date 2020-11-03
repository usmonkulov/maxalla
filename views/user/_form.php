<?php
use app\rbac\models\AuthItem;
use kartik\password\PasswordInput;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\User;

/* @var $this yii\web\View */
/* @var $user app\models\User */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="user-form">

   

    <?php $form = ActiveForm::begin(
        [
            'options' => [
                'id' => 'demo-form2', 
                'data-parsley-validate class' => 'form-horizontal form-label-left'
            ]
        ]
    )?>

    <?php if(User::isTheCreator()):?>

    <div class="text-center">
        <?php if($user->avatar):?>
        <?= $form->field($user, 'avatar', ['template' => (!$user->isNewRecord)?'<label class="upload-label" '.'style="background-image:url(\''.\yii\helpers\Url::base().'/web/'.$user->avatar.'\')">{input}{error}{hint}</label>{label}':'<label class="upload-label">{input}{error}{hint}</label>{label}','inputOptions' => ['class' => 'upload-image'],'labelOptions' => ['class' => 'btn btn-default','style'=>'display:block;margin:auto;width:120px;margin-top:10px'], ])->fileInput(); ?>
        <?php else:?>
        <?= $form->field($user, 'avatar', ['template' => ($user->isNewRecord && !$user->isNewRecord)?'<label class="upload-label" '.'style="background-image:url(\''.\yii\helpers\Url::base().'/web/'.$user->avatar.'\')">{input}{error}{hint}</label>{label}':'<label class="upload-label">{input}{error}{hint}</label>{label}','inputOptions' => ['class' => 'upload-image'],'labelOptions' => ['class' => 'btn btn-default','style'=>'display:block;margin:auto;width:120px;margin-top:10px'], ])->fileInput(); ?>
        <?php endif?>
    </div>

    <?= $form->field($user, 'first_name',
        [
        'options' => [
          'tag' => 'div',
          'class' => 'item form-group'
        ],
        'template' => '<label class="col-form-label col-md-3 col-sm-3 label-align" for="user-first_name">'.Yii::t('yii', 'Фамилия').' <span class="required">*</span></label><div class="col-md-6 col-sm-6 ">{input}<ul id="parsley-id-5" class="parsley-errors-list filled">{error}</ul>{hint}</div>',
        'errorOptions' => [
            'tag' => 'li',
            'class' => 'parsley-required',
        ],
      ]
    )->textInput(
        [
            'placeholder' => Yii::t('yii', 'Фамилияси'),
            'id' => 'user-first_name',
            'name' => 'User[first_name]',
            'class' => 'form-control',
            'maxlength' => true,
        ]
    )?>

    <?= $form->field($user, 'second_name',
        [
        'options' => [
          'tag' => 'div',
          'class' => 'item form-group'
        ],
        'template' => '<label class="col-form-label col-md-3 col-sm-3 label-align" for="user-second_name">'.Yii::t('yii', 'Исм').' <span class="required">*</span></label><div class="col-md-6 col-sm-6 ">{input}<ul id="parsley-id-7" class="parsley-errors-list filled">{error}</ul>{hint}</div>',
        'errorOptions' => [
            'tag' => 'li',
            'class' => 'parsley-required',
        ],
      ]
    )->textInput(
        [
            'placeholder' => Yii::t('yii', 'Исми'),
            'id' => 'user-second_name',
            'name' => 'User[second_name]',
            'class' => 'form-control',
            'maxlength' => true,
        ]
    )?>

    <?= $form->field($user, 'middle_name',
        [
        'options' => [
          'tag' => 'div',
          'class' => 'item form-group',
        ],
        'template' => '<label class="col-form-label col-md-3 col-sm-3 label-align" for="user-middle_name">'.Yii::t('yii', 'Отаси').' <span class="required">*</span></label><div class="col-md-6 col-sm-6 ">{input}<ul id="parsley-id-9" class="parsley-errors-list filled">{error}</ul>{hint}</div>',
        'errorOptions' => [
            'tag' => 'li',
            'class' => 'parsley-required',
        ],
      ]
    )->textInput(
        [
            'placeholder' => Yii::t('yii', 'Отасининг исми'),
            'id' => 'user-middle_name',
            'name' => 'User[middle_name]',
            'class' => 'form-control',
            'maxlength' => true,
        ]
    )?>


    <?= $form->field($user, 'phone',
        [
            'options' => [
              'tag' => 'div',
              'class' => 'item form-group'
            ],
            'template' => '<label class="col-form-label col-md-3 col-sm-3 label-align" for="user-second_name">'.Yii::t('yii', 'Телефон').' <span class="required">*</span></label><div class="col-md-6 col-sm-6 ">{input}<ul id="parsley-id-7" class="parsley-errors-list filled">{error}</ul>{hint}</div>',
            'errorOptions' => [
                'tag' => 'li',
                'class' => 'parsley-required',
            ],
        ]
    )->textInput(
        [
            'id' => 'user-phone',
            'name' => 'User[phone]',
            'class' => 'form-control',
            'data-inputmask' => "'mask' : '(99) 999-99-99'",
            'maxlength' => true,
            'placeholder' => Yii::t('yii', '(99) (999-99-99)'),
        ]
    ) ?>

    <?= $form->field($user, 'email',
        [
        'options' => [
          'tag' => 'div',
          'class' => 'item form-group'
        ],
        'template' => '<label class="col-form-label col-md-3 col-sm-3 label-align" for="user-email">'.Yii::t('yii', 'Электрон почтаси').' <span class="required">*</span></label><div class="col-md-6 col-sm-6 ">{input}<ul id="parsley-id-5" class="parsley-errors-list filled">{error}</ul>{hint}</div>',
        'errorOptions' => [
            'tag' => 'li',
            'class' => 'parsley-required',
        ],
      ]
    )->textInput(
        [
            'placeholder' => Yii::t('yii', 'Электрон почта'),
            'id' => 'user-email',
            'name' => 'User[email]',
            'class' => 'form-control',
            'maxlength' => true,
        ]
    )?>

    <?= $form->field($user, 'username',
        [
        'options' => [
          'tag' => 'div',
          'class' => 'item form-group'
        ],
        'template' => '<label class="col-form-label col-md-3 col-sm-3 label-align" for="user-username">'.Yii::t('yii', 'Фойдаланувчи логини').' <span class="required">*</span></label><div class="col-md-6 col-sm-6 ">{input}<ul id="parsley-id-5" class="parsley-errors-list filled">{error}</ul>{hint}</div>',
        'errorOptions' => [
            'tag' => 'li',
            'class' => 'parsley-required',
        ],
      ]
    )->textInput(
        [
            'placeholder' => Yii::t('yii', 'Логин'),
            'id' => 'user-username',
            'name' => 'User[username]',
            'class' => 'form-control',
            'maxlength' => true,
        ]
    )?>
        

    <?php if ($user->scenario === 'create'): ?>

        <?= $form->field($user, 'password',
            [
            'options' => [
              'tag' => 'div',
              'class' => 'item form-group'
            ],
            'template' => '<label class="col-form-label col-md-3 col-sm-3 label-align" for="user-password">'.Yii::t('yii', 'Пароли').' <span class="required">*</span></label><div class="col-md-6 col-sm-6 ">{input}<ul id="parsley-id-5" class="parsley-errors-list filled">{error}</ul>{hint}</div>',
            'errorOptions' => [
                'tag' => 'li',
                'class' => 'parsley-required',
            ],
          ]
        )->widget(PasswordInput::classname(),
        [
            'options' => [
                'placeholder' => Yii::t('yii', 'Янги парол'),
                'id' => 'user-password',
                'name' => 'User[password]',
                'class' => 'form-control',
                'maxlength' => true,
            ]
        ]
        )?>

    <?php else: ?>

        <?= $form->field($user, 'password',
            [
            'options' => [
              'tag' => 'div',
              'class' => 'item form-group'
            ],
            'template' => '<label class="col-form-label col-md-3 col-sm-3 label-align" for="user-password">'.Yii::t('yii', 'Пароли').' <span class="required">*</span></label><div class="col-md-6 col-sm-6 ">{input}<ul id="parsley-id-5" class="parsley-errors-list filled">{error}</ul>{hint}</div>',
            'errorOptions' => [
                'tag' => 'li',
                'class' => 'parsley-required',
            ],
          ]
        )->widget(PasswordInput::classname(),
        [
            'options' => [
                'placeholder' => Yii::t('yii', 'Паролни ўзгартириш'),
                'id' => 'user-password',
                'name' => 'User[password]',
                'class' => 'form-control',
                'maxlength' => true,
            ]
        ]
        )?> 

    <?php endif ?>

    <?= $form->field($user, 'status',
        [
        'options' => [
          'tag' => 'div',
          'class' => 'item form-group'
        ],
        'template' => '<label class="col-form-label col-md-3 col-sm-3 label-align" for="user-status">'.Yii::t('yii', 'Ҳолати').' <span class="required">*</span></label><div class="col-md-6 col-sm-6 ">{input}<ul id="parsley-id-5" class="parsley-errors-list filled">{error}</ul>{hint}</div>',
        'errorOptions' => [
            'tag' => 'li',
            'class' => 'parsley-required',
        ],
      ]
    )->dropDownList($user->statusList)?> 


    <?php foreach (AuthItem::getRoles() as $item_name): ?>
        <?php $roles[$item_name->name] = $item_name->name ?>
    <?php endforeach ?>
        
    <?= $form->field($user, 'item_name',
        [
        'options' => [
          'tag' => 'div',
          'class' => 'item form-group'
        ],
        'template' => '<label class="col-form-label col-md-3 col-sm-3 label-align" for="user-item_name">'.Yii::t('yii', 'Ҳуқуқи').' <span class="required">*</span></label><div class="col-md-6 col-sm-6 ">{input}<ul id="parsley-id-5" class="parsley-errors-list filled">{error}</ul>{hint}</div>',
        'errorOptions' => [
            'tag' => 'li',
            'class' => 'parsley-required',
        ],
      ]
    )->dropDownList($roles)?> 
    
    <?php endif;?>


    <?php if(User::isAdmin()):?>
    <div class="text-center">
        <?php if($user->avatar):?>
        <?= $form->field($user, 'avatar', ['template' => (!$user->isNewRecord)?'<label class="upload-label" '.'style="background-image:url(\''.\yii\helpers\Url::base().'/'.$user->avatar.'\')">{input}{error}{hint}</label>{label}':'<label class="upload-label">{input}{error}{hint}</label>{label}','inputOptions' => ['class' => 'upload-image'],'labelOptions' => ['class' => 'btn btn-default','style'=>'display:block;margin:auto;width:120px;margin-top:10px'], ])->fileInput(); ?>
        <?php else:?>
        <?= $form->field($user, 'avatar', ['template' => ($user->isNewRecord && !$user->isNewRecord)?'<label class="upload-label" '.'style="background-image:url(\''.\yii\helpers\Url::base().'/'.$user->avatar.'\')">{input}{error}{hint}</label>{label}':'<label class="upload-label">{input}{error}{hint}</label>{label}','inputOptions' => ['class' => 'upload-image'],'labelOptions' => ['class' => 'btn btn-default','style'=>'display:block;margin:auto;width:120px;margin-top:10px'], ])->fileInput(); ?>
        <?php endif?>
    </div>

    <?= $form->field($user, 'first_name',
        [
        'options' => [
          'tag' => 'div',
          'class' => 'item form-group'
        ],
        'template' => '<label class="col-form-label col-md-3 col-sm-3 label-align" for="user-first_name">'.Yii::t('yii', 'Фамилия').' <span class="required">*</span></label><div class="col-md-6 col-sm-6 ">{input}<ul id="parsley-id-5" class="parsley-errors-list filled">{error}</ul>{hint}</div>',
        'errorOptions' => [
            'tag' => 'li',
            'class' => 'parsley-required',
        ],
      ]
    )->textInput(
        [
            'placeholder' => Yii::t('yii', 'Фамилияси'),
            'id' => 'user-first_name',
            'name' => 'User[first_name]',
            'class' => 'form-control',
            'maxlength' => true,
        ]
    )?>

    <?= $form->field($user, 'second_name',
        [
        'options' => [
          'tag' => 'div',
          'class' => 'item form-group'
        ],
        'template' => '<label class="col-form-label col-md-3 col-sm-3 label-align" for="user-second_name">'.Yii::t('yii', 'Исм').' <span class="required">*</span></label><div class="col-md-6 col-sm-6 ">{input}<ul id="parsley-id-7" class="parsley-errors-list filled">{error}</ul>{hint}</div>',
        'errorOptions' => [
            'tag' => 'li',
            'class' => 'parsley-required',
        ],
      ]
    )->textInput(
        [
            'placeholder' => Yii::t('yii', 'Исми'),
            'id' => 'user-second_name',
            'name' => 'User[second_name]',
            'class' => 'form-control',
            'maxlength' => true,
        ]
    )?>

    <?= $form->field($user, 'middle_name',
        [
            'options' => [
              'tag' => 'div',
              'class' => 'item form-group',
            ],
            'template' => '<label class="col-form-label col-md-3 col-sm-3 label-align" for="user-middle_name">'.Yii::t('yii', 'Отаси').' <span class="required">*</span></label><div class="col-md-6 col-sm-6 ">{input}<ul id="parsley-id-9" class="parsley-errors-list filled">{error}</ul>{hint}</div>',
            'errorOptions' => [
                'tag' => 'li',
                'class' => 'parsley-required',
            ],
        ]
    )->textInput(
        [
            'placeholder' => Yii::t('yii', 'Отасининг исми'),
            'id' => 'user-middle_name',
            'name' => 'User[middle_name]',
            'class' => 'form-control',
            'maxlength' => true,
        ]
    )?>

    <?= $form->field($user, 'birthday',
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
            'id' => 'user-birthday',
            'name' => 'User[birthday]',
            'placeholder' => Yii::t('yii', 'КУН ОЙ ЙИЛ'),
            'class' => 'form-control',
            'data-inputmask' => "'mask' : '99.99.9999'",
        ]
    )?>



    <?= $form->field($user, 'gender',
        [
            'options' => [
              'tag' => 'div',
              'class' => 'item form-group'
            ],
            'template' => '<label class="col-form-label col-md-3 col-sm-3 label-align" for="user-second_name">'.Yii::t('yii', 'Жинси').' <span class="required">*</span></label><div class="col-md-6 col-sm-6 ">{input}<ul id="parsley-id-7" class="parsley-errors-list filled">{error}</ul>{hint}</div>',
            'errorOptions' => [
                'tag' => 'li',
                'class' => 'parsley-required',
            ],
        ]
    )->dropDownList($user->gender(),
        [
            'id' => 'user-gender',
            'name' => 'User[gender]',
            'class' => 'form-control',
            'prompt' => Yii::t('yii','Жинсини танланг'),
        ]
    ) ?>

    <?= $form->field($user, 'passport',
        [
            'options' => [
              'tag' => 'div',
              'class' => 'item form-group'
            ],
            'template' => '<label class="col-form-label col-md-3 col-sm-3 label-align" for="user-second_name">'.Yii::t('yii', 'Пасспорт').' <span class="required">*</span></label><div class="col-md-6 col-sm-6 ">{input}<ul id="parsley-id-7" class="parsley-errors-list filled">{error}</ul>{hint}</div>',
            'errorOptions' => [
                'tag' => 'li',
                'class' => 'parsley-required',
            ],
        ]
    )->textInput(
        [
            'id' => 'user-passport',
            'name' => 'User[passport]',
            'placeholder' => Yii::t('yii', 'AA 1234567'),
            'class' => 'form-control',
            'data-inputmask' => "'mask' : 'AA 9999999'",
            'maxlength' => true
        ]
    ) ?>

    <?= $form->field($user, 'nation',
        [
            'options' => [
              'tag' => 'div',
              'class' => 'item form-group'
            ],
            'template' => '<label class="col-form-label col-md-3 col-sm-3 label-align" for="user-second_name">'.Yii::t('yii', 'Миллати').' <span class="required">*</span></label><div class="col-md-6 col-sm-6 ">{input}<ul id="parsley-id-7" class="parsley-errors-list filled">{error}</ul>{hint}</div>',
            'errorOptions' => [
                'tag' => 'li',
                'class' => 'parsley-required',
            ],
        ]
    )->textInput(
        [
            'id' => 'user-nation',
            'name' => 'User[nation]',
            'class' => 'form-control',
            'placeholder' => Yii::t('yii', 'Ўзбек, Қозоқ, Рус, ...'),
            'maxlength' => true
        ]
    ) ?>
    
     <?php $region = \yii\helpers\ArrayHelper::map(\app\models\Region::find()->all(), 'id', 'name'); ?>

    <?= $form->field($user, 'region_id',
        [
            'options' => [
              'tag' => 'div',
              'class' => 'item form-group'
            ],
            'template' => '<label class="col-form-label col-md-3 col-sm-3 label-align" for="user-second_name">'.Yii::t('yii', 'Вилоят').' <span class="required">*</span></label><div class="col-md-6 col-sm-6 ">{input}<ul id="parsley-id-7" class="parsley-errors-list filled">{error}</ul>{hint}</div>',
            'errorOptions' => [
                'tag' => 'li',
                'class' => 'parsley-required',
            ],
        ]
    )->dropDownList($region, 
        [
            'id' => 'user-region_id',
            'name' => 'User[region_id]',
            'class' => 'form-control',
            'prompt' => Yii::t('yii','Вилоятни танланг'),
            'onchange' => '$.post("'.Yii::$app->urlManager->createUrl('user/city?id=').'"+$(this).val(),function(data){$("#user-city_id").html(data);});'
        ]
    ) ?>

    <?php
        $cities = \yii\helpers\ArrayHelper::map(\app\models\City::findAll(['region_id' => $user->region_id]), 'id', 'name');
    ?>
    
    <?= $form->field($user, 'city_id',
        [
            'options' => [
              'tag' => 'div',
              'class' => 'item form-group'
            ],
            'template' => '<label class="col-form-label col-md-3 col-sm-3 label-align" for="user-second_name">'.Yii::t('yii', 'Туман').' <span class="required">*</span></label><div class="col-md-6 col-sm-6 ">{input}<ul id="parsley-id-7" class="parsley-errors-list filled">{error}</ul>{hint}</div>',
            'errorOptions' => [
                'tag' => 'li',
                'class' => 'parsley-required',
            ],
        ]
    )->dropDownList($cities,
        [
            'id' => 'user-city_id',
            'name' => 'User[city_id]',
            'class' => 'form-control',
            'prompt' => Yii::t('yii','Туман ёки Шаҳарни танланг'),
             'onchange' => '$.post("'.Yii::$app->urlManager->createUrl('user/town-block?id=').'"+$(this).val(),function(data){$("#user-town_block_id").html(data);});'
        ]
    ) ?>

    <?php
        $town_block = \yii\helpers\ArrayHelper::map(\app\models\TownBlock::findAll(['city_id' => $user->city_id]), 'id', 'name');
    ?>
    
    <?= $form->field($user, 'town_block_id',
        [
            'options' => [
              'tag' => 'div',
              'class' => 'item form-group'
            ],
            'template' => '<label class="col-form-label col-md-3 col-sm-3 label-align" for="user-second_name">'.Yii::t('yii', 'Маҳалла').' <span class="required">*</span></label><div class="col-md-6 col-sm-6 ">{input}<ul id="parsley-id-7" class="parsley-errors-list filled">{error}</ul>{hint}</div>',
            'errorOptions' => [
                'tag' => 'li',
                'class' => 'parsley-required',
            ],
        ]
    )->dropDownList($town_block,
        [
            'id' => 'user-town_block_id',
            'name' => 'User[town_block_id]',
            'class' => 'form-control',
            'prompt' => Yii::t('yii','Маҳаллани танланг'),
        ]
    ) ?>

    <?= $form->field($user, 'address',
        [
            'options' => [
              'tag' => 'div',
              'class' => 'item form-group'
            ],
            'template' => '<label class="col-form-label col-md-3 col-sm-3 label-align" for="user-second_name">'.Yii::t('yii', 'Манзил').' <span class="required">*</span></label><div class="col-md-6 col-sm-6 ">{input}<ul id="parsley-id-7" class="parsley-errors-list filled">{error}</ul>{hint}</div>',
            'errorOptions' => [
                'tag' => 'li',
                'class' => 'parsley-required',
            ],
        ]
    )->textInput(
        [
            'id' => 'user-address',
            'name' => 'User[address]',
            'class' => 'form-control',
            'placeholder' => Yii::t('yii', 'Қишлоқ, Овул, Даҳа, Кўча, уй, ...'),
            'maxlength' => true
        ]
    ) ?>
    <?= $form->field($user, 'specialist',
        [
            'options' => [
              'tag' => 'div',
              'class' => 'item form-group'
            ],
            'template' => '<label class="col-form-label col-md-3 col-sm-3 label-align" for="user-second_name">'.Yii::t('yii', 'Мутахасислиги').' <span class="required">*</span></label><div class="col-md-6 col-sm-6 ">{input}<ul id="parsley-id-7" class="parsley-errors-list filled">{error}</ul>{hint}</div>',
            'errorOptions' => [
                'tag' => 'li',
                'class' => 'parsley-required',
            ],
        ]
    )->textInput(
        [
            'id' => 'user-specialist',
            'name' => 'User[specialist]',
            'class' => 'form-control',
            'placeholder' => Yii::t('yii', 'Дастурчи, Иқтисотчи, Инжинер...'),
            'maxlength' => true
        ]
    ) ?>

    <?= $form->field($user, 'be_elected_den',
        [
            'options' => [
              'tag' => 'div',
              'class' => 'field item form-group',
            ],
            'template' => '<label class="col-form-label col-md-3 col-sm-3 label-align">'.Yii::t('yii', 'Ишга кирган санаси').' <span class="required">*</span></label><div class="col-md-6 col-sm-6 ">{input}<ul id="parsley-id-9" class="parsley-errors-list filled">{error}</ul>{hint}</div>',
            'errorOptions' => [
                'tag' => 'li',
                'class' => 'parsley-required',
            ],
        ]
    )->textInput(
        [
            'id' => 'user-be_elected_den',
            'name' => 'User[be_elected_den]',
            'placeholder' => Yii::t('yii', 'КУН ОЙ ЙИЛ'),
            'class' => 'form-control',
            'data-inputmask' => "'mask' : '99.99.9999'",
        ]
    )?>


    <?= $form->field($user, 'phone',
        [
            'options' => [
              'tag' => 'div',
              'class' => 'item form-group'
            ],
            'template' => '<label class="col-form-label col-md-3 col-sm-3 label-align" for="user-second_name">'.Yii::t('yii', 'Телефон').' <span class="required">*</span></label><div class="col-md-6 col-sm-6 ">{input}<ul id="parsley-id-7" class="parsley-errors-list filled">{error}</ul>{hint}</div>',
            'errorOptions' => [
                'tag' => 'li',
                'class' => 'parsley-required',
            ],
        ]
    )->textInput(
        [
            'id' => 'user-phone',
            'name' => 'User[phone]',
            'class' => 'form-control',
            'data-inputmask' => "'mask' : '(99) 999-99-99'",
            'maxlength' => true,
            'placeholder' => Yii::t('yii', '(99) (999-99-99)'),
        ]
    ) ?>

    <?= $form->field($user, 'email',
        [
            'options' => [
              'tag' => 'div',
              'class' => 'item form-group'
            ],
            'template' => '<label class="col-form-label col-md-3 col-sm-3 label-align" for="user-email">'.Yii::t('yii', 'Электрон почтаси').' <span class="required">*</span></label><div class="col-md-6 col-sm-6 ">{input}<ul id="parsley-id-5" class="parsley-errors-list filled">{error}</ul>{hint}</div>',
            'errorOptions' => [
                'tag' => 'li',
                'class' => 'parsley-required',
            ],
        ]
    )->textInput(
        [
            'placeholder' => Yii::t('yii', 'Электрон почта'),
            'id' => 'user-email',
            'name' => 'User[email]',
            'class' => 'form-control',
            'maxlength' => true,
        ]
    )?>

    <?= $form->field($user, 'username',
        [
        'options' => [
          'tag' => 'div',
          'class' => 'item form-group'
        ],
        'template' => '<label class="col-form-label col-md-3 col-sm-3 label-align" for="user-username">'.Yii::t('yii', 'Фойдаланувчи логини').' <span class="required">*</span></label><div class="col-md-6 col-sm-6 ">{input}<ul id="parsley-id-5" class="parsley-errors-list filled">{error}</ul>{hint}</div>',
        'errorOptions' => [
            'tag' => 'li',
            'class' => 'parsley-required',
        ],
      ]
    )->textInput(
        [
            'placeholder' => Yii::t('yii', 'Логин'),
            'id' => 'user-username',
            'name' => 'User[username]',
            'class' => 'form-control',
            'maxlength' => true,
        ]
    )?>
        

    <?php if ($user->scenario === 'create'): ?>

    <?= $form->field($user, 'password',
        [
        'options' => [
          'tag' => 'div',
          'class' => 'item form-group'
        ],
        'template' => '<label class="col-form-label col-md-3 col-sm-3 label-align" for="user-password">'.Yii::t('yii', 'Пароли').' <span class="required">*</span></label><div class="col-md-6 col-sm-6 ">{input}<ul id="parsley-id-5" class="parsley-errors-list filled">{error}</ul>{hint}</div>',
        'errorOptions' => [
            'tag' => 'li',
            'class' => 'parsley-required',
        ],
      ]
    )->widget(PasswordInput::classname(),
        [
            'options' => [
                'placeholder' => Yii::t('yii', 'Янги парол'),
                'id' => 'user-password',
                'name' => 'User[password]',
                'class' => 'form-control',
                'maxlength' => true,
            ]
        ]
    )?>

    <?php else: ?>

    <?= $form->field($user, 'password',
        [
        'options' => [
          'tag' => 'div',
          'class' => 'item form-group'
        ],
        'template' => '<label class="col-form-label col-md-3 col-sm-3 label-align" for="user-password">'.Yii::t('yii', 'Пароли').' <span class="required">*</span></label><div class="col-md-6 col-sm-6 ">{input}<ul id="parsley-id-5" class="parsley-errors-list filled">{error}</ul>{hint}</div>',
        'errorOptions' => [
            'tag' => 'li',
            'class' => 'parsley-required',
        ],
      ]
    )->widget(PasswordInput::classname(),
    [
        'options' => [
            'placeholder' => Yii::t('yii', 'Паролни ўзгартириш'),
            'id' => 'user-password',
            'name' => 'User[password]',
            'class' => 'form-control',
            'maxlength' => true,
        ]
    ]
    )?> 

    <?php endif ?>

    <?= $form->field($user, 'status',
        [
        'options' => [
          'tag' => 'div',
          'class' => 'item form-group'
        ],
        'template' => '<label class="col-form-label col-md-3 col-sm-3 label-align" for="user-status">'.Yii::t('yii', 'Ҳолати').' <span class="required">*</span></label><div class="col-md-6 col-sm-6 ">{input}<ul id="parsley-id-5" class="parsley-errors-list filled">{error}</ul>{hint}</div>',
        'errorOptions' => [
            'tag' => 'li',
            'class' => 'parsley-required',
        ],
      ]
    )->dropDownList($user->statusList)?> 


    <?php foreach (AuthItem::getRoles() as $item_name): ?>
        <?php $roles[$item_name->name] = $item_name->name ?>
    <?php endforeach ?>
        
    <?= $form->field($user, 'item_name',
        [
        'options' => [
          'tag' => 'div',
          'class' => 'item form-group'
        ],
        'template' => '<label class="col-form-label col-md-3 col-sm-3 label-align" for="user-item_name">'.Yii::t('yii', 'Ҳуқуқи').' <span class="required">*</span></label><div class="col-md-6 col-sm-6 ">{input}<ul id="parsley-id-5" class="parsley-errors-list filled">{error}</ul>{hint}</div>',
        'errorOptions' => [
            'tag' => 'li',
            'class' => 'parsley-required',
        ],
      ]
    )->dropDownList($roles)?> 
    
    <?php endif;?>

    <?php if(User::isRespublikaRaisi()):?>
        <div class="text-center">
        <?php if($user->avatar):?>
        <?= $form->field($user, 'avatar', ['template' => (!$user->isNewRecord)?'<label class="upload-label" '.'style="background-image:url(\''.\yii\helpers\Url::base().'/web/'.$user->avatar.'\')">{input}{error}{hint}</label>{label}':'<label class="upload-label">{input}{error}{hint}</label>{label}','inputOptions' => ['class' => 'upload-image'],'labelOptions' => ['class' => 'btn btn-default','style'=>'display:block;margin:auto;width:120px;margin-top:10px'], ])->fileInput(); ?>
        <?php else:?>
        <?= $form->field($user, 'avatar', ['template' => ($user->isNewRecord && !$user->isNewRecord)?'<label class="upload-label" '.'style="background-image:url(\''.\yii\helpers\Url::base().'/web/'.$user->avatar.'\')">{input}{error}{hint}</label>{label}':'<label class="upload-label">{input}{error}{hint}</label>{label}','inputOptions' => ['class' => 'upload-image'],'labelOptions' => ['class' => 'btn btn-default','style'=>'display:block;margin:auto;width:120px;margin-top:10px'], ])->fileInput(); ?>
        <?php endif?>
    </div>

       <?= $form->field($user, 'first_name',
        [
        'options' => [
          'tag' => 'div',
          'class' => 'item form-group'
        ],
        'template' => '<label class="col-form-label col-md-3 col-sm-3 label-align" for="user-first_name">'.Yii::t('yii', 'Фамилия').' <span class="required">*</span></label><div class="col-md-6 col-sm-6 ">{input}<ul id="parsley-id-5" class="parsley-errors-list filled">{error}</ul>{hint}</div>',
        'errorOptions' => [
            'tag' => 'li',
            'class' => 'parsley-required',
        ],
      ]
    )->textInput(
        [
            'placeholder' => Yii::t('yii', 'Фамилияси'),
            'id' => 'user-first_name',
            'name' => 'User[first_name]',
            'class' => 'form-control',
            'maxlength' => true,
        ]
    )?>

    <?= $form->field($user, 'second_name',
        [
        'options' => [
          'tag' => 'div',
          'class' => 'item form-group'
        ],
        'template' => '<label class="col-form-label col-md-3 col-sm-3 label-align" for="user-second_name">'.Yii::t('yii', 'Исм').' <span class="required">*</span></label><div class="col-md-6 col-sm-6 ">{input}<ul id="parsley-id-7" class="parsley-errors-list filled">{error}</ul>{hint}</div>',
        'errorOptions' => [
            'tag' => 'li',
            'class' => 'parsley-required',
        ],
      ]
    )->textInput(
        [
            'placeholder' => Yii::t('yii', 'Исм'),
            'id' => 'user-second_name',
            'name' => 'User[second_name]',
            'class' => 'form-control',
            'maxlength' => true,
        ]
    )?>

    <?= $form->field($user, 'middle_name',
        [
        'options' => [
          'tag' => 'div',
          'class' => 'item form-group',
        ],
        'template' => '<label class="col-form-label col-md-3 col-sm-3 label-align" for="user-middle_name">'.Yii::t('yii', 'Отаси').' <span class="required">*</span></label><div class="col-md-6 col-sm-6 ">{input}<ul id="parsley-id-9" class="parsley-errors-list filled">{error}</ul>{hint}</div>',
        'errorOptions' => [
            'tag' => 'li',
            'class' => 'parsley-required',
        ],
      ]
    )->textInput(
        [
            'placeholder' => Yii::t('yii', 'Отасининг исми'),
            'id' => 'user-middle_name',
            'name' => 'User[middle_name]',
            'class' => 'form-control',
            'maxlength' => true,
        ]
    )?>

    <?= $form->field($user, 'birthday',
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
            'id' => 'user-birthday',
            'name' => 'User[birthday]',
            'placeholder' => Yii::t('yii', 'КУН ОЙ ЙИЛ'),
            'class' => 'form-control',
            'data-inputmask' => "'mask' : '99.99.9999'",
        ]
    )?>



    <?= $form->field($user, 'gender',
        [
            'options' => [
              'tag' => 'div',
              'class' => 'item form-group'
            ],
            'template' => '<label class="col-form-label col-md-3 col-sm-3 label-align" for="user-second_name">'.Yii::t('yii', 'Жинси').' <span class="required">*</span></label><div class="col-md-6 col-sm-6 ">{input}<ul id="parsley-id-7" class="parsley-errors-list filled">{error}</ul>{hint}</div>',
            'errorOptions' => [
                'tag' => 'li',
                'class' => 'parsley-required',
            ],
        ])->dropDownList($user->gender(),
            [
                'id' => 'user-gender',
                'name' => 'User[gender]',
                'class' => 'form-control',
                'prompt' => Yii::t('yii','Жинсини танланг'),
            ]
        ) ?>

    <?= $form->field($user, 'passport',
        [
            'options' => [
              'tag' => 'div',
              'class' => 'item form-group'
            ],
            'template' => '<label class="col-form-label col-md-3 col-sm-3 label-align" for="user-second_name">'.Yii::t('yii', 'Пасспорт').' <span class="required">*</span></label><div class="col-md-6 col-sm-6 ">{input}<ul id="parsley-id-7" class="parsley-errors-list filled">{error}</ul>{hint}</div>',
            'errorOptions' => [
                'tag' => 'li',
                'class' => 'parsley-required',
            ],
        ]
    )->textInput(
        [
            'id' => 'user-passport',
            'name' => 'User[passport]',
            'placeholder' => Yii::t('yii', 'AA 1234567'),
            'class' => 'form-control',
            'data-inputmask' => "'mask' : 'AA 9999999'",
            'maxlength' => true
        ]
    ) ?>

    <?= $form->field($user, 'nation',
        [
            'options' => [
              'tag' => 'div',
              'class' => 'item form-group'
            ],
            'template' => '<label class="col-form-label col-md-3 col-sm-3 label-align" for="user-second_name">'.Yii::t('yii', 'Миллати').' <span class="required">*</span></label><div class="col-md-6 col-sm-6 ">{input}<ul id="parsley-id-7" class="parsley-errors-list filled">{error}</ul>{hint}</div>',
            'errorOptions' => [
                'tag' => 'li',
                'class' => 'parsley-required',
            ],
        ]
    )->textInput(
        [
            'id' => 'user-nation',
            'name' => 'User[nation]',
            'class' => 'form-control',
            'placeholder' => Yii::t('yii', 'Ўзбек, Қозоқ, Рус, ...'),
            'maxlength' => true
        ]
    ) ?>
    
    <?php $region = \yii\helpers\ArrayHelper::map(\app\models\Region::find()->all(), 'id', 'name'); ?>

    <?= $form->field($user, 'region_id',
        [
            'options' => [
              'tag' => 'div',
              'class' => 'item form-group'
            ],
            'template' => '<label class="col-form-label col-md-3 col-sm-3 label-align" for="user-second_name">'.Yii::t('yii', 'Вилоят').' <span class="required">*</span></label><div class="col-md-6 col-sm-6 ">{input}<ul id="parsley-id-7" class="parsley-errors-list filled">{error}</ul>{hint}</div>',
            'errorOptions' => [
                'tag' => 'li',
                'class' => 'parsley-required',
            ],
        ]
    )->dropDownList($region, 
        [
            'id' => 'user-region_id',
            'name' => 'User[region_id]',
            'class' => 'form-control',
            'prompt' => Yii::t('yii','Вилоятни танланг'),
        ]
    ) ?>

     <?= $form->field($user, 'specialist',
        [
            'options' => [
              'tag' => 'div',
              'class' => 'item form-group'
            ],
            'template' => '<label class="col-form-label col-md-3 col-sm-3 label-align" for="user-second_name">'.Yii::t('yii', 'Мутахасислиги').' <span class="required">*</span></label><div class="col-md-6 col-sm-6 ">{input}<ul id="parsley-id-7" class="parsley-errors-list filled">{error}</ul>{hint}</div>',
            'errorOptions' => [
                'tag' => 'li',
                'class' => 'parsley-required',
            ],
        ]
    )->textInput(
        [
            'id' => 'user-specialist',
            'name' => 'User[specialist]',
            'class' => 'form-control',
            'placeholder' => Yii::t('yii', 'Дастурчи, Иқтисотчи, Инжинер...'),
            'maxlength' => true
        ]
    ) ?>

     <?= $form->field($user, 'be_elected_den',
        [
        'options' => [
          'tag' => 'div',
          'class' => 'field item form-group',
        ],
        'template' => '<label class="col-form-label col-md-3 col-sm-3 label-align">'.Yii::t('yii', 'Ишга кирган санаси').' <span class="required">*</span></label><div class="col-md-6 col-sm-6 ">{input}<ul id="parsley-id-9" class="parsley-errors-list filled">{error}</ul>{hint}</div>',
        'errorOptions' => [
            'tag' => 'li',
            'class' => 'parsley-required',
        ],
      ]
    )->textInput(
        [
            'id' => 'user-be_elected_den',
            'name' => 'User[be_elected_den]',
            'placeholder' => Yii::t('yii', 'КУН ОЙ ЙИЛ'),
            'class' => 'form-control',
            'data-inputmask' => "'mask' : '99.99.9999'",
        ]
    )?>


    <?= $form->field($user, 'phone',
        [
            'options' => [
              'tag' => 'div',
              'class' => 'item form-group'
            ],
            'template' => '<label class="col-form-label col-md-3 col-sm-3 label-align" for="user-second_name">'.Yii::t('yii', 'Телефон').' <span class="required">*</span></label><div class="col-md-6 col-sm-6 ">{input}<ul id="parsley-id-7" class="parsley-errors-list filled">{error}</ul>{hint}</div>',
            'errorOptions' => [
                'tag' => 'li',
                'class' => 'parsley-required',
            ],
        ]
    )->textInput(
        [
            'id' => 'user-phone',
            'name' => 'User[phone]',
            'class' => 'form-control',
            'data-inputmask' => "'mask' : '(99) 999-99-99'",
            'maxlength' => true,
            'placeholder' => Yii::t('yii', '(99) (999-99-99)'),
        ]
    ) ?>

     <?= $form->field($user, 'email',
            [
            'options' => [
              'tag' => 'div',
              'class' => 'item form-group'
            ],
            'template' => '<label class="col-form-label col-md-3 col-sm-3 label-align" for="user-email">'.Yii::t('yii', 'Электрон почтаси').' <span class="required">*</span></label><div class="col-md-6 col-sm-6 ">{input}<ul id="parsley-id-5" class="parsley-errors-list filled">{error}</ul>{hint}</div>',
            'errorOptions' => [
                'tag' => 'li',
                'class' => 'parsley-required',
            ],
          ]
        )->textInput(
            [
                'placeholder' => Yii::t('yii', 'Электрон почта'),
                'id' => 'user-email',
                'name' => 'User[email]',
                'class' => 'form-control',
                'maxlength' => true,
            ]
        )?>

        <?= $form->field($user, 'username',
            [
            'options' => [
              'tag' => 'div',
              'class' => 'item form-group'
            ],
            'template' => '<label class="col-form-label col-md-3 col-sm-3 label-align" for="user-username">'.Yii::t('yii', 'Фойдаланувчи логини').' <span class="required">*</span></label><div class="col-md-6 col-sm-6 ">{input}<ul id="parsley-id-5" class="parsley-errors-list filled">{error}</ul>{hint}</div>',
            'errorOptions' => [
                'tag' => 'li',
                'class' => 'parsley-required',
            ],
          ]
        )->textInput(
            [
                'placeholder' => Yii::t('yii', 'Логин'),
                'id' => 'user-username',
                'name' => 'User[username]',
                'class' => 'form-control',
                'maxlength' => true,
            ]
        )?>
        

        <?php if ($user->scenario === 'create'): ?>

            <?= $form->field($user, 'password',
                [
                'options' => [
                  'tag' => 'div',
                  'class' => 'item form-group'
                ],
                'template' => '<label class="col-form-label col-md-3 col-sm-3 label-align" for="user-password">'.Yii::t('yii', 'Пароли').' <span class="required">*</span></label><div class="col-md-6 col-sm-6 ">{input}<ul id="parsley-id-5" class="parsley-errors-list filled">{error}</ul>{hint}</div>',
                'errorOptions' => [
                    'tag' => 'li',
                    'class' => 'parsley-required',
                ],
              ]
            )->widget(PasswordInput::classname(),
            [
                'options' => [
                    'placeholder' => Yii::t('yii', 'Янги парол'),
                    'id' => 'user-password',
                    'name' => 'User[password]',
                    'class' => 'form-control',
                    'maxlength' => true,
                ]
            ]
            )?>

        <?php else: ?>

            <?= $form->field($user, 'password',
                [
                'options' => [
                  'tag' => 'div',
                  'class' => 'item form-group'
                ],
                'template' => '<label class="col-form-label col-md-3 col-sm-3 label-align" for="user-password">'.Yii::t('yii', 'Пароли').' <span class="required">*</span></label><div class="col-md-6 col-sm-6 ">{input}<ul id="parsley-id-5" class="parsley-errors-list filled">{error}</ul>{hint}</div>',
                'errorOptions' => [
                    'tag' => 'li',
                    'class' => 'parsley-required',
                ],
              ]
            )->widget(PasswordInput::classname(),
            [
                'options' => [
                    'placeholder' => Yii::t('yii', 'Паролни ўзгартириш'),
                    'id' => 'user-password',
                    'name' => 'User[password]',
                    'class' => 'form-control',
                    'maxlength' => true,
                ]
            ]
            )?> 

        <?php endif ?>

        <?= $form->field($user, 'status',
                [
                'options' => [
                  'tag' => 'div',
                  'class' => 'item form-group'
                ],
                'template' => '<label class="col-form-label col-md-3 col-sm-3 label-align" for="user-status">'.Yii::t('yii', 'Ҳолати').' <span class="required">*</span></label><div class="col-md-6 col-sm-6 ">{input}<ul id="parsley-id-5" class="parsley-errors-list filled">{error}</ul>{hint}</div>',
                'errorOptions' => [
                    'tag' => 'li',
                    'class' => 'parsley-required',
                ],
              ]
            )->dropDownList($user->statusList)?> 


        <?php foreach (AuthItem::getRoles() as $item_name): ?>
            <?php $roles[$item_name->name] = $item_name->name ?>
        <?php endforeach ?>
            
        <?= $form->field($user, 'item_name',
            [
            'options' => [
              'tag' => 'div',
              'class' => 'item form-group'
            ],
            'template' => '<label class="col-form-label col-md-3 col-sm-3 label-align" for="user-item_name">'.Yii::t('yii', 'Ҳуқуқи').' <span class="required">*</span></label><div class="col-md-6 col-sm-6 ">{input}<ul id="parsley-id-5" class="parsley-errors-list filled">{error}</ul>{hint}</div>',
            'errorOptions' => [
                'tag' => 'li',
                'class' => 'parsley-required',
            ],
          ]
        )->dropDownList($roles)?> 
        
<?php
// $this->registerJs("

// $('#user-item_name').click(function(){
//     if($('#user-item_name').val() == 'respublikaHodimi'){
//         $(\"#user-region_id\").prop( \"disabled\", true );
//         $(\"#user-region_id\").prop( \"value\", '' );
//     } else {
//         $(\"#user-region_id\").prop( \"disabled\", false );
//     }
// });
// ", \yii\web\View::POS_READY);
?>

        <?php endif;?>


    <?php if(User::isRespublikaHodimi()):?>
    <div class="text-center">
        <?php if($user->avatar):?>
        <?= $form->field($user, 'avatar', ['template' => (!$user->isNewRecord)?'<label class="upload-label" '.'style="background-image:url(\''.\yii\helpers\Url::base().'/web/'.$user->avatar.'\')">{input}{error}{hint}</label>{label}':'<label class="upload-label">{input}{error}{hint}</label>{label}','inputOptions' => ['class' => 'upload-image'],'labelOptions' => ['class' => 'btn btn-default','style'=>'display:block;margin:auto;width:120px;margin-top:10px'], ])->fileInput(); ?>
        <?php else:?>
        <?= $form->field($user, 'avatar', ['template' => ($user->isNewRecord && !$user->isNewRecord)?'<label class="upload-label" '.'style="background-image:url(\''.\yii\helpers\Url::base().'/web/'.$user->avatar.'\')">{input}{error}{hint}</label>{label}':'<label class="upload-label">{input}{error}{hint}</label>{label}','inputOptions' => ['class' => 'upload-image'],'labelOptions' => ['class' => 'btn btn-default','style'=>'display:block;margin:auto;width:120px;margin-top:10px'], ])->fileInput(); ?>
        <?php endif?>
    </div>
       <?= $form->field($user, 'first_name',
        [
        'options' => [
          'tag' => 'div',
          'class' => 'item form-group'
        ],
        'template' => '<label class="col-form-label col-md-3 col-sm-3 label-align" for="user-first_name">'.Yii::t('yii', 'Фамилия').' <span class="required">*</span></label><div class="col-md-6 col-sm-6 ">{input}<ul id="parsley-id-5" class="parsley-errors-list filled">{error}</ul>{hint}</div>',
        'errorOptions' => [
            'tag' => 'li',
            'class' => 'parsley-required',
        ],
      ]
    )->textInput(
        [
            'placeholder' => Yii::t('yii', 'Фамилияси'),
            'id' => 'user-first_name',
            'name' => 'User[first_name]',
            'class' => 'form-control',
            'maxlength' => true,
        ]
    )?>

    <?= $form->field($user, 'second_name',
        [
        'options' => [
          'tag' => 'div',
          'class' => 'item form-group'
        ],
        'template' => '<label class="col-form-label col-md-3 col-sm-3 label-align" for="user-second_name">'.Yii::t('yii', 'Исм').' <span class="required">*</span></label><div class="col-md-6 col-sm-6 ">{input}<ul id="parsley-id-7" class="parsley-errors-list filled">{error}</ul>{hint}</div>',
        'errorOptions' => [
            'tag' => 'li',
            'class' => 'parsley-required',
        ],
      ]
    )->textInput(
        [
            'placeholder' => Yii::t('yii', 'Исм'),
            'id' => 'user-second_name',
            'name' => 'User[second_name]',
            'class' => 'form-control',
            'maxlength' => true,
        ]
    )?>

    <?= $form->field($user, 'middle_name',
        [
        'options' => [
          'tag' => 'div',
          'class' => 'item form-group',
        ],
        'template' => '<label class="col-form-label col-md-3 col-sm-3 label-align" for="user-middle_name">'.Yii::t('yii', 'Отаси').' <span class="required">*</span></label><div class="col-md-6 col-sm-6 ">{input}<ul id="parsley-id-9" class="parsley-errors-list filled">{error}</ul>{hint}</div>',
        'errorOptions' => [
            'tag' => 'li',
            'class' => 'parsley-required',
        ],
      ]
    )->textInput(
        [
            'placeholder' => Yii::t('yii', 'Отасининг исми'),
            'id' => 'user-middle_name',
            'name' => 'User[middle_name]',
            'class' => 'form-control',
            'maxlength' => true,
        ]
    )?>

    <?= $form->field($user, 'birthday',
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
            'id' => 'user-birthday',
            'name' => 'User[birthday]',
            'placeholder' => Yii::t('yii', 'КУН ОЙ ЙИЛ'),
            'class' => 'form-control',
            'data-inputmask' => "'mask' : '99.99.9999'",
        ]
    )?>



    <?= $form->field($user, 'gender',
        [
            'options' => [
              'tag' => 'div',
              'class' => 'item form-group'
            ],
            'template' => '<label class="col-form-label col-md-3 col-sm-3 label-align" for="user-second_name">'.Yii::t('yii', 'Жинси').' <span class="required">*</span></label><div class="col-md-6 col-sm-6 ">{input}<ul id="parsley-id-7" class="parsley-errors-list filled">{error}</ul>{hint}</div>',
            'errorOptions' => [
                'tag' => 'li',
                'class' => 'parsley-required',
            ],
        ])->dropDownList($user->gender(),
            [
                'id' => 'user-gender',
                'name' => 'User[gender]',
                'class' => 'form-control',
                'prompt' => Yii::t('yii','Жинсини танланг'),
            ]
        ) ?>

    <?= $form->field($user, 'passport',
        [
            'options' => [
              'tag' => 'div',
              'class' => 'item form-group'
            ],
            'template' => '<label class="col-form-label col-md-3 col-sm-3 label-align" for="user-second_name">'.Yii::t('yii', 'Пасспорт').' <span class="required">*</span></label><div class="col-md-6 col-sm-6 ">{input}<ul id="parsley-id-7" class="parsley-errors-list filled">{error}</ul>{hint}</div>',
            'errorOptions' => [
                'tag' => 'li',
                'class' => 'parsley-required',
            ],
        ]
    )->textInput(
        [
            'id' => 'user-passport',
            'name' => 'User[passport]',
            'placeholder' => Yii::t('yii', 'AA 1234567'),
            'class' => 'form-control',
            'data-inputmask' => "'mask' : 'AA 9999999'",
            'maxlength' => true
        ]
    ) ?>

    <?= $form->field($user, 'nation',
        [
            'options' => [
              'tag' => 'div',
              'class' => 'item form-group'
            ],
            'template' => '<label class="col-form-label col-md-3 col-sm-3 label-align" for="user-second_name">'.Yii::t('yii', 'Миллати').' <span class="required">*</span></label><div class="col-md-6 col-sm-6 ">{input}<ul id="parsley-id-7" class="parsley-errors-list filled">{error}</ul>{hint}</div>',
            'errorOptions' => [
                'tag' => 'li',
                'class' => 'parsley-required',
            ],
        ]
    )->textInput(
        [
            'id' => 'user-nation',
            'name' => 'User[nation]',
            'class' => 'form-control',
            'placeholder' => Yii::t('yii', 'Ўзбек, Қозоқ, Рус, ...'),
            'maxlength' => true
        ]
    ) ?>
    

     <?= $form->field($user, 'specialist',
        [
            'options' => [
              'tag' => 'div',
              'class' => 'item form-group'
            ],
            'template' => '<label class="col-form-label col-md-3 col-sm-3 label-align" for="user-second_name">'.Yii::t('yii', 'Мутахасислиги').' <span class="required">*</span></label><div class="col-md-6 col-sm-6 ">{input}<ul id="parsley-id-7" class="parsley-errors-list filled">{error}</ul>{hint}</div>',
            'errorOptions' => [
                'tag' => 'li',
                'class' => 'parsley-required',
            ],
        ]
    )->textInput(
        [
            'id' => 'user-specialist',
            'name' => 'User[specialist]',
            'class' => 'form-control',
            'placeholder' => Yii::t('yii', 'Дастурчи, Иқтисотчи, Инжинер...'),
            'maxlength' => true
        ]
    ) ?>

     <?= $form->field($user, 'be_elected_den',
        [
        'options' => [
          'tag' => 'div',
          'class' => 'field item form-group',
        ],
        'template' => '<label class="col-form-label col-md-3 col-sm-3 label-align">'.Yii::t('yii', 'Ишга кирган санаси').' <span class="required">*</span></label><div class="col-md-6 col-sm-6 ">{input}<ul id="parsley-id-9" class="parsley-errors-list filled">{error}</ul>{hint}</div>',
        'errorOptions' => [
            'tag' => 'li',
            'class' => 'parsley-required',
        ],
      ]
    )->textInput(
        [
            'id' => 'user-be_elected_den',
            'name' => 'User[be_elected_den]',
            'placeholder' => Yii::t('yii', 'КУН ОЙ ЙИЛ'),
            'class' => 'form-control',
            'data-inputmask' => "'mask' : '99.99.9999'",
        ]
    )?>


    <?= $form->field($user, 'phone',
        [
            'options' => [
              'tag' => 'div',
              'class' => 'item form-group'
            ],
            'template' => '<label class="col-form-label col-md-3 col-sm-3 label-align" for="user-second_name">'.Yii::t('yii', 'Телефон').' <span class="required">*</span></label><div class="col-md-6 col-sm-6 ">{input}<ul id="parsley-id-7" class="parsley-errors-list filled">{error}</ul>{hint}</div>',
            'errorOptions' => [
                'tag' => 'li',
                'class' => 'parsley-required',
            ],
        ]
    )->textInput(
        [
            'id' => 'user-phone',
            'name' => 'User[phone]',
            'class' => 'form-control',
            'data-inputmask' => "'mask' : '(99) 999-99-99'",
            'maxlength' => true,
            'placeholder' => Yii::t('yii', '(99) (999-99-99)'),
        ]
    ) ?>

     <?= $form->field($user, 'email',
            [
            'options' => [
              'tag' => 'div',
              'class' => 'item form-group'
            ],
            'template' => '<label class="col-form-label col-md-3 col-sm-3 label-align" for="user-email">'.Yii::t('yii', 'Электрон почтаси').' <span class="required">*</span></label><div class="col-md-6 col-sm-6 ">{input}<ul id="parsley-id-5" class="parsley-errors-list filled">{error}</ul>{hint}</div>',
            'errorOptions' => [
                'tag' => 'li',
                'class' => 'parsley-required',
            ],
          ]
        )->textInput(
            [
                'placeholder' => Yii::t('yii', 'Электрон почта'),
                'id' => 'user-email',
                'name' => 'User[email]',
                'class' => 'form-control',
                'maxlength' => true,
            ]
        )?>

        <?= $form->field($user, 'username',
            [
            'options' => [
              'tag' => 'div',
              'class' => 'item form-group'
            ],
            'template' => '<label class="col-form-label col-md-3 col-sm-3 label-align" for="user-username">'.Yii::t('yii', 'Фойдаланувчи логини').' <span class="required">*</span></label><div class="col-md-6 col-sm-6 ">{input}<ul id="parsley-id-5" class="parsley-errors-list filled">{error}</ul>{hint}</div>',
            'errorOptions' => [
                'tag' => 'li',
                'class' => 'parsley-required',
            ],
          ]
        )->textInput(
            [
                'placeholder' => Yii::t('yii', 'Логин'),
                'id' => 'user-username',
                'name' => 'User[username]',
                'class' => 'form-control',
                'maxlength' => true,
            ]
        )?>
        

        <?php if ($user->scenario === 'create'): ?>

            <?= $form->field($user, 'password',
                [
                'options' => [
                  'tag' => 'div',
                  'class' => 'item form-group'
                ],
                'template' => '<label class="col-form-label col-md-3 col-sm-3 label-align" for="user-password">'.Yii::t('yii', 'Пароли').' <span class="required">*</span></label><div class="col-md-6 col-sm-6 ">{input}<ul id="parsley-id-5" class="parsley-errors-list filled">{error}</ul>{hint}</div>',
                'errorOptions' => [
                    'tag' => 'li',
                    'class' => 'parsley-required',
                ],
              ]
            )->widget(PasswordInput::classname(),
            [
                'options' => [
                    'placeholder' => Yii::t('yii', 'Янги парол'),
                    'id' => 'user-password',
                    'name' => 'User[password]',
                    'class' => 'form-control',
                    'maxlength' => true,
                ]
            ]
            )?>

        <?php else: ?>

            <?= $form->field($user, 'password',
                [
                'options' => [
                  'tag' => 'div',
                  'class' => 'item form-group'
                ],
                'template' => '<label class="col-form-label col-md-3 col-sm-3 label-align" for="user-password">'.Yii::t('yii', 'Пароли').' <span class="required">*</span></label><div class="col-md-6 col-sm-6 ">{input}<ul id="parsley-id-5" class="parsley-errors-list filled">{error}</ul>{hint}</div>',
                'errorOptions' => [
                    'tag' => 'li',
                    'class' => 'parsley-required',
                ],
              ]
            )->widget(PasswordInput::classname(),
            [
                'options' => [
                    'placeholder' => Yii::t('yii', 'Паролни ўзгартириш'),
                    'id' => 'user-password',
                    'name' => 'User[password]',
                    'class' => 'form-control',
                    'maxlength' => true,
                ]
            ]
            )?> 

        <?php endif ?>

        <?php endif;?>

        <?php if(User::isViloyatRaisi()):?>

        <div class="text-center">
            <?php if($user->avatar):?>
            <?= $form->field($user, 'avatar', ['template' => (!$user->isNewRecord)?'<label class="upload-label" '.'style="background-image:url(\''.\yii\helpers\Url::base().'/web/'.$user->avatar.'\')">{input}{error}{hint}</label>{label}':'<label class="upload-label">{input}{error}{hint}</label>{label}','inputOptions' => ['class' => 'upload-image'],'labelOptions' => ['class' => 'btn btn-default','style'=>'display:block;margin:auto;width:120px;margin-top:10px'], ])->fileInput(); ?>
            <?php else:?>
            <?= $form->field($user, 'avatar', ['template' => ($user->isNewRecord && !$user->isNewRecord)?'<label class="upload-label" '.'style="background-image:url(\''.\yii\helpers\Url::base().'/web/'.$user->avatar.'\')">{input}{error}{hint}</label>{label}':'<label class="upload-label">{input}{error}{hint}</label>{label}','inputOptions' => ['class' => 'upload-image'],'labelOptions' => ['class' => 'btn btn-default','style'=>'display:block;margin:auto;width:120px;margin-top:10px'], ])->fileInput(); ?>
            <?php endif?>
        </div>

        <?= $form->field($user, 'first_name',
        [
        'options' => [
          'tag' => 'div',
          'class' => 'item form-group'
        ],
        'template' => '<label class="col-form-label col-md-3 col-sm-3 label-align" for="user-first_name">'.Yii::t('yii', 'Фамилия').' <span class="required">*</span></label><div class="col-md-6 col-sm-6 ">{input}<ul id="parsley-id-5" class="parsley-errors-list filled">{error}</ul>{hint}</div>',
        'errorOptions' => [
            'tag' => 'li',
            'class' => 'parsley-required',
        ],
      ]
    )->textInput(
        [
            'placeholder' => Yii::t('yii', 'Фамилияси'),
            'id' => 'user-first_name',
            'name' => 'User[first_name]',
            'class' => 'form-control',
            'maxlength' => true,
        ]
    )?>

    <?= $form->field($user, 'second_name',
        [
        'options' => [
          'tag' => 'div',
          'class' => 'item form-group'
        ],
        'template' => '<label class="col-form-label col-md-3 col-sm-3 label-align" for="user-second_name">'.Yii::t('yii', 'Исм').' <span class="required">*</span></label><div class="col-md-6 col-sm-6 ">{input}<ul id="parsley-id-7" class="parsley-errors-list filled">{error}</ul>{hint}</div>',
        'errorOptions' => [
            'tag' => 'li',
            'class' => 'parsley-required',
        ],
      ]
    )->textInput(
        [
            'placeholder' => Yii::t('yii', 'Исми'),
            'id' => 'user-second_name',
            'name' => 'User[second_name]',
            'class' => 'form-control',
            'maxlength' => true,
        ]
    )?>

    <?= $form->field($user, 'middle_name',
        [
        'options' => [
          'tag' => 'div',
          'class' => 'item form-group',
        ],
        'template' => '<label class="col-form-label col-md-3 col-sm-3 label-align" for="user-middle_name">'.Yii::t('yii', 'Отаси').' <span class="required">*</span></label><div class="col-md-6 col-sm-6 ">{input}<ul id="parsley-id-9" class="parsley-errors-list filled">{error}</ul>{hint}</div>',
        'errorOptions' => [
            'tag' => 'li',
            'class' => 'parsley-required',
        ],
      ]
    )->textInput(
        [
            'placeholder' => Yii::t('yii', 'Отасининг исми'),
            'id' => 'user-middle_name',
            'name' => 'User[middle_name]',
            'class' => 'form-control',
            'maxlength' => true,
        ]
    )?>

    <?= $form->field($user, 'birthday',
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
            'id' => 'user-birthday',
            'name' => 'User[birthday]',
            'placeholder' => Yii::t('yii', 'КУН ОЙ ЙИЛ'),
            'class' => 'form-control',
            'data-inputmask' => "'mask' : '99.99.9999'",
        ]
    )?>



    <?= $form->field($user, 'gender',
        [
            'options' => [
              'tag' => 'div',
              'class' => 'item form-group'
            ],
            'template' => '<label class="col-form-label col-md-3 col-sm-3 label-align" for="user-second_name">'.Yii::t('yii', 'Жинси').' <span class="required">*</span></label><div class="col-md-6 col-sm-6 ">{input}<ul id="parsley-id-7" class="parsley-errors-list filled">{error}</ul>{hint}</div>',
            'errorOptions' => [
                'tag' => 'li',
                'class' => 'parsley-required',
            ],
        ])->dropDownList($user->gender(),
            [
                'id' => 'user-gender',
                'name' => 'User[gender]',
                'class' => 'form-control',
                'prompt' => Yii::t('yii','Жинсини танланг'),
            ]
        ) ?>

    <?= $form->field($user, 'passport',
        [
            'options' => [
              'tag' => 'div',
              'class' => 'item form-group'
            ],
            'template' => '<label class="col-form-label col-md-3 col-sm-3 label-align" for="user-second_name">'.Yii::t('yii', 'Пасспорт').' <span class="required">*</span></label><div class="col-md-6 col-sm-6 ">{input}<ul id="parsley-id-7" class="parsley-errors-list filled">{error}</ul>{hint}</div>',
            'errorOptions' => [
                'tag' => 'li',
                'class' => 'parsley-required',
            ],
        ]
    )->textInput(
        [
            'id' => 'user-passport',
            'name' => 'User[passport]',
            'placeholder' => Yii::t('yii', 'AA 1234567'),
            'class' => 'form-control',
            'data-inputmask' => "'mask' : 'AA 9999999'",
            'maxlength' => true
        ]
    ) ?>

    <?= $form->field($user, 'nation',
        [
            'options' => [
              'tag' => 'div',
              'class' => 'item form-group'
            ],
            'template' => '<label class="col-form-label col-md-3 col-sm-3 label-align" for="user-second_name">'.Yii::t('yii', 'Миллати').' <span class="required">*</span></label><div class="col-md-6 col-sm-6 ">{input}<ul id="parsley-id-7" class="parsley-errors-list filled">{error}</ul>{hint}</div>',
            'errorOptions' => [
                'tag' => 'li',
                'class' => 'parsley-required',
            ],
        ]
    )->textInput(
        [
            'id' => 'user-nation',
            'name' => 'User[nation]',
            'class' => 'form-control',
            'placeholder' => Yii::t('yii', 'Ўзбек, Қозоқ, Рус, ...'),
            'maxlength' => true
        ]
    ) ?>

    <?php $region = Yii::$app->user->identity['region_id']?>
    <?php
        $cities = \yii\helpers\ArrayHelper::map(\app\models\City::findAll(['region_id' => $region]), 'id', 'name');
    ?>
    
    <?= $form->field($user, 'city_id',
        [
            'options' => [
              'tag' => 'div',
              'class' => 'item form-group'
            ],
            'template' => '<label class="col-form-label col-md-3 col-sm-3 label-align" for="user-second_name">'.Yii::t('yii', 'Туман').' <span class="required">*</span></label><div class="col-md-6 col-sm-6 ">{input}<ul id="parsley-id-7" class="parsley-errors-list filled">{error}</ul>{hint}</div>',
            'errorOptions' => [
                'tag' => 'li',
                'class' => 'parsley-required',
            ],
        ]
    )->dropDownList($cities,
        [
            'id' => 'user-city_id',
            'name' => 'User[city_id]',
            'class' => 'form-control',
            'prompt' => Yii::t('yii','Туман ёки Шаҳарни танланг'),
             'onchange' => '$.post("'.Yii::$app->urlManager->createUrl('user/town-block?id=').'"+$(this).val(),function(data){$("#user-town_block_id").html(data);});'
        ]
    ) ?>

     <?= $form->field($user, 'specialist',
        [
            'options' => [
              'tag' => 'div',
              'class' => 'item form-group'
            ],
            'template' => '<label class="col-form-label col-md-3 col-sm-3 label-align" for="user-second_name">'.Yii::t('yii', 'Мутахасислиги').' <span class="required">*</span></label><div class="col-md-6 col-sm-6 ">{input}<ul id="parsley-id-7" class="parsley-errors-list filled">{error}</ul>{hint}</div>',
            'errorOptions' => [
                'tag' => 'li',
                'class' => 'parsley-required',
            ],
        ]
    )->textInput(
        [
            'id' => 'user-specialist',
            'name' => 'User[specialist]',
            'class' => 'form-control',
            'placeholder' => Yii::t('yii', 'Дастурчи, Иқтисотчи, Инжинер...'),
            'maxlength' => true
        ]
    ) ?>

     <?= $form->field($user, 'be_elected_den',
        [
        'options' => [
          'tag' => 'div',
          'class' => 'field item form-group',
        ],
        'template' => '<label class="col-form-label col-md-3 col-sm-3 label-align">'.Yii::t('yii', 'Ишга кирган санаси').' <span class="required">*</span></label><div class="col-md-6 col-sm-6 ">{input}<ul id="parsley-id-9" class="parsley-errors-list filled">{error}</ul>{hint}</div>',
        'errorOptions' => [
            'tag' => 'li',
            'class' => 'parsley-required',
        ],
      ]
    )->textInput(
        [
            'id' => 'user-be_elected_den',
            'name' => 'User[be_elected_den]',
            'placeholder' => Yii::t('yii', 'КУН ОЙ ЙИЛ'),
            'class' => 'form-control',
            'data-inputmask' => "'mask' : '99.99.9999'",
        ]
    )?>


    <?= $form->field($user, 'phone',
        [
            'options' => [
              'tag' => 'div',
              'class' => 'item form-group'
            ],
            'template' => '<label class="col-form-label col-md-3 col-sm-3 label-align" for="user-second_name">'.Yii::t('yii', 'Телефон').' <span class="required">*</span></label><div class="col-md-6 col-sm-6 ">{input}<ul id="parsley-id-7" class="parsley-errors-list filled">{error}</ul>{hint}</div>',
            'errorOptions' => [
                'tag' => 'li',
                'class' => 'parsley-required',
            ],
        ]
    )->textInput(
        [
            'id' => 'user-phone',
            'name' => 'User[phone]',
            'class' => 'form-control',
            'data-inputmask' => "'mask' : '(99) 999-99-99'",
            'maxlength' => true,
            'placeholder' => Yii::t('yii', '(99) (999-99-99)'),
        ]
    ) ?>

     <?= $form->field($user, 'email',
            [
            'options' => [
              'tag' => 'div',
              'class' => 'item form-group'
            ],
            'template' => '<label class="col-form-label col-md-3 col-sm-3 label-align" for="user-email">'.Yii::t('yii', 'Электрон почтаси').' <span class="required">*</span></label><div class="col-md-6 col-sm-6 ">{input}<ul id="parsley-id-5" class="parsley-errors-list filled">{error}</ul>{hint}</div>',
            'errorOptions' => [
                'tag' => 'li',
                'class' => 'parsley-required',
            ],
          ]
        )->textInput(
            [
                'placeholder' => Yii::t('yii', 'Электрон почта'),
                'id' => 'user-email',
                'name' => 'User[email]',
                'class' => 'form-control',
                'maxlength' => true,
            ]
        )?>

        <?= $form->field($user, 'username',
            [
            'options' => [
              'tag' => 'div',
              'class' => 'item form-group'
            ],
            'template' => '<label class="col-form-label col-md-3 col-sm-3 label-align" for="user-username">'.Yii::t('yii', 'Фойдаланувчи логини').' <span class="required">*</span></label><div class="col-md-6 col-sm-6 ">{input}<ul id="parsley-id-5" class="parsley-errors-list filled">{error}</ul>{hint}</div>',
            'errorOptions' => [
                'tag' => 'li',
                'class' => 'parsley-required',
            ],
          ]
        )->textInput(
            [
                'placeholder' => Yii::t('yii', 'Логин'),
                'id' => 'user-username',
                'name' => 'User[username]',
                'class' => 'form-control',
                'maxlength' => true,
            ]
        )?>
        

        <?php if ($user->scenario === 'create'): ?>

            <?= $form->field($user, 'password',
                [
                'options' => [
                  'tag' => 'div',
                  'class' => 'item form-group'
                ],
                'template' => '<label class="col-form-label col-md-3 col-sm-3 label-align" for="user-password">'.Yii::t('yii', 'Пароли').' <span class="required">*</span></label><div class="col-md-6 col-sm-6 ">{input}<ul id="parsley-id-5" class="parsley-errors-list filled">{error}</ul>{hint}</div>',
                'errorOptions' => [
                    'tag' => 'li',
                    'class' => 'parsley-required',
                ],
              ]
            )->widget(PasswordInput::classname(),
            [
                'options' => [
                    'placeholder' => Yii::t('yii', 'Янги парол'),
                    'id' => 'user-password',
                    'name' => 'User[password]',
                    'class' => 'form-control',
                    'maxlength' => true,
                ]
            ]
            )?>

        <?php else: ?>

            <?= $form->field($user, 'password',
                [
                'options' => [
                  'tag' => 'div',
                  'class' => 'item form-group'
                ],
                'template' => '<label class="col-form-label col-md-3 col-sm-3 label-align" for="user-password">'.Yii::t('yii', 'Пароли').' <span class="required">*</span></label><div class="col-md-6 col-sm-6 ">{input}<ul id="parsley-id-5" class="parsley-errors-list filled">{error}</ul>{hint}</div>',
                'errorOptions' => [
                    'tag' => 'li',
                    'class' => 'parsley-required',
                ],
              ]
            )->widget(PasswordInput::classname(),
            [
                'options' => [
                    'placeholder' => Yii::t('yii', 'Паролни ўзгартириш'),
                    'id' => 'user-password',
                    'name' => 'User[password]',
                    'class' => 'form-control',
                    'maxlength' => true,
                ]
            ]
            )?> 

        <?php endif ?>

        <?= $form->field($user, 'status',
                [
                'options' => [
                  'tag' => 'div',
                  'class' => 'item form-group'
                ],
                'template' => '<label class="col-form-label col-md-3 col-sm-3 label-align" for="user-status">'.Yii::t('yii', 'Ҳолати').' <span class="required">*</span></label><div class="col-md-6 col-sm-6 ">{input}<ul id="parsley-id-5" class="parsley-errors-list filled">{error}</ul>{hint}</div>',
                'errorOptions' => [
                    'tag' => 'li',
                    'class' => 'parsley-required',
                ],
              ]
            )->dropDownList($user->statusList)?> 


        <?php foreach (AuthItem::getRoles() as $item_name): ?>
            <?php $roles[$item_name->name] = $item_name->name ?>
        <?php endforeach ?>
            
        <?= $form->field($user, 'item_name',
            [
            'options' => [
              'tag' => 'div',
              'class' => 'item form-group'
            ],
            'template' => '<label class="col-form-label col-md-3 col-sm-3 label-align" for="user-item_name">'.Yii::t('yii', 'Ҳуқуқи').' <span class="required">*</span></label><div class="col-md-6 col-sm-6 ">{input}<ul id="parsley-id-5" class="parsley-errors-list filled">{error}</ul>{hint}</div>',
            'errorOptions' => [
                'tag' => 'li',
                'class' => 'parsley-required',
            ],
          ]
        )->dropDownList($roles)?> 
        
        <?php endif;?>

        <?php if(User::isViloyatHodimi()):?>

        <div class="text-center">
            <?php if($user->avatar):?>
            <?= $form->field($user, 'avatar', ['template' => (!$user->isNewRecord)?'<label class="upload-label" '.'style="background-image:url(\''.\yii\helpers\Url::base().'/web/'.$user->avatar.'\')">{input}{error}{hint}</label>{label}':'<label class="upload-label">{input}{error}{hint}</label>{label}','inputOptions' => ['class' => 'upload-image'],'labelOptions' => ['class' => 'btn btn-default','style'=>'display:block;margin:auto;width:120px;margin-top:10px'], ])->fileInput(); ?>
            <?php else:?>
            <?= $form->field($user, 'avatar', ['template' => ($user->isNewRecord && !$user->isNewRecord)?'<label class="upload-label" '.'style="background-image:url(\''.\yii\helpers\Url::base().'/web/'.$user->avatar.'\')">{input}{error}{hint}</label>{label}':'<label class="upload-label">{input}{error}{hint}</label>{label}','inputOptions' => ['class' => 'upload-image'],'labelOptions' => ['class' => 'btn btn-default','style'=>'display:block;margin:auto;width:120px;margin-top:10px'], ])->fileInput(); ?>
            <?php endif?>
        </div>

        <?= $form->field($user, 'first_name',
        [
        'options' => [
          'tag' => 'div',
          'class' => 'item form-group'
        ],
        'template' => '<label class="col-form-label col-md-3 col-sm-3 label-align" for="user-first_name">'.Yii::t('yii', 'Фамилия').' <span class="required">*</span></label><div class="col-md-6 col-sm-6 ">{input}<ul id="parsley-id-5" class="parsley-errors-list filled">{error}</ul>{hint}</div>',
        'errorOptions' => [
            'tag' => 'li',
            'class' => 'parsley-required',
        ],
      ]
    )->textInput(
        [
            'placeholder' => Yii::t('yii', 'Фамилияси'),
            'id' => 'user-first_name',
            'name' => 'User[first_name]',
            'class' => 'form-control',
            'maxlength' => true,
        ]
    )?>

    <?= $form->field($user, 'second_name',
        [
        'options' => [
          'tag' => 'div',
          'class' => 'item form-group'
        ],
        'template' => '<label class="col-form-label col-md-3 col-sm-3 label-align" for="user-second_name">'.Yii::t('yii', 'Исм').' <span class="required">*</span></label><div class="col-md-6 col-sm-6 ">{input}<ul id="parsley-id-7" class="parsley-errors-list filled">{error}</ul>{hint}</div>',
        'errorOptions' => [
            'tag' => 'li',
            'class' => 'parsley-required',
        ],
      ]
    )->textInput(
        [
            'placeholder' => Yii::t('yii', 'Исми'),
            'id' => 'user-second_name',
            'name' => 'User[second_name]',
            'class' => 'form-control',
            'maxlength' => true,
        ]
    )?>

    <?= $form->field($user, 'middle_name',
        [
        'options' => [
          'tag' => 'div',
          'class' => 'item form-group',
        ],
        'template' => '<label class="col-form-label col-md-3 col-sm-3 label-align" for="user-middle_name">'.Yii::t('yii', 'Отаси').' <span class="required">*</span></label><div class="col-md-6 col-sm-6 ">{input}<ul id="parsley-id-9" class="parsley-errors-list filled">{error}</ul>{hint}</div>',
        'errorOptions' => [
            'tag' => 'li',
            'class' => 'parsley-required',
        ],
      ]
    )->textInput(
        [
            'placeholder' => Yii::t('yii', 'Отасининг исми'),
            'id' => 'user-middle_name',
            'name' => 'User[middle_name]',
            'class' => 'form-control',
            'maxlength' => true,
        ]
    )?>

    <?= $form->field($user, 'birthday',
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
            'id' => 'user-birthday',
            'name' => 'User[birthday]',
            'placeholder' => Yii::t('yii', 'КУН ОЙ ЙИЛ'),
            'class' => 'form-control',
            'data-inputmask' => "'mask' : '99.99.9999'",
        ]
    )?>



    <?= $form->field($user, 'gender',
        [
            'options' => [
              'tag' => 'div',
              'class' => 'item form-group'
            ],
            'template' => '<label class="col-form-label col-md-3 col-sm-3 label-align" for="user-second_name">'.Yii::t('yii', 'Жинси').' <span class="required">*</span></label><div class="col-md-6 col-sm-6 ">{input}<ul id="parsley-id-7" class="parsley-errors-list filled">{error}</ul>{hint}</div>',
            'errorOptions' => [
                'tag' => 'li',
                'class' => 'parsley-required',
            ],
        ])->dropDownList($user->gender(),
            [
                'id' => 'user-gender',
                'name' => 'User[gender]',
                'class' => 'form-control',
                'prompt' => Yii::t('yii','Жинсини танланг'),
            ]
        ) ?>

    <?= $form->field($user, 'passport',
        [
            'options' => [
              'tag' => 'div',
              'class' => 'item form-group'
            ],
            'template' => '<label class="col-form-label col-md-3 col-sm-3 label-align" for="user-second_name">'.Yii::t('yii', 'Пасспорт').' <span class="required">*</span></label><div class="col-md-6 col-sm-6 ">{input}<ul id="parsley-id-7" class="parsley-errors-list filled">{error}</ul>{hint}</div>',
            'errorOptions' => [
                'tag' => 'li',
                'class' => 'parsley-required',
            ],
        ]
    )->textInput(
        [
            'id' => 'user-passport',
            'name' => 'User[passport]',
            'placeholder' => Yii::t('yii', 'AA 1234567'),
            'class' => 'form-control',
            'data-inputmask' => "'mask' : 'AA 9999999'",
            'maxlength' => true
        ]
    ) ?>

    <?= $form->field($user, 'nation',
        [
            'options' => [
              'tag' => 'div',
              'class' => 'item form-group'
            ],
            'template' => '<label class="col-form-label col-md-3 col-sm-3 label-align" for="user-second_name">'.Yii::t('yii', 'Миллати').' <span class="required">*</span></label><div class="col-md-6 col-sm-6 ">{input}<ul id="parsley-id-7" class="parsley-errors-list filled">{error}</ul>{hint}</div>',
            'errorOptions' => [
                'tag' => 'li',
                'class' => 'parsley-required',
            ],
        ]
    )->textInput(
        [
            'id' => 'user-nation',
            'name' => 'User[nation]',
            'class' => 'form-control',
            'placeholder' => Yii::t('yii', 'Ўзбек, Қозоқ, Рус, ...'),
            'maxlength' => true
        ]
    ) ?>

    <?php $region = Yii::$app->user->identity['region_id']?>
    <?php
        $cities = \yii\helpers\ArrayHelper::map(\app\models\City::findAll(['region_id' => $region]), 'id', 'name');
    ?>
    
    <?= $form->field($user, 'city_id',
        [
            'options' => [
              'tag' => 'div',
              'class' => 'item form-group'
            ],
            'template' => '<label class="col-form-label col-md-3 col-sm-3 label-align" for="user-second_name">'.Yii::t('yii', 'Туман').' <span class="required">*</span></label><div class="col-md-6 col-sm-6 ">{input}<ul id="parsley-id-7" class="parsley-errors-list filled">{error}</ul>{hint}</div>',
            'errorOptions' => [
                'tag' => 'li',
                'class' => 'parsley-required',
            ],
        ]
    )->dropDownList($cities,
        [
            'id' => 'user-city_id',
            'name' => 'User[city_id]',
            'class' => 'form-control',
            'prompt' => Yii::t('yii','Туман ёки Шаҳарни танланг'),
             'onchange' => '$.post("'.Yii::$app->urlManager->createUrl('user/town-block?id=').'"+$(this).val(),function(data){$("#user-town_block_id").html(data);});'
        ]
    ) ?>

     <?= $form->field($user, 'specialist',
        [
            'options' => [
              'tag' => 'div',
              'class' => 'item form-group'
            ],
            'template' => '<label class="col-form-label col-md-3 col-sm-3 label-align" for="user-second_name">'.Yii::t('yii', 'Мутахасислиги').' <span class="required">*</span></label><div class="col-md-6 col-sm-6 ">{input}<ul id="parsley-id-7" class="parsley-errors-list filled">{error}</ul>{hint}</div>',
            'errorOptions' => [
                'tag' => 'li',
                'class' => 'parsley-required',
            ],
        ]
    )->textInput(
        [
            'id' => 'user-specialist',
            'name' => 'User[specialist]',
            'class' => 'form-control',
            'placeholder' => Yii::t('yii', 'Дастурчи, Иқтисотчи, Инжинер...'),
            'maxlength' => true
        ]
    ) ?>

     <?= $form->field($user, 'be_elected_den',
        [
        'options' => [
          'tag' => 'div',
          'class' => 'field item form-group',
        ],
        'template' => '<label class="col-form-label col-md-3 col-sm-3 label-align">'.Yii::t('yii', 'Ишга кирган санаси').' <span class="required">*</span></label><div class="col-md-6 col-sm-6 ">{input}<ul id="parsley-id-9" class="parsley-errors-list filled">{error}</ul>{hint}</div>',
        'errorOptions' => [
            'tag' => 'li',
            'class' => 'parsley-required',
        ],
      ]
    )->textInput(
        [
            'id' => 'user-be_elected_den',
            'name' => 'User[be_elected_den]',
            'placeholder' => Yii::t('yii', 'КУН ОЙ ЙИЛ'),
            'class' => 'form-control',
            'data-inputmask' => "'mask' : '99.99.9999'",
        ]
    )?>


    <?= $form->field($user, 'phone',
        [
            'options' => [
              'tag' => 'div',
              'class' => 'item form-group'
            ],
            'template' => '<label class="col-form-label col-md-3 col-sm-3 label-align" for="user-second_name">'.Yii::t('yii', 'Телефон').' <span class="required">*</span></label><div class="col-md-6 col-sm-6 ">{input}<ul id="parsley-id-7" class="parsley-errors-list filled">{error}</ul>{hint}</div>',
            'errorOptions' => [
                'tag' => 'li',
                'class' => 'parsley-required',
            ],
        ]
    )->textInput(
        [
            'id' => 'user-phone',
            'name' => 'User[phone]',
            'class' => 'form-control',
            'data-inputmask' => "'mask' : '(99) 999-99-99'",
            'maxlength' => true,
            'placeholder' => Yii::t('yii', '(99) (999-99-99)'),
        ]
    ) ?>

     <?= $form->field($user, 'email',
            [
            'options' => [
              'tag' => 'div',
              'class' => 'item form-group'
            ],
            'template' => '<label class="col-form-label col-md-3 col-sm-3 label-align" for="user-email">'.Yii::t('yii', 'Электрон почтаси').' <span class="required">*</span></label><div class="col-md-6 col-sm-6 ">{input}<ul id="parsley-id-5" class="parsley-errors-list filled">{error}</ul>{hint}</div>',
            'errorOptions' => [
                'tag' => 'li',
                'class' => 'parsley-required',
            ],
          ]
        )->textInput(
            [
                'placeholder' => Yii::t('yii', 'Электрон почта'),
                'id' => 'user-email',
                'name' => 'User[email]',
                'class' => 'form-control',
                'maxlength' => true,
            ]
        )?>

        <?= $form->field($user, 'username',
            [
            'options' => [
              'tag' => 'div',
              'class' => 'item form-group'
            ],
            'template' => '<label class="col-form-label col-md-3 col-sm-3 label-align" for="user-username">'.Yii::t('yii', 'Фойдаланувчи логини').' <span class="required">*</span></label><div class="col-md-6 col-sm-6 ">{input}<ul id="parsley-id-5" class="parsley-errors-list filled">{error}</ul>{hint}</div>',
            'errorOptions' => [
                'tag' => 'li',
                'class' => 'parsley-required',
            ],
          ]
        )->textInput(
            [
                'placeholder' => Yii::t('yii', 'Логин'),
                'id' => 'user-username',
                'name' => 'User[username]',
                'class' => 'form-control',
                'maxlength' => true,
            ]
        )?>
        

        <?php if ($user->scenario === 'create'): ?>

            <?= $form->field($user, 'password',
                [
                'options' => [
                  'tag' => 'div',
                  'class' => 'item form-group'
                ],
                'template' => '<label class="col-form-label col-md-3 col-sm-3 label-align" for="user-password">'.Yii::t('yii', 'Пароли').' <span class="required">*</span></label><div class="col-md-6 col-sm-6 ">{input}<ul id="parsley-id-5" class="parsley-errors-list filled">{error}</ul>{hint}</div>',
                'errorOptions' => [
                    'tag' => 'li',
                    'class' => 'parsley-required',
                ],
              ]
            )->widget(PasswordInput::classname(),
            [
                'options' => [
                    'placeholder' => Yii::t('yii', 'Янги парол'),
                    'id' => 'user-password',
                    'name' => 'User[password]',
                    'class' => 'form-control',
                    'maxlength' => true,
                ]
            ]
            )?>

        <?php else: ?>

            <?= $form->field($user, 'password',
                [
                'options' => [
                  'tag' => 'div',
                  'class' => 'item form-group'
                ],
                'template' => '<label class="col-form-label col-md-3 col-sm-3 label-align" for="user-password">'.Yii::t('yii', 'Пароли').' <span class="required">*</span></label><div class="col-md-6 col-sm-6 ">{input}<ul id="parsley-id-5" class="parsley-errors-list filled">{error}</ul>{hint}</div>',
                'errorOptions' => [
                    'tag' => 'li',
                    'class' => 'parsley-required',
                ],
              ]
            )->widget(PasswordInput::classname(),
            [
                'options' => [
                    'placeholder' => Yii::t('yii', 'Паролни ўзгартириш'),
                    'id' => 'user-password',
                    'name' => 'User[password]',
                    'class' => 'form-control',
                    'maxlength' => true,
                ]
            ]
            )?> 

        <?php endif ?>

        <?= $form->field($user, 'status',
                [
                'options' => [
                  'tag' => 'div',
                  'class' => 'item form-group'
                ],
                'template' => '<label class="col-form-label col-md-3 col-sm-3 label-align" for="user-status">'.Yii::t('yii', 'Ҳолати').' <span class="required">*</span></label><div class="col-md-6 col-sm-6 ">{input}<ul id="parsley-id-5" class="parsley-errors-list filled">{error}</ul>{hint}</div>',
                'errorOptions' => [
                    'tag' => 'li',
                    'class' => 'parsley-required',
                ],
              ]
            )->dropDownList($user->statusList)?> 


        <?php foreach (AuthItem::getRoles() as $item_name): ?>
            <?php $roles[$item_name->name] = $item_name->name ?>
        <?php endforeach ?>
            
        <?= $form->field($user, 'item_name',
            [
            'options' => [
              'tag' => 'div',
              'class' => 'item form-group'
            ],
            'template' => '<label class="col-form-label col-md-3 col-sm-3 label-align" for="user-item_name">'.Yii::t('yii', 'Ҳуқуқи').' <span class="required">*</span></label><div class="col-md-6 col-sm-6 ">{input}<ul id="parsley-id-5" class="parsley-errors-list filled">{error}</ul>{hint}</div>',
            'errorOptions' => [
                'tag' => 'li',
                'class' => 'parsley-required',
            ],
          ]
        )->dropDownList($roles)?> 
        
        <?php endif;?>


        <?php if(User::isTumanRaisi()):?>

        <div class="text-center">
            <?php if($user->avatar):?>
            <?= $form->field($user, 'avatar', ['template' => (!$user->isNewRecord)?'<label class="upload-label" '.'style="background-image:url(\''.\yii\helpers\Url::base().'/web/'.$user->avatar.'\')">{input}{error}{hint}</label>{label}':'<label class="upload-label">{input}{error}{hint}</label>{label}','inputOptions' => ['class' => 'upload-image'],'labelOptions' => ['class' => 'btn btn-default','style'=>'display:block;margin:auto;width:120px;margin-top:10px'], ])->fileInput(); ?>
            <?php else:?>
            <?= $form->field($user, 'avatar', ['template' => ($user->isNewRecord && !$user->isNewRecord)?'<label class="upload-label" '.'style="background-image:url(\''.\yii\helpers\Url::base().'/web/'.$user->avatar.'\')">{input}{error}{hint}</label>{label}':'<label class="upload-label">{input}{error}{hint}</label>{label}','inputOptions' => ['class' => 'upload-image'],'labelOptions' => ['class' => 'btn btn-default','style'=>'display:block;margin:auto;width:120px;margin-top:10px'], ])->fileInput(); ?>
            <?php endif?>
        </div>

        <?= $form->field($user, 'first_name',
        [
        'options' => [
          'tag' => 'div',
          'class' => 'item form-group'
        ],
        'template' => '<label class="col-form-label col-md-3 col-sm-3 label-align" for="user-first_name">'.Yii::t('yii', 'Фамилия').' <span class="required">*</span></label><div class="col-md-6 col-sm-6 ">{input}<ul id="parsley-id-5" class="parsley-errors-list filled">{error}</ul>{hint}</div>',
        'errorOptions' => [
            'tag' => 'li',
            'class' => 'parsley-required',
        ],
      ]
    )->textInput(
        [
            'placeholder' => Yii::t('yii', 'Фамилияси'),
            'id' => 'user-first_name',
            'name' => 'User[first_name]',
            'class' => 'form-control',
            'maxlength' => true,
        ]
    )?>

    <?= $form->field($user, 'second_name',
        [
        'options' => [
          'tag' => 'div',
          'class' => 'item form-group'
        ],
        'template' => '<label class="col-form-label col-md-3 col-sm-3 label-align" for="user-second_name">'.Yii::t('yii', 'Исм').' <span class="required">*</span></label><div class="col-md-6 col-sm-6 ">{input}<ul id="parsley-id-7" class="parsley-errors-list filled">{error}</ul>{hint}</div>',
        'errorOptions' => [
            'tag' => 'li',
            'class' => 'parsley-required',
        ],
      ]
    )->textInput(
        [
            'placeholder' => Yii::t('yii', 'Исми'),
            'id' => 'user-second_name',
            'name' => 'User[second_name]',
            'class' => 'form-control',
            'maxlength' => true,
        ]
    )?>

    <?= $form->field($user, 'middle_name',
        [
        'options' => [
          'tag' => 'div',
          'class' => 'item form-group',
        ],
        'template' => '<label class="col-form-label col-md-3 col-sm-3 label-align" for="user-middle_name">'.Yii::t('yii', 'Отаси').' <span class="required">*</span></label><div class="col-md-6 col-sm-6 ">{input}<ul id="parsley-id-9" class="parsley-errors-list filled">{error}</ul>{hint}</div>',
        'errorOptions' => [
            'tag' => 'li',
            'class' => 'parsley-required',
        ],
      ]
    )->textInput(
        [
            'placeholder' => Yii::t('yii', 'Отасининг исми'),
            'id' => 'user-middle_name',
            'name' => 'User[middle_name]',
            'class' => 'form-control',
            'maxlength' => true,
        ]
    )?>

    <?= $form->field($user, 'birthday',
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
            'id' => 'user-birthday',
            'name' => 'User[birthday]',
            'placeholder' => Yii::t('yii', 'КУН ОЙ ЙИЛ'),
            'class' => 'form-control',
            'data-inputmask' => "'mask' : '99.99.9999'",
        ]
    )?>



    <?= $form->field($user, 'gender',
        [
            'options' => [
              'tag' => 'div',
              'class' => 'item form-group'
            ],
            'template' => '<label class="col-form-label col-md-3 col-sm-3 label-align" for="user-second_name">'.Yii::t('yii', 'Жинси').' <span class="required">*</span></label><div class="col-md-6 col-sm-6 ">{input}<ul id="parsley-id-7" class="parsley-errors-list filled">{error}</ul>{hint}</div>',
            'errorOptions' => [
                'tag' => 'li',
                'class' => 'parsley-required',
            ],
        ])->dropDownList($user->gender(),
            [
                'id' => 'user-gender',
                'name' => 'User[gender]',
                'class' => 'form-control',
                'prompt' => Yii::t('yii','Жинсини танланг'),
            ]
        ) ?>

    <?= $form->field($user, 'passport',
        [
            'options' => [
              'tag' => 'div',
              'class' => 'item form-group'
            ],
            'template' => '<label class="col-form-label col-md-3 col-sm-3 label-align" for="user-second_name">'.Yii::t('yii', 'Пасспорт').' <span class="required">*</span></label><div class="col-md-6 col-sm-6 ">{input}<ul id="parsley-id-7" class="parsley-errors-list filled">{error}</ul>{hint}</div>',
            'errorOptions' => [
                'tag' => 'li',
                'class' => 'parsley-required',
            ],
        ]
    )->textInput(
        [
            'id' => 'user-passport',
            'name' => 'User[passport]',
            'placeholder' => Yii::t('yii', 'AA 1234567'),
            'class' => 'form-control',
            'data-inputmask' => "'mask' : 'AA 9999999'",
            'maxlength' => true
        ]
    ) ?>

    <?= $form->field($user, 'nation',
        [
            'options' => [
              'tag' => 'div',
              'class' => 'item form-group'
            ],
            'template' => '<label class="col-form-label col-md-3 col-sm-3 label-align" for="user-second_name">'.Yii::t('yii', 'Миллати').' <span class="required">*</span></label><div class="col-md-6 col-sm-6 ">{input}<ul id="parsley-id-7" class="parsley-errors-list filled">{error}</ul>{hint}</div>',
            'errorOptions' => [
                'tag' => 'li',
                'class' => 'parsley-required',
            ],
        ]
    )->textInput(
        [
            'id' => 'user-nation',
            'name' => 'User[nation]',
            'class' => 'form-control',
            'placeholder' => Yii::t('yii', 'Ўзбек, Қозоқ, Рус, ...'),
            'maxlength' => true
        ]
    ) ?>

    <?php $city = Yii::$app->user->identity['city_id']?>
    
    <?php
        $town_block = \yii\helpers\ArrayHelper::map(\app\models\TownBlock::findAll(['city_id' => $city]), 'id', 'name');
    ?>
    
    <?= $form->field($user, 'town_block_id',
        [
            'options' => [
              'tag' => 'div',
              'class' => 'item form-group'
            ],
            'template' => '<label class="col-form-label col-md-3 col-sm-3 label-align" for="user-second_name">'.Yii::t('yii', 'Маҳалла').' <span class="required">*</span></label><div class="col-md-6 col-sm-6 ">{input}<ul id="parsley-id-7" class="parsley-errors-list filled">{error}</ul>{hint}</div>',
            'errorOptions' => [
                'tag' => 'li',
                'class' => 'parsley-required',
            ],
        ]
    )->dropDownList($town_block,
        [
            'id' => 'user-town_block_id',
            'name' => 'User[town_block_id]',
            'class' => 'form-control',
            'prompt' => Yii::t('yii','Маҳаллани танланг'),
        ]
    ) ?>

     <?= $form->field($user, 'specialist',
        [
            'options' => [
              'tag' => 'div',
              'class' => 'item form-group'
            ],
            'template' => '<label class="col-form-label col-md-3 col-sm-3 label-align" for="user-second_name">'.Yii::t('yii', 'Мутахасислиги').' <span class="required">*</span></label><div class="col-md-6 col-sm-6 ">{input}<ul id="parsley-id-7" class="parsley-errors-list filled">{error}</ul>{hint}</div>',
            'errorOptions' => [
                'tag' => 'li',
                'class' => 'parsley-required',
            ],
        ]
    )->textInput(
        [
            'id' => 'user-specialist',
            'name' => 'User[specialist]',
            'class' => 'form-control',
            'placeholder' => Yii::t('yii', 'Дастурчи, Иқтисотчи, Инжинер...'),
            'maxlength' => true
        ]
    ) ?>

     <?= $form->field($user, 'be_elected_den',
        [
        'options' => [
          'tag' => 'div',
          'class' => 'field item form-group',
        ],
        'template' => '<label class="col-form-label col-md-3 col-sm-3 label-align">'.Yii::t('yii', 'Ишга кирган санаси').' <span class="required">*</span></label><div class="col-md-6 col-sm-6 ">{input}<ul id="parsley-id-9" class="parsley-errors-list filled">{error}</ul>{hint}</div>',
        'errorOptions' => [
            'tag' => 'li',
            'class' => 'parsley-required',
        ],
      ]
    )->textInput(
        [
            'id' => 'user-be_elected_den',
            'name' => 'User[be_elected_den]',
            'placeholder' => Yii::t('yii', 'КУН ОЙ ЙИЛ'),
            'class' => 'form-control',
            'data-inputmask' => "'mask' : '99.99.9999'",
        ]
    )?>


    <?= $form->field($user, 'phone',
        [
            'options' => [
              'tag' => 'div',
              'class' => 'item form-group'
            ],
            'template' => '<label class="col-form-label col-md-3 col-sm-3 label-align" for="user-second_name">'.Yii::t('yii', 'Телефон').' <span class="required">*</span></label><div class="col-md-6 col-sm-6 ">{input}<ul id="parsley-id-7" class="parsley-errors-list filled">{error}</ul>{hint}</div>',
            'errorOptions' => [
                'tag' => 'li',
                'class' => 'parsley-required',
            ],
        ]
    )->textInput(
        [
            'id' => 'user-phone',
            'name' => 'User[phone]',
            'class' => 'form-control',
            'data-inputmask' => "'mask' : '(99) 999-99-99'",
            'maxlength' => true,
            'placeholder' => Yii::t('yii', '(99) (999-99-99)'),
        ]
    ) ?>

     <?= $form->field($user, 'email',
            [
            'options' => [
              'tag' => 'div',
              'class' => 'item form-group'
            ],
            'template' => '<label class="col-form-label col-md-3 col-sm-3 label-align" for="user-email">'.Yii::t('yii', 'Электрон почтаси').' <span class="required">*</span></label><div class="col-md-6 col-sm-6 ">{input}<ul id="parsley-id-5" class="parsley-errors-list filled">{error}</ul>{hint}</div>',
            'errorOptions' => [
                'tag' => 'li',
                'class' => 'parsley-required',
            ],
          ]
        )->textInput(
            [
                'placeholder' => Yii::t('yii', 'Электрон почта'),
                'id' => 'user-email',
                'name' => 'User[email]',
                'class' => 'form-control',
                'maxlength' => true,
            ]
        )?>

        <?= $form->field($user, 'username',
            [
            'options' => [
              'tag' => 'div',
              'class' => 'item form-group'
            ],
            'template' => '<label class="col-form-label col-md-3 col-sm-3 label-align" for="user-username">'.Yii::t('yii', 'Фойдаланувчи логини').' <span class="required">*</span></label><div class="col-md-6 col-sm-6 ">{input}<ul id="parsley-id-5" class="parsley-errors-list filled">{error}</ul>{hint}</div>',
            'errorOptions' => [
                'tag' => 'li',
                'class' => 'parsley-required',
            ],
          ]
        )->textInput(
            [
                'placeholder' => Yii::t('yii', 'Логин'),
                'id' => 'user-username',
                'name' => 'User[username]',
                'class' => 'form-control',
                'maxlength' => true,
            ]
        )?>
        

        <?php if ($user->scenario === 'create'): ?>

            <?= $form->field($user, 'password',
                [
                'options' => [
                  'tag' => 'div',
                  'class' => 'item form-group'
                ],
                'template' => '<label class="col-form-label col-md-3 col-sm-3 label-align" for="user-password">'.Yii::t('yii', 'Пароли').' <span class="required">*</span></label><div class="col-md-6 col-sm-6 ">{input}<ul id="parsley-id-5" class="parsley-errors-list filled">{error}</ul>{hint}</div>',
                'errorOptions' => [
                    'tag' => 'li',
                    'class' => 'parsley-required',
                ],
              ]
            )->widget(PasswordInput::classname(),
            [
                'options' => [
                    'placeholder' => Yii::t('yii', 'Янги парол'),
                    'id' => 'user-password',
                    'name' => 'User[password]',
                    'class' => 'form-control',
                    'maxlength' => true,
                ]
            ]
            )?>

        <?php else: ?>

            <?= $form->field($user, 'password',
                [
                'options' => [
                  'tag' => 'div',
                  'class' => 'item form-group'
                ],
                'template' => '<label class="col-form-label col-md-3 col-sm-3 label-align" for="user-password">'.Yii::t('yii', 'Пароли').' <span class="required">*</span></label><div class="col-md-6 col-sm-6 ">{input}<ul id="parsley-id-5" class="parsley-errors-list filled">{error}</ul>{hint}</div>',
                'errorOptions' => [
                    'tag' => 'li',
                    'class' => 'parsley-required',
                ],
              ]
            )->widget(PasswordInput::classname(),
            [
                'options' => [
                    'placeholder' => Yii::t('yii', 'Паролни ўзгартириш'),
                    'id' => 'user-password',
                    'name' => 'User[password]',
                    'class' => 'form-control',
                    'maxlength' => true,
                ]
            ]
            )?> 

        <?php endif ?>

        <?= $form->field($user, 'status',
                [
                'options' => [
                  'tag' => 'div',
                  'class' => 'item form-group'
                ],
                'template' => '<label class="col-form-label col-md-3 col-sm-3 label-align" for="user-status">'.Yii::t('yii', 'Ҳолати').' <span class="required">*</span></label><div class="col-md-6 col-sm-6 ">{input}<ul id="parsley-id-5" class="parsley-errors-list filled">{error}</ul>{hint}</div>',
                'errorOptions' => [
                    'tag' => 'li',
                    'class' => 'parsley-required',
                ],
              ]
            )->dropDownList($user->statusList)?> 


        <?php foreach (AuthItem::getRoles() as $item_name): ?>
            <?php $roles[$item_name->name] = $item_name->name ?>
        <?php endforeach ?>
            
        <?= $form->field($user, 'item_name',
            [
            'options' => [
              'tag' => 'div',
              'class' => 'item form-group'
            ],
            'template' => '<label class="col-form-label col-md-3 col-sm-3 label-align" for="user-item_name">'.Yii::t('yii', 'Ҳуқуқи').' <span class="required">*</span></label><div class="col-md-6 col-sm-6 ">{input}<ul id="parsley-id-5" class="parsley-errors-list filled">{error}</ul>{hint}</div>',
            'errorOptions' => [
                'tag' => 'li',
                'class' => 'parsley-required',
            ],
          ]
        )->dropDownList($roles)?> 
        
        <?php endif;?>

        <?php if(User::isTumanHodimi()):?>

        <div class="text-center">
            <?php if($user->avatar):?>
            <?= $form->field($user, 'avatar', ['template' => (!$user->isNewRecord)?'<label class="upload-label" '.'style="background-image:url(\''.\yii\helpers\Url::base().'/web/'.$user->avatar.'\')">{input}{error}{hint}</label>{label}':'<label class="upload-label">{input}{error}{hint}</label>{label}','inputOptions' => ['class' => 'upload-image'],'labelOptions' => ['class' => 'btn btn-default','style'=>'display:block;margin:auto;width:120px;margin-top:10px'], ])->fileInput(); ?>
            <?php else:?>
            <?= $form->field($user, 'avatar', ['template' => ($user->isNewRecord && !$user->isNewRecord)?'<label class="upload-label" '.'style="background-image:url(\''.\yii\helpers\Url::base().'/web/'.$user->avatar.'\')">{input}{error}{hint}</label>{label}':'<label class="upload-label">{input}{error}{hint}</label>{label}','inputOptions' => ['class' => 'upload-image'],'labelOptions' => ['class' => 'btn btn-default','style'=>'display:block;margin:auto;width:120px;margin-top:10px'], ])->fileInput(); ?>
            <?php endif?>
        </div>

        <?= $form->field($user, 'first_name',
        [
        'options' => [
          'tag' => 'div',
          'class' => 'item form-group'
        ],
        'template' => '<label class="col-form-label col-md-3 col-sm-3 label-align" for="user-first_name">'.Yii::t('yii', 'Фамилия').' <span class="required">*</span></label><div class="col-md-6 col-sm-6 ">{input}<ul id="parsley-id-5" class="parsley-errors-list filled">{error}</ul>{hint}</div>',
        'errorOptions' => [
            'tag' => 'li',
            'class' => 'parsley-required',
        ],
      ]
    )->textInput(
        [
            'placeholder' => Yii::t('yii', 'Фамилияси'),
            'id' => 'user-first_name',
            'name' => 'User[first_name]',
            'class' => 'form-control',
            'maxlength' => true,
        ]
    )?>

    <?= $form->field($user, 'second_name',
        [
        'options' => [
          'tag' => 'div',
          'class' => 'item form-group'
        ],
        'template' => '<label class="col-form-label col-md-3 col-sm-3 label-align" for="user-second_name">'.Yii::t('yii', 'Исм').' <span class="required">*</span></label><div class="col-md-6 col-sm-6 ">{input}<ul id="parsley-id-7" class="parsley-errors-list filled">{error}</ul>{hint}</div>',
        'errorOptions' => [
            'tag' => 'li',
            'class' => 'parsley-required',
        ],
      ]
    )->textInput(
        [
            'placeholder' => Yii::t('yii', 'Исми'),
            'id' => 'user-second_name',
            'name' => 'User[second_name]',
            'class' => 'form-control',
            'maxlength' => true,
        ]
    )?>

    <?= $form->field($user, 'middle_name',
        [
        'options' => [
          'tag' => 'div',
          'class' => 'item form-group',
        ],
        'template' => '<label class="col-form-label col-md-3 col-sm-3 label-align" for="user-middle_name">'.Yii::t('yii', 'Отаси').' <span class="required">*</span></label><div class="col-md-6 col-sm-6 ">{input}<ul id="parsley-id-9" class="parsley-errors-list filled">{error}</ul>{hint}</div>',
        'errorOptions' => [
            'tag' => 'li',
            'class' => 'parsley-required',
        ],
      ]
    )->textInput(
        [
            'placeholder' => Yii::t('yii', 'Отасининг исми'),
            'id' => 'user-middle_name',
            'name' => 'User[middle_name]',
            'class' => 'form-control',
            'maxlength' => true,
        ]
    )?>

    <?= $form->field($user, 'birthday',
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
            'id' => 'user-birthday',
            'name' => 'User[birthday]',
            'placeholder' => Yii::t('yii', 'КУН ОЙ ЙИЛ'),
            'class' => 'form-control',
            'data-inputmask' => "'mask' : '99.99.9999'",
        ]
    )?>



    <?= $form->field($user, 'gender',
        [
            'options' => [
              'tag' => 'div',
              'class' => 'item form-group'
            ],
            'template' => '<label class="col-form-label col-md-3 col-sm-3 label-align" for="user-second_name">'.Yii::t('yii', 'Жинси').' <span class="required">*</span></label><div class="col-md-6 col-sm-6 ">{input}<ul id="parsley-id-7" class="parsley-errors-list filled">{error}</ul>{hint}</div>',
            'errorOptions' => [
                'tag' => 'li',
                'class' => 'parsley-required',
            ],
        ])->dropDownList($user->gender(),
            [
                'id' => 'user-gender',
                'name' => 'User[gender]',
                'class' => 'form-control',
                'prompt' => Yii::t('yii','Жинсини танланг'),
            ]
        ) ?>

    <?= $form->field($user, 'passport',
        [
            'options' => [
              'tag' => 'div',
              'class' => 'item form-group'
            ],
            'template' => '<label class="col-form-label col-md-3 col-sm-3 label-align" for="user-second_name">'.Yii::t('yii', 'Пасспорт').' <span class="required">*</span></label><div class="col-md-6 col-sm-6 ">{input}<ul id="parsley-id-7" class="parsley-errors-list filled">{error}</ul>{hint}</div>',
            'errorOptions' => [
                'tag' => 'li',
                'class' => 'parsley-required',
            ],
        ]
    )->textInput(
        [
            'id' => 'user-passport',
            'name' => 'User[passport]',
            'placeholder' => Yii::t('yii', 'AA 1234567'),
            'class' => 'form-control',
            'data-inputmask' => "'mask' : 'AA 9999999'",
            'maxlength' => true
        ]
    ) ?>

    <?= $form->field($user, 'nation',
        [
            'options' => [
              'tag' => 'div',
              'class' => 'item form-group'
            ],
            'template' => '<label class="col-form-label col-md-3 col-sm-3 label-align" for="user-second_name">'.Yii::t('yii', 'Миллати').' <span class="required">*</span></label><div class="col-md-6 col-sm-6 ">{input}<ul id="parsley-id-7" class="parsley-errors-list filled">{error}</ul>{hint}</div>',
            'errorOptions' => [
                'tag' => 'li',
                'class' => 'parsley-required',
            ],
        ]
    )->textInput(
        [
            'id' => 'user-nation',
            'name' => 'User[nation]',
            'class' => 'form-control',
            'placeholder' => Yii::t('yii', 'Ўзбек, Қозоқ, Рус, ...'),
            'maxlength' => true
        ]
    ) ?>

    <?php $city = Yii::$app->user->identity['city_id']?>
    
    <?php
        $town_block = \yii\helpers\ArrayHelper::map(\app\models\TownBlock::findAll(['city_id' => $city]), 'id', 'name');
    ?>
    
    <?= $form->field($user, 'town_block_id',
        [
            'options' => [
              'tag' => 'div',
              'class' => 'item form-group'
            ],
            'template' => '<label class="col-form-label col-md-3 col-sm-3 label-align" for="user-second_name">'.Yii::t('yii', 'Маҳалла').' <span class="required">*</span></label><div class="col-md-6 col-sm-6 ">{input}<ul id="parsley-id-7" class="parsley-errors-list filled">{error}</ul>{hint}</div>',
            'errorOptions' => [
                'tag' => 'li',
                'class' => 'parsley-required',
            ],
        ]
    )->dropDownList($town_block,
        [
            'id' => 'user-town_block_id',
            'name' => 'User[town_block_id]',
            'class' => 'form-control',
            'prompt' => Yii::t('yii','Маҳаллани танланг'),
        ]
    ) ?>

     <?= $form->field($user, 'specialist',
        [
            'options' => [
              'tag' => 'div',
              'class' => 'item form-group'
            ],
            'template' => '<label class="col-form-label col-md-3 col-sm-3 label-align" for="user-second_name">'.Yii::t('yii', 'Мутахасислиги').' <span class="required">*</span></label><div class="col-md-6 col-sm-6 ">{input}<ul id="parsley-id-7" class="parsley-errors-list filled">{error}</ul>{hint}</div>',
            'errorOptions' => [
                'tag' => 'li',
                'class' => 'parsley-required',
            ],
        ]
    )->textInput(
        [
            'id' => 'user-specialist',
            'name' => 'User[specialist]',
            'class' => 'form-control',
            'placeholder' => Yii::t('yii', 'Дастурчи, Иқтисотчи, Инжинер...'),
            'maxlength' => true
        ]
    ) ?>

     <?= $form->field($user, 'be_elected_den',
        [
        'options' => [
          'tag' => 'div',
          'class' => 'field item form-group',
        ],
        'template' => '<label class="col-form-label col-md-3 col-sm-3 label-align">'.Yii::t('yii', 'Ишга кирган санаси').' <span class="required">*</span></label><div class="col-md-6 col-sm-6 ">{input}<ul id="parsley-id-9" class="parsley-errors-list filled">{error}</ul>{hint}</div>',
        'errorOptions' => [
            'tag' => 'li',
            'class' => 'parsley-required',
        ],
      ]
    )->textInput(
        [
            'id' => 'user-be_elected_den',
            'name' => 'User[be_elected_den]',
            'placeholder' => Yii::t('yii', 'КУН ОЙ ЙИЛ'),
            'class' => 'form-control',
            'data-inputmask' => "'mask' : '99.99.9999'",
        ]
    )?>


    <?= $form->field($user, 'phone',
        [
            'options' => [
              'tag' => 'div',
              'class' => 'item form-group'
            ],
            'template' => '<label class="col-form-label col-md-3 col-sm-3 label-align" for="user-second_name">'.Yii::t('yii', 'Телефон').' <span class="required">*</span></label><div class="col-md-6 col-sm-6 ">{input}<ul id="parsley-id-7" class="parsley-errors-list filled">{error}</ul>{hint}</div>',
            'errorOptions' => [
                'tag' => 'li',
                'class' => 'parsley-required',
            ],
        ]
    )->textInput(
        [
            'id' => 'user-phone',
            'name' => 'User[phone]',
            'class' => 'form-control',
            'data-inputmask' => "'mask' : '(99) 999-99-99'",
            'maxlength' => true,
            'placeholder' => Yii::t('yii', '(99) (999-99-99)'),
        ]
    ) ?>

     <?= $form->field($user, 'email',
            [
            'options' => [
              'tag' => 'div',
              'class' => 'item form-group'
            ],
            'template' => '<label class="col-form-label col-md-3 col-sm-3 label-align" for="user-email">'.Yii::t('yii', 'Электрон почтаси').' <span class="required">*</span></label><div class="col-md-6 col-sm-6 ">{input}<ul id="parsley-id-5" class="parsley-errors-list filled">{error}</ul>{hint}</div>',
            'errorOptions' => [
                'tag' => 'li',
                'class' => 'parsley-required',
            ],
          ]
        )->textInput(
            [
                'placeholder' => Yii::t('yii', 'Электрон почта'),
                'id' => 'user-email',
                'name' => 'User[email]',
                'class' => 'form-control',
                'maxlength' => true,
            ]
        )?>

        <?= $form->field($user, 'username',
            [
            'options' => [
              'tag' => 'div',
              'class' => 'item form-group'
            ],
            'template' => '<label class="col-form-label col-md-3 col-sm-3 label-align" for="user-username">'.Yii::t('yii', 'Фойдаланувчи логини').' <span class="required">*</span></label><div class="col-md-6 col-sm-6 ">{input}<ul id="parsley-id-5" class="parsley-errors-list filled">{error}</ul>{hint}</div>',
            'errorOptions' => [
                'tag' => 'li',
                'class' => 'parsley-required',
            ],
          ]
        )->textInput(
            [
                'placeholder' => Yii::t('yii', 'Логин'),
                'id' => 'user-username',
                'name' => 'User[username]',
                'class' => 'form-control',
                'maxlength' => true,
            ]
        )?>
        

        <?php if ($user->scenario === 'create'): ?>

            <?= $form->field($user, 'password',
                [
                'options' => [
                  'tag' => 'div',
                  'class' => 'item form-group'
                ],
                'template' => '<label class="col-form-label col-md-3 col-sm-3 label-align" for="user-password">'.Yii::t('yii', 'Пароли').' <span class="required">*</span></label><div class="col-md-6 col-sm-6 ">{input}<ul id="parsley-id-5" class="parsley-errors-list filled">{error}</ul>{hint}</div>',
                'errorOptions' => [
                    'tag' => 'li',
                    'class' => 'parsley-required',
                ],
              ]
            )->widget(PasswordInput::classname(),
            [
                'options' => [
                    'placeholder' => Yii::t('yii', 'Янги парол'),
                    'id' => 'user-password',
                    'name' => 'User[password]',
                    'class' => 'form-control',
                    'maxlength' => true,
                ]
            ]
            )?>

        <?php else: ?>

            <?= $form->field($user, 'password',
                [
                'options' => [
                  'tag' => 'div',
                  'class' => 'item form-group'
                ],
                'template' => '<label class="col-form-label col-md-3 col-sm-3 label-align" for="user-password">'.Yii::t('yii', 'Пароли').' <span class="required">*</span></label><div class="col-md-6 col-sm-6 ">{input}<ul id="parsley-id-5" class="parsley-errors-list filled">{error}</ul>{hint}</div>',
                'errorOptions' => [
                    'tag' => 'li',
                    'class' => 'parsley-required',
                ],
              ]
            )->widget(PasswordInput::classname(),
            [
                'options' => [
                    'placeholder' => Yii::t('yii', 'Паролни ўзгартириш'),
                    'id' => 'user-password',
                    'name' => 'User[password]',
                    'class' => 'form-control',
                    'maxlength' => true,
                ]
            ]
            )?> 

        <?php endif ?>

        <?= $form->field($user, 'status',
                [
                'options' => [
                  'tag' => 'div',
                  'class' => 'item form-group'
                ],
                'template' => '<label class="col-form-label col-md-3 col-sm-3 label-align" for="user-status">'.Yii::t('yii', 'Ҳолати').' <span class="required">*</span></label><div class="col-md-6 col-sm-6 ">{input}<ul id="parsley-id-5" class="parsley-errors-list filled">{error}</ul>{hint}</div>',
                'errorOptions' => [
                    'tag' => 'li',
                    'class' => 'parsley-required',
                ],
              ]
            )->dropDownList($user->statusList)?> 


        <?php foreach (AuthItem::getRoles() as $item_name): ?>
            <?php $roles[$item_name->name] = $item_name->name ?>
        <?php endforeach ?>
            
        <?= $form->field($user, 'item_name',
            [
            'options' => [
              'tag' => 'div',
              'class' => 'item form-group'
            ],
            'template' => '<label class="col-form-label col-md-3 col-sm-3 label-align" for="user-item_name">'.Yii::t('yii', 'Ҳуқуқи').' <span class="required">*</span></label><div class="col-md-6 col-sm-6 ">{input}<ul id="parsley-id-5" class="parsley-errors-list filled">{error}</ul>{hint}</div>',
            'errorOptions' => [
                'tag' => 'li',
                'class' => 'parsley-required',
            ],
          ]
        )->dropDownList($roles)?> 
        
        <?php endif;?>

        <?php if(User::isMahhallaRaisi()):?>

        <div class="text-center">
            <?php if($user->avatar):?>
            <?= $form->field($user, 'avatar', ['template' => (!$user->isNewRecord)?'<label class="upload-label" '.'style="background-image:url(\''.\yii\helpers\Url::base().'/web/'.$user->avatar.'\')">{input}{error}{hint}</label>{label}':'<label class="upload-label">{input}{error}{hint}</label>{label}','inputOptions' => ['class' => 'upload-image'],'labelOptions' => ['class' => 'btn btn-default','style'=>'display:block;margin:auto;width:120px;margin-top:10px'], ])->fileInput(); ?>
            <?php else:?>
            <?= $form->field($user, 'avatar', ['template' => ($user->isNewRecord && !$user->isNewRecord)?'<label class="upload-label" '.'style="background-image:url(\''.\yii\helpers\Url::base().'/web/'.$user->avatar.'\')">{input}{error}{hint}</label>{label}':'<label class="upload-label">{input}{error}{hint}</label>{label}','inputOptions' => ['class' => 'upload-image'],'labelOptions' => ['class' => 'btn btn-default','style'=>'display:block;margin:auto;width:120px;margin-top:10px'], ])->fileInput(); ?>
            <?php endif?>
        </div>

        <?= $form->field($user, 'first_name',
        [
        'options' => [
          'tag' => 'div',
          'class' => 'item form-group'
        ],
        'template' => '<label class="col-form-label col-md-3 col-sm-3 label-align" for="user-first_name">'.Yii::t('yii', 'Фамилия').' <span class="required">*</span></label><div class="col-md-6 col-sm-6 ">{input}<ul id="parsley-id-5" class="parsley-errors-list filled">{error}</ul>{hint}</div>',
        'errorOptions' => [
            'tag' => 'li',
            'class' => 'parsley-required',
        ],
      ]
    )->textInput(
        [
            'placeholder' => Yii::t('yii', 'Фамилияси'),
            'id' => 'user-first_name',
            'name' => 'User[first_name]',
            'class' => 'form-control',
            'maxlength' => true,
        ]
    )?>

    <?= $form->field($user, 'second_name',
        [
        'options' => [
          'tag' => 'div',
          'class' => 'item form-group'
        ],
        'template' => '<label class="col-form-label col-md-3 col-sm-3 label-align" for="user-second_name">'.Yii::t('yii', 'Исм').' <span class="required">*</span></label><div class="col-md-6 col-sm-6 ">{input}<ul id="parsley-id-7" class="parsley-errors-list filled">{error}</ul>{hint}</div>',
        'errorOptions' => [
            'tag' => 'li',
            'class' => 'parsley-required',
        ],
      ]
    )->textInput(
        [
            'placeholder' => Yii::t('yii', 'Исми'),
            'id' => 'user-second_name',
            'name' => 'User[second_name]',
            'class' => 'form-control',
            'maxlength' => true,
        ]
    )?>

    <?= $form->field($user, 'middle_name',
        [
        'options' => [
          'tag' => 'div',
          'class' => 'item form-group',
        ],
        'template' => '<label class="col-form-label col-md-3 col-sm-3 label-align" for="user-middle_name">'.Yii::t('yii', 'Отаси').' <span class="required">*</span></label><div class="col-md-6 col-sm-6 ">{input}<ul id="parsley-id-9" class="parsley-errors-list filled">{error}</ul>{hint}</div>',
        'errorOptions' => [
            'tag' => 'li',
            'class' => 'parsley-required',
        ],
      ]
    )->textInput(
        [
            'placeholder' => Yii::t('yii', 'Отасининг исми'),
            'id' => 'user-middle_name',
            'name' => 'User[middle_name]',
            'class' => 'form-control',
            'maxlength' => true,
        ]
    )?>

    <?= $form->field($user, 'birthday',
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
            'id' => 'user-birthday',
            'name' => 'User[birthday]',
            'placeholder' => Yii::t('yii', 'КУН ОЙ ЙИЛ'),
            'class' => 'form-control',
            'data-inputmask' => "'mask' : '99.99.9999'",
        ]
    )?>



    <?= $form->field($user, 'gender',
        [
            'options' => [
              'tag' => 'div',
              'class' => 'item form-group'
            ],
            'template' => '<label class="col-form-label col-md-3 col-sm-3 label-align" for="user-second_name">'.Yii::t('yii', 'Жинси').' <span class="required">*</span></label><div class="col-md-6 col-sm-6 ">{input}<ul id="parsley-id-7" class="parsley-errors-list filled">{error}</ul>{hint}</div>',
            'errorOptions' => [
                'tag' => 'li',
                'class' => 'parsley-required',
            ],
        ])->dropDownList($user->gender(),
            [
                'id' => 'user-gender',
                'name' => 'User[gender]',
                'class' => 'form-control',
                'prompt' => Yii::t('yii','Жинсини танланг'),
            ]
        ) ?>

    <?= $form->field($user, 'passport',
        [
            'options' => [
              'tag' => 'div',
              'class' => 'item form-group'
            ],
            'template' => '<label class="col-form-label col-md-3 col-sm-3 label-align" for="user-second_name">'.Yii::t('yii', 'Пасспорт').' <span class="required">*</span></label><div class="col-md-6 col-sm-6 ">{input}<ul id="parsley-id-7" class="parsley-errors-list filled">{error}</ul>{hint}</div>',
            'errorOptions' => [
                'tag' => 'li',
                'class' => 'parsley-required',
            ],
        ]
    )->textInput(
        [
            'id' => 'user-passport',
            'name' => 'User[passport]',
            'placeholder' => Yii::t('yii', 'AA 1234567'),
            'class' => 'form-control',
            'data-inputmask' => "'mask' : 'AA 9999999'",
            'maxlength' => true
        ]
    ) ?>

    <?= $form->field($user, 'nation',
        [
            'options' => [
              'tag' => 'div',
              'class' => 'item form-group'
            ],
            'template' => '<label class="col-form-label col-md-3 col-sm-3 label-align" for="user-second_name">'.Yii::t('yii', 'Миллати').' <span class="required">*</span></label><div class="col-md-6 col-sm-6 ">{input}<ul id="parsley-id-7" class="parsley-errors-list filled">{error}</ul>{hint}</div>',
            'errorOptions' => [
                'tag' => 'li',
                'class' => 'parsley-required',
            ],
        ]
    )->textInput(
        [
            'id' => 'user-nation',
            'name' => 'User[nation]',
            'class' => 'form-control',
            'placeholder' => Yii::t('yii', 'Ўзбек, Қозоқ, Рус, ...'),
            'maxlength' => true
        ]
    ) ?>    

    <?= $form->field($user, 'specialist',
        [
            'options' => [
              'tag' => 'div',
              'class' => 'item form-group'
            ],
            'template' => '<label class="col-form-label col-md-3 col-sm-3 label-align" for="user-second_name">'.Yii::t('yii', 'Мутахасислиги').' <span class="required">*</span></label><div class="col-md-6 col-sm-6 ">{input}<ul id="parsley-id-7" class="parsley-errors-list filled">{error}</ul>{hint}</div>',
            'errorOptions' => [
                'tag' => 'li',
                'class' => 'parsley-required',
            ],
        ]
    )->textInput(
        [
            'id' => 'user-specialist',
            'name' => 'User[specialist]',
            'class' => 'form-control',
            'placeholder' => Yii::t('yii', 'Дастурчи, Иқтисотчи, Инжинер...'),
            'maxlength' => true
        ]
    ) ?>

     <?= $form->field($user, 'be_elected_den',
        [
        'options' => [
          'tag' => 'div',
          'class' => 'field item form-group',
        ],
        'template' => '<label class="col-form-label col-md-3 col-sm-3 label-align">'.Yii::t('yii', 'Ишга кирган санаси').' <span class="required">*</span></label><div class="col-md-6 col-sm-6 ">{input}<ul id="parsley-id-9" class="parsley-errors-list filled">{error}</ul>{hint}</div>',
        'errorOptions' => [
            'tag' => 'li',
            'class' => 'parsley-required',
        ],
      ]
    )->textInput(
        [
            'id' => 'user-be_elected_den',
            'name' => 'User[be_elected_den]',
            'placeholder' => Yii::t('yii', 'КУН ОЙ ЙИЛ'),
            'class' => 'form-control',
            'data-inputmask' => "'mask' : '99.99.9999'",
        ]
    )?>


    <?= $form->field($user, 'phone',
        [
            'options' => [
              'tag' => 'div',
              'class' => 'item form-group'
            ],
            'template' => '<label class="col-form-label col-md-3 col-sm-3 label-align" for="user-second_name">'.Yii::t('yii', 'Телефон').' <span class="required">*</span></label><div class="col-md-6 col-sm-6 ">{input}<ul id="parsley-id-7" class="parsley-errors-list filled">{error}</ul>{hint}</div>',
            'errorOptions' => [
                'tag' => 'li',
                'class' => 'parsley-required',
            ],
        ]
    )->textInput(
        [
            'id' => 'user-phone',
            'name' => 'User[phone]',
            'class' => 'form-control',
            'data-inputmask' => "'mask' : '(99) 999-99-99'",
            'maxlength' => true,
            'placeholder' => Yii::t('yii', '(99) (999-99-99)'),
        ]
    ) ?>

     <?= $form->field($user, 'email',
            [
            'options' => [
              'tag' => 'div',
              'class' => 'item form-group'
            ],
            'template' => '<label class="col-form-label col-md-3 col-sm-3 label-align" for="user-email">'.Yii::t('yii', 'Электрон почтаси').' <span class="required">*</span></label><div class="col-md-6 col-sm-6 ">{input}<ul id="parsley-id-5" class="parsley-errors-list filled">{error}</ul>{hint}</div>',
            'errorOptions' => [
                'tag' => 'li',
                'class' => 'parsley-required',
            ],
          ]
        )->textInput(
            [
                'placeholder' => Yii::t('yii', 'Электрон почта'),
                'id' => 'user-email',
                'name' => 'User[email]',
                'class' => 'form-control',
                'maxlength' => true,
            ]
        )?>

        <?= $form->field($user, 'username',
            [
            'options' => [
              'tag' => 'div',
              'class' => 'item form-group'
            ],
            'template' => '<label class="col-form-label col-md-3 col-sm-3 label-align" for="user-username">'.Yii::t('yii', 'Фойдаланувчи логини').' <span class="required">*</span></label><div class="col-md-6 col-sm-6 ">{input}<ul id="parsley-id-5" class="parsley-errors-list filled">{error}</ul>{hint}</div>',
            'errorOptions' => [
                'tag' => 'li',
                'class' => 'parsley-required',
            ],
          ]
        )->textInput(
            [
                'placeholder' => Yii::t('yii', 'Логин'),
                'id' => 'user-username',
                'name' => 'User[username]',
                'class' => 'form-control',
                'maxlength' => true,
            ]
        )?>
        

        <?php if ($user->scenario === 'create'): ?>

            <?= $form->field($user, 'password',
                [
                'options' => [
                  'tag' => 'div',
                  'class' => 'item form-group'
                ],
                'template' => '<label class="col-form-label col-md-3 col-sm-3 label-align" for="user-password">'.Yii::t('yii', 'Пароли').' <span class="required">*</span></label><div class="col-md-6 col-sm-6 ">{input}<ul id="parsley-id-5" class="parsley-errors-list filled">{error}</ul>{hint}</div>',
                'errorOptions' => [
                    'tag' => 'li',
                    'class' => 'parsley-required',
                ],
              ]
            )->widget(PasswordInput::classname(),
            [
                'options' => [
                    'placeholder' => Yii::t('yii', 'Янги парол'),
                    'id' => 'user-password',
                    'name' => 'User[password]',
                    'class' => 'form-control',
                    'maxlength' => true,
                ]
            ]
            )?>

        <?php else: ?>

            <?= $form->field($user, 'password',
                [
                'options' => [
                  'tag' => 'div',
                  'class' => 'item form-group'
                ],
                'template' => '<label class="col-form-label col-md-3 col-sm-3 label-align" for="user-password">'.Yii::t('yii', 'Пароли').' <span class="required">*</span></label><div class="col-md-6 col-sm-6 ">{input}<ul id="parsley-id-5" class="parsley-errors-list filled">{error}</ul>{hint}</div>',
                'errorOptions' => [
                    'tag' => 'li',
                    'class' => 'parsley-required',
                ],
              ]
            )->widget(PasswordInput::classname(),
            [
                'options' => [
                    'placeholder' => Yii::t('yii', 'Паролни ўзгартириш'),
                    'id' => 'user-password',
                    'name' => 'User[password]',
                    'class' => 'form-control',
                    'maxlength' => true,
                ]
            ]
            )?> 

        <?php endif ?>

        <?= $form->field($user, 'status',
                [
                'options' => [
                  'tag' => 'div',
                  'class' => 'item form-group'
                ],
                'template' => '<label class="col-form-label col-md-3 col-sm-3 label-align" for="user-status">'.Yii::t('yii', 'Ҳолати').' <span class="required">*</span></label><div class="col-md-6 col-sm-6 ">{input}<ul id="parsley-id-5" class="parsley-errors-list filled">{error}</ul>{hint}</div>',
                'errorOptions' => [
                    'tag' => 'li',
                    'class' => 'parsley-required',
                ],
              ]
            )->dropDownList($user->statusList)?> 


        <?php foreach (AuthItem::getRoles() as $item_name): ?>
            <?php $roles[$item_name->name] = $item_name->name ?>
        <?php endforeach ?>
            
        <?= $form->field($user, 'item_name',
            [
            'options' => [
              'tag' => 'div',
              'class' => 'item form-group'
            ],
            'template' => '<label class="col-form-label col-md-3 col-sm-3 label-align" for="user-item_name">'.Yii::t('yii', 'Ҳуқуқи').' <span class="required">*</span></label><div class="col-md-6 col-sm-6 ">{input}<ul id="parsley-id-5" class="parsley-errors-list filled">{error}</ul>{hint}</div>',
            'errorOptions' => [
                'tag' => 'li',
                'class' => 'parsley-required',
            ],
          ]
        )->dropDownList($roles)?> 
        
        <?php endif;?>

        <?php if(User::isKotib() || User::isMaslahatchi() || User::isPospon() || User::isInspektor()):?>

         <div class="text-center">
            <?php if($user->avatar):?>
            <?= $form->field($user, 'avatar', ['template' => (!$user->isNewRecord)?'<label class="upload-label" '.'style="background-image:url(\''.\yii\helpers\Url::base().'/web/'.$user->avatar.'\')">{input}{error}{hint}</label>{label}':'<label class="upload-label">{input}{error}{hint}</label>{label}','inputOptions' => ['class' => 'upload-image'],'labelOptions' => ['class' => 'btn btn-default','style'=>'display:block;margin:auto;width:120px;margin-top:10px'], ])->fileInput(); ?>
            <?php else:?>
            <?= $form->field($user, 'avatar', ['template' => ($user->isNewRecord && !$user->isNewRecord)?'<label class="upload-label" '.'style="background-image:url(\''.\yii\helpers\Url::base().'/web/'.$user->avatar.'\')">{input}{error}{hint}</label>{label}':'<label class="upload-label">{input}{error}{hint}</label>{label}','inputOptions' => ['class' => 'upload-image'],'labelOptions' => ['class' => 'btn btn-default','style'=>'display:block;margin:auto;width:120px;margin-top:10px'], ])->fileInput(); ?>
            <?php endif?>
        </div>

        <?= $form->field($user, 'first_name',
        [
        'options' => [
          'tag' => 'div',
          'class' => 'item form-group'
        ],
        'template' => '<label class="col-form-label col-md-3 col-sm-3 label-align" for="user-first_name">'.Yii::t('yii', 'Фамилия').' <span class="required">*</span></label><div class="col-md-6 col-sm-6 ">{input}<ul id="parsley-id-5" class="parsley-errors-list filled">{error}</ul>{hint}</div>',
        'errorOptions' => [
            'tag' => 'li',
            'class' => 'parsley-required',
        ],
      ]
    )->textInput(
        [
            'placeholder' => Yii::t('yii', 'Фамилияси'),
            'id' => 'user-first_name',
            'name' => 'User[first_name]',
            'class' => 'form-control',
            'maxlength' => true,
        ]
    )?>

    <?= $form->field($user, 'second_name',
        [
        'options' => [
          'tag' => 'div',
          'class' => 'item form-group'
        ],
        'template' => '<label class="col-form-label col-md-3 col-sm-3 label-align" for="user-second_name">'.Yii::t('yii', 'Исм').' <span class="required">*</span></label><div class="col-md-6 col-sm-6 ">{input}<ul id="parsley-id-7" class="parsley-errors-list filled">{error}</ul>{hint}</div>',
        'errorOptions' => [
            'tag' => 'li',
            'class' => 'parsley-required',
        ],
      ]
    )->textInput(
        [
            'placeholder' => Yii::t('yii', 'Исми'),
            'id' => 'user-second_name',
            'name' => 'User[second_name]',
            'class' => 'form-control',
            'maxlength' => true,
        ]
    )?>

    <?= $form->field($user, 'middle_name',
        [
        'options' => [
          'tag' => 'div',
          'class' => 'item form-group',
        ],
        'template' => '<label class="col-form-label col-md-3 col-sm-3 label-align" for="user-middle_name">'.Yii::t('yii', 'Отаси').' <span class="required">*</span></label><div class="col-md-6 col-sm-6 ">{input}<ul id="parsley-id-9" class="parsley-errors-list filled">{error}</ul>{hint}</div>',
        'errorOptions' => [
            'tag' => 'li',
            'class' => 'parsley-required',
        ],
      ]
    )->textInput(
        [
            'placeholder' => Yii::t('yii', 'Отасининг исми'),
            'id' => 'user-middle_name',
            'name' => 'User[middle_name]',
            'class' => 'form-control',
            'maxlength' => true,
        ]
    )?>


    <?= $form->field($user, 'phone',
        [
            'options' => [
              'tag' => 'div',
              'class' => 'item form-group'
            ],
            'template' => '<label class="col-form-label col-md-3 col-sm-3 label-align" for="user-second_name">'.Yii::t('yii', 'Телефон').' <span class="required">*</span></label><div class="col-md-6 col-sm-6 ">{input}<ul id="parsley-id-7" class="parsley-errors-list filled">{error}</ul>{hint}</div>',
            'errorOptions' => [
                'tag' => 'li',
                'class' => 'parsley-required',
            ],
        ]
    )->textInput(
        [
            'id' => 'user-phone',
            'name' => 'User[phone]',
            'class' => 'form-control',
            'data-inputmask' => "'mask' : '(99) 999-99-99'",
            'maxlength' => true,
            'placeholder' => Yii::t('yii', '(99) (999-99-99)'),
        ]
    ) ?>

     <?= $form->field($user, 'email',
            [
            'options' => [
              'tag' => 'div',
              'class' => 'item form-group'
            ],
            'template' => '<label class="col-form-label col-md-3 col-sm-3 label-align" for="user-email">'.Yii::t('yii', 'Электрон почтаси').' <span class="required">*</span></label><div class="col-md-6 col-sm-6 ">{input}<ul id="parsley-id-5" class="parsley-errors-list filled">{error}</ul>{hint}</div>',
            'errorOptions' => [
                'tag' => 'li',
                'class' => 'parsley-required',
            ],
          ]
        )->textInput(
            [
                'placeholder' => Yii::t('yii', 'Электрон почта'),
                'id' => 'user-email',
                'name' => 'User[email]',
                'class' => 'form-control',
                'maxlength' => true,
            ]
        )?>

        <?= $form->field($user, 'username',
            [
            'options' => [
              'tag' => 'div',
              'class' => 'item form-group'
            ],
            'template' => '<label class="col-form-label col-md-3 col-sm-3 label-align" for="user-username">'.Yii::t('yii', 'Фойдаланувчи логини').' <span class="required">*</span></label><div class="col-md-6 col-sm-6 ">{input}<ul id="parsley-id-5" class="parsley-errors-list filled">{error}</ul>{hint}</div>',
            'errorOptions' => [
                'tag' => 'li',
                'class' => 'parsley-required',
            ],
          ]
        )->textInput(
            [
                'placeholder' => Yii::t('yii', 'Логин'),
                'id' => 'user-username',
                'name' => 'User[username]',
                'class' => 'form-control',
                'maxlength' => true,
            ]
        )?>
        

        <?php if ($user->scenario === 'create'): ?>

            <?= $form->field($user, 'password',
                [
                'options' => [
                  'tag' => 'div',
                  'class' => 'item form-group'
                ],
                'template' => '<label class="col-form-label col-md-3 col-sm-3 label-align" for="user-password">'.Yii::t('yii', 'Пароли').' <span class="required">*</span></label><div class="col-md-6 col-sm-6 ">{input}<ul id="parsley-id-5" class="parsley-errors-list filled">{error}</ul>{hint}</div>',
                'errorOptions' => [
                    'tag' => 'li',
                    'class' => 'parsley-required',
                ],
              ]
            )->widget(PasswordInput::classname(),
            [
                'options' => [
                    'placeholder' => Yii::t('yii', 'Янги парол'),
                    'id' => 'user-password',
                    'name' => 'User[password]',
                    'class' => 'form-control',
                    'maxlength' => true,
                ]
            ]
            )?>

        <?php else: ?>

            <?= $form->field($user, 'password',
                [
                'options' => [
                  'tag' => 'div',
                  'class' => 'item form-group'
                ],
                'template' => '<label class="col-form-label col-md-3 col-sm-3 label-align" for="user-password">'.Yii::t('yii', 'Пароли').' <span class="required">*</span></label><div class="col-md-6 col-sm-6 ">{input}<ul id="parsley-id-5" class="parsley-errors-list filled">{error}</ul>{hint}</div>',
                'errorOptions' => [
                    'tag' => 'li',
                    'class' => 'parsley-required',
                ],
              ]
            )->widget(PasswordInput::classname(),
            [
                'options' => [
                    'placeholder' => Yii::t('yii', 'Паролни ўзгартириш'),
                    'id' => 'user-password',
                    'name' => 'User[password]',
                    'class' => 'form-control',
                    'maxlength' => true,
                ]
            ]
            )?> 

        <?php endif ?>
        
        <?php endif;?>

        <div class="ln_solid"></div>

        <div class="item form-group">
            <div class="col-md-6 col-sm-6 offset-md-3">
                 <?= Html::submitButton($user->isNewRecord ? Yii::t('yii', 'Сақлаш') 
                : Yii::t('yii', 'Янгилаш'), ['class' => $user->isNewRecord 
                ? 'btn btn-success' : 'btn btn-primary']) ?>
                <?php if(User::isTheCreator() || User::isAdmin() || User::isRespublikaRaisi() || User::isRespublikaHodimi()):?>
                <?= Html::a(Yii::t('yii', 'Орқага'), ['user/index'], ['class' => 'btn btn-default']) ?>
                <?php endif?>
                <?php if(User::isKotib() || User::isMaslahatchi() || User::isPospon() || User::isInspektor()):?>
                <?= Html::a(Yii::t('yii', 'Орқага'), ['site/index'], ['class' => 'btn btn-default']) ?>
                <?php endif?>
            </div>   
        </div>

    <?= $form->errorSummary($user)?>


    <?php ActiveForm::end(); ?>

 
</div>

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
