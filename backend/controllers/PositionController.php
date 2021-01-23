<?php

namespace backend\controllers;
use Yii;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\data\SqlDataProvider;

class PositionController extends \yii\web\Controller
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
                        'actions' => ['login', 'error'],
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
        $positions = Yii::$app->db->createCommand('select * from position order by id asc')->queryAll();
        $count = Yii::$app->db->createCommand("SELECT count(*) FROM position")->queryScalar();
        //Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        // return [
        //     'total_record' => (int) $count,
        //     'data' => $position
        // ]; 

        return $this->render('index',[
                                'positions' => $positions,
                                'count'    => $count
                            ]);
    }

    public function actionDelete($id) {
        Yii::$app->db->createCommand()->delete('position', 'id=:id', [':id'=>$id])->execute();
        return $this->redirect(['index']);
    }

    public function actionGrid(){
        
        $count = Yii::$app->db->createCommand("SELECT count(*) FROM position")->queryScalar();
        
        $dataProvider = new SqlDataProvider([
            'sql' => 'select * from position',
            'pagination' => [
                'pageSize' => 10
            ]
        ]);

        return $this->render('grid', [
            'dataProvider' => $dataProvider,
        ]);
    }

}
