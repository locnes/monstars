<?php
/**
 * Created by PhpStorm.
 * User: nlangloi10
 * Date: 4/18/16
 * Time: 5:18 PM
 */

namespace app\models;

use yii\base\Model;


class Step4 extends Model
{
    public $order_status;


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            //[['order_status'], 'required'],
            [['order_status'], 'safe'],
        ];
    }


}