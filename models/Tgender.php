<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Tgender".
 *
 * @property integer $id
 * @property string $g_name
 * @property string $status
 * @property integer $sort_order
 */
class Tgender extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Tgender';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['g_name', 'sort_order'], 'required'],
            [['sort_order'], 'integer'],
            [['g_name', 'status'], 'string', 'max' => 1]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'g_name' => 'G Name',
            'status' => 'Status',
            'sort_order' => 'Sort Order',
        ];
    }
}
