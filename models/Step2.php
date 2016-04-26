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


class Step2 extends Model
{
    public $design_id;


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            //[['design_id'], 'required'],
            [['design_id'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'design_id' => 'Pick A F*cking Shirt',
        ];
    }




    public static function getDesignList()
    {
        $options = Tdesign::find()->asArray()->where(['status' => 'Y'])->all();
        return ArrayHelper::map($options, 'id', 'title');
    }

}