<?php
namespace frontend\controllers;

use Yii;
/*use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;*/


use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

use backend\models\Meal;
use backend\models\MealImage;
use backend\models\MealItem;
use backend\models\MealItemImage;
use backend\models\MealItemsManage;
use yii\db\Query;

/**
 * Site controller
 */
class DashboardController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['home', 'resturantmenu', 'dealpurchase', 'checkoutreponse', 'test'],
                        'allow' => true,
                        'roles' => ['?'],
                    ]
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
            ],
        ];
    }

     /**
     * @inheritdoc
     */
    public function actions() {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    public function actionHome()
    {
        return $this->render('home');
    }

    public function actionResturantmenu()
    {
        $from = strtotime(date('2015-07-25'));
        //$from = strtotime(date('Y-m-d'));
        $today = strtotime('+7 days');
        $difference = $today - $from;
        $daysDiff = floor($difference / (60 * 60 * 24));
        $sEndDate = date('Y-m-d', strtotime('+'.$daysDiff.' days'));

        //$datestr = date('Y-m-d', strtotime('-6 days'));

        $sStartDate = date("Y-m-d", strtotime(date('2015-07-25')));  
        $sEndDate = date("Y-m-d", strtotime($sEndDate));

        // Start the variable off with the start date  
        $aDays[] = $sStartDate;  

        // Set a 'temp' variable, sCurrentDate, with  
        // the start date - before beginning the loop  
        $sCurrentDate = $sStartDate;  

        // While the current date is less than the end date  
        while($sCurrentDate < $sEndDate){  
           // Add a day to the current date  
           $sCurrentDate = date("Y-m-d", strtotime("+1 day", strtotime($sCurrentDate)));  

           // Add this new day to the aDays array  
           $aDays[] = $sCurrentDate;  
        }  

        $meals = Meal::getMeal();
     
        $count = 0;
        $newArrayMealsByDays = [];

        if(!empty($meals)){
            foreach ($meals as $key => $value) {

               //echo $count++; 
                //foreach ($aDays as $dateKey => $dateValue) {
                    //$dayOfDeal = date('Y-m-d', $value['day']);
                    //if($dayOfDeal == $dateValue){
                        
                        $newArrayMealsByDays[$value['day']][$count]['id'] = $value['id'];
                        $newArrayMealsByDays[$value['day']][$count]['name'] = $value['name'];
                        $newArrayMealsByDays[$value['day']][$count]['mealImageUrl'] = $value['image_new_url'];
                        $newArrayMealsByDays[$value['day']][$count]['mealPrice'] = $value['meal_price'];
                        $getMealItems = MealItemsManage::find()->select(['item_id'])->where(['meal_id' => $value['id']])->asArray()->all();
          
                        if(!empty($getMealItems)){
                            foreach ($getMealItems as $key2 => $value2) {
                               
                                $query = new Query;
                                $query  ->select(['meal_item.*', 'meal_item_image.image_new_url', 'meal_item_image.image_org_url'])  
                                        ->from('meal_item')
                                        ->join( 'LEFT JOIN', 
                                                'meal_item_image',
                                                'meal_item_image.itemID = meal_item.id'
                                            )->where(['meal_item.id' => $value2['item_id']]);  
                                $command = $query->createCommand();
                                $data[] = $command->queryAll()[0]; 
                                
                            }
                            $newArrayMealsByDays[$value['day']][$count]['items'] = $data;
                            //array_values($newArrayMealsByDays[$dayOfDeal]);
                            unset($data);

                            $count++;
                        }
                    //}

                //} 
            }
        }
        // echo '<pre>';
        // print_r($newArrayMealsByDays);die;
       // die;
        return $this->render('_resturant_menu', ['data'=>$newArrayMealsByDays]);
    }

    public function x_week_range($date) {
        $ts = strtotime($date);
        $start = (date('w', $ts) == 0) ? $ts : strtotime('last sunday', $ts);
        return array(date('Y-m-d', $start),
                     date('Y-m-d', strtotime('next saturday', $start)));
    }

    public function actionDealpurchase($id){
        $mealDetail = [];
        // echo '<pre>';
        // print_r(Yii::$app->session->get('checkOut'));die;
        // $query = new Query;
        // $query  ->select(['meal.*', 'meal_image.image_new_url', 'meal_image.image_org_url'])  
        //         ->from('meal')
        //         ->join( 'LEFT JOIN', 
        //                 'meal_image',
        //                 'meal_image.meal_id = meal.id'
        //             )->where(['meal.id' => $id]); 
        // $command = $query->createCommand();
        // $data = $command->queryAll()[0]; 

        $getMealItems = MealItemsManage::find()->select(['item_id'])->where(['meal_id' => $id])->asArray()->all();

        $query = new Query;
        $query  ->select(['meal.*', 'meal_image.image_new_url', 'meal_image.image_org_url'])  
                ->from('meal')
                ->join( 'LEFT JOIN', 
                        'meal_image',
                        'meal_image.meal_id = meal.id'
                    )->where(['meal.id' => $id]); 
        $command = $query->createCommand();
        $mealDetail[$id] = $command->queryAll()[0]; 

        $dataMealItem = [];
        
        if(!empty($getMealItems)){
            $count = 0;
            foreach ($getMealItems as $key => $value) {
                
                $query2 = new Query;
                $query2  ->select(['meal_item.*', 'meal_item_image.image_new_url', 'meal_item_image.image_org_url'])  
                        ->from('meal_item')
                        ->join( 'LEFT JOIN', 
                                'meal_item_image',
                                'meal_item_image.itemID = meal_item.id'
                            )->where(['meal_item.id' => $value['item_id']]);  
                $command = $query2->createCommand();
                $dataMealItem[] = $command->queryAll()[0]; 
            }
            $mealDetail[$id]['items'] = $dataMealItem;
        }

        return $this->render('deal_detail', ['data'=>$mealDetail]);
    }

    public function actionCheckoutreponse(){

        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        
        $request = Yii::$app->request;

        $checkOut = [];

        $id = $request->post('id');
        $qty = $request->post('qty');
        // $id = 3;
        // $qty= 3;
        
        $getMealItems = MealItemsManage::find()->select(['item_id'])->where(['meal_id' => $id])->asArray()->all();

        $query = new Query;
        $query  ->select(['meal.*', 'meal_image.image_new_url', 'meal_image.image_org_url'])  
                ->from('meal')
                ->join( 'LEFT JOIN', 
                        'meal_image',
                        'meal_image.meal_id = meal.id'
                    )->where(['meal.id' => $id]); 
        $command = $query->createCommand();
        $checkOut[$id] = $command->queryAll()[0]; 

        $checkOut[$id]['qty'] = $qty;

        if(!empty($getMealItems)){
            $count = 0;
            foreach ($getMealItems as $key => $value) {
                
                $query2 = new Query;
                $query2  ->select(['meal_item.*', 'meal_item_image.image_new_url', 'meal_item_image.image_org_url'])  
                        ->from('meal_item')
                        ->join( 'LEFT JOIN', 
                                'meal_item_image',
                                'meal_item_image.itemID = meal_item.id'
                            )->where(['meal_item.id' => $value['item_id']]);  
                $command = $query2->createCommand();
                $dataMealItem[] = $command->queryAll()[0]; 
            }
            $checkOut[$id]['items'] = $dataMealItem;
        }

        $totalPrice = 0;
        foreach ($checkOut[$id]['items'] as $key => $value) {
            $totalPrice += $value['price'];
        }

        $totalPrice = $totalPrice * $qty;
        $checkOut[$id]['totalPrice'] = $totalPrice;

  // echo '<pre>';
  //       print_r($totalPrice);die;
        Yii::$app->session->set('checkOut', $checkOut);

        return 'success';
        
        // if(!empty($itemInArray)){
        //     $data[0]['item'] = implode(',', $itemInArray);
        // }
        // else{
        //     $data[0]['item'] = 'not selected item';
        // }

    }

    public function actionTest(){
        return $this->render('test-receipt');
    }
}
