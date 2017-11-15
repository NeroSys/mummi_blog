<?php
/**
 * Created by PhpStorm.
 * User: roman
 * Date: 11/14/17
 * Time: 7:00 PM
 */

namespace backend\controllers;


use common\models\Comment;
use yii\web\Controller;

class CommentsController extends Controller
{

    public function actionIndex(){

        $comments = Comment::find()->orderBy('id desc')->all();

        return $this->render('index', ['comments' => $comments]);
    }

    public function actionDelete($id){

        $comment = Comment::findOne($id);

        if ($comment->delete()){

            return $this->redirect(['comments/index']);
        }
        return false;
    }

    public function actionAllow($id){

        $comment = Comment::findOne($id);

        if ($comment->allow()){
            return $this->redirect('index');
        }
        return false;
    }

    public function actionDisallow($id){

        $comment = Comment::findOne($id);

        if ($comment->disallow()){
            return $this->redirect('index');
        }
        return false;
    }
}