<?php

namespace app\controllers;

use app\models\Message;
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
        Yii::$app->response->statusCode = 200;
        $content = file_get_contents("php://input");
        //$content = json_decode($content, true);

        Yii::$app->telegram->sendMessage([
            'chat_id' => 485140930,
            //'text' => Message::getMessageByType(Message::TYPE_MESSAGE),
            'text' => $content
        ]);
        return true;
        //return 'awdawd';
    }


}
