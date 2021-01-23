<?php

namespace backend\controllers;

use Yii;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use Yii\db\Query;
use yii\data\ActiveDataProvider;

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

        // $prefix = $query->from('prefix')
        //                 ->where(['like','prefix_name','นา'])
        //                 ->orderBy('prefix_id desc')
        //                 ->all();

        // $prefixSQL = $query->from('prefix')
        // ->where(['like', 'prefix_name', 'นา'])
        // ->orderBy('prefix_id desc')
        // ->createCommand();
                        
        //$count = $query->from('prefix')->count();

        // Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        // return [
        //     'data' => $prefix,
        //     'params' => $prefixSQL->params,
        //     'sql' => $prefixSQL->sql,
        //     'total_record' => (int) $count,
        // ]; 

        $prefixQuery = $query->from('prefix');
        $dataProvider = new ActiveDataProvider([
            'query' => $prefixQuery,
            'pagination' => [
                'pageSize' => 3
            ]
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }


}
