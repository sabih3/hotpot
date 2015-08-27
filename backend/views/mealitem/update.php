<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\MealItem */

$this->title = 'Update Meal Item: ' . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Meal Items', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="meal-item-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'productImages' => $productImages,
    ]) ?>

</div>
