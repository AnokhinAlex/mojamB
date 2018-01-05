<?php

/*die('Mojam Banners module setup');

$installer = $this;
$installer->startSetup();
$installer->run("CREATE TABLE mojam_banners_entities (
        `news_id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
        `title` VARCHAR(255) NOT NULL,
        `content` TEXT NOT NULL,
        `created` DATETIME,

        PRIMARY KEY (`news_id`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8;");

$installer->endSetup();
*/

$installer = $this;
$tableNews = $installer->getTable('mojambanners/table_mojambanners');

//die($tableNews);

$installer->startSetup();

$installer->getConnection()->dropTable($tableNews);
$table = $installer->getConnection()
    ->newTable($tableNews)
    ->addColumn('news_id', Varien_Db_Ddl_Table::TYPE_INTEGER, null, array(
        'identity'  => true,
        'nullable'  => false,
        'primary'   => true,
        ))
    ->addColumn('title', Varien_Db_Ddl_Table::TYPE_TEXT, '255', array(
        'nullable'  => false,
        ))
    ->addColumn('content', Varien_Db_Ddl_Table::TYPE_TEXT, null, array(
        'nullable'  => false,
        ))
    ->addColumn('created', Varien_Db_Ddl_Table::TYPE_DATETIME, null, array(
        'nullable'  => false,
    ));
$installer->getConnection()->createTable($table);

$installer->endSetup();

