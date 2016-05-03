<?php
/**
 * Created by PhpStorm.
 * User: nlangloi10
 * Date: 4/18/16
 * Time: 5:18 PM
 */

namespace app\models;

use yii\base\Model;

/*
 * Though I'm not using Kartik's masked-input extension here yet, it's worth looking at his demo page to see just
 * what can be done. It's pretty cool stuff.
 * http://demos.krajee.com/masked-input
 */


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
            //[['first_name', 'last_name', 'address', 'city', 'state', 'zipcode', 'email', 'phone_number'], 'required'],

            [['first_name'], 'required', 'message' => 'Know your name?'],
            [['last_name'], 'required', 'message' => 'Know your last name?'],
            [['address'], 'required', 'message' => 'Where should we send the package?'],

            [['city'], 'required', 'message' => 'Know your City?'],

            [['state'], 'required', 'message' => 'Know your last name?'],
            [['zipcode'], 'required', 'message' => 'Where should we send the package?'],
            [['email'], 'required', 'message' => 'Email@whatever.domain?'],

            [['phone_number'], 'required', 'message' => 'I need your digits to go on'],

            [['email'], 'email', 'message' => 'Follow this format!! Email@whatever.domain?'],
            ['zipcode', 'match',
                'pattern' => '/^\d{5}(?:[-\s]\d{4})?$/i',
                'message' => 'Zip code must be comprised of the following formats: 99999, 99999-9999 or 99999 9999.',
            ],
            // Helpful resource on Yii2 validators:
            // http://code.tutsplus.com/tutorials/how-to-program-with-yii2-specialized-validations--cms-23427

            [['first_name', 'last_name', 'address', 'city', 'state', 'zipcode', 'email', 'phone_number'], 'safe'],
        ];
    }

}