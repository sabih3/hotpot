<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "meal_item".
 *
 * @property string $id
 * @property string $name
 * @property double $price
 * @property string $created_at
 * @property string $last_updated
 */
class MealItem extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'meal_item';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['price'], 'number'],
            [['created_at', 'last_updated'], 'safe'],
            [['name'], 'string', 'max' => 50],
            [['meal_id'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'meal_id' => 'Meal ID',
            'name' => 'Name',
            'price' => 'Price',
            'created_at' => 'Created At',
            'last_updated' => 'Last Updated',
        ];
    }
}
