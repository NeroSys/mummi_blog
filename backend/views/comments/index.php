<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;



$this->title = 'Comments';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="category-index">

    <h1><?= Html::encode($this->title) ?></h1>
<?php if (!empty($comments)): ?>

        <table class="table">
            <thead>
            <tr>
                <td>#</td>
                <td>Author</td>
                <td>Text</td>
                <td>Action</td>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($comments as $comment): ?>
                <tr>
                    <td><?= $comment->id ?></td>
                    <td><?= $comment->user->user ?></td>
                    <td><?= $comment->text ?></td>
                    <td>
                        <?php if (!$comment->isAllowed()): ?>
                            <a class="btn btn-success" href="<?= Url::toRoute(['comments/allow', 'id'=> $comment->id])?>">Allow</a>
                        <?php else: ?>
                            <a class="btn btn-warning" href="<?= Url::toRoute(['comments/disallow', 'id'=> $comment->id])?>">Disallow</a>
                        <?php endif;?>

                            <a class="btn btn-danger" href="<?= Url::toRoute(['comments/delete', 'id'=> $comment->id])?>">Delete</a>
                    </td>
                </tr>


            <?php endforeach; ?>

            </tbody>

        </table>
<?php endif;?>

</div>
