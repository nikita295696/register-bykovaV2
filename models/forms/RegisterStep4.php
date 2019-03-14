<?php
/**
 * Created by PhpStorm.
 * User: ПК
 * Date: 13.03.2019
 * Time: 20:53
 */

namespace app\models\forms;


use Yii;

class RegisterStep4 implements Step
{

    public function getViewName($controller)
    {
        if (\Yii::$app->request->isPost) {

            $post = \Yii::$app->request->post();

            $session = \Yii::$app->session['userAnket'];
            $session->comment = $post['UserAnket']['comment'];
            $session->save();
            $id = $session->id;
            if (!empty($id) && $id > 0) {

                $session->feedbackDataid = md5($id);
                $session->save();

                $feedbackId = $session->feedbackDataid;

                \Yii::$app->session['userAnket'] = null;

                return $controller->render("register_complete", ['formRegister' => $this, 'feedbackId' => $feedbackId]);
            }
            else{
                \Yii::error("Register failed");
                Yii::$app->response->statusCode = 429;
                return $controller->render("register_complete", ['formRegister' => $this]);
            }
        }

        if (!RegisterStep1::isSetValues()) {
            return \Yii::$app->response->redirect(['site/register', 'postId' => 1]);
        }

        if (!RegisterStep2::isSetValues()) {
            return \Yii::$app->response->redirect(['site/register', 'postId' => 2]);
        }

        if(!RegisterStep3::isSetValues()){
            return \Yii::$app->response->redirect(['site/register', 'postId'=>3]);
        }

        if (\Yii::$app->request->isGet) {
            return $controller->render("register_complete", ['formRegister' => $this]);
        } else {
            return \Yii::$app->response->redirect(['site/register_complete']);
        }

    }

    public function getNext()
    {
        return StepConst::getStepResult();
    }

    public function getPrev()
    {
        return StepConst::getStep3();
    }

    public function getFormName()
    {
        return 'formsStep/registerStep4';
    }
}