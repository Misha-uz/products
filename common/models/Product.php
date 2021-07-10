<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "product".
 *
 * @property int $id
 * @property string $name
 * @property string $image
 * @property string $sku
 * @property int $qty
 * @property int $type_id
 * @property int $created_at
 * @property int $updated_at
 * @property int $status
 * @property int $user_id
 *
 * @property User $user
 * @property ProductType $type
 */
class Product extends BaseTimestamp
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'product';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'image', 'sku', 'qty', 'type_id',], 'required'],
            [['qty', 'type_id', 'created_at', 'updated_at', 'status', 'user_id'], 'integer'],
            [['name', 'image', 'sku'], 'string', 'max' => 255],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
            [['type_id'], 'exist', 'skipOnError' => true, 'targetClass' => ProductType::className(), 'targetAttribute' => ['type_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Название',
            'image' => 'Изображение',
            'sku' => 'SKU',
            'qty' => 'Кол-во на складе',
            'type_id' => 'Тип товара',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'status' => 'Статус',
            'user_id' => 'User ID',
        ];
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    /**
     * Gets query for [[Type]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getType()
    {
        return $this->hasOne(ProductType::className(), ['id' => 'type_id']);
    }
}
