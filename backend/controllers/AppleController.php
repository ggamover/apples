<?php


namespace backend\controllers;


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

    public function actionBuild($amount = 12)
    {
        Apple::deleteAll();
        for ($i = 0; $i < $amount; $i++){
            $color = [];
            for($c = 0; $c < 3; $c++){
                $color[] = dechex(rand(4,8));
            }
            $apple = new Apple;
            $apple->color = '#' . implode($color);
            $apple->save();
        }
        $this->redirect(['site/index']);
    }
}