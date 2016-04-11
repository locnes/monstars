<?php

namespace app\models;


use Yii;
use yii\helpers\ArrayHelper;

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
     * @var mixed image the attribute for rendering the file input
     * widget for upload on the form
     */
    public $image;


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
            [['fileName'], 'safe'],
            [['fileName'], 'file', 'extensions' => 'jpg, jpeg, gif, png'],
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
            'fileName' => 'File name',
            'categoryId' => 'Category',
            'status' => 'Status',
        ];
    }


    /**
     * @return \yii\db\ActiveQuery
     * A relation to connect Tdesign table to Tcategories
     */
    public function getCategory()
    {
        return $this->hasOne(Tcategories::className(), ['id' => 'categoryId']);
    }


    public static function getCategoryList()
    {
        $options = Tcategories::find()->asArray()->all();
        return Arrayhelper::map($options, 'id', 'cat_name');
    }

    
}
