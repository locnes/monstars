<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Order".
 *
 * @property integer $id
 * @property string $order_date
 * @property integer $type_id
 * @property integer $size_id
 * @property integer $color_id
 * @property integer $design_id
 * @property integer $quantity
 * @property string $order_status
 * @property string $first_name
 * @property string $last_name
 * @property string $address
 * @property string $city
 * @property integer $zipcode
 * @property string $state
 * @property string $email
 * @property string $phone_number
 */
class Order extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Order';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'order_date', 'type_id', 'size_id', 'color_id', 'design_id', 'quantity', 'order_status', 'first_name', 'last_name', 'address', 'city', 'zipcode', 'state', 'email', 'phone_number'], 'required'],
            [['id', 'type_id', 'size_id', 'color_id', 'design_id', 'quantity', 'zipcode'], 'integer'],
            [['order_date'], 'safe'],
            [['first_name', 'last_name', 'city'], 'string'],
            [['order_status'], 'string', 'max' => 50],
            [['address', 'email'], 'string', 'max' => 100],
            [['state'], 'string', 'max' => 2],
            [['phone_number'], 'string', 'max' => 10],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'order_date' => 'Order Date',
            'type_id' => 'Type ID',
            'size_id' => 'Size ID',
            'color_id' => 'Color ID',
            'design_id' => 'Design ID',
            'quantity' => 'Quantity',
            'order_status' => 'Order Status',
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
            'address' => 'Address',
            'city' => 'City',
            'zipcode' => 'Zipcode',
            'state' => 'State',
            'email' => 'Email',
            'phone_number' => 'Phone Number',
        ];
    }
}
