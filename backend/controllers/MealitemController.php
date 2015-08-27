<?php

namespace backend\controllers;

use Yii;
use backend\models\MealItem;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use backend\models\MealItemImage;
use yii\web\UploadedFile;
use yii\db\Query;

/**
 * MealitemController implements the CRUD actions for MealItem model.
 */
class MealitemController extends Controller
{
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
     * Lists all MealItem models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => MealItem::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single MealItem model.
     * @param string $id
     * @return mixed
     */
    public function actionView($id)
    {
        $query = new Query;
        $query  ->select(['meal_item.*', 'meal_item_image.image_new_url'])  
                ->from('meal_item')
                ->join( 'LEFT JOIN', 
                        'meal_item_image',
                        'meal_item_image.itemId = meal_item.id'
                    )->where(['meal_item.id' => $id]); 
        $command = $query->createCommand();
        $data = $command->queryAll();  
        // echo '<pre>';
        // print_r($data);die;             

 /*       return $this->render('view', [
            'model' => $this->findModel($id),
            'productImages' => $productImages,
        ]);*/

        return $this->render('view', [
            'model' => $data[0],
        ]);
    }

    /**
     * Creates a new MealItem model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new MealItem();
        
        $model->created_at = date('Y-m-d h:i:s');

        $productImages = new MealItemImage();

        //Yii::$app->params['uploadPath'] = Yii::$app->basePath . '/uploads/';

        //below code is where you will do your own stuff. This is just a sample code need to do work on saving files
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $productImages->itemId = $model->id;
            // upload image by this method
            $this->uploadImage($productImages);

            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'productImages' => $productImages,
            ]);
        }
    }

    /**
     * Updates an existing MealItem model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        $productImages = MealItemImage::findOne(['itemId'=>$id]);

        // echo '<pre>';
        // print_r($productImages);die;
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            
            if(!empty($productImages)){
                //$productImages->meal_id = $model->id;
                $this->uploadImage($productImages);
            }else{

            }

            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
                'productImages' => $productImages,
            ]);
        }
    }

    /**
     * Deletes an existing MealItem model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        if($this->findModel($id)->delete()){
            $productImages = MealItemImage::findOne(['itemId'=>$id]);
            if(!empty($productImages)){
                $image = Yii::$app->params['uploadPath'] . $productImages->image_new_url;
                if (unlink($image)) {
                    $productImages->delete();
                }
            }
        }

        return $this->redirect(['index']);
    }

    /**
     * Finds the MealItem model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return MealItem the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = MealItem::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    protected function uploadImage($model)
    {
        $image = UploadedFile::getInstance($model, 'image');

        if(!empty($image)){

            // store the source file name
            $model->image_org_url = $image->name;
            $ext = end((explode(".", $image->name)));
 
            // generate a unique file name
            $model->image_new_url = Yii::$app->security->generateRandomString().".{$ext}";
 
            // the path to save file, you can set an uploadPath
            // in Yii::$app->params (as used in example below)
            $path = Yii::$app->params['uploadPath'] . $model->image_new_url;
 
            if($image->saveAs($path)){
                if($model->save()){
                    return true;
                }
                //return $this->redirect(['view', 'id'=>$model->_id]);
            } else {
                // error in saving model
            }
        }
        else{
            
            if($model->save()){
                return true;
            }
        }
    }
}
