<?php

use yii\helpers\Url;
use yii\widgets\ActiveForm;

?>

<!-- BANNER STRAT -->
<div class="banner inner-banner">
    <div class="container">
        <section class="banner-detail">
            <h1 class="banner-title"><?= $article->title ?></h1>
            <div class="bread-crumb right-side">
                <ul>
                    <li><a href="<?= Url::home() ?>">Главная</a>/</li>
                    <?php if (!empty($article->category->id)){?>
                    <li><a href="<?= Url::toRoute(['site/category', 'id' => $article->category->id])?>">
                            <?= $article->category->title ?>
                        </a>/
                    </li>
                    <?php }?>
                    <li><span><?= $article->title ?></span></li>
                </ul>
            </div>
        </section>
    </div>
</div>
<!-- BANNER END -->

<!-- CONTAIN START -->
<section class="ptb-95 ">
    <div class="container">
        <div class="row">
            <div class="col-md-9 col-sm-8 pb-xs-60">
                <div class="row">
                    <div class="col-xs-12 mb-60">
                        <div class="blog-media"> <img src="<?= $article->getImage() ?>" alt="<?= $article->title ?>"> </div>
                        <div class="blog-detail">
                            <div class="date"> <?= $article->getdate() ?></div>
                            <div class="blog-title"><a href="<?= Url::toRoute(['site/view', 'id' => $article->id])?>"><?= $article->title ?></a></div>
                            <div class="blog-title">Автор мысли : <?= $article->author->user ?></a></div>
                            <div class="post-info">
                                <p><?= $article->content ?></p>
                            </div>
                            <hr>
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="col-xs-12">
                        <div class="comments-area-main gray-bg">

                            <?php if (!empty($comments)):?>
                            <div class="comments-area">
                                <h4>Comments<span>(2)</span></h4>

                    <?php foreach ($comments as $comment):?>
                                <ul class="comment-list mt-30">
                                    <li>

                                        <div class="comment-user">
                            <?php if (!empty($comment->user->image)):?>
                                            <img src="<?= $comment->user->image; ?>" alt="comment">
                                <?php else:?>
                                            <img src="/frontend/web/img/Sn.jpeg" width="50">
                            <?php endif;?>
                                        </div>
                                        <div class="comment-detail">
                                            <div class="user-name"><?= $comment->user->user ?></div>
                                            <div class="post-info">
                                                <ul>
                                                    <li><?= $comment->getDate();?></li>
<!--                                                    <li><a href="#"><i class="fa fa-reply"></i>Reply</a></li>-->
                                                </ul>
                                            </div>
                                            <p><?= $comment->text; ?></p>
                                        </div>
                                    </li>
                                </ul>
                        <?php endforeach;?>
                            </div>
                            <?php endif;?>

<?php if (!Yii::$app->user->isGuest): ?>
                            <div class="main-form mt-30">
                                <h4>Оставьте свой комментарий здесь..</h4>
<?php if (Yii::$app->session->setFlash('comment')): ?>
        <div class="alert alert-success" role="alert">
            <?php Yii::$app->session->setFlash('comment')?>
        </div>
        <?php endif; ?>

<?php $form = ActiveForm::begin([
        'action' => ['site/comment', 'id' => $article->id],
])?>
                                <div class="row mt-30">
<?= $form->field($commentForm, 'comment')->label('Текст комментария')->textarea(['placeholder' => 'Комментарий сюда']) ?>
                                </div>
                                <button type="submit" class="btn btn-success">Оставить комментарий</button>
<?php ActiveForm::end(); ?>
                            </div>
<?php endif;?>
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