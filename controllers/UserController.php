<?php


namespace app\controllers;

//use app\models\ChangePasswordForm;
use app\models\ChangePasswordForm;
use app\models\EditForm;
use app\models\LoginForm;
use app\models\UserAdd;
use app\repository\EditorRepository;
use app\repository\UserRepository;
use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\Response;

class UserController extends Controller
{

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'login', 'registration', 'profile'],
                'rules' => [
                    [
                        'actions' => ['logout', 'profile'],
                        'allow' => true,
                        'roles' => ['@'],
                    ], [
                        'actions' => ['login', 'registration'],
                        'allow' => true,
                        'roles' => ['?'],
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

    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->redirect('/editor/create');
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    public function actionRegistration()
    {
        $model = new UserAdd();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            UserRepository::addUser($model->login, $model->password, $model->username);
            $this->redirect('login');
        }
        return $this->render('registration', [
            'model' => $model,
        ]);
    }

    public function actionProfile()
    {
        $pictures = EditorRepository::getPicturesAsArray(['user_id' => Yii::$app->user->identity->id]);
        return $this->render('profile', [
            'model' => $pictures
        ]);
    }

    public function actionEdit($id){
        $model = new EditForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            EditorRepository::editPicture($id, $model->name, $model->status);
            $this->redirect('profile');
        }
        $picture = EditorRepository::getPictureById($id);
        $model->name = $picture->name;
        $model->status = $picture->status;

        return $this->render('edit', [
            'model' => $model,
        ]);

    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

}