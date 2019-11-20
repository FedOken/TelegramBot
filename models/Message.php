<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "message".
 *
 * @property int $id
 * @property int $type
 * @property string $message
 */
class Message extends \yii\db\ActiveRecord
{
    const TYPE_MESSAGE = 1;

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
            [['type', 'message'], 'required'],
            [['type'], 'integer'],
            [['message'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'type' => 'Type',
            'message' => 'Message',
        ];
    }

    /**
     * @param int $typeId
     * @return Message|null
     */
    public function getMessageByType($typeId)
    {
        return ArrayHelper::getValue(self::findOne(['type' => $typeId]), 'message');
    }

    /**
     * @param $model Message
     * @return Message
     */
    public function getModel(Message $model)
    {
        $existingModel = self::findOne(['type' => $model->type]);
        if ($existingModel) {
            return $existingModel;
        }
        return $model;
    }
}
