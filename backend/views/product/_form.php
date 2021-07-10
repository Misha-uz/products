<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use common\widgets\cropper\CropperWidget;

/* @var $this yii\web\View */
/* @var $model common\models\Product */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="product-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
            <?= $form->field($model, 'type_id')->dropDownList($type_list,['prompt' => 'Выберите тип']) ?>

        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'qty')->textInput([ 'type' => 'number']) ?>

            <?= $form->field($model, 'sku')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'status')->dropDownList(\common\models\constants\GeneralStatus::getList()) ?>
        </div>

        <?= $form->field($model, 'image')->widget(CropperWidget::className(), [
            'uploadUrl' => Url::toRoute('/product/upload-photo'),
            'prefixUrl' => Yii::getAlias('@assets_url/product/'),
            'width' => 400,
            'height' => 400,
//            'maxSize' => 1024*1024*50,
        ]) ?>
    
    </div>
    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
