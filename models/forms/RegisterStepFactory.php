<?php
/**
 * Created by PhpStorm.
 * User: ПК
 * Date: 13.03.2019
 * Time: 20:21
 */

namespace app\models\forms;


use app\models\UserAnket;
use Yii;
use yii\web\Controller;

class RegisterStepFactory
{

    /**
     * @param $controller Controller
     * @return void
     */
    public static function getRegisterStep($controller){
        $step = null;

        $stepId = 1;

        if(Yii::$app->request->isPost)
        {
            $stepId = Yii::$app->request->post("postId");
        }
        else{
            $stepId = Yii::$app->request->get("postId");
        }

        $stepId = isset($stepId) && !empty($stepId) && is_numeric($stepId) ? $stepId : -1;

        $session = Yii::$app->session;
        if(!isset($session['userAnket'])){
            $session['userAnket'] = new UserAnket();
        }

        switch($stepId){
            case StepConst::getStep2():
                $step = new RegisterStep2();
                break;
            case StepConst::getStep3():
                $step = new RegisterStep3();
                break;
            case StepConst::getStep4():
                $step = new RegisterStep4();
                break;
            case StepConst::getStep1():
                $step = new RegisterStep1();
                break;
            default:
                $step = new RegisterStep1();
                $session['userAnket'] = new UserAnket();
                break;
        }

        return $step->getViewName($controller);
    }
}