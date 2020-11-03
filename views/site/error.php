<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;

$this->title = $name;
?>
<div class="site-error">
<div class="col-md-12">
  <div class="col-middle">
    <div class="text-center text-center">
      <h1 class="error-number">404</h1>
      <h2><?= Html::encode($this->title) ?></h2>
      <p><?= nl2br(Html::encode($message)) ?> <a href="/">Бош саҳифа</a>
      </p>
    </div>
  </div>
</div>
</div>