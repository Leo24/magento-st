<?php
/**
 * Copyright © 2016 FAQNext Ltd. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace FAQ\Question\Setup;

use FAQ\Question\Model\Question;
use FAQ\Question\Model\QuestionFactory;
use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;

/**
 * @codeCoverageIgnore
 */
class InstallData implements InstallDataInterface
{
    /**
     * Question factory
     *
     * @var QuestionFactory
     */
    private $questionFactory;

    /**
     * Init
     *
     * @param QuestionFactory $QuestionFactory
     */
    public function __construct(QuestionFactory $questionFactory)
    {
        $this->questionFactory = $questionFactory;
    }

    /**
     * {@inheritdoc}
     * @SuppressWarnings(PHPMD.ExcessiveMethodLength)
     */
    public function install(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        $questionItems = [
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
                'name' => 'Steve Question',
                'email' => 'steve.Question@example.com',
                'is_active' => 1,
            ],
        ];

        /**
         * Insert default items
         */
        foreach ($questionItems as $data) {
            $this->createQuestion()->setData($data)->save();
        }

        $setup->endSetup();
    }

    /**
     * Create Question item
     *
     * @return Question
     */
    public function createQuestion()
    {
        return $this->questionFactory->create();
    }
}