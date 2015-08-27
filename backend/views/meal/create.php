<?php

use yii\helpers\Html;
use dosamigos\fileupload\FileUpload;


/* @var $this yii\web\View */
/* @var $model backend\models\Meal */

$this->title = 'Create Meal';
$this->params['breadcrumbs'][] = ['label' => 'Meals', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="meal-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'productImages' => $productImages,
        'selected' => [],
        'data' => $data,
    ]) ?>

</div>
