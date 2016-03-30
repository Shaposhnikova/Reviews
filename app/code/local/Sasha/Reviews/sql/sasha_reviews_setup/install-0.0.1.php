<?php

$installer = $this;
$tableName = $installer->getTable('reviews/reviews_table');

$installer->startSetup();

$installer->getConnection()->dropTable($tableName);
$table = $installer->getConnection()
    ->newTable($tableName)
    ->addColumn('opinion_id', Varien_Db_Ddl_Table::TYPE_INTEGER, null, array(
        'identity' => true,
        'primary' => true
    ))
    ->addColumn('customer_id', Varien_Db_Ddl_Table::TYPE_INTEGER, null, array(
        'nullable' => true,
    ))
    ->addColumn('description', Varien_Db_Ddl_Table::TYPE_TEXT, null, array(
        'nullable' => true,
    ))
    ->addColumn('advantage', Varien_Db_Ddl_Table::TYPE_TEXT, null, array(
        'nullable' => true,
    ))
    ->addColumn('disadvantage', Varien_Db_Ddl_Table::TYPE_TEXT, null, array(
        'nullable' => true,
    ))
    ->addColumn('reting', Varien_Db_Ddl_Table::TYPE_INTEGER, null, array(
        'nullable' => true,
    ))
    ->addColumn('recommend', Varien_Db_Ddl_Table::TYPE_TEXT, null, array(
        'nullable' => true,
    ))
    ->addColumn('data_add', Varien_Db_Ddl_Table::TYPE_DATETIME, null, array(
        'nullable' => true,
    ))
    ->addColumn('product_id', Varien_Db_Ddl_Table::TYPE_INTEGER, null, array(
        'nullable' => true,
    ))
    ->addForeignKey(
        $installer->getFkName('reviews/reviews_table', 'product_id', 'catalog_product_entity', 'entity_id'),
        'product_id',
        $installer->getTable('catalog_product_entity'),
        'entity_id',
        Varien_Db_Ddl_Table::ACTION_CASCADE,
        Varien_Db_Ddl_Table::ACTION_CASCADE
    );

$installer->getConnection()->createTable($table);

$installer->endSetup();