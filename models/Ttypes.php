<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Ttypes".
 *
 * @property integer $id
 * @property string $type_name
 * @property string $price_add
 * @property string $status
 * @property integer $sort_order
 */
class Ttypes extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Ttypes';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['type_name', 'price_add', 'sort_order'], 'required'],
            [['price_add'], 'number'],
            [['sort_order'], 'integer'],
            [['type_name'], 'string', 'max' => 100],
            [['status'], 'string', 'max' => 1],
            [['type_name'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'type_name' => 'Type Name',
            'price_add' => 'Price Add',
            'status' => 'Status',
            'sort_order' => 'Sort Order',
        ];
    }


    public function displayStatusName()
    {
        $this->status = [
            'Y' => 'Live',
            'N' => 'Not live'
        ];
    }
}
