<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Population */

$this->title = 'Update Population: ' . $model->first_name.' '.$model->second_name;
$this->params['breadcrumbs'][] = ['label' => 'Populations', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="population-update">

<div class="">
  <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 ">
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
