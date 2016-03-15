<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Tdesign".
 *
 * @property integer $id
 * @property string $title
 * @property string $price
 * @property string $description
 * @property string $fileName
 * @property integer $categoryId
 * @property string $status
 */
class Tdesign extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Tdesign';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'price', 'description'], 'required'],
            [['price'], 'number'],
            [['description'], 'string'],
            [['categoryId'], 'integer'],
            [['title', 'fileName'], 'string', 'max' => 250],
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
            'title' => 'Title',
            'price' => 'Price',
            'description' => 'Description',
            'fileName' => 'File Name',
            'categoryId' => 'Category ID',
            'category' => 'My category',
            'status' => 'Status',
        ];
    }


    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Tcategories::className(), ['id' => 'categoryId']);
    }


}
