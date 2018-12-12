<?php

namespace app\controllers;

use app\models\Login;
use app\models\Signup;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\News;
use app\models\Cars;
use app\models\Items;
use yii\data\Pagination;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
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
                    'logout' => ['post','get'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */

    public $Password;

    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ]
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */


    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $login_model = new Login();

        if(Yii::$app->request->post('Login'))
        {
            $login_model->attributes = Yii::$app->request->post('Login');

            if($login_model->validate())
            {
                Yii::$app->user->login($login_model->getUser());
                return $this->goHome();
            }
        }

        return $this->render('login', [
            'login_model' => $login_model,
        ]);




    }

    public function actionRegister()
    {
        $model = new Signup();

        if(isset($_POST['Signup'])){

            $model->attributes = Yii::$app->request->post('Signup');

            if($model->validate() && $model->signup())
            {
                return $this->goHome();
            }
        }

        return $this->render('register',['model'=>$model]);
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }



    public function actionIndex()
    {

        Yii::$app->db;

        $cars_updates = Cars::find()->orderBy('date')->limit(4)->all();
        $cars_best = Cars::find()->where(['is_best' => 1])->limit(6)->all();
        $news_last = News::find()->orderBy('date')->limit(3)->all();

        return $this->render('index', [
            'cars_updates' => $cars_updates,
            'cars_best' => $cars_best,
            'news_last' => $news_last
        ]);
    }

    public function actionContact()
    {
        return $this->render('contact');
    }

    public function actionAbout()
    {
        return $this->render('about');
    }

    public function actionItems()
    {
        Yii::$app->db;
        $query = Items::find();

        $pagination = new Pagination([
            'defaultPageSize' => 9,
            'totalCount' => $query->count(),
        ]);

        $items = $query->orderBy('id')
            ->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();


        return $this->render('items', [
            'items' => $items,
            'pagination' => $pagination
        ]);
    }

    public function actionItem($id = 1) {
        Yii::$app->db;
        $item = Items::findOne($id);
        return $this->render('item',
            [
                'item' => $item
            ]);
    }

    public function actionCars()
    {
        Yii::$app->db;
        $query = Cars::find();

        $pagination = new Pagination([
            'defaultPageSize' => 9,
            'totalCount' => $query->count(),
        ]);

        $cars = $query->orderBy('id')
            ->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();

        return $this->render('cars', [
            'cars' => $cars,
            'pagination' => $pagination,
        ]);
        //return $this->render('cars');
    }

    public function actionCar($id = 1) {
        Yii::$app->db;
        $car = Cars::findOne($id);
        return $this->render('car',
            [
                'car' => $car
            ]);
    }

    public function actionCart() {

        if (Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        return $this->render('cart');
    }

    public function actionNews() {

        Yii::$app->db;
        $query = News::find();

        $pagination = new Pagination([
            'defaultPageSize' => 9,
            'totalCount' => $query->count(),
        ]);

        $news = $query->orderBy('id')
            ->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();

        return $this->render('news', [
            'news' => $news,
            'pagination' => $pagination,
        ]);

    }

    public function actionNew($id = 1) {
        Yii::$app->db;
        $new = News::findOne($id);
        return $this->render('new',
            [
                'new' => $new
            ]);
    }

    public function actionBest() {
        Yii::$app->db;

        $cars = Cars::find()->where(['is_best' => 1])->all();
        $items = Items::find()->where(['is_best' => 1])->all();


        return $this->render('best', [
            'cars' => $cars,
            'items' => $items
        ]);
    }

    public function actionSearch() {
        $text = Yii::$app->request->get('text');

        Yii::$app->db;
//        ->orWhere(['flagActive' => 1])
        $cars = Cars::find()->where(['like', 'title', $text])->orWhere(['like', 'description', $text])->all();
        $items = Items::find()->where(['like', 'title', $text])->orWhere(['like', 'description', $text])->all();
        $news = News::find()->where(['like', 'title', $text])->orWhere(['like', 'text', $text])->orWhere(['like', 'tags', $text])->all();

        return $this->render('search', [
            'cars' => $cars,
            'items' => $items,
            'news' => $news
        ]);
    }


}
