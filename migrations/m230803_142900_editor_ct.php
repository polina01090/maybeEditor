<?php

use yii\db\Migration;

/**
 * Class m230803_142900_editor_ct
 */
class m230803_142900_editor_ct extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('users', [
            'id' => $this->primaryKey(),
            'login' => $this->string(100)->notNull(),
            'password' => $this->string(255)->notNull(),
            'username' => $this->string(100)->notNull(),
        ]);
        $this->insert('users', [
            'id' => $this->primaryKey(),
            'login' => 'admin',
            'password' => '$2y$10$Gs3DY8nBMjfG4QVRsY0rruLfQX.x8W/M9/ZKit624aNggwzA7QArm',
            'username' => 'admin',
        ]);
        $this->createTable('pictures', [
            'id' => $this->primaryKey(),
            'name' => $this->string(100)->notNull(),
            'url' => $this->text()->notNull(),
            'user_id' => $this->integer()->notNull()
        ]);
        $this->addForeignKey(
            'fk-pictures-user_id',
            'pictures',
            'user_id',
            'users',
            'id',
            'CASCADE',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {

    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230803_142900_editor_ct cannot be reverted.\n";

        return false;
    }
    */
}
