<?php
/**
 * Created by PhpStorm.
 * User: nlangloi10
 * Date: 4/18/16
 * Time: 5:18 PM
 */

namespace app\models;

use yii\base\Model;


class OrderformStep1 extends Model
{
    public $size_id;
    public $type_id;
    public $color_id;


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['size_id', 'type_id', 'color_id'], 'safe']
        ];
    }

}