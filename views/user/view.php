<?php
use app\helpers\CssHelper;
use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\User;

/* @var $this yii\web\View */
/* @var $model app\models\User */

$this->title = $model->first_name.' '.' '.$model->second_name.' '.$model->middle_name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('yii', 'Фойдаланувчилар'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-view">
<?php if(User::isTheCreator()):?>
<div class="">
    <div class="page-title">
      <div class="title_left">
       <p>
            <?= Html::a(Yii::t('yii', 'Таҳрирлаш'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
            <?= Html::a(Yii::t('yii', 'Ўчириш'), ['delete', 'id' => $model->id], ['class' => 'btn btn-danger',
                'data' => [
                    'confirm' => Yii::t('yii', 'Сиз ростдан ҳам ушбу элементни ўчирмоқчимисиз?'),
                    'method' => 'post',
                ],
            ]) ?>
            <?= Html::a(Yii::t('yii','Яратиш'), ['create'], ['class' => 'btn btn-success']) ?>
            <?= Html::a(Yii::t('yii', 'Орқага'), ['index'], ['class' => 'btn btn-warning']) ?>
        </p>
      </div>
    </div>

    <div class="clearfix"></div>

    <div class="row" style="display: block;">


      <div style="margin-bottom: 50px" class="col-md-12 col-sm-12">
        <div class="x_panel">
          <div class="x_title">
            <h2><?= Html::encode($this->title) ?></h2>
            <ul class="nav navbar-right panel_toolbox">
              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
              </li>
            </ul>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <?= DetailView::widget([
                'options' => ['class' => 'table table-bordered detail-view'],
                'model' => $model,
                'attributes' => [
                    [
                      'attribute'=>'avatar',
                      'format'=>'raw', // raw, html
                      'value' => function($data)
                      {
                        if($data->avatar):
                          return ($data->avatar != NULL && $data->avatar != '' && !empty($data->avatar)) ? Html::a(Html::img(\yii\helpers\Url::base().'/'.$data->avatar, ['alt'=>$data->avatar,'class'=>'profil-index-image']),(\yii\helpers\Url::base().'/'.$data->avatar)) : '';
                        else:
                          return (Html::img('@web/images/user.png',['class'=>'profil-index-image']));
                        endif;
                      }
                    ],

                    'id',
                    'first_name',
                    'second_name',
                    'middle_name',
                    'phone',
                    'username',
                    'email:email',
                    //'password_hash',
                    [
                        'attribute'=>'status',
                        'value' => '<span class="'.CssHelper::userStatusCss($model->status).'">
                                        '.$model->getStatusName($model->status).'
                                    </span>',
                        'format' => 'raw'
                    ],
                    [
                        'attribute'=>'item_name',
                        'value' => '<span class="'.CssHelper::roleCss($model->getRoleName()).'">
                                        '.$model->getRoleName().'
                                    </span>',
                        'format' => 'raw'
                    ],
                    //'auth_key',
                    //'password_reset_token',
                    //'account_activation_token',
                    'created_at:date',
                    'updated_at:date',
                ],
            ]) ?>
            </div>
        </div>
      </div>

      <div class="clearfix"></div>

    </div>
  </div>
</div>
<?php endif;?>

<?php if(User::isAdmin()):?>
<div class="">
    <div class="page-title">
      <div class="title_left">
       <p>
            <?= Html::a(Yii::t('yii', 'Таҳрирлаш'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
            <?= Html::a(Yii::t('yii', 'Ўчириш'), ['delete', 'id' => $model->id], ['class' => 'btn btn-danger',
                'data' => [
                    'confirm' => Yii::t('yii', 'Сиз ростдан ҳам ушбу элементни ўчирмоқчимисиз?'),
                    'method' => 'post',
                ],
            ]) ?>
            <?= Html::a(Yii::t('yii','Яратиш'), ['create'], ['class' => 'btn btn-success']) ?>
            <?= Html::a(Yii::t('yii', 'Орқага'), ['index'], ['class' => 'btn btn-warning']) ?>
        </p>
      </div>
    </div>

    <div class="clearfix"></div>

    <div class="row" style="display: block;">


      <div style="margin-bottom: 50px" class="col-md-12 col-sm-12">
        <div class="x_panel">
          <div class="x_title">
            <h2><?= Html::encode($this->title) ?></h2>
            <ul class="nav navbar-right panel_toolbox">
              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
              </li>
            </ul>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <?= DetailView::widget([
                'options' => ['class' => 'table table-bordered detail-view'],
                'model' => $model,
                'attributes' => [
                    [
                      'attribute'=>'avatar',
                      'format'=>'raw', // raw, html
                      'value' => function($data)
                      {
                        if($data->avatar):
                          return ($data->avatar != NULL && $data->avatar != '' && !empty($data->avatar)) ? Html::a(Html::img(\yii\helpers\Url::base().'/'.$data->avatar, ['alt'=>$data->avatar,'class'=>'profil-index-image']),(\yii\helpers\Url::base().'/'.$data->avatar)) : '';
                        else:
                          return (Html::img('@web/images/user.png',['class'=>'profil-index-image']));
                        endif;
                      }
                    ],

                   
                    'id',
                    'first_name',
                    'second_name',
                    'middle_name',
                    'birthday',
                    'passport',
                    'nation',
                    'phone',
                    'specialist',
                    'be_elected_den',
                    'username',
                    'email:email',
                    //'password_hash',
                    [
                        'attribute'=>'status',
                        'value' => '<span class="'.CssHelper::userStatusCss($model->status).'">
                                        '.$model->getStatusName($model->status).'
                                    </span>',
                        'format' => 'raw'
                    ],
                    [
                        'attribute'=>'item_name',
                        'value' => '<span class="'.CssHelper::roleCss($model->getRoleName()).'">
                                        '.$model->getRoleName().'
                                    </span>',
                        'format' => 'raw'
                    ],
                    //'auth_key',
                    //'password_reset_token',
                    //'account_activation_token',
                    'created_at:date',
                    'updated_at:date',
                ],
            ]) ?>
            </div>
        </div>
      </div>

      <div class="clearfix"></div>

    </div>
  </div>
</div>
<?php endif;?>
<?php if(User::isRespublikaRaisi()):?>
<div class="">
    <div class="page-title">
      <div class="title_left">
       <p>
            <?= Html::a(Yii::t('yii', 'Таҳрирлаш'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
            <?= Html::a(Yii::t('yii', 'Ўчириш'), ['delete', 'id' => $model->id], ['class' => 'btn btn-danger',
                'data' => [
                    'confirm' => Yii::t('yii', 'Сиз ростдан ҳам ушбу элементни ўчирмоқчимисиз?'),
                    'method' => 'post',
                ],
            ]) ?>
            <?= Html::a(Yii::t('yii','Яратиш'), ['create'], ['class' => 'btn btn-success']) ?>
            <?= Html::a(Yii::t('yii', 'Орқага'), ['index'], ['class' => 'btn btn-warning']) ?>
        </p>
      </div>
    </div>

    <div class="clearfix"></div>

    <div class="row" style="display: block;">


      <div style="margin-bottom: 50px" class="col-md-12 col-sm-12">
        <div class="x_panel">
          <div class="x_title">
            <h2><?= Html::encode($this->title) ?></h2>
            <ul class="nav navbar-right panel_toolbox">
              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
              </li>
            </ul>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <?= DetailView::widget([
                'options' => ['class' => 'table table-bordered detail-view'],
                'model' => $model,
                'attributes' => [
                    [
                      'attribute'=>'avatar',
                      'format'=>'raw', // raw, html
                      'value' => function($data)
                      {
                        if($data->avatar):
                          return ($data->avatar != NULL && $data->avatar != '' && !empty($data->avatar)) ? Html::a(Html::img(\yii\helpers\Url::base().'/'.$data->avatar, ['alt'=>$data->avatar,'class'=>'profil-index-image']),(\yii\helpers\Url::base().'/'.$data->avatar)) : '';
                        else:
                          return (Html::img('@web/images/user.png',['class'=>'profil-index-image']));
                        endif;
                      }
                    ],

                   
                    'id',
                    'first_name',
                    'second_name',
                    'middle_name',
                    'birthday',
                    [
                      'attribute'=>'gender',
                      'format' => 'html',
                      'value' => ($model->getGender($model->gender))?$model->getGender($model->gender) : $model->gender,
                    ],
                
                    'passport',
                    'nation',
                    [
                      'label'=> Yii::t('yii', 'Вилоят'),
                      'attribute'=>'region_id',
                      'format' => 'html',
                      'value'=> function ($model) 
                      {
                        if($model->region):
                          return $model->region->name;
                        else:
                          return Yii::t('yii', '(қийматланмаган)');
                        endif;
                      },
                    ],
                    'phone',
                    'specialist',
                    'be_elected_den',
                    'username',
                    'email:email',
                    //'password_hash',
                    [
                        'attribute'=>'status',
                        'value' => '<span class="'.CssHelper::userStatusCss($model->status).'">
                                        '.$model->getStatusName($model->status).'
                                    </span>',
                        'format' => 'raw'
                    ],
                    [
                        'attribute'=>'item_name',
                        'value' => '<span class="'.CssHelper::roleCss($model->getRoleName()).'">
                                        '.$model->getRoleName().'
                                    </span>',
                        'format' => 'raw'
                    ],
                    //'auth_key',
                    //'password_reset_token',
                    //'account_activation_token',
                    'created_at:date',
                    'updated_at:date',
                ],
            ]) ?>
            </div>
        </div>
      </div>

      <div class="clearfix"></div>

    </div>
  </div>
</div>
<?php endif;?>
<?php if(User::isRespublikaHodimi()):?>
<div class="">
    <div class="page-title">
      <div class="title_left">
       <p>
            <?= Html::a(Yii::t('yii', 'Таҳрирлаш'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
            <?= Html::a(Yii::t('yii','Яратиш'), ['create'], ['class' => 'btn btn-success']) ?>
            <?= Html::a(Yii::t('yii', 'Орқага'), ['index'], ['class' => 'btn btn-warning']) ?>
        </p>
      </div>
    </div>

    <div class="clearfix"></div>

    <div class="row" style="display: block;">


      <div style="margin-bottom: 50px" class="col-md-12 col-sm-12">
        <div class="x_panel">
          <div class="x_title">
            <h2><?= Html::encode($this->title) ?></h2>
            <ul class="nav navbar-right panel_toolbox">
              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
              </li>
            </ul>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <?= DetailView::widget([
                'options' => ['class' => 'table table-bordered detail-view'],
                'model' => $model,
                'attributes' => [
                    [
                      'attribute'=>'avatar',
                      'format'=>'raw', // raw, html
                      'value' => function($data)
                      {
                        if($data->avatar):
                          return ($data->avatar != NULL && $data->avatar != '' && !empty($data->avatar)) ? Html::a(Html::img(\yii\helpers\Url::base().'/'.$data->avatar, ['alt'=>$data->avatar,'class'=>'profil-index-image']),(\yii\helpers\Url::base().'/'.$data->avatar)) : '';
                        else:
                          return (Html::img('@web/images/user.png',['class'=>'profil-index-image']));
                        endif;
                      }
                    ],

                   
                    'id',
                    'first_name',
                    'second_name',
                    'middle_name',
                    'birthday',
                    [
                      'attribute'=>'gender',
                      'format' => 'html',
                      'value' => ($model->getGender($model->gender))?$model->getGender($model->gender) : $model->gender,
                    ],
                
                    'passport',
                    'nation',
                    [
                      'label'=> Yii::t('yii', 'Вилоят'),
                      'attribute'=>'region_id',
                      'format' => 'html',
                      'value'=> function ($model) 
                      {
                        if($model->region):
                          return $model->region->name;
                        else:
                          return Yii::t('yii', '(қийматланмаган)');
                        endif;
                      },
                    ],
                    'phone',
                    'specialist',
                    'be_elected_den',
                    'username',
                    'email:email',
                    //'password_hash',
                    [
                        'attribute'=>'status',
                        'value' => '<span class="'.CssHelper::userStatusCss($model->status).'">
                                        '.$model->getStatusName($model->status).'
                                    </span>',
                        'format' => 'raw'
                    ],
                    [
                        'attribute'=>'item_name',
                        'value' => '<span class="'.CssHelper::roleCss($model->getRoleName()).'">
                                        '.$model->getRoleName().'
                                    </span>',
                        'format' => 'raw'
                    ],
                    //'auth_key',
                    //'password_reset_token',
                    //'account_activation_token',
                    'created_at:date',
                    'updated_at:date',
                ],
            ]) ?>
            </div>
        </div>
      </div>

      <div class="clearfix"></div>

    </div>
  </div>
</div>
<?php endif;?>
<?php if(User::isViloyatRaisi()):?>
<div class="">
    <div class="page-title">
      <div class="title_left">
       <p>
            <?= Html::a(Yii::t('yii', 'Таҳрирлаш'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
            <?= Html::a(Yii::t('yii', 'Ўчириш'), ['delete', 'id' => $model->id], ['class' => 'btn btn-danger',
                'data' => [
                    'confirm' => Yii::t('yii', 'Сиз ростдан ҳам ушбу элементни ўчирмоқчимисиз?'),
                    'method' => 'post',
                ],
            ]) ?>
            <?= Html::a(Yii::t('yii','Яратиш'), ['create'], ['class' => 'btn btn-success']) ?>
            <?= Html::a(Yii::t('yii', 'Орқага'), ['index'], ['class' => 'btn btn-warning']) ?>
        </p>
      </div>
    </div>

    <div class="clearfix"></div>

    <div class="row" style="display: block;">


      <div style="margin-bottom: 50px" class="col-md-12 col-sm-12">
        <div class="x_panel">
          <div class="x_title">
            <h2><?= Html::encode($this->title) ?></h2>
            <ul class="nav navbar-right panel_toolbox">
              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
              </li>
            </ul>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <?= DetailView::widget([
                'options' => ['class' => 'table table-bordered detail-view'],
                'model' => $model,
                'attributes' => [
                    [
                      'attribute'=>'avatar',
                      'format'=>'raw', // raw, html
                      'value' => function($data)
                      {
                        if($data->avatar):
                          return ($data->avatar != NULL && $data->avatar != '' && !empty($data->avatar)) ? Html::a(Html::img(\yii\helpers\Url::base().'/'.$data->avatar, ['alt'=>$data->avatar,'class'=>'profil-index-image']),(\yii\helpers\Url::base().'/'.$data->avatar)) : '';
                        else:
                          return (Html::img('@web/images/user.png',['class'=>'profil-index-image']));
                        endif;
                      }
                    ],

                   
                    'id',
                    'first_name',
                    'second_name',
                    'middle_name',
                    'birthday',
                    [
                      'attribute'=>'gender',
                      'format' => 'html',
                      'value' => ($model->getGender($model->gender))?$model->getGender($model->gender) : $model->gender,
                    ],
                
                    'passport',
                    'nation',
                    [
                      'label'=> Yii::t('yii', 'Вилоят'),
                      'attribute'=>'region_id',
                      'format' => 'html',
                      'value'=> function ($model) 
                      {
                        if($model->region):
                          return $model->region->name;
                        else:
                          return Yii::t('yii', 'қийматланмаган)');
                        endif;
                      },
                    ],
                    'phone',
                    'specialist',
                    'be_elected_den',
                    'username',
                    'email:email',
                    //'password_hash',
                    [
                        'attribute'=>'status',
                        'value' => '<span class="'.CssHelper::userStatusCss($model->status).'">
                                        '.$model->getStatusName($model->status).'
                                    </span>',
                        'format' => 'raw'
                    ],
                    [
                        'attribute'=>'item_name',
                        'value' => '<span class="'.CssHelper::roleCss($model->getRoleName()).'">
                                        '.$model->getRoleName().'
                                    </span>',
                        'format' => 'raw'
                    ],
                    //'auth_key',
                    //'password_reset_token',
                    //'account_activation_token',
                    'created_at:date',
                    'updated_at:date',
                ],
            ]) ?>
            </div>
        </div>
      </div>

      <div class="clearfix"></div>

    </div>
  </div>
</div>
<?php endif;?>
<?php if(User::isViloyatHodimi()):?>
<div class="">
    <div class="page-title">
      <div class="title_left">
       <p>
            <?= Html::a(Yii::t('yii', 'Таҳрирлаш'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
            <?= Html::a(Yii::t('yii','Яратиш'), ['create'], ['class' => 'btn btn-success']) ?>
            <?= Html::a(Yii::t('yii', 'Орқага'), ['index'], ['class' => 'btn btn-warning']) ?>
        </p>
      </div>
    </div>

    <div class="clearfix"></div>

    <div class="row" style="display: block;">


      <div style="margin-bottom: 50px" class="col-md-12 col-sm-12">
        <div class="x_panel">
          <div class="x_title">
            <h2><?= Html::encode($this->title) ?></h2>
            <ul class="nav navbar-right panel_toolbox">
              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
              </li>
            </ul>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <?= DetailView::widget([
                'options' => ['class' => 'table table-bordered detail-view'],
                'model' => $model,
                'attributes' => [
                    [
                      'attribute'=>'avatar',
                      'format'=>'raw', // raw, html
                      'value' => function($data)
                      {
                        if($data->avatar):
                          return ($data->avatar != NULL && $data->avatar != '' && !empty($data->avatar)) ? Html::a(Html::img(\yii\helpers\Url::base().'/'.$data->avatar, ['alt'=>$data->avatar,'class'=>'profil-index-image']),(\yii\helpers\Url::base().'/'.$data->avatar)) : '';
                        else:
                          return (Html::img('@web/images/user.png',['class'=>'profil-index-image']));
                        endif;
                      }
                    ],

                   
                    'id',
                    'first_name',
                    'second_name',
                    'middle_name',
                    'birthday',
                    [
                      'attribute'=>'gender',
                      'format' => 'html',
                      'value' => ($model->getGender($model->gender))?$model->getGender($model->gender) : $model->gender,
                    ],
                
                    'passport',
                    'nation',
                    [
                      'label'=> Yii::t('yii', 'Вилоят'),
                      'attribute'=>'region_id',
                      'format' => 'html',
                      'value'=> function ($model) 
                      {
                        if($model->region):
                          return $model->region->name;
                        else:
                          return Yii::t('yii', '(қийматланмаган)');
                        endif;
                      },
                    ],
                    'phone',
                    'specialist',
                    'be_elected_den',
                    'username',
                    'email:email',
                    //'password_hash',
                    [
                        'attribute'=>'status',
                        'value' => '<span class="'.CssHelper::userStatusCss($model->status).'">
                                        '.$model->getStatusName($model->status).'
                                    </span>',
                        'format' => 'raw'
                    ],
                    [
                        'attribute'=>'item_name',
                        'value' => '<span class="'.CssHelper::roleCss($model->getRoleName()).'">
                                        '.$model->getRoleName().'
                                    </span>',
                        'format' => 'raw'
                    ],
                    //'auth_key',
                    //'password_reset_token',
                    //'account_activation_token',
                    'created_at:date',
                    'updated_at:date',
                ],
            ]) ?>
            </div>
        </div>
      </div>

      <div class="clearfix"></div>

    </div>
  </div>
</div>
<?php endif;?>
<?php if(User::isTumanRaisi()):?>
<div class="">
    <div class="page-title">
      <div class="title_left">
       <p>
            <?= Html::a(Yii::t('yii', 'Таҳрирлаш'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
            <?= Html::a(Yii::t('yii', 'Ўчириш'), ['delete', 'id' => $model->id], ['class' => 'btn btn-danger',
                'data' => [
                    'confirm' => Yii::t('yii', 'Сиз ростдан ҳам ушбу элементни ўчирмоқчимисиз?'),
                    'method' => 'post',
                ],
            ]) ?>
            <?= Html::a(Yii::t('yii','Яратиш'), ['create'], ['class' => 'btn btn-success']) ?>
            <?= Html::a(Yii::t('yii', 'Орқага'), ['index'], ['class' => 'btn btn-warning']) ?>
        </p>
      </div>
    </div>

    <div class="clearfix"></div>

    <div class="row" style="display: block;">


      <div style="margin-bottom: 50px" class="col-md-12 col-sm-12">
        <div class="x_panel">
          <div class="x_title">
            <h2><?= Html::encode($this->title) ?></h2>
            <ul class="nav navbar-right panel_toolbox">
              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
              </li>
            </ul>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <?= DetailView::widget([
                'options' => ['class' => 'table table-bordered detail-view'],
                'model' => $model,
                'attributes' => [
                    [
                      'attribute'=>'avatar',
                      'format'=>'raw', // raw, html
                      'value' => function($data)
                      {
                        if($data->avatar):
                          return ($data->avatar != NULL && $data->avatar != '' && !empty($data->avatar)) ? Html::a(Html::img(\yii\helpers\Url::base().'/'.$data->avatar, ['alt'=>$data->avatar,'class'=>'profil-index-image']),(\yii\helpers\Url::base().'/'.$data->avatar)) : '';
                        else:
                          return (Html::img('@web/images/user.png',['class'=>'profil-index-image']));
                        endif;
                      }
                    ],

                   
                    'id',
                    'first_name',
                    'second_name',
                    'middle_name',
                    'birthday',
                    [
                      'attribute'=>'gender',
                      'format' => 'html',
                      'value' => ($model->getGender($model->gender))?$model->getGender($model->gender) : $model->gender,
                    ],
                
                    'passport',
                    'nation',
                    [
                      'label'=> Yii::t('yii', 'Туман'),
                      'attribute'=>'city_id',
                      'format' => 'html',
                      'value'=> function ($model) 
                      {
                        if($model->city):
                          return $model->city->name;
                        else:
                          return Yii::t('yii', '(қийматланмаган)');
                        endif;
                      },
                    ],
                    [
                      'label'=> Yii::t('yii', 'Маҳалла'),
                      'attribute'=>'town_block_id',
                      'format' => 'html',
                      'value'=> function ($model) 
                      {
                        if($model->townBlock):
                          return $model->townBlock->name;
                        else:
                          return Yii::t('yii', '(қийматланмаган)');
                        endif;
                      },
                    ],
                    'phone',
                    'specialist',
                    'be_elected_den',
                    'username',
                    'email:email',
                    //'password_hash',
                    [
                        'attribute'=>'status',
                        'value' => '<span class="'.CssHelper::userStatusCss($model->status).'">
                                        '.$model->getStatusName($model->status).'
                                    </span>',
                        'format' => 'raw'
                    ],
                    [
                        'attribute'=>'item_name',
                        'value' => '<span class="'.CssHelper::roleCss($model->getRoleName()).'">
                                        '.$model->getRoleName().'
                                    </span>',
                        'format' => 'raw'
                    ],
                    //'auth_key',
                    //'password_reset_token',
                    //'account_activation_token',
                    'created_at:date',
                    'updated_at:date',
                ],
            ]) ?>
            </div>
        </div>
      </div>

      <div class="clearfix"></div>

    </div>
  </div>
</div>
<?php endif;?>
<?php if(User::isTumanHodimi()):?>
<div class="">
    <div class="page-title">
      <div class="title_left">
       <p>
            <?= Html::a(Yii::t('yii', 'Таҳрирлаш'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
            <?= Html::a(Yii::t('yii','Яратиш'), ['create'], ['class' => 'btn btn-success']) ?>
            <?= Html::a(Yii::t('yii', 'Орқага'), ['index'], ['class' => 'btn btn-warning']) ?>
        </p>
      </div>
    </div>

    <div class="clearfix"></div>

    <div class="row" style="display: block;">


      <div style="margin-bottom: 50px" class="col-md-12 col-sm-12">
        <div class="x_panel">
          <div class="x_title">
            <h2><?= Html::encode($this->title) ?></h2>
            <ul class="nav navbar-right panel_toolbox">
              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
              </li>
            </ul>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <?= DetailView::widget([
                'options' => ['class' => 'table table-bordered detail-view'],
                'model' => $model,
                'attributes' => [
                    [
                      'attribute'=>'avatar',
                      'format'=>'raw', // raw, html
                      'value' => function($data)
                      {
                        if($data->avatar):
                          return ($data->avatar != NULL && $data->avatar != '' && !empty($data->avatar)) ? Html::a(Html::img(\yii\helpers\Url::base().'/'.$data->avatar, ['alt'=>$data->avatar,'class'=>'profil-index-image']),(\yii\helpers\Url::base().'/'.$data->avatar)) : '';
                        else:
                          return (Html::img('@web/images/user.png',['class'=>'profil-index-image']));
                        endif;
                      }
                    ],

                   
                    'id',
                    'first_name',
                    'second_name',
                    'middle_name',
                    'birthday',
                    [
                      'attribute'=>'gender',
                      'format' => 'html',
                      'value' => ($model->getGender($model->gender))?$model->getGender($model->gender) : $model->gender,
                    ],
                
                    'passport',
                    'nation',
                    [
                      'label'=> Yii::t('yii', 'Туман'),
                      'attribute'=>'city_id',
                      'format' => 'html',
                      'value'=> function ($model) 
                      {
                        if($model->city):
                          return $model->city->name;
                        else:
                          return Yii::t('yii', '(қийматланмаган)');
                        endif;
                      },
                    ],

                    [
                      'label'=> Yii::t('yii', 'Маҳалла'),
                      'attribute'=>'town_block_id',
                      'format' => 'html',
                      'value'=> function ($model) 
                      {
                        if($model->townBlock):
                          return $model->townBlock->name;
                        else:
                          return Yii::t('yii', '(қийматланмаган)');
                        endif;
                      },
                    ],
                    'phone',
                    'specialist',
                    'be_elected_den',
                    'username',
                    'email:email',
                    //'password_hash',
                    [
                        'attribute'=>'status',
                        'value' => '<span class="'.CssHelper::userStatusCss($model->status).'">
                                        '.$model->getStatusName($model->status).'
                                    </span>',
                        'format' => 'raw'
                    ],
                    [
                        'attribute'=>'item_name',
                        'value' => '<span class="'.CssHelper::roleCss($model->getRoleName()).'">
                                        '.$model->getRoleName().'
                                    </span>',
                        'format' => 'raw'
                    ],
                    //'auth_key',
                    //'password_reset_token',
                    //'account_activation_token',
                    'created_at:date',
                    'updated_at:date',
                ],
            ]) ?>
            </div>
        </div>
      </div>

      <div class="clearfix"></div>

    </div>
  </div>
</div>
<?php endif;?>
<?php if(User::isMahhallaRaisi()):?>
<div class="">
    <div class="page-title">
      <div class="title_left">
       <p>
            <?= Html::a(Yii::t('yii', 'Таҳрирлаш'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
             <?= Html::a(Yii::t('yii', 'Ўчириш'), ['delete', 'id' => $model->id], ['class' => 'btn btn-danger',
                'data' => [
                    'confirm' => Yii::t('yii', 'Сиз ростдан ҳам ушбу элементни ўчирмоқчимисиз?'),
                    'method' => 'post',
                ],
            ]) ?>
            <?= Html::a(Yii::t('yii','Яратиш'), ['create'], ['class' => 'btn btn-success']) ?>
            <?= Html::a(Yii::t('yii', 'Орқага'), ['index'], ['class' => 'btn btn-warning']) ?>
        </p>
      </div>
    </div>

    <div class="clearfix"></div>

    <div class="row" style="display: block;">


      <div style="margin-bottom: 50px" class="col-md-12 col-sm-12">
        <div class="x_panel">
          <div class="x_title">
            <h2><?= Html::encode($this->title) ?></h2>
            <ul class="nav navbar-right panel_toolbox">
              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
              </li>
            </ul>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <?= DetailView::widget([
                'options' => ['class' => 'table table-bordered detail-view'],
                'model' => $model,
                'attributes' => [
                    [
                      'attribute'=>'avatar',
                      'format'=>'raw', // raw, html
                      'value' => function($data)
                      {
                        if($data->avatar):
                          return ($data->avatar != NULL && $data->avatar != '' && !empty($data->avatar)) ? Html::a(Html::img(\yii\helpers\Url::base().'/'.$data->avatar, ['alt'=>$data->avatar,'class'=>'profil-index-image']),(\yii\helpers\Url::base().'/'.$data->avatar)) : '';
                        else:
                          return (Html::img('@web/images/user.png',['class'=>'profil-index-image']));
                        endif;
                      }
                    ],

                   
                    'id',
                    'first_name',
                    'second_name',
                    'middle_name',
                    'birthday',
                    [
                      'attribute'=>'gender',
                      'format' => 'html',
                      'value' => ($model->getGender($model->gender))?$model->getGender($model->gender) : $model->gender,
                    ],
                
                    'passport',
                    'nation',
                    [
                      'label'=> Yii::t('yii', 'Туман'),
                      'attribute'=>'city_id',
                      'format' => 'html',
                      'value'=> function ($model) 
                      {
                        if($model->city):
                          return $model->city->name;
                        else:
                          return Yii::t('yii', '(қийматланмаган)');
                        endif;
                      },
                    ],

                    [
                      'label'=> Yii::t('yii', 'Маҳалла'),
                      'attribute'=>'town_block_id',
                      'format' => 'html',
                      'value'=> function ($model) 
                      {
                        if($model->townBlock):
                          return $model->townBlock->name;
                        else:
                          return Yii::t('yii', '(қийматланмаган)');
                        endif;
                      },
                    ],
                    'phone',
                    'specialist',
                    'be_elected_den',
                    'username',
                    'email:email',
                    //'password_hash',
                    [
                        'attribute'=>'status',
                        'value' => '<span class="'.CssHelper::userStatusCss($model->status).'">
                                        '.$model->getStatusName($model->status).'
                                    </span>',
                        'format' => 'raw'
                    ],
                    [
                        'attribute'=>'item_name',
                        'value' => '<span class="'.CssHelper::roleCss($model->getRoleName()).'">
                                        '.$model->getRoleName().'
                                    </span>',
                        'format' => 'raw'
                    ],
                    //'auth_key',
                    //'password_reset_token',
                    //'account_activation_token',
                    'created_at:date',
                    'updated_at:date',
                ],
            ]) ?>
            </div>
        </div>
      </div>

      <div class="clearfix"></div>

    </div>
  </div>
</div>
<?php endif;?>
 <?php if(User::isKotib() || User::isMaslahatchi() || User::isPospon() || User::isInspektor()):?>
<div class="">
    <div class="page-title">
      <div class="title_left">
       <p>
            <?= Html::a(Yii::t('yii', 'Таҳрирлаш'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
            <?= Html::a(Yii::t('yii', 'Орқага'), ['index'], ['class' => 'btn btn-warning']) ?>
        </p>
      </div>
    </div>

    <div class="clearfix"></div>

    <div class="row" style="display: block;">


      <div style="margin-bottom: 50px" class="col-md-12 col-sm-12">
        <div class="x_panel">
          <div class="x_title">
            <h2><?= Html::encode($this->title) ?></h2>
            <ul class="nav navbar-right panel_toolbox">
              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
              </li>
            </ul>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <?= DetailView::widget([
                'options' => ['class' => 'table table-bordered detail-view'],
                'model' => $model,
                'attributes' => [
                    [
                      'attribute'=>'avatar',
                      'format'=>'raw', // raw, html
                      'value' => function($data)
                      {
                        if($data->avatar):
                          return ($data->avatar != NULL && $data->avatar != '' && !empty($data->avatar)) ? Html::a(Html::img(\yii\helpers\Url::base().'/'.$data->avatar, ['alt'=>$data->avatar,'class'=>'profil-index-image']),(\yii\helpers\Url::base().'/'.$data->avatar)) : '';
                        else:
                          return (Html::img('@web/images/user.png',['class'=>'profil-index-image']));
                        endif;
                      }
                    ],

                   
                    'id',
                    'first_name',
                    'second_name',
                    'middle_name',
                    'birthday',
                    [
                      'attribute'=>'gender',
                      'format' => 'html',
                      'value' => ($model->getGender($model->gender))?$model->getGender($model->gender) : $model->gender,
                    ],
                
                    'passport',
                    'nation',
                    [
                      'label'=> Yii::t('yii', 'Туман'),
                      'attribute'=>'city_id',
                      'format' => 'html',
                      'value'=> function ($model) 
                      {
                        if($model->city):
                          return $model->city->name;
                        else:
                          return Yii::t('yii', '(қийматланмаган)');
                        endif;
                      },
                    ],

                    [
                      'label'=> Yii::t('yii', 'Маҳалла'),
                      'attribute'=>'town_block_id',
                      'format' => 'html',
                      'value'=> function ($model) 
                      {
                        if($model->townBlock):
                          return $model->townBlock->name;
                        else:
                          return Yii::t('yii', '(қийматланмаган)');
                        endif;
                      },
                    ],
                    'phone',
                    'specialist',
                    'be_elected_den',
                    'username',
                    'email:email',
                    //'password_hash',
                    [
                        'attribute'=>'status',
                        'value' => '<span class="'.CssHelper::userStatusCss($model->status).'">
                                        '.$model->getStatusName($model->status).'
                                    </span>',
                        'format' => 'raw'
                    ],
                    [
                        'attribute'=>'item_name',
                        'value' => '<span class="'.CssHelper::roleCss($model->getRoleName()).'">
                                        '.$model->getRoleName().'
                                    </span>',
                        'format' => 'raw'
                    ],
                    //'auth_key',
                    //'password_reset_token',
                    //'account_activation_token',
                    'created_at:date',
                    'updated_at:date',
                ],
            ]) ?>
            </div>
        </div>
      </div>

      <div class="clearfix"></div>

    </div>
  </div>
</div>
<?php endif;?>
</div>
<style>
  .profil-index-image {
    max-height: 120px;
    min-height: 120px;
    max-width: 120px;
    min-width: 120px;
    /*width: 10%;*/
}
</style>
