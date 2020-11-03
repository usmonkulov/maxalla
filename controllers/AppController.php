<?php
namespace app\controllers;

use yii\web\Controller;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use Yii;

/**
 * AppController extends Controller and implements the behaviors() method
 * where you can specify the access control ( AC filter + RBAC ) for your controllers and their actions.
 */
class AppController extends Controller
{
    /**
     * Returns a list of behaviors that this component should behave as.
     * Here we use RBAC in combination with AccessControl filter.
     *
     * @return array
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'controllers' => ['user'],
                        'actions' => ['index', 'activate', 'region', 'city', 'town-block', 'view', 'create', 'update', 'delete'],
                        'allow' => true,
                        'roles' => ['admin'],
                    ],

                    [
                        'controllers' => ['user'],
                        'actions' => ['index', 'activate', 'view', 'create', 'update', 'delete'],
                        'allow' => true,
                        'roles' => ['respublikaRaisi'],
                    ],

                    [
                        'controllers' => ['user'],
                        'actions' => ['index', 'view', 'create', 'update', 'delete'],
                        'allow' => true,
                        'roles' => ['respublikaHodimi'],
                    ],

                    [
                        'controllers' => ['user','town-block'],
                        'actions' => ['index', 'view','city', 'create', 'update', 'delete'],
                        'allow' => true,
                        'roles' => ['viloyatRaisi'],
                    ],

                     [
                        'controllers' => ['user'],
                        'actions' => ['index', 'view','city', 'create', 'update', 'delete'],
                        'allow' => true,
                        'roles' => ['viloyatHodimi'],
                    ],

                    [
                        'controllers' => ['user','town-block'],
                        'actions' => ['index', 'view', 'create', 'update', 'delete'],
                        'allow' => true,
                        'roles' => ['tumanRaisi'],
                    ],

                    [
                        'controllers' => ['user'],
                        'actions' => ['index', 'view', 'create', 'update', 'delete'],
                        'allow' => true,
                        'roles' => ['tumanHodimi'],
                    ],

                    [
                        'controllers' => ['user'],
                        'actions' => ['index', 'view', 'create', 'update', 'delete'],
                        'allow' => true,
                        'roles' => ['mahhallaRaisi'],
                    ],
                    [
                        'controllers' => ['user'],
                        'actions' => ['view', 'create', 'update', 'delete'],
                        'allow' => true,
                        'roles' => ['kotib'],
                    ],
                    [
                        'controllers' => ['user'],
                        'actions' => ['view', 'create', 'update', 'delete'],
                        'allow' => true,
                        'roles' => ['maslahatchi'],
                    ],
                    [
                        'controllers' => ['user'],
                        'actions' => ['view', 'create', 'update', 'delete'],
                        'allow' => true,
                        'roles' => ['pospon'],
                    ],
                    [
                        'controllers' => ['user'],
                        'actions' => ['view', 'create', 'update', 'delete'],
                        'allow' => true,
                        'roles' => ['inspektor'],
                    ],
                    [
                        // other rules
                    ],

                ], // rules

            ], // access

            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ], // verbs

        ]; // return

    } // behaviors

} // AppController
