<?php
/**
 * Created by PhpStorm.
 * User: nlangloi10
 * Date: 4/18/16
 * Time: 5:18 PM
 */

namespace app\models;

use yii\base\Model;
use yii\helpers\ArrayHelper;


class Step1 extends Model
{
    public $size_id;
    public $type_id;
    public $color_id;
    public $quantity;


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['size_id', 'type_id', 'color_id', 'quantity'], 'required'],
            [['quantity'], 'integer', 'message' => 'pick a fucking number'],
            //[['size_id', 'type_id', 'color_id', 'quantity'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'size_id' => 'Size',
            'type_id' => 'T-shirt Type',
            'color_id' => 'Select Color',
            'quantity' => 'How many?',
        ];
    }




    public static function getSizeList()
    {
        $options = Tsizes::find()->asArray()->where(['status' => 'Y'])->all();
        return Arrayhelper::map($options, 'id', 'type_name');
    }


    public static function getTypeList()
    {
        $options = Ttypes::find()->asArray()->where(['status' => 'Y'])->all();
        return Arrayhelper::map($options, 'id', 'type_name');
    }

    public static function getColorList()
    {
        $options = Tcolors::find()->asArray() ->where(['status' => 'Y'])->all();
        return Arrayhelper::map($options, 'id', 'color');
    }



}