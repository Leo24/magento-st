<?php
/**
 * Copyright © 2015 AionNext Ltd. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Aion\Test\Helper;

/**
 * Aion Test helper
 */
class Data extends \Magento\Framework\App\Helper\AbstractHelper
{
    /**
     * Path to store config if extension is enabled
     *
     * @var string
     */
    const XML_PATH_ENABLED = 'aion/basic/enabled';

    /**
     * Check if extension enabled
     *
     * @return string|null
     */
    public function isEnabled()
    {
        return $this->scopeConfig->isSetFlag(
            self::XML_PATH_ENABLED,
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE
        );
    }
}