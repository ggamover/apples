<?php


namespace backend\controllers;


use backend\lib\Util;
use backend\models\Apple;
use yii\filters\AccessControl;
use yii\web\Controller;

class AppleController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }

    public function actionBuild()
    {
        Util::buildScene(rand(8, 32));
        $this->redirect(['site/index']);
    }

    public function actionDrop($id)
    {
        $apple = Apple::findOne($id);
        $apple->drop()->save();
        $this->redirect(['site/index']);
    }

    public function actionBite($id, $portion){
        $apple = Apple::findOne($id);
        $apple->bite($portion)->save();
        $this->redirect(['site/index']);
    }
}