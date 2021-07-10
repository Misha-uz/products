<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\ProductType */

$this->title = 'Создать тип продукта';
$this->params['breadcrumbs'][] = ['label' => 'Типы продуктов', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-type-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
