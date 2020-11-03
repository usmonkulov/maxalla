<?php
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \app\models\ResetPasswordForm */

use kartik\password\PasswordInput;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = Yii::t('yii', 'Parolni tiklash');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-reset-password">

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
            'placeholder' => Yii::t('yii', 'Yangi parol')
        ]
    ) ?>

    <?= Html::submitButton('<i class="fa fa-lock"></i> '.Yii::t('yii', 'Saqlash'), ['class' => 'btn btn-info btn-block']) ?>

    <div class="clearfix"></div>
       
    <div class="separator">

        <div>
          <p>©<?= date('Y') ?>  <?=Yii::t('yii', 'Yangi parol kiritish mumkin')?> </p>
        </div>
    </div>
    <?php ActiveForm::end(); ?>


</div>
