<?php
use yii\helpers\Html;
?>
<div class="population-pdf" style="margin: 0px 15px 10px 20px;">
   	<div class="row">
   		<h3 style="font-family: Times New Roman" class="text-center">Маълумотнома</h3>
	   	<div style="margin-top: 20px" class="col-md-12">
			<!-- <img class="pull-left" style="max-height: 130px; min-height: 130px; max-width: 100px; min-width: 100px;" src="/images/user.png"> -->
      <?php if($model->image):?>
        <?= Html::img("@web/{$model->image}", ['class' => 'pull-left', 'style' => 'max-height: 130px; min-height: 130px; max-width: 100px; min-width: 100px;','alt' =>$model->first_name.' '.$model->second_name])?>
      <?php else:?>
        <?= Html::img("@web/images/user.png",['class' => 'pull-left','style' => 'max-height: 130px; min-height: 130px; max-width: 100px; min-width: 100px;','alt' =>$model->first_name.' '.$model->second_name])?>
      <?php endif?> 

			<p class="pull-right" style="margin-left: 50px; font-size: 15px; font-family: Times New Roman; text-indent: 50px;">Берилди ушбу маълумотнома фуқаро <b><?= $model->first_name.' '.$model->second_name.' '.$model->middle_name?></b> Ҳақиқатдан ҳам <?=$model->region->name?> <?=$model->city->name?>идаги <b><?=$model->townBlock->name?></b> қарашли <?=$model->address?>да яшайди.</p>
		</div>
   	</div>
   	<div class="x_panel">
      <div class="x_title">
        <h4><?= $model->first_name.' '.$model->second_name?>нинг <small>оила азолари</small></h4>
      </div>
      <div class="x_content">
        <table class="table table-bordered">
          <thead>
            <tr>
              <th style="width: 2%" class="text-center"><?=Yii::t('yii', 'т/р')?></th>
              <th style="width: 30%" class="text-center"><?=Yii::t('yii', 'Фамилия')?></th>
              <th style="width: 30%" class="text-center"><?=Yii::t('yii', 'Исм')?></th>
              <th style="width: 30%" class="text-center"><?=Yii::t('yii', 'Отаси')?></th>
              <th style="width: 8%" class="text-center"><?=Yii::t('yii', 'Туғилган санаси')?></th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <th class="text-center" scope="row">1</th>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
            </tr>
            <tr>
              <th class="text-center" scope="row">2</th>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
            </tr>
            <tr>
              <th class="text-center" scope="row">3</th>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
            </tr>
            <tr>
              <th class="text-center" scope="row">4</th>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
            </tr>
            <tr>
              <th class="text-center" scope="row">5</th>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
            </tr>
            <tr>
              <th class="text-center" scope="row">6</th>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
            </tr>
            <tr>
              <th class="text-center" scope="row">7</th>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
            </tr>
            <tr>
              <th class="text-center" scope="row">8</th>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
            </tr>
            <tr>
              <th class="text-center" scope="row">9</th>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
            </tr>
            <tr>
              <th class="text-center" scope="row">10</th>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  	<div class="x_panel">
      <div class="x_content">
        <table width="650px">
          <tbody>
            <tr>
              <td colspan="2">Нома талаб қилинган жойга тақдим учун берилди.</td>
            </tr>
            <tr>
              <td></td>
              <td></td>
            </tr>
            <tr>
              <td></td>
              <td></td>
            </tr>
            <tr>
              <td></td>
              <td></td>
            </tr>
            <tr>
           	 	<?php 
		           	$id = Yii::$app->user->identity['town_block_id'];

					$query = "SELECT * FROM user As u INNER JOIN auth_assignment AS a ON u.id = a.user_id WHERE town_block_id = $id AND item_name LIKE '%mahhallaRaisi%'";
					$mahhallaRaisi = \app\models\User::findBySql($query)->all();
				?>
              <td><b>Лалмикор МФЙ раиси:</b>
              <?php 
      	        foreach ($mahhallaRaisi as $user) {
      					  echo $user->first_name.'. '.mb_substr($user->second_name,0,1).'. '.mb_substr($user->middle_name,0,1).'.';
      					}
	            ?>
           	</td>
              <td><b>имзо____________</b></td>
            </tr>
            <tr>
              <td></td>
              <td></td>
            </tr>
            <tr>
              <td></td>
              <td></td>
            </tr>
            <tr>
              <td></td>
              <td></td>
            </tr>
            <tr>
           	<?php 

			$query = "SELECT * FROM user As u INNER JOIN auth_assignment AS a ON u.id = a.user_id WHERE town_block_id = $id AND item_name LIKE '%kotib%'";
			$kotib = \app\models\User::findBySql($query)->all();
			?>

            <td><b>Котиби:</b>
	            <?php 
	            	foreach ($kotib as $user) {
      					 echo $user->first_name.'. '.mb_substr($user->second_name,0,1).'. '.mb_substr($user->middle_name,0,1).'.';
      					}
	            ?>
             	</td>
              <td><b>имзо____________</b></td>
            </tr>
             <tr>
              <td></td>
              <td></td>
            </tr>
            <tr>
              <td></td>
              <td></td>
            </tr>
            <tr>
              <td></td>
              <td></td>
            </tr>
            <tr>
              <td  colspan="2"><b>Сана:</b> <?= date('d.m.Y') ?></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
</div>