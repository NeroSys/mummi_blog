<?php
/**
 * Created by PhpStorm.
 * User: roman
 * Date: 11/13/17
 * Time: 3:20 PM
 */

namespace frontend\controllers;


use frontend\models\User;
use yii\web\Controller;
use Yii;
use common\models\LoginForm;

class AuthController extends Controller
{

    /**
     * Logs in a user.
     *
     * @return mixed
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Logs out the current user.
     *
     * @return mixed
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }


}