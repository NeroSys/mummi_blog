<?php
/**
 * Created by PhpStorm.
 * User: roman
 * Date: 11/13/17
 * Time: 3:20 PM
 */

namespace frontend\controllers;


use frontend\models\SignupForm;
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

    public function actionSignup(){

        $model = new SignupForm();

        if (Yii::$app->request->isPost){

            $model->load(Yii::$app->request->post());

            if ($model->signup()){

                return $this->redirect(['auth/login']);
            }
        }

        return $this->render('signup', ['model' => $model]);

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

    public function actionTest()
    {

        $user = User::findOne(1);

        Yii::$app->user->login($user);

//        Yii::$app->user->logout();
//        var_dump(Yii::$app->user->isGuest);

        if (Yii::$app->user->isGuest){

            echo 'guest';
        }else{

            echo 'authorization';
        }
    }
}