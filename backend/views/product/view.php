<?php

use common\models\constants\GeneralStatus;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Product */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Продукты', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="product-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Редактировать', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы уверены, что хотите удалить этот элемент?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
//            'id',
            'name',
            [
                'attribute' => 'image',
                'format' => 'html',
                'value' => function ($model) {
                    return Html::img(Yii::getAlias('@assets_url').'/product/'.$model->image,
                        ['width' => '100px']);
                },
            ],
            'sku',
            'qty',
            [
                'attribute' => 'type_id',
                'value' => function($model){
                    return $model->type->name;
                }
            ],
            'created_at:date',
            'updated_at:date',
            [
                'attribute' => 'status',
                'value' => function($model){
                    return GeneralStatus::getString($model->status);
                }
            ],
            [
                'attribute' => 'user_id',
                'value' => function($model){
                    return $model->user->username;
                }
            ],

        ],
    ]) ?>

</div>
