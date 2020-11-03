<?php
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \app\models\PasswordResetRequestForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;
$this->title = Yii::t('yii', 'Emailga yuborish');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-request-password-reset">

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

    <?= Html::submitButton('<i class="fa fa-envelope"></i> '.Yii::t('yii', 'Yuborish'), ['class' => 'btn btn-info btn-block']) ?>
    
    <div class="clearfix"></div>
       
    <div class="separator">

    <div>
      <p>©<?= date('Y') ?>  <?=Yii::t('yii', 'Parolni unitgan bo’lsangiz emailga yuborib tiklash mumkin')?> <b><a href="<?=Url::to(['site/login'])?>"> <?=Yii::t('yii', 'Orqaga')?> </a></b> </p>  
    </div>           

    </div>
    <?php ActiveForm::end(); ?>

</div>