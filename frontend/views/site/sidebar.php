<?php
use yii\helpers\Url;
?>
<div class="col-md-3 col-sm-4">
    <div class="sidebar-block">
        <div class="sidebar-box listing-box mb-40"> <span class="opener plus"></span>
            <div class="sidebar-title">
                <h3>Категории: </h3>
            </div>
            <div class="sidebar-contant">
                <ul>
                    <?php foreach ($categories as $category):?>
                        <li><a href="<?= Url::toRoute(['site/category', 'id'=> $category->id])?>"><?= $category->title ?> <span>(<?= $category->getArticlesCount();?>)</span></a></li>
                    <?php endforeach;?>
                </ul>
            </div>
        </div>
        <div class="sidebar-box mb-40"> <span class="opener plus"></span>
            <div class="sidebar-title">
                <h3>Tags</h3>
            </div>
            <div class="sidebar-contant">
                <ul class="tagcloud">
                    <li><a href="#">Orange</a></li>
                    <li><a href="#">Neutral</a></li>
                    <li><a href="#">Print</a></li>
                    <li><a href="#">Tan</a></li>
                    <li><a href="#">Purple</a></li>
                    <li><a href="#">Yellow</a></li>
                    <li><a href="#">White</a></li>
                    <li><a href="#">Metallic</a></li>
                    <li><a href="#">Red</a></li>
                </ul>
            </div>
        </div>
        <div class="sidebar-box sidebar-item sidebar-item-wide"> <span class="opener plus"></span>
            <div class="sidebar-title">
                <h3>Популярные статьи</h3>
            </div>
            <div class="sidebar-contant">
                <ul>
                    <?php foreach ($popular as $item): ?>
                        <li>
                            <div class="pro-media"> <a href="<?= Url::toRoute(['site/view', 'id'=> $item->id]) ?>">
                                    <img alt="<?= $item->title ?>" src="<?= $item->getImage();?>"></a>
                            </div>
                            <div class="pro-detail-info">
                                <a href="<?= Url::toRoute(['site/view', 'id'=> $item->id]) ?>">
                                    <?= $item->title ?>
                                </a>
                                <div class="post-info"><?= $item->getDate(); ?></div>
                            </div>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </div>
</div>