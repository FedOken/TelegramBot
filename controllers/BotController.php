<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;

class BotController extends Controller
{
    public $enableCsrfValidation = false;

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
        ];
    }


    public function actionTest()
    {
        //echo Yii::$app->telegram->botToken;
        Yii::$app->telegram->sendMessage([
            'chat_id' => 485140930,
            'text' => 'testawdwad',
        ]);
        return true;
        //return 'awdawd';
    }


}
