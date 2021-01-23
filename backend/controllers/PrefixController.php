<?php

namespace backend\controllers;

use Yii;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use Yii\db\Query;

class PrefixController extends \yii\web\Controller
{
     /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['login','error'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['index', 'delete','grid'],
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
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    public function actionIndex()
    {
        $query = new Query();
        //$prefix = $query->from('prefix')->all();
        
        //$prefix = $query->select(['prefix_name'])->from('prefix')->all();
        
        //$prefix = $query->select(['prefix_name  as name'])
        //           ->from('prefix')
        //           ->where(['prefix_id' =>  '03'])
        //           ->one();

        $prefix = $query->from('prefix')
                        ->where(['like','prefix_name','นา'])
                        ->orderBy('prefix_id desc')
                        ->all();
                        
        $count = $query->from('prefix')->count();

        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        return [
            'data' => $prefix,
            'count' => (int) $count
        ]; 
        //return $this->render('index');
    }


}
