<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "users".
 *
 * @property int $id
 * @property string $name
 * @property string $surName
 * @property string $phone
 * @property string $street
 * @property string $numHome
 * @property string $city
 * @property string $comment
 * @property string $feedbackDataid
 */
class UserAnket extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'users';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'surName', 'phone', 'street', 'numHome', 'city', 'comment'], 'required'],
            [['name', 'surName', 'comment', 'feedbackDataid'], 'string', 'max' => 255],
            [['phone'], 'string', 'max' => 20],
            [['street', 'city'], 'string', 'max' => 200],
            [['numHome'], 'string', 'max' => 10],
            [['phone'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'surName' => 'Sur Name',
            'phone' => 'Phone',
            'street' => 'Street',
            'numHome' => 'Num Home',
            'city' => 'City',
            'comment' => 'Comment',
            'feedbackDataid' => 'Feedback Dataid',
        ];
    }
}
