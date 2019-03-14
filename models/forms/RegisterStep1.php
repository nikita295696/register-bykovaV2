<?php

namespace app\models\forms;

use app\models\UserAnket;
use yii\web\Controller;

class RegisterStep1 implements Step
{
    /**
     * @param $controller Controller
     * @return mixed
     */

    public static function isSetValues(){
        $user = \Yii::$app->session['userAnket'];
        return isset($user) && $user instanceof UserAnket
            && isset($user->name) && isset($user->surName) && isset($user->phone)
            && !empty($user->name) && !empty($user->surName) && !empty($user->phone);
    }

    public function getViewName($controller)
    {
        return $controller->render("register", ['formRegister'=> $this]);
    }

    public function getNext()
    {
        return StepConst::getStep2();
    }

    public function getPrev()
    {
        return -1;
    }

    public function getFormName()
    {
        return 'formsStep/registerStep1';
    }
}