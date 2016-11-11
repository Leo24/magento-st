<?php
/**
 * Copyright © 2016 AionNext Ltd. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Aion\Test\Setup;

use Aion\Test\Model\Test;
use Aion\Test\Model\TestFactory;
use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;

/**
 * @codeCoverageIgnore
 */
class InstallData implements InstallDataInterface
{
    /**
     * Test factory
     *
     * @var TestFactory
     */
    private $testFactory;

    /**
     * Init
     *
     * @param TestFactory $testFactory
     */
    public function __construct(TestFactory $testFactory)
    {
        $this->testFactory = $testFactory;
    }

    /**
     * {@inheritdoc}
     * @SuppressWarnings(PHPMD.ExcessiveMethodLength)
     */
    public function install(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        $testItems = [
            [
                'name' => 'John Doe',
                'email' => 'john.doe@example.com',
                'is_active' => 1,
            ],
            [
                'name' => 'Jane Doe',
                'email' => 'jane.doe@example.com',
                'is_active' => 0,
            ],

            [
                'name' => 'Steve Test',
                'email' => 'steve.test@example.com',
                'is_active' => 1,
            ],
        ];

        /**
         * Insert default items
         */
        foreach ($testItems as $data) {
            $this->createTest()->setData($data)->save();
        }

        $setup->endSetup();
    }

    /**
     * Create Test item
     *
     * @return Test
     */
    public function createTest()
    {
        return $this->testFactory->create();
    }
}