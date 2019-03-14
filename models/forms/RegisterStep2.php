<?php
/**
 * Created by PhpStorm.
 * User: ПК
 * Date: 13.03.2019
 * Time: 20:52
 */

namespace app\models\forms;


use app\models\UserAnket;

class RegisterStep2 implements Step
{

    public static function isSetValues(){
        $user = \Yii::$app->session['userAnket'];
        /*return isset($user) && isset($user["UserAnket"])
            && isset($user['UserAnket']['street']) && isset($user['UserAnket']['numHome']) && isset($user['UserAnket']['city'])
            && !empty($user['UserAnket']['street']) && !empty($user['UserAnket']['numHome']) && !empty($user['UserAnket']['city']);*/
        return isset($user) && $user instanceof UserAnket
            && isset($user->street) && isset($user->numHome) && isset($user->city)
            && !empty($user->street) && !empty($user->numHome) && !empty($user->city);
    }

    public function getViewName($controller)
    {
        if(\Yii::$app->request->isPost){

            $post = \Yii::$app->request->post();

            $session = \Yii::$app->session['userAnket'];
            $session->name = $post['UserAnket']['name'];
            $session->surName = $post['UserAnket']['surName'];
            $session->phone = $post['UserAnket']['phone'];
        }

        if(!RegisterStep1::isSetValues()){
            /*$step = new RegisterStep1();
            return $step->getViewName($controller);*/

            return \Yii::$app->response->redirect(['site/register', 'postId'=>1]);
        }

        if(\Yii::$app->request->isGet) {
            return $controller->render("register", ['formRegister' => $this]);
        }
        else{
            return \Yii::$app->response->redirect(['site/register', 'postId'=>2]);
        }
    }

    public function getNext()
    {
        return StepConst::getStep3();
    }

    public function getPrev()
    {
        return StepConst::getStep1();
    }

    public function getFormName()
    {
        return 'formsStep/registerStep2';
    }
}