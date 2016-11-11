<?php
/**
 * Copyright © 2016 FAQNext Ltd. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace FAQ\Question\Model;

/**
 * FAQ Question model
 *
 * @method \FAQ\Question\Model\ResourceModel\Question _getResource()
 * @method \FAQ\Question\Model\ResourceModel\Question getResource()
 * @method string getId()
 * @method string getName()
 * @method string getEmail()
 * @method setSortOrder()
 * @method int getSortOrder()
 */
class Question extends \Magento\Framework\Model\AbstractModel
{
    /**
     * Statuses
     */
    const STATUS_ENABLED = 1;
    const STATUS_DISABLED = 0;

    /**
     * FAQ Question cache tag
     */
    const CACHE_TAG = 'faq_question';

    /**
     * @var string
     */
    protected $_cacheTag = 'faq_question';

    /**
     * Prefix of model events names
     *
     * @var string
     */
    protected $_eventPrefix = 'faq_question';

    /**
     * @return void
     */
    protected function _construct()
    {
        $this->_init('FAQ\Question\Model\ResourceModel\Question');
    }

    /**
     * Get identities
     *
     * @return array
     */
    public function getIdentities()
    {
        return [self::CACHE_TAG . '_' . $this->getId(), self::CACHE_TAG . '_' . $this->getId()];
    }

    /**
     * Prepare item's statuses
     *
     * @return array
     */
    public function getAvailableStatuses()
    {
        return [self::STATUS_ENABLED => __('Enabled'), self::STATUS_DISABLED => __('Disabled')];
    }

}