<?php

use yii\helpers\Url;
use yii\bootstrap\NavBar;
use yii\bootstrap\Nav;
use yii\helpers\Html;
?>

<!-- HEADER START -->
<header class="navbar navbar-custom " id="header">
    <div class="header-top">
        <div class="container">
            <div class="header-top-inner">
                <div class="row">
                    <div class="col-sm-5">
                        <div class="top-link top-link-left">
                            <ul>

                                <li class="welcome-msg"> Блог муми-мыслей и идей! </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-7">
                        <div class="right-side float-left-xs header-right-link">
                            <ul>
                                <li class="main-search">
                                    <div class="header_search_toggle desktop-view">
                                        <form>
                                            <div class="search-box">
                                                <input class="input-text" type="text" placeholder="Search here...">
                                                <button class="search-btn"></button>
                                            </div>
                                        </form>
                                    </div>
                                </li>
                                <li class="account-icon"> <a href="#"><span></span></a>
                                    <div class="header-link-dropdown account-link-dropdown">
                                        <ul class="link-dropdown-list">
                                            <li> <span class="dropdown-title">Муми пользователь!</span>
                                                <ul>
                                                    <?php
                                                    NavBar::begin([
                                                    ]);
                                                    if (Yii::$app->user->isGuest) {
                                                        $menuItems[] = ['label' => 'Зарегистрироваться', 'url' => ['/auth/signup']];
                                                        $menuItems[] = ['label' => 'Войти', 'url' => ['/auth/login']];
                                                    } else {
                                                        $menuItems[] = '<li>'
                                                            . Html::beginForm(['/auth/logout'], 'post')
                                                            . Html::submitButton(
                                                                'Выйти (' . Yii::$app->user->identity->user . ')',
                                                                ['class' => 'btn btn-link logout']
                                                            )
                                                            . Html::endForm()
                                                            . '</li>';
                                                    }
                                                    echo Nav::widget([
//                                                        'options' => ['class' => 'navbar-nav navbar-right'],
                                                        'items' => $menuItems,
                                                    ]);
                                                    NavBar::end();
                                                    ?>

                                                </ul>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <?php if(!Yii::$app->user->isGuest): ?>
                                <li>
                                    <a href="<?= Url::to(['cabinet/', 'id' => Yii::$app->user->id])?>">Мой кабинет</a>
                                </li>
                                <?php endif;?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="header-middle">
        <div class="container">
            <div class="header-inner">
                <div class="navbar-header">
                    <button data-target=".navbar-collapse" data-toggle="collapse" class="navbar-toggle" type="button"><i class="fa fa-bars"></i></button>
                    <a class="navbar-brand page-scroll" href="<?= Url::home() ?>"> <img src="/frontend/web/img/zz1.jpg"> </a> </div>
                <div class="right-side float-none-sm">
                    <div id="menu" class="navbar-collapse collapse left-side" >
                        <ul class="nav navbar-nav navbar-left">
                            <li class="level"><a href="<?= Url::home() ?>" class="page-scroll">Муми мысли - они всегда посещают и они всегда правы. Надо только их услышать</a></li>
                        </ul>
                    </div>
                </div>
                <div class="header_search_toggle mobile-view">
                    <form>
                        <div class="search-box">
                            <input class="input-text" type="text" placeholder="Search entire store here...">
                            <button class="search-btn"></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- HEADER END -->