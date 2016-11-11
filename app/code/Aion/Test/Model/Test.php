<?php
/**
 * Copyright © 2016 AionNext Ltd. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Aion\Test\Model;

/**
 * Aion Test model
 *
 * @method \Aion\Test\Model\ResourceModel\Test _getResource()
 * @method \Aion\Test\Model\ResourceModel\Test getResource()
 * @method string getId()
 * @method string getName()
 * @method string getEmail()
 * @method setSortOrder()
 * @method int getSortOrder()
 */
class Test extends \Magento\Framework\Model\AbstractModel
{
    /**
     * Statuses
     */
    const STATUS_ENABLED = 1;
    const STATUS_DISABLED = 0;

    /**
     * Aion Test cache tag
     */
    const CACHE_TAG = 'aion_test';

    /**
     * @var string
     */
    protected $_cacheTag = 'aion_test';

    /**
     * Prefix of model events names
     *
     * @var string
     */
    protected $_eventPrefix = 'aion_test';

    /**
     * @return void
     */
    protected function _construct()
    {
        $this->_init('Aion\Test\Model\ResourceModel\Test');
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