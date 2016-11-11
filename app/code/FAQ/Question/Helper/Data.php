<?php
/**
 * Copyright © 2015 FAQNext Ltd. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace FAQ\Question\Helper;

/**
 * FAQ Question helper
 */
class Data extends \Magento\Framework\App\Helper\AbstractHelper
{
    /**
     * Path to store config if extension is enabled
     *
     * @var string
     */
    const XML_PATH_ENABLED = 'FAQ/basic/enabled';

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