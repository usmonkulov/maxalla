<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TownBlock */

$this->title = Yii::t('yii', 'Маҳаллани янгилаш') .' '. $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('yii', 'Маҳаллалар'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="town-block-update">

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
           		<?= $this->render('_form', [
			        'model' => $model,
			    ]) ?>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>
