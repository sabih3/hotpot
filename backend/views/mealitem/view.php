<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model backend\models\Meal */


$this->title = $model['name'];
$this->params['breadcrumbs'][] = ['label' => 'Meal Item', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="meal-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model['id']], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model['id']], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'price',
            'created_at',
            'last_updated',
            [
                'attribute'=>'image_new_url',
                'value'=>\yii\helpers\Html::img(Yii::$app->params['fileUploadUrl'].'/uploads/' . $model['image_new_url'],['width'=>'100','height'=>'100']),
                //'value'=>('<img src =' .'uploads/' . $model->photo . ' height="100" width="100"' .   '>')
                //'value'=>Yii::$app->basePath . '/uploads/'.$model['image_new_url'],
                'format' => 'html',
            ],
        ],
    ]) ?>

</div>
