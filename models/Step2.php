<?php
/**
 * Created by PhpStorm.
 * User: nlangloi10
 * Date: 4/18/16
 * Time: 5:18 PM
 */

namespace app\models;

use yii\base\Model;


class Step2 extends Model
{
    public $design_id;


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['design_id'], 'safe'],
        ];
    }

}