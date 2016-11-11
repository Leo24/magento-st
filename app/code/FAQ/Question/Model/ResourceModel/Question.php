<?php
/**
 * Copyright © 2016 FAQNext Ltd. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace FAQ\Question\Model\ResourceModel;

/**
 * FAQ Question resource model
 */
class Question extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    /**
     * Define main table
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('faq_question', 'id');
    }

}