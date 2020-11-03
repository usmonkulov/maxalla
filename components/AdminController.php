<?php

namespace app\components;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
// use yii\web\Response;
use yii\filters\VerbFilter;
use yii\behaviors\TimestampBehavior;
// use app\models\LoginForm;
// use app\models\ContactForm;
class AdminController extends \yii\web\Controller{
    // public $layout = 'admin.php';
    public function __construct($id,$module,$config=[]){
        parent::__construct($id,$module,$config);
    }
    public function behaviors(){
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['index', 'report', 'activate', 'region', 'city', 'town-block', 'view', 'create', 'update', 'delete'],
                'rules' => [
                    [
                        'actions' => ['create','logout','admin','view','update','delete','index'],
                        'allow' => true,
                        'roles' => ['theCreator'],
                    ],

                    [
                        'controllers' => ['site','user','population','town-block'],
                        'actions' => ['index', 'activate', 'region', 'city', 'town-block', 'view', 'create', 'update', 'delete'],
                        'allow' => true,
                        'roles' => ['admin'],
                    ],

                    [
                        'controllers' => ['site','user','population','town-block'],
                        'actions' => ['index', 'activate', 'region', 'city', 'town-block', 'view', 'create', 'update', 'delete'],
                        'allow' => true,
                        'roles' => ['respublikaRaisi'],
                    ],

                    [
                        'controllers' => ['site','user','population','town-block'],
                        'actions' => ['index', 'view', 'region', 'city', 'town-block', 'create', 'update', 'delete'],
                        'allow' => true,
                        'roles' => ['respublikaHodimi'],
                    ],

                    [
                        'controllers' => ['site','user','population','town-block'],
                        'actions' => ['index', 'activate', 'region', 'city', 'town-block', 'view', 'create', 'update', 'delete'],
                        'allow' => true,
                        'roles' => ['viloyatRaisi'],
                    ],
                    [
                        'controllers' => ['site','user','population','town-block'],
                        'actions' => ['index', 'view', 'region', 'city', 'town-block', 'create', 'update', 'delete'],
                        'allow' => true,
                        'roles' => ['viloyatHodimi'],
                    ],

                    [
                        'controllers' => ['site','user','population','town-block'],
                        'actions' => ['index', 'activate', 'view', 'create', 'update', 'delete'],
                        'allow' => true,
                        'roles' => ['tumanRaisi'],
                    ],

                    [
                        'controllers' => ['site','user','population','town-block'],
                        'actions' => ['index', 'view', 'create', 'update', 'delete'],
                        'allow' => true,
                        'roles' => ['tumanHodimi'],
                    ],

                    [
                        'controllers' => ['site','user','population'],
                        'actions' => ['index', 'report', 'activate', 'view', 'create', 'update', 'delete'],
                        'allow' => true,
                        'roles' => ['mahhallaRaisi'],
                    ],
                    [
                        'controllers' => ['site'],
                        'actions' => ['index'],
                        'allow' => true,
                        'roles' => ['kotib','maslahatchi','pospon','inspektor'],
                    ],
                    [
                        'controllers' => ['user'],
                        'actions' => ['view','update'],
                        'allow' => true,
                        'roles' => ['kotib'],
                    ],

                     [
                        'controllers' => ['user'],
                        'actions' => ['view', 'update'],
                        'allow' => true,
                        'roles' => ['maslahatchi'],
                    ],
                    [
                        'controllers' => ['user'],
                        'actions' => ['view', 'update'],
                        'allow' => true,
                        'roles' => ['pospon'],
                    ],
                    [
                        'controllers' => ['user'],
                        'actions' => ['view', 'update'],
                        'allow' => true,
                        'roles' => ['inspektor'],
                    ],

                    [
                        'controllers' => ['population'],
                        'actions' => ['index','view', 'create', 'update', 'delete'],
                        'allow' => true,
                        'roles' => ['kotib'],
                    ],

                     [
                        'controllers' => ['population'],
                        'actions' => ['index','view', 'create', 'update', 'delete'],
                        'allow' => true,
                        'roles' => ['maslahatchi'],
                    ],
                    [
                        'controllers' => ['population'],
                        'actions' => ['index','view', 'create', 'update', 'delete'],
                        'allow' => true,
                        'roles' => ['pospon'],
                    ],
                    [
                        'controllers' => ['population'],
                        'actions' => ['index','view', 'create', 'update', 'delete'],
                        'allow' => true,
                        'roles' => ['inspektor'],
                    ],


                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
            TimestampBehavior::className(),
        ];
    }

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
}
