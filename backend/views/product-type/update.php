<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\ProductType */

$this->title = 'Редактировать тип продукта: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Типы продуктов', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Редактировать';
?>
<div class="product-type-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
