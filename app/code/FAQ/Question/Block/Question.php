<?php
/**
 * Copyright © 2016 FAQNext Ltd. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace FAQ\Question\Block;

use Magento\Framework\View\Element\Template;

/**
 * FAQ Question Page block
 */
class Question extends Template
{
    /**
     * @var \FAQ\Question\Model\Question
     */
    protected $question;

    /**
     * Question factory
     *
     * @var \FAQ\Question\Model\QuestionFactory
     */
    protected $QqestionFactory;

    /**
     * @var \FAQ\Question\Model\ResourceModel\Question\CollectionFactory
     */
    protected $itemCollectionFactory;

    /**
     * @var \FAQ\Question\Model\ResourceModel\Question\Collection
     */
    protected $items;

    /**
     * Question constructor.
     *
     * @param \Magento\Framework\View\Element\Template\Context $context
     * @param \FAQ\Question\Model\Question $Question
     * @param \FAQ\Question\Model\QuestionFactory $QuestionFactory
     * @param array $data
     */
    public function __construct(
        Template\Context $context,
        \FAQ\Question\Model\Question $question,
        \FAQ\Question\Model\QuestionFactory $questionFactory,
        \FAQ\Question\Model\ResourceModel\Question\CollectionFactory $itemCollectionFactory,
        array $data = []
    ) {
        $this->question = $question;
        $this->questionFactory = $questionFactory;
        $this->itemCollectionFactory = $itemCollectionFactory;
        parent::__construct($context, $data);
    }

    /**
     * Retrieve Question instance
     *
     * @return \FAQ\Question\Model\Question
     */
    public function getQuestionModel()
    {
        if (!$this->hasData('question')) {
            if ($this->getQuestionId()) {
                /** @var \FAQ\Question\Model\Question $Question */
                $question = $this->questionFactory->create();
                $question->load($this->getQuestionId());
            } else {
                $question = $this->question;
            }
            $this->setData('question', $question);
        }
        return $this->getData('question');
    }

    /**
     * Get items
     *
     * @return bool|\FAQ\Question\Model\ResourceModel\Question\Collection
     */
    public function getItems()
    {
        if (!$this->items) {
            $this->items = $this->itemCollectionFactory->create()->addFieldToSelect(
                '*'
            )->addFieldToFilter(
                'is_active',
                ['eq' => \FAQ\Question\Model\Question::STATUS_ENABLED]
            )->setOrder(
                'creation_time',
                'desc'
            );
        }
        return $this->items;
    }

    /**
     * Get Question Id
     *
     * @return int
     */
    public function getQuestionId()
    {
        return 1;
    }

    /**
     * Return identifiers for produced content
     *
     * @return array
     */
    public function getIdentities()
    {
        return [\FAQ\Question\Model\Question::CACHE_TAG . '_' . $this->getQuestionModel()->getId()];
    }
}
