<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "meal_items_manage".
 *
 * @property integer $id
 * @property integer $meal_id
 * @property integer $item_id
 * @property integer $created_at
 * @property string $last_updated
 */
class MealItemsManage extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'meal_items_manage';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['meal_id', 'item_id', 'created_at'], 'required'],
            [['meal_id', 'item_id', 'created_at'], 'integer'],
            [['last_updated'], 'safe']
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
            'item_id' => 'Item ID',
            'created_at' => 'Created At',
            'last_updated' => 'Last Updated',
        ];
    }
}
