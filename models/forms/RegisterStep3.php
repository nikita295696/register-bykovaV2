<?php
/**
 * Created by PhpStorm.
 * User: ПК
 * Date: 13.03.2019
 * Time: 20:52
 */

namespace app\models\forms;


use app\models\UserAnket;

class RegisterStep3 implements Step
{

    public function getViewName($controller)
    {

        if(\Yii::$app->request->isPost){

            $post = \Yii::$app->request->post();

            $session = \Yii::$app->session['userAnket'];
            $session->street = $post['UserAnket']['street'];
            $session->numHome = $post['UserAnket']['numHome'];
            $session->city = $post['UserAnket']['city'];
        }

        if(!RegisterStep1::isSetValues()){
            /*$step = new RegisterStep1();
            return $step->getViewName($controller);*/
            return \Yii::$app->response->redirect(['site/register', 'postId'=>1]);
        }

        if(!RegisterStep2::isSetValues()){

            return \Yii::$app->response->redirect(['site/register', 'postId'=>2]);
        }



        if(\Yii::$app->request->isGet) {
            return $controller->render("register", ['formRegister' => $this]);
        }
        else{
            return \Yii::$app->response->redirect(['site/register', 'postId'=>3]);
        }
    }

    public static function isSetValues(){
        $user = \Yii::$app->session['userAnket'];
        return isset($user) && $user instanceof UserAnket
            && isset($user->comment)
            && !empty($user->comment);
    }

    public function getNext()
    {
        return StepConst::getStep4();
    }

    public function getPrev()
    {
        return StepConst::getStep2();
    }

    public function getFormName()
    {
        return 'formsStep/registerStep3';
    }
}