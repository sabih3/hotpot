<?php

namespace backend\models;

use Yii;

use yii\db\Query;

/**
 * This is the model class for table "meal".
 *
 * @property string $id
 * @property string $item_id
 * @property string $name
 * @property string $day
 * @property double $meal_price
 * @property string $created_at
 * @property string $last_updated
 */
class Meal extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'meal';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['day', 'created_at', 'last_updated', 'deal_closing_time', 'deal_status'], 'safe'],
            [['meal_price'], 'number'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'day' => 'Day',
            'meal_price' => 'Meal Price',
            'created_at' => 'Created At',
            'last_updated' => 'Last Updated',
            'deal_closing_time' => 'Deal Closing Time',
            'deal_status' => 'Status',
        ];
    }

    public static function getMeal(){

        $query = new Query;
        $query  ->select(['meal.*', 'meal_image.image_new_url', 'meal_image.image_org_url'])  
                ->from('meal')
                ->join( 'LEFT JOIN', 
                        'meal_image',
                        'meal_image.meal_id = meal.id'
                    )
                ->where(['deal_status'=>1])
                ; 
        $command = $query->createCommand();
        $data = $command->queryAll(); 

        return $data;
       
    }
}
