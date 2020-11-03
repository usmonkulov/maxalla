<?php
use app\models\User;
/* @var $this yii\web\View */
if(User::isMahhallaRaisi() || User::isKotib() || User::isMaslahatchi() || User::isPospon() || User::isInspektor()):              
$this->title = Yii::$app->user->identity->townBlock['name'];
endif;
?>
<div class="site-index">
   <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>
                	Ўзбекистон Маҳалла фуқаролар йиғини
            	</h3>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12">
                <div class="">
                  <div class="x_content">
                    <div class="row">
                      <div class="animated flipInY col-lg-3 col-md-3 col-sm-6  ">
                        <div class="tile-stats">
                         
                          <div class="count">34 000 000</div>

                          <h3>Аҳолилар сони</h3>
                         
                        </div>
                      </div>
                      <div class="animated flipInY col-lg-3 col-md-3 col-sm-6  ">
                        <div class="tile-stats">
                         
                          <div class="count">1500</div>

                          <h3>Маҳаллалар сони</h3>
                         
                        </div>
                      </div>
                      <div class="animated flipInY col-lg-3 col-md-3 col-sm-6  ">
                        <div class="tile-stats">
                         
                          <div class="count">199</div>

                          <h3>Туманлар сони</h3>
                         
                        </div>
                      </div>
                      <div class="animated flipInY col-lg-3 col-md-3 col-sm-6  ">
                        <div class="tile-stats">
                         
                          <div class="count">12</div>

                          <h3>Вилоятлар сони</h3>
              
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
</div>
