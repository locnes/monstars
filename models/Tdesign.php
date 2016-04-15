<?php

namespace app\models;


use Yii;
use yii\helpers\ArrayHelper;
use yii\web\UploadedFile;


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
            [['title', 'price', 'description', 'categoryId', 'status'], 'required'],
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
     * Process upload of image
     *
     * @return mixed the uploaded image instance
     */
    public function uploadImage()
    {
        // get the uploaded file instance. for multiple file uploads
        // the following data will return an array (you may need to use
        // getInstances method)
        $image = UploadedFile::getInstance($this, 'fileName');

        // if no image was uploaded abort the upload
        if (empty($image)) {
            return false;
        }

        // store the source file name
        $this->fileName = $image->name;

        // the uploaded image instance
        return $image;
    }



    /**
     * fetch stored image url
     * @return string
     */
    public function getImageUrl()
    {
        // return a default image placeholder if your source avatar is not found
        $avatar = isset($this->fileName) ? $this->fileName : 'tShirt-default.jpg';
        //return Yii::$app->params['uploadUrl'] . $avatar;
        return Yii::getAlias('@web') . "/uploads/" . $avatar;
    }


    /**
     * fetch stored image file name with complete path
     * @return string
     */
    public function getImageFile()
    {
        return isset($this->fileName) ? Yii::getAlias('@web') . "/uploads/" . $this->fileName : null;
    }


    /**
     * fetch stored image file name with absolute path
     * @return string
     */
    public function getAbsoluteImageFilePath()
    {
        return isset($this->fileName) ? Yii::getAlias('@webroot') . "/uploads/" . $this->fileName : null;
    }


    /**
     * Process deletion of image
     *
     * @return boolean the status of deletion
     */
    public function deleteImage()
    {
        $file = $this->getImageFile();  // this doesn't work
        //$file = $this->getAbsoluteImageFilePath();  // this works

        // check if file exists on server
        if (empty($file) || !file_exists($file)) {
            return false;
        }

        // check if uploaded file can be deleted on server
        if (!unlink($file)) {
            return false;
        }

        // if deletion successful, reset your file attributes (from Tdesign model)
        $this->fileName = null;

        return true;
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
