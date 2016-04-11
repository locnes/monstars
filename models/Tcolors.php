<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Tcolors".
 *
 * @property integer $id
 * @property string $color
 * @property string $status
 * @property integer $sort_order
 */
class Tcolors extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Tcolors';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'color', 'sort_order'], 'required'],
            [['id', 'sort_order'], 'integer'],
            [['color'], 'string', 'max' => 25],
            [['status'], 'string', 'max' => 1],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'color' => 'Color',
            'status' => 'Status',
            'sort_order' => 'Sort Order',
        ];
    }
}
