<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Tcategories".
 *
 * @property integer $id
 * @property string $cat_name
 * @property string $cat_discr
 * @property string $status
 * @property integer $sort_order
 */
class Tcategories extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Tcategories';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cat_name', 'cat_discr', 'sort_order'], 'required'],
            [['sort_order'], 'integer'],
            [['cat_name', 'cat_discr'], 'string', 'max' => 2],
            [['status'], 'string', 'max' => 1]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'cat_name' => 'Cat Name',
            'cat_discr' => 'Cat Discr',
            'status' => 'Status',
            'sort_order' => 'Sort Order',
        ];
    }
}
