<?php

use yii\db\Migration;

/**
 * Class m210709_092806_product
 */
class m210709_092806_product extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }
        $this->createTable('{{%product}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'image' => $this->string()->notNull(),
            'sku' => $this->string()->notNull(),
            'qty' => $this->integer()->notNull(),
            'type_id' => $this->integer()->notNull(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
            'status' => $this->integer()->notNull(),
            'user_id' => $this->integer()->notNull(),
        ], $tableOptions);

        $this->createIndex('product_index_1', '{{%product}}', 'user_id');
        $this->addForeignKey('product_fk_1', '{{%product}}', 'user_id', '{{%user}}', 'id', 'cascade','cascade');

        $this->createIndex('product_index_2', '{{%product}}', 'type_id');
        $this->addForeignKey('product_fk_2', '{{%product}}', 'type_id', '{{%product_type}}', 'id', 'cascade','cascade');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('product_fk_1', '{{%product}}');
        $this->dropIndex('product_index_1', '{{%product}}');
        $this->dropForeignKey('product_fk_2', '{{%product}}');
        $this->dropIndex('product_index_2', '{{%product}}');
        $this->dropTable('{{%product}}');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210709_092806_product cannot be reverted.\n";

        return false;
    }
    */
}
