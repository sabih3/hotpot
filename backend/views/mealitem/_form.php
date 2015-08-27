<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
//use dosamigos\fileupload\FileUploadUI;

use kartik\file\FileInput;

use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model backend\models\MealItem */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="meal-item-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'price')->textInput() ?>

    <?php 
	echo $form->field($productImages, 'image')->widget(FileInput::classname(), [
	        'options' => ['multiple' => false, 'accept' => 'image/*'],
	        'pluginOptions' => [
	            'previewFileType' => 'image',
	            //change here: below line is added just to hide upload button. Its up to you to add this code or not.
	            'showUpload' => false
	        ],
	    ]);
	?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
