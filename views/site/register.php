<?php
/**
 * Created by PhpStorm.
 * User: ПК
 * Date: 13.03.2019
 * Time: 19:48
 */

use yii\widgets\ActiveForm;


/** @var \app\models\forms\Step $formRegister */

//echo $formRegister->getFormName();

$postId = Yii::$app->request->get('postId');

$postId = isset($postId) ? $postId : 1;

?>

<h1>Register Step <?=$postId?></h1>

<?php $form = ActiveForm::begin(['id' => 'formNext']); ?>
    <?= $this->render($formRegister->getFormName(), [
        'model' => Yii::$app->session['userAnket'],
        'form' => $form,
    ]) ?>

    <!--<button class="btn btnStep" type="submit" id="prev" data-step="<?/*=$formRegister->getPrev()*/?>" <?/*=$formRegister->getPrev() > 0 ? "" : "disabled"*/?>>Prev</button>-->
    <a href="<?= \yii\helpers\Url::toRoute(['site/register', 'postId'=>$formRegister->getPrev()])?>" class="btn btn-primary" <?=$formRegister->getPrev() > 0 ? "" : "disabled"?>>Prev</a>
    <button class="btn btnStep btn-primary" type="submit" id="next" data-step="">Next</button>
    <input type="hidden" id="postId" name="postId" value="<?=$formRegister->getNext()?>"/>
    <!--?/*=\yii\helpers\Html::hiddenInput(\Yii::$app->getRequest()->csrfParam, \Yii::$app->getRequest()->getCsrfToken(), []);*/?-->
<?php ActiveForm::end(); ?>


<script type="application/javascript">
    /*$(".btnStep").on('click', function (e) {
        var btn = $(this);
        $("#postId").val(btn.attr('data-step'));
    });*/
</script>
