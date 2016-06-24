<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "Tsizes".
 *
 * @property integer $id
 * @property string $type_name
 * @property string $price_add
 * @property string $status
 * @property integer $sort_order
 */
class Tsizes extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Tsizes';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['size_name', 'size_fullname', 'price_add', 'sort_order'], 'required'],
            [['price_add'], 'number'],
            [['sort_order'], 'integer'],
            [['size_name'], 'string', 'max' => 2],
            [['status'], 'string', 'max' => 1],
            [['size_name'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {

        return [
            'id' => 'ID',
            'size_name' => 'Shirt Size (short)',
            'size_fullname' => 'Shirt Size (full)',
            'price_add' => 'Price Add',
            'status' => 'Status',
            'sort_order' => 'Sort Order',

        ];


    }


    /*
        * Used to create a drop-down menu of all sizes
        */
    public static function dropDownMenu()
    {
        return ArrayHelper::map(Tsizes::find()
            ->asArray()
            ->where(['status' => 'Y'])
            ->orderBy(['sort_order' => SORT_ASC])
            ->all(),
            'id', 'size_fullname');
    }



}
