<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "order".
 *
 * @property string $id
 * @property string $customer_id
 * @property string $meal_id
 * @property integer $meal_quantity
 * @property string $order_date
 * @property double $amount
 * @property string $created_at
 * @property string $last_updated
 */
class Order extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'order';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['customer_id', 'meal_id', 'meal_quantity'], 'integer'],
            [['order_date', 'created_at', 'last_updated'], 'safe'],
            [['amount'], 'number']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'customer_id' => 'Customer ID',
            'meal_id' => 'Meal ID',
            'meal_quantity' => 'Meal Quantity',
            'order_date' => 'Order Date',
            'amount' => 'Amount',
            'created_at' => 'Created At',
            'last_updated' => 'Last Updated',
        ];
    }
}
