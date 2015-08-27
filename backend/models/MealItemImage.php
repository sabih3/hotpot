<?php

namespace backend\models;

use Yii;

use yii\web\UploadedFile;

/**
 * This is the model class for table "meal_item_image".
 *
 * @property integer $id
 * @property integer $itemId
 * @property string $image_original_url
 * @property string $image_new_url
 * @property string $created_at
 * @property string $last_updated
 */
class MealItemImage extends \yii\db\ActiveRecord
{
    /**
     * @var UploadedFile
     */
    public $image;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'meal_item_image';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['image'], 'safe'],
            [['image'], 'file', 'extensions'=>'jpg, gif, png'],
            [['itemId'], 'integer'],
            [['created_at', 'last_updated'], 'safe'],
            [['image_org_url', 'image_new_url'], 'string', 'max' => 255],
            [['image_org_url'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'itemId' => 'Item ID',
            'image_org_url' => 'Image Original Url',
            'image_new_url' => 'Image New Url',
            'created_at' => 'Created At',
            'last_updated' => 'Last Updated',
        ];
    }
}
