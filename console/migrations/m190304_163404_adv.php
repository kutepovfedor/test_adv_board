<?php

use yii\db\Migration;

/**
 * Class m190304_163404_adv
 */
class m190304_163404_adv extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->execute("CREATE TABLE `adv` (
            `id` INT(11) NOT NULL AUTO_INCREMENT,
            `user_id` INT(11) NOT NULL COMMENT 'Владелец объявления',
            `name` VARCHAR(255) NOT NULL COMMENT 'Наименование',
            `content` TEXT NOT NULL COMMENT 'Контент',
            `create_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Создано',
            `update_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'Обновлено',
            PRIMARY KEY (`id`),
            INDEX `FK_adv_user` (`user_id`),
            CONSTRAINT `FK_adv_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`)
        )
        COMMENT='Объявления пользователей'
        COLLATE='utf8_general_ci'
        ENGINE=InnoDB
        ;
        ");
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m190304_163404_adv cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190304_163404_adv cannot be reverted.\n";

        return false;
    }
    */
}
