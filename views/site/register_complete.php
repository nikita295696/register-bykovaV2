<?php

echo "<p>".\Yii::$app->response->statusCode."</p>";

if(isset($feedbackId)){
    echo "Register complite, feedbackId: " . $feedbackId;
}
else{
    echo "Register failed";
}