<?php

namespace app\controllers;

use app\models\Tdesign;
use app\models\TdesignSearch;
use Yii;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\UploadedFile;

/**
 * TdesignController implements the CRUD actions for Tdesign model.
 */
class TdesignController extends Controller
{

    public $enableCsrfValidation = false;


    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Tdesign models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TdesignSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Tdesign model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Tdesign model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
//    public function actionCreate()
//    {
//        $model = new Tdesign();
//
//        if ($model->load(Yii::$app->request->post()) && $model->save()) {
//            return $this->redirect(['view', 'id' => $model->id]);
//        } else {
//            return $this->render('create', [
//                'model' => $model,
//            ]);
//        }
//    }
    public function actionCreate()
    {
        $model = new Tdesign();

        if ($model->load(Yii::$app->request->post())) {
            // get the uploaded file instance. for multiple file uploads
            // the following data will return an array
            $image = UploadedFile::getInstance($model, 'fileName');

            // store the source file name
            $model->fileName = $image->name;

            // generate a unique file name (not using for now)
            //$avatar = Yii::$app->security->generateRandomString().".{$ext}";

            // the path to save file, you can set an uploadPath
            // in Yii::$app->params (as used in example below)
            $path = $model->getAbsoluteImageFilePath();
            //$path = Yii::$app->basePath . "/web/uploads/" . $image->name;

            if ($model->save()) {
                $image->saveAs($path);
                return $this->redirect(['view', 'id' => $model->id]);
            } else {
                // error in saving model
            }
        }
        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Tdesign model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
//    public function actionUpdate($id)
//    {
//        $model = $this->findModel($id);
//
//        if ($model->load(Yii::$app->request->post()) && $model->save()) {
//            return $this->redirect(['view', 'id' => $model->id]);
//        } else {
//            return $this->render('update', [
//                'model' => $model,
//            ]);
//        }
//    }

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        $originalFile = $model->getAbsoluteImageFilePath();
        $originalFileName = $model->fileName;

        if ($model->load(Yii::$app->request->post())) {
            // process uploaded image file instance
            $image = $model->uploadImage();

            // revert back if no valid file instance uploaded
            if ($image === false) {
                $model->fileName = $originalFileName;
            }

            if ($model->save()) {
                // upload only if valid uploaded file instance found
                if ($image !== false) { // check for existence of new image
                    if (@!unlink($originalFile)) { // If we can't remove original file because it doesn't exist
                        Yii::$app->session->setFlash('warning', "There was no original file (" .
                            $originalFileName . ") to be removed from the filesystem.");
                    } else {
                        // Swapped out original image for a new one; let's tell the user this
                        Yii::$app->session->setFlash('success', "Swapped one image out for another!");
                    }
                    $path = $model->getAbsoluteImageFilePath();
                    $image->saveAs($path);
                }
                Yii::$app->session->setFlash('info', "Sucessfully updated this T-shirt design!");
                return $this->redirect(['view', 'id' => $model->id]);
            } else {
                // error in saving model
                Yii::$app->session->setFlash('danger', "Couldn't save the Tdesign model for \"" .
                    $model->title . "\" on update action.");
                return $this->redirect(['index']);
            }
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }


    /**
     * Deletes an existing Tdesign model, along with related image (fileName).
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);

        // validate deletion and on failure process any exception 
        // e.g. display an error message 
        if ($model->deleteImage()) {
            if ($model->delete()) {
                Yii::$app->session->setFlash('success', 'Successfully removed "' . $model->title . '" 
                T-shirt design.');
                return $this->redirect(['index']);
            }
        } else {
            Yii::$app->session->setFlash('danger', 'Error deleting related image for "' . $model->title . '" 
                T-shirt design. Hence the design itself could not be deleted.');
            return $this->redirect(['index']);
            //die("couldn't delete the related image!!");
        }
    }


    /**
     * Finds the Tdesign model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Tdesign the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Tdesign::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
