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
            'color' => $this->string(20)->notNull()->comment('Цвет'),
            'created' => $this->dateTime()->notNull()
                ->defaultExpression("FROM_UNIXTIME(UNIX_TIMESTAMP('2022-01-01 01:00:00') "
                    . " + FLOOR(RAND() * TIMESTAMPDIFF(SECOND,'2022-01-01 00:00:00', NOW())))"),
            'fallen' => $this->dateTime()->comment('Дата падения'),
            'consumed' => $this->tinyInteger()->notNull()->defaultValue(0)->comment('Сколько съели'),
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
