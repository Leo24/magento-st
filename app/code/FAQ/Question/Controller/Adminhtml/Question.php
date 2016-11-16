<?php
/**
 * Copyright © 2016 AionNext Ltd. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace FAQ\Question\Controller\Adminhtml;

/**
 * Aion manage items controller
 */
abstract class Question extends \Magento\Backend\App\Action
{
    /**
     * Core registry
     *
     * @var \Magento\Framework\Registry
     */
    protected $_coreRegistry = null;

    /**
     * @var \Magento\Framework\Mail\Template\TransportBuilder
     */
    protected $_transportBuilder;

    /**
     * @param \Magento\Backend\App\Action\Context $context
     * @param \Magento\Framework\Registry $coreRegistry
     * @param \Magento\Framework\Mail\Template\TransportBuilder $transportBuilder
     */

    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Framework\Registry $coreRegistry,
        \Magento\Framework\Mail\Template\TransportBuilder $transportBuilder
    )
    {
        parent::__construct($context);
        $this->_coreRegistry = $coreRegistry;
        $this->_transportBuilder = $transportBuilder;
    }

    /**
     * Init page
     *
     * @param \Magento\Backend\Model\View\Result\Page $resultPage
     * @return \Magento\Backend\Model\View\Result\Page
     */
    protected function initPage($resultPage)
    {
        $resultPage->setActiveMenu('Faq_Question::faq_question')
            ->addBreadcrumb(__('Question'), __('Question'))
            ->addBreadcrumb(__('Question'), __(''));
        return $resultPage;
    }

    /**
     * Check the permission to run it
     *
     * @return boolean
     */
    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('FAQ_Question::question_menu');
    }
}