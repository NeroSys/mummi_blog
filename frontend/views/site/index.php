<?php

/* @var $this yii\web\View */

use yii\widgets\LinkPager;
use yii\helpers\Url;

$this->title = 'Mumi blog test';
?>
<!-- CONTAIN START -->
<section class="ptb-95">
    <div class="container">
        <div class="row">
            <div class="col-md-9 col-sm-8 pb-xs-60">
                <div class="blog-listing">
                    <div class="row">

                        <?php foreach ($articles as $article): ?>
                        <div class="col-xs-12">
                            <div class="blog-item">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="blog-media">
                                            <img src="<?= $article->getImage(); ?>" alt="1">
                                            <a href="<?= Url::toRoute(['site/view', 'id'=> $article->id]) ?>" title="Click For Read More" class="read">&nbsp;</a>
                                            <div class="effect"></div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="blog-detail">
                                            <div class="date"> <?= $article->getDate(); ?></div>
                                            <div class="blog-title"><a href="<?= Url::toRoute(['site/view', 'id'=> $article->id]) ?>">
                                                    <?= $article->title ?></a></div>
                                            <div class="post-info">
                                                <p><?= $article->description ?></p>
                                                <ul>
                                                    <li>
                                                        <a href="<?= Url::toRoute(['site/view', 'id'=> $article->id]) ?>">Почитать подробнее..
                                                            <i class="fa fa-angle-double-right"></i>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="blog-title">
                                                <?php if (!empty($article->category->title)){ ?>
                                                <a href="<?= Url::toRoute(['site/category', 'id' => $article->category->id])?>">Категория: <?= $article->category->title ?></a>
                                                <?}?>
                                            </div>
                                            <div class="post-info">Просмотрено: <?= (int) $article->viewed ?></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <?php endforeach; ?>
                    </div>
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="pagination-bar">
                                <?php echo LinkPager::widget(['pagination' => $pagination]);?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?= $this->render("/site/sidebar", [
            'popular' => $popular,
            'categories' => $categories,
        ]) ?>
        </div>
    </div>
</section>
<!-- CONTAINER END -->
