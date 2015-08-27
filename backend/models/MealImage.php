<?php

namespace backend\models;

use Yii;

use yii\web\UploadedFile;

/**
 * This is the model class for table "meal_image".
 *
 * @property integer $id
 * @property integer $meal_id
 * @property string $image_org_url
 * @property string $image_new_url
 * @property string $created_at
 * @property string $last_updated
 */
class MealImage extends \yii\db\ActiveRecord
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
        return 'meal_image';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['image'], 'safe'],
            [['meal_id'], 'integer'],
            [['created_at', 'last_updated'], 'safe'],
            [['image_org_url', 'image_new_url'], 'string', 'max' => 255],
            [['image'], 'file', 'extensions'=>'jpg, gif, png'],
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
            'image_org_url' => 'Image Org Url',
            'image_new_url' => 'Image New Url',
            'created_at' => 'Created At',
            'last_updated' => 'Last Updated',
        ];
    }

    public function upload()
    {
        if ($this->validate()) {
            $this->image->saveAs('uploads/' . $this->image->baseName . '.' . $this->image->extension);
            return true;
        } else {
            return false;
        }
    }
}
