<?php

namespace app\controllers;

use app\models\Message;
use Yii;
use yii\helpers\ArrayHelper;
use yii\web\Controller;

class BotController extends Controller
{
    public $enableCsrfValidation = false;

    /**
     * Send message to sender
     * @return bool
     */
    public function actionSendMessage()
    {
        Yii::$app->response->statusCode = 200;
        $content = file_get_contents("php://input");
        $content = json_decode($content, true);

        Yii::$app->telegram->sendMessage([
            'chat_id' => ArrayHelper::getValue($content, 'message.from.id'),
            'text' => Message::getActiveMessage(),
        ]);
        return true;
    }
}
