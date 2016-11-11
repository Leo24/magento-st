<?php
/**
 * Copyright © 2016 FAQNext Ltd. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace FAQ\Question\Setup;

use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\DB\Adapter\AdapterInterface;

/**
 * @codeCoverageIgnore
 */
class InstallSchema implements InstallSchemaInterface
{
    /**
     * Install table
     *
     * @param \Magento\Framework\Setup\SchemaSetupInterface $setup
     * @param \Magento\Framework\Setup\ModuleContextInterface $context
     * @throws \Zend_Db_Exception
     */
    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $installer = $setup;

        $installer->startSetup();
        /**
         * Create table 'faq_question'
         */
        $table = $installer->getConnection()->newTable(
            $installer->getTable('faq_question')
        )->addColumn(
            'id',
            \Magento\Framework\DB\Ddl\Table::TYPE_SMALLINT,
            null,
            ['identity' => true, 'nullable' => false, 'primary' => true, 'autoincrement' => true],
            'Question ID'
        )->addColumn(
            'title',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            255,
            ['nullable' => false],
            'Question title'
        )->addColumn(
            'question',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            ['nullable' => false],
            'Question text'
        )->addColumn(
            'answer',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            ['nullable' => false],
            'Answer'
        )->addColumn(
            'creation_time',
            \Magento\Framework\DB\Ddl\Table::TYPE_TIMESTAMP,
            null,
            ['nullable' => false, 'default' => \Magento\Framework\DB\Ddl\Table::TIMESTAMP_INIT],
            'Question Creation Time'
        )->addColumn(
            'update_time',
            \Magento\Framework\DB\Ddl\Table::TYPE_TIMESTAMP,
            null,
            ['nullable' => false, 'default' => \Magento\Framework\DB\Ddl\Table::TIMESTAMP_INIT_UPDATE],
            'Question Modification Time'
        )->addColumn(
            'status',
            \Magento\Framework\DB\Ddl\Table::TYPE_SMALLINT,
            null,
            ['nullable' => false, 'default' => '0'],
            'Is Question Viewed'
        )->addColumn(
            'show_on_frontend',
            \Magento\Framework\DB\Ddl\Table::TYPE_SMALLINT,
            null,
            ['nullable' => false, 'default' => '0'],
            'Is Shown on Frontend'
        )->addIndex(
            $setup->getIdxName(
                $installer->getTable('FAQ_Question'),
                ['title'],
                AdapterInterface::INDEX_TYPE_FULLTEXT
            ),
            ['name'],
            ['type' => AdapterInterface::INDEX_TYPE_FULLTEXT]
        )->setComment(
            'FAQ Questions Table'
        );
        $installer->getConnection()->createTable($table);

        $installer->endSetup();
    }
}
