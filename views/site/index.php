<?php

use app\models\Message;
use yii\widgets\ActiveForm;
use yii\helpers\Html;

/**
 * @var $this yii\web\View
 * @var $modelMessage Message
 */

$this->title = 'My Yii Application';
?>
<div class="site-index">

	<div class="jumbotron">
		<h1>Hello!</h1>

		<p class="lead">Set bot response below</p>
        <?php $form = ActiveForm::begin([
        		'validateOnBlur' => false,
	            'action' => '/site/set-bot-response-message',
        ]) ?>

            <?= $form->field($modelMessage, 'message')->textInput(['value' => $modelMessage->getMessageByType(Message::TYPE_MESSAGE)])->label(false) ?>
            <?= $form->field($modelMessage, 'type')->hiddenInput(['value' => Message::TYPE_MESSAGE])->label(false) ?>
			<p>
				<?= Html::submitButton('Save!', ['class' => 'btn btn-lg btn-success']) ?>
			</p>

        <?php ActiveForm::end() ?>
	</div>
</div>
