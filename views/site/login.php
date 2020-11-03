<?php
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;

$this->title = Yii::t('yii', 'Kirish');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login">
    <?php $form = ActiveForm::begin(
        [
            'options' => [
                'class' => 'form-label-left input_mask'
            ]
        ]
    )?>
    <section class="login_content">
        <h1 class="text-center"><?= Html::encode($this->title) ?></h1>
    </section>
       <?php if ($model->scenario === 'lwe'): ?>
        <?= $form->field($model, 'email',
            [
                'options' => [
                    'tag' => 'div',
                    'class' => 'col-md-12 col-sm-12 form-group has-feedback'
                ],
               'template' => '{input}{error}{hint}<span class="fa fa-envelope form-control-feedback left" aria-hidden="true"></span>',
               'errorOptions' => [
                    'tag' => 'div',
                    'class' => 'parsley-errors-list filled',
                ],
            ]
        )->textInput(
            [
                'class' => 'form-control has-feedback-left',
                'placeholder' => Yii::t('yii', 'Elektron pochta'), 
                'autofocus' => true,
            ]
        ) ?>
      <?php else: ?>
        <?= $form->field($model, 'username',
            [
                'options' => [
                    'tag' => 'div',
                    'class' => 'col-md-12 col-sm-12 has-feedback'
                ],
               'template' => '{input}<ul class="parsley-errors-list filled">{error}{hint}</ul><span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>',
               'errorOptions' => [
                    'tag' => 'li',
                    'class' => 'parsley-required',
                ],
            ]
        )->textInput(
            [
                'class' => 'form-control has-feedback-left',
                'placeholder' => Yii::t('yii', 'Foydalanuvchi nomi'), 
                'autofocus' => true,
            ]
        ) ?>
      <?php endif ?>
        <?= $form->field($model, 'password',
            [
                'options' => [
                    'tag' => 'div',
                    'class' => 'col-md-12 col-sm-12 has-feedback'
                ],
               'template' => '{input}<ul class="parsley-errors-list filled">{error}{hint}</ul><span class="fa fa-lock form-control-feedback left" aria-hidden="true"></span>',
               'errorOptions' => [
                    'tag' => 'li',
                    'class' => 'parsley-required',
                ],
            ]
        )->passwordInput(
            [
                'class' => 'form-control has-feedback-left',
                'placeholder' => Yii::t('yii', 'Parol')
            ]
        ) ?>
        <?= $form->field($model, 'rememberMe',
             [
                'options' => [
                    'tag' => 'div',
                    'class' => 'col-md-12 col-sm-12'
                ],
               'template' => '{input}{error}{hint}',
               'errorOptions' => [
                    'tag' => 'div',
                    'class' => 'parsley-errors-list filled',
                ],
                // 'inputOptions' => ['class' => 'flat']
            ]
        )->checkbox(
        [
          'class' => 'flat',
          'template' => '
            {input}{label}
            <span class="pull-right">
              <a href='.Url::to(['site/request-password-reset']).'>'.Yii::t('yii', 'Parolni unutdingizmi').'?</a>
            </span>
          ',
        ]
        ) ?> 

    <?= Html::submitButton('<i class="fa fa-lock"></i> '.Yii::t('yii', 'Kirish'), ['class' => 'btn btn-info btn-block']) ?>

    <div class="clearfix"></div>
       
    <div class="separator">

        <div>
          <p>©<?= date('Y') ?>  <?=Yii::t('yii', 'Mahalla fuqorolari yig‘inining aholini ro‘yxatga olish tizimiga xush kelibsiz')?> </p>
        </div>
    </div>
    <?php ActiveForm::end(); ?>
</div>
<style>
.field-loginform-rememberme label {
    padding-left: 10px;
}
</style>