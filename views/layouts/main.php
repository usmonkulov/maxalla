<?php

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use app\models\User;
use yii\helpers\Url;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="/images/favicon.ico" type="image/ico" />
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
  </head>
  <body class="nav-md footer_fixed">
  <?php $this->beginBody() ?>
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="/" class="site_title text-center"> 
                <span>
                <?php if(User::isMahhallaRaisi() || User::isKotib() || User::isMaslahatchi() || User::isPospon() || User::isInspektor()):?>
                  <?= Yii::$app->user->identity->townBlock['name']?>
                <?php endif;?>
                <?php if(User::isTheCreator()):?>
                  <?= Yii::t('yii','Яратувчи')?>
                <?php endif;?>
                <?php if(User::isAdmin()):?>
                  <?= Yii::t('yii','Администратор')?>
                <?php endif;?>
                <?php if(User::isRespublikaRaisi()):?>
                  <?= Yii::t('yii','Республика раиси')?>
                <?php endif;?>
                <?php if(User::isRespublikaHodimi()):?>
                  <?= Yii::t('yii','Республика ҳодими')?>
                <?php endif;?>
                <?php if(User::isViloyatRaisi() || User::isViloyatHodimi()):?>
                  <?= Yii::$app->user->identity->region['name']?>
                <?php endif;?>
                <?php if(User::isTumanRaisi() || User::isTumanHodimi()):?>
                  <?= Yii::$app->user->identity->city['name']?>
                <?php endif;?>
                </span>
              </a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <?php $avatar = User::findOne(Yii::$app->user->identity->id);?>
                <?php if($avatar->avatar):?>
                  <?= Html::img("@web/{$avatar->avatar}",['class' => 'img-circle profile_img','alt' => Yii::$app->user->identity['second_name']])?>
                <?php else:?>
                  <?= Html::img("@web/images/user.png", ['class' => 'img-circle profile_img','alt' => Yii::$app->user->identity['second_name']])?>
                <?php endif?>
              </div>
              <div class="profile_info">
                <span><?=Yii::t('yii','Салом')?>,</span>
                <h2><?= Yii::$app->user->identity['second_name']?></h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>МЕНЮ</h3>
                <ul class="nav side-menu">
                  <li><a href="/"><i class="fa fa-home"></i> <?=Yii::t('yii','Бош саҳифа')?> </a></li>
                  <?php if(!User::isKotib() && !User::isMaslahatchi() && !User::isPospon() && !User::isInspektor()):?>
                  <li><a href="<?=\yii\helpers\Url::to(['/user'])?>"><i class="fa fa-users"></i> </i> <?=Yii::t('yii','Фойдаланувчилар')?> </a></li>
                  <?php endif;?>
                  <li><a href="<?=\yii\helpers\Url::to(['/population'])?>"><i class="fa fa-user"></i> <?=Yii::t('yii','Ахоли қўшиш')?> </a></li>
        
                   <?php if(!User::isMahhallaRaisi() && !User::isKotib() && !User::isMaslahatchi() && !User::isPospon() && !User::isInspektor()):?>
                  <li><a href="<?=\yii\helpers\Url::to(['/town-block'])?>"><i class="fa fa-tasks"></i> <?=Yii::t('yii','Маҳаллалар')?> </a></li>
                  <?php endif;?>
                </ul>
              </div>
            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <a href="/" data-toggle="tooltip" data-placement="top" title="<?=Yii::t('yii','Бош саҳифа')?>">
                <span class="glyphicon glyphicon-home" aria-hidden="true"></span>
              </a>
              <a href="<?= \yii\helpers\Url::to(['user/view?id='.Yii::$app->user->identity->id])?>" data-toggle="tooltip" data-placement="top" title="<?=Yii::t('yii','Менинг профилим')?>">
                <span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>
              </a>
              <a href="<?= \yii\helpers\Url::to(['user/update?id='.Yii::$app->user->identity->id])?>" data-toggle="tooltip" data-placement="top" title="<?=Yii::t('yii','Профилни таҳрирлаш')?>">
                <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
              </a>
              <a data-method="POST" data-toggle="tooltip" data-placement="top" title="<?=Yii::t('yii','Chiqish')?>" href="<?= \yii\helpers\Url::to(['/site/logout'])?>">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
            <div class="nav_menu">
                <div class="nav toggle">
                  <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                </div>
                <nav class="nav navbar-nav">
                <ul class=" navbar-right">
                  <li class="nav-item dropdown open" style="padding-left: 15px;">
                    <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                      <?php if($avatar->avatar):?>
                        <?= Html::img("@web/{$avatar->avatar}",['alt' => Yii::$app->user->identity['second_name']])?>
                      <?php else:?>
                        <?= Html::img("@web/images/user.png", ['alt' => Yii::$app->user->identity['second_name']])?>
                      <?php endif?>  
                      <?= Yii::$app->user->identity['second_name']?>
                    </a>
                    <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
                    <a data-method="POST" class="dropdown-item"  href="<?= \yii\helpers\Url::to(['user/view?id='.Yii::$app->user->identity->id])?>"> <?=Yii::t('yii','Менинг профилим')?></a>
                    <a data-method="POST" class="dropdown-item"  href="<?= \yii\helpers\Url::to(['user/update?id='.Yii::$app->user->identity->id])?>"> <?=Yii::t('yii','Профилни таҳрирлаш')?></a>
                      <a data-method="POST" class="dropdown-item"  href="<?= \yii\helpers\Url::to(['/site/logout'])?>"><i class="fa fa-sign-out pull-right"></i> <?=Yii::t('yii','Чиқиш')?></a>
                    </div>
                  </li>
  
                </ul>
              </nav>
            </div>
          </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
          <!-- BREADCRUMBS AREA START -->
          <?php try {
              echo Breadcrumbs::widget([
                  'homeLink' => ['label' => '<i class="fa fa-home"></i> '.Yii::t('yii', 'Бош саҳифа'), 'url' => Yii::$app->urlManager->createUrl("site/index")],
                  'tag' => 'ol',
                  'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                  'options' => ['class' => 'breadcrumb'],
                  'encodeLabels' => false
              ]);
          } catch ( Exception $e ) {
              echo $e->getMessage();
          } ?>
          <!-- BREADCRUMBS AREA END -->

          <?=$content?>

          <?//=debug($avatar)?>

          <?= Alert::widget() ?>
        </div>
        <!-- /page content -->
        <!-- footer content -->
        <footer>
          <div class="pull-right">
            Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
