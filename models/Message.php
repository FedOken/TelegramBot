<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "message".
 *
 * @property int $id
 * @property string $request_word
 * @property string $response_word
 */
class Message extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'message';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['request_word', 'response_word'], 'required'],
            [['request_word', 'response_word'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'request_word' => 'Search phrase',
            'response_word' => 'Response phrase',
        ];
    }

    /**
     * @param array $request
     * @return mixed
     */
    public static function getConformity(array $request)
    {
        $requestMessage = ArrayHelper::getValue($request, 'message.text');
        $model = self::findOne(['request_message' => $requestMessage]);
        return ArrayHelper::getValue($model, 'response_message');
    }
}
