<?php
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $user app\models\User */

$this->title = Yii::t('yii', 'Фойдаланувчи яратинг');
$this->params['breadcrumbs'][] = ['label' => Yii::t('yii', 'Фойдаланувчилар'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-create">

    <div class="">
    <div class="clearfix"></div>
    <div class="row">
      <div style="margin-bottom: 50px" class="col-md-12 col-sm-12 ">
        <div class="x_panel">
          <div class="x_title">
            <h2> <?= Html::encode($this->title) ?></h2>
            <ul class="nav navbar-right panel_toolbox">
              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
              </li>
            </ul>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <br />
           		<?= $this->render('_form', ['user' => $user]) ?>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>

