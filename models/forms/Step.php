<?php
/**
 * Created by PhpStorm.
 * User: ПК
 * Date: 13.03.2019
 * Time: 20:01
 */

namespace app\models\forms;


interface Step
{
    public function getNext();
    public function getPrev();
    public function getViewName($controller);
    public function getFormName();
}