<?php

namespace backend\controllers;

use Yii;
use backend\models\Meal;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use backend\models\MealImage;
use yii\web\UploadedFile;
use yii\db\Query;
use backend\models\MealItem;
use backend\models\MealItemsManage;

/**
 * MealController implements the CRUD actions for Meal model.
 */
class MealController extends Controller
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
     * Lists all Meal models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Meal::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Meal model.
     * @param string $id
     * @return mixed
     */
    public function actionView($id)
    {

        // $getMealItems = MealItemsManage::find(['meal_id' => $id])->select(['item_id'])->all();
        $getMealItems = MealItemsManage::find()->select(['item_id'])->where(['meal_id' => $id])->asArray()->all();
// echo '<pre>';
// print_r($getMealItems);die;
        $query = new Query;
        $query  ->select(['meal.*', 'meal_image.image_new_url', 'meal_image.image_org_url'])  
                ->from('meal')
                ->join( 'LEFT JOIN', 
                        'meal_image',
                        'meal_image.meal_id = meal.id'
                    )->where(['meal.id' => $id]); 
        $command = $query->createCommand();
        $data = $command->queryAll(); 

        if(!empty($getMealItems)){
            $count = 0;
            foreach ($getMealItems as $key => $value) {
                // $item_name = MealItem::findOne(['id' => $value['item_id']])->select(['name']);
                $item_name = MealItem::find()->where(['id' => $value['item_id']])->select(['name'])->asArray()->one();
                $itemInArray[$count] = $item_name['name'];
                $count++;
            }
        }

        // foreach ($item_name as $key => $value) {
        //     implode(',', $value);
        // }
        // implode(',', $value);
        
        if(!empty($itemInArray)){
            $data[0]['item'] = implode(',', $itemInArray);
        }
        else{
            $data[0]['item'] = 'not selected item';
        }

        // echo '<pre>';
        // print_r($data);die;

        $data[0]['day'] =  Yii::$app->params['lunchDays'][$data[0]['day']];
        $data[0]['deal_status'] =  (!empty($data[0]['deal_status']) ? 'Activated.' : 'De-activated.');
        $data[0]['deal_closing_time'] = \Yii::$app->formatter->asTime($data[0]['deal_closing_time'], "php:Y-m-d H:i:s"); # 2014-10-03 14:09:20  
        $data[0]['created_at'] = \Yii::$app->formatter->asTime($data[0]['created_at'], "php:Y-m-d H:i:s"); # 2014-10-03 14:09:20  

        return $this->render('view', [
            'model' => $data[0],
        ]);
    }

    /**
     * Creates a new Meal model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Meal();
        $productImages = new MealImage();

        $data = [];

        $getItems = MealItem::find()->all();
        foreach ($getItems as $key => $value) {
            $data[$value->id] = $value->name;
        }

        //Yii::$app->params['uploadPath'] = Yii::$app->basePath . '/uploads/';

        //below code is where you will do your own stuff. This is just a sample code need to do work on saving files
        if ($model->load(Yii::$app->request->post())) {
            $dateTime = $model->deal_closing_time;
            //$model->day = $model->day;
            $model->deal_closing_time = strtotime($dateTime);
            $model->created_at = time();
            //$model->deal_status;

            if($model->save()){
                $productImages->meal_id = $model->id;
                // upload image by this method
                $this->uploadImage($productImages);
                $mealItems = Yii::$app->request->post('meal_id');

                if(!empty($mealItems)){
                    foreach ($mealItems as $key => $itemID) {
                        $mealItemsManage = new MealItemsManage();
                        $mealItemsManage->meal_id = $model->id;
                        $mealItemsManage->item_id = $itemID;
                        $mealItemsManage->created_at = time();
                        
                        if($mealItemsManage->save()){

                        }
                    }
                }

                return $this->redirect(['view', 'id' => $model->id]);
            }
        } else {
            return $this->render('create', [
                'model' => $model,
                'productImages' => $productImages,
                'data' => $data,
            ]);
        }
    }

    /**
     * Updates an existing Meal model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $productImages = MealImage::findOne(['meal_id'=>$id]);

        $getItems = MealItem::find()->all();
        foreach ($getItems as $key => $value) {
            $data[$value->id] = $value->name;
        }

        $getMealItems = MealItemsManage::find()->select(['item_id'])->where(['meal_id' => $id])->asArray()->all();
        
        $selected = [];

        if($getMealItems){
            $count = 0;
            foreach ($getMealItems as $key => $value) {
                $itemInArray[] = $value['item_id'];
                $count++;
            }
            $selected = $itemInArray;
        }
   
        //$selectedFlip = array_flip($selected);
      
        

        if ($model->load(Yii::$app->request->post())) {
            $dateTime = $model->deal_closing_time;
            //$model->day = $model->day;
            $model->deal_closing_time = strtotime($dateTime);
            $model->created_at = time();
            //$model->deal_status;
            if($model->save()){
        
                if(!empty($productImages)){
                    //$productImages->meal_id = $model->id;
                    $this->uploadImage($productImages);
                }else{

                }

                $mealItems = Yii::$app->request->post('meal_id');
                
                if(!empty($mealItems) && !empty($itemInArray)){
                    $diffItemsNew = array_diff($mealItems, $itemInArray);
                    $diffItemsDeleted = array_diff($itemInArray, $mealItems);
                }
                elseif(!empty($mealItems)){
                    foreach ($mealItems as $key => $itemID) {
                        $mealItemsManage = new MealItemsManage();
                        $mealItemsManage->meal_id = $model->id;
                        $mealItemsManage->item_id = $itemID;
                        $mealItemsManage->created_at = time();
                        
                        if($mealItemsManage->save()){

                        }
                    } 
                }
  
                if(!empty($diffItemsNew)){
  
                    foreach ($diffItemsNew as $key => $itemID) {
                        $mealItemsManage = new MealItemsManage();
                        $mealItemsManage->meal_id = $model->id;
                        $mealItemsManage->item_id = $itemID;
                        $mealItemsManage->created_at = time();
                        
                        if($mealItemsManage->save()){

                        }
                    }
                }
           
                if(!empty($diffItemsDeleted)){
  
                    foreach ($diffItemsDeleted as $key => $itemID) {
                        $mealItemsManage = MealItemsManage::findOne(['meal_id' => $id, 'item_id' => $itemID]);

                        if($mealItemsManage->delete()){

                        }
                    }
                }


                return $this->redirect(['view', 'id' => $model->id]);
            }
        } else {
            $model->deal_closing_time = \Yii::$app->formatter->asTime($model->deal_closing_time, "php:Y-m-d H:i:s"); # 2014-10-03 14:09:20
            return $this->render('update', [
                'model' => $model,
                'productImages' => $productImages,
                'data' => $data,
                'selected' => $selected,
            ]);
        }
    }

    /**
     * Deletes an existing Meal model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        if($this->findModel($id)->delete()){
            $productImages = MealImage::findOne(['meal_id'=>$id]);
            if(!empty($productImages)){
                $image = Yii::$app->params['uploadPath'] . $productImages->image_new_url;
                if (unlink($image)) {
                    $productImages->delete();
                }
            }

            $mealItemManage = MealItemsManage::findOne(['meal_id' => $id]);
            if(!empty($mealItemManage)){
                if(MealItemsManage::deleteAll(['meal_id' => $id])){
                    
                }
            }
        }

        return $this->redirect(['index']);
    }

    /**
     * Finds the Meal model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Meal the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Meal::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionUpload()
    {
        $model = new UploadForm();

        if (Yii::$app->request->isPost) {
            $model->imageFile = UploadedFile::getInstance($model, 'imageFile');
            if ($model->upload()) {
                // file is uploaded successfully
                return;
            }
        }

        return $this->render('upload', ['model' => $model]);
    }
    public function actionUploadfile()
    {
        // echo 'hello';die;
        $model = new UploadForm();

        //if (Yii::$app->request->isPost) {

            $imageFile = UploadedFile::getInstance($model, 'imageFile');
            var_dump($imageFile);die;
            if ($model->upload()) {
                // file is uploaded successfully
                return;
            }
        //}

        return $this->render('upload', ['model' => $model]);
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
