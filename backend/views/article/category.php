<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Article */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="article-form">

    <?php $form = ActiveForm::begin(); ?>


    <div class="form group">
    <?= Html::dropDownList('category', $selectedCategory, $categories, ['class' => 'form-control']); ?>

    </div>
    <div class="form-group">
        <?= Html::submitButton('Submit', ['class' =>  'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
