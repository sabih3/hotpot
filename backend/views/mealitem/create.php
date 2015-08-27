<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\MealItem */

$this->title = 'Create Meal Item';
$this->params['breadcrumbs'][] = ['label' => 'Meal Items', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="meal-item-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'productImages' => $productImages,
    ]) ?>

</div>
