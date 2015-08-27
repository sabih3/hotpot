<?php
namespace backend\models;

use Yii;
use yii\web\UploadedFile;

class UploadForm extends \yii\db\ActiveRecord
{
    /**
     * @var UploadedFile
     */
    public $image_path;

    public function rules()
    {
        return [
            [['image_path'], 'file', 'extensions' => 'png, jpg'],
        ];
    }

    public function upload()
    {
        if ($this->validate()) {
            $this->image_path->saveAs('uploads/' . $this->image_path->baseName . '.' . $this->image_path->extension);
            return true;
        } else {
            return false;
        }
    }
}