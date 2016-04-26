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
            //[['size_id', 'type_id', 'color_id', 'quantity'], 'required'],
            [['size_id'], 'required', 'message' => 'Select the color of your T-shirt'],
            [['type_id'], 'required', 'message' => 'What type of shirt do you want?'],
            [['color_id'], 'required', 'message' => 'What color shirt do you want?'],
            [['quantity'], 'required', 'message' => 'Pick a fucking number!'],
            [['quantity'], 'integer', 'message' => 'It\'s got to be a number, dude!'],
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

    /**
     * Returns an array of all of the "live" T-shirt sizes
     * @return array
     */
    public static function getSizeList()
    {
        $options = Tsizes::find()->asArray()->where(['status' => 'Y'])->all();
        return ArrayHelper::map($options, 'id', 'type_name');
    }

    /**
     * Returns an array of all of the "live" T-shirt types
     * @return array
     */
    public static function getTypeList()
    {
        $options = Ttypes::find()->asArray()->where(['status' => 'Y'])->all();
        return ArrayHelper::map($options, 'id', 'type_name');
    }

    /**
     * Returns an array of all of the "live" T-shirt colors
     * @return array
     */
    public static function getColorList()
    {
        $options = Tcolors::find()->asArray() ->where(['status' => 'Y'])->all();
        return ArrayHelper::map($options, 'id', 'color');
    }



}