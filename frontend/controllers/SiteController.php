<?php
namespace frontend\controllers;

use common\models\Article;
use common\models\Category;
use common\models\Comment;
use frontend\models\CommentForm;
use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;
use yii\data\Pagination;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {

        $data = Article::getAll(3);

//        popular articles

        $popular = Article::getPopular();

//        get categories of blog

        $categories = Category::getAll();


        return $this->render('index', [
            'articles' => $data['articles'],
            'pagination' =>$data['pagination'],
            'popular' => $popular,
            'categories'=> $categories

        ]);
    }

    public function actionView($id){

        $article = Article::findOne($id);

        //        popular articles

        $popular = Article::getPopular();

//        get categories of blog

        $categories = Category::getAll();

//        comments

        $comments = $article->comments;

        $comments = $article->getArticleComments();

        $commentForm = new CommentForm();

        $article->viewedCounter();

        return $this->render('view', [
            'article' => $article,
            'popular' => $popular,
            'categories'=> $categories,
            'comments' => $comments,
            'commentForm' => $commentForm
        ]);
    }

    public function actionCategory($id){

        $category = Category::findOne($id);

        $data = Category::getArticlesByCategory($id);

        //        get categories of blog

        $categories = Category::getAll();

        //        popular articles

        $popular = Article::getPopular();


        return $this->render('category', [
            'category' => $category,
            'categories' => $categories,
            'popular' => $popular,
            'articles' => $data['articles'],
            'pagination' =>$data['pagination'],

        ]);
    }


    /**
     * Displays contact page.
     *
     * @return mixed
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
                Yii::$app->session->setFlash('success', 'Thank you for contacting us. We will respond to you as soon as possible.');
            } else {
                Yii::$app->session->setFlash('error', 'There was an error sending your message.');
            }

            return $this->refresh();
        } else {
            return $this->render('contact', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Displays about page.
     *
     * @return mixed
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    /**
     * Signs user up.
     *
     * @return mixed
     */
    public function actionSignup()
    {
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->signup()) {
                if (Yii::$app->getUser()->login($user)) {
                    return $this->goHome();
                }
            }
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }

    /**
     * Requests password reset.
     *
     * @return mixed
     */
    public function actionRequestPasswordReset()
    {
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');

                return $this->goHome();
            } else {
                Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset password for the provided email address.');
            }
        }

        return $this->render('requestPasswordResetToken', [
            'model' => $model,
        ]);
    }

    /**
     * Resets password.
     *
     * @param string $token
     * @return mixed
     * @throws BadRequestHttpException
     */
    public function actionResetPassword($token)
    {
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidParamException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->session->setFlash('success', 'New password saved.');

            return $this->goHome();
        }

        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }


    public function actionComment($id){

       $model = new CommentForm();

        if (Yii::$app->request->isPost){

            $model->load(Yii::$app->request->post());

            if ($model->saveComment($id)){

                Yii::$app->getSession()->setFlash('comment', 'Ваш комментарий добавлен и ушел на модерацию');

                return $this->redirect(['/site/view', 'id'=> $id]);
            };

            return 'no';

        }
    }

}
