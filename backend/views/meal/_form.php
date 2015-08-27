<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
//use dosamigos\fileupload\FileUploadUI;

use kartik\file\FileInput;

use yii\helpers\Url;
use kartik\datetime\DateTimePicker;
use yii\bootstrap\Modal;
use kartik\select2\Select2;


// $data2 = [
//     0 => "red",
//     "green" => "green",
//     "blue" => "blue",
//     "orange" => "orange",
//     "white" => "white",
//     "black" => "black",
//     "purple" => "purple",
//     "cyan" => "cyan",
//     "teal" => "teal"
// ];
// $selected = [2,7];
// echo '<pre>';
// print_r($selected);die;
/* @var $this yii\web\View */
/* @var $model backend\models\Meal */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="meal-form">
<div class="row">
    <div class="col-lg-7 col-lg-offset-0">
    <br />
    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?php echo '<label class="control-label">Add Items</label>';
        echo Select2::widget([
            'name' => 'meal_id',
            'value' => $selected,
            'data' => $data,
            'options' => ['placeholder' => 'Select an item ...', 'multiple' => true],
            'pluginOptions' => [
                'tags' => true,
                'maximumInputLength' => 10
            ],
        ]);
?><br />

<?php
// Normal select with ActiveForm & model
echo $form->field($model, 'day')->widget(Select2::classname(), [
    'data' => Yii::$app->params['lunchDays'],
    //'language' => 'de',
    'options' => ['placeholder' => 'Select a day of meal ...'],
    'pluginOptions' => [
        'allowClear' => true
    ],
]);
?>

    <?php 
    echo $form->field($model, 'deal_closing_time')->widget(DateTimePicker::classname(), [
    'options' => ['placeholder' => 'Enter deal closing time ...'],
    'pluginOptions' => [
        'autoclose' => true,
        'format' => 'mm/dd/yyyy hh:ii:ss'
    ]
]);?>

  
    <?= $form->field($model, 'meal_price')->textInput()->hint('')->label('Price') ?>

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
    <!-- CHECKBOX BUTTON WITH LABEL OPTIONS, DISABLED AND STYLE PROPERTIES -->
<?= $form->field($model, 'deal_status')->checkbox(array(
                                'label'=>'',
                                'labelOptions'=>array('style'=>'padding:5px;'),
                                'disabled'=>false                                
                                ))
                                ->label('Active');
/*echo FileInput::widget([
    'name' => 'imageFile[]',
    'options'=>[
        'multiple'=>false
    ],
    'pluginOptions' => [
        'uploadUrl' => Url::to(['/meal/uploadfile']),
        // 'uploadExtraData' => [
        //     'album_id' => 20,
        //     'cat_id' => 'Nature'
        // ],
        'maxFileCount' => 10
    ]
]);*/

// Normal select with ActiveForm & model
// Multiple select without model


?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>
    </div>
    
</div>

</div>
