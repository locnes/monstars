<?php
/**
 * Created by PhpStorm.
 * User: nlangloi10
 * Date: 4/18/16
 * Time: 5:18 PM
 */

namespace app\models;

use yii\base\Model;


class Step3 extends Model
{
    public $first_name;
    public $last_name;
    public $address;
    public $city;
    public $state;
    public $zipcode;
    public $email;
    public $phone_number;


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['first_name', 'last_name', 'address', 'city', 'state', 'zipcode', 'email', 'phone_number'], 'required'],
            ['email', 'email'],
            [['first_name', 'last_name', 'address', 'city', 'state', 'zipcode', 'email', 'phone_number'], 'safe'],
        ];
    }

}