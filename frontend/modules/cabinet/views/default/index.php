<?php

use yii\grid\GridView;
?>

<!-- CONTAIN START -->
<section class="checkout-section ptb-95">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-4">
                <div class="account-sidebar account-tab mb-xs-30">
                    <div class="dark-bg tab-title-bg">
                        <div class="heading-part">
                            <div class="sub-title"><span></span> Это кабинет пользователя: ФФФФ</div>
                        </div>
                    </div>
                    <div class="account-tab-inner">
                        <ul class="account-tab-stap">

                            <li id="step1"> <a href="javascript:void(0)">Мои статьи<i class="fa fa-angle-right"></i> </a> </li>


                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-9 col-sm-8">
                <div id="data-step1" class="account-content" data-temp="tabdata" style="display:none">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="heading-part heading-bg mb-30">
                                <h2 class="heading m-0">Мои статьи</h2>
                            </div>
                        </div>
                    </div>
                    <div class="m-0">

                        <?= GridView::widget([
                            'dataProvider' => $dataProvider,
                            'filterModel' => $searchModel,

                            'columns' => [
                                ['class' => 'yii\grid\SerialColumn'],

                                'id',
                                'title',

                                ['class' => 'yii\grid\ActionColumn'],
                            ],
                        ]); ?>

                    </div>
                </div>


            </div>
        </div>
    </div>
</section>
<!-- CONTAINER END -->