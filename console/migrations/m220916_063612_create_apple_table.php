<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%apple}}`.
 */
class m220916_063612_create_apple_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%apple}}', [
            'id' => $this->primaryKey(),
            'color' => $this->string(7)->comment('Цвет'),
            'created' => $this->dateTime()->defaultExpression('CURRENT_TIMESTAMP'),
            'fallen' => $this->dateTime()->comment('Дата падения'),
            'status' => $this->tinyInteger()->comment('Состояние'),
            'consumed' => $this->tinyInteger()->comment('Сколько съели'),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%apple}}');
    }
}
