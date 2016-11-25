<?php
/**
 * Copyright © 2016 AionNext Ltd. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace FAQ\Question\Controller\Adminhtml\Question;

class Index extends \FAQ\Question\Controller\Adminhtml\Question
{
    /**
     * @var \Magento\Framework\View\Result\PageFactory
     */
    protected $resultPageFactory;

    /**
     * @param \Magento\Backend\App\Action\Context $context
     * @param \Magento\Framework\Registry $coreRegistry
     * @param \Magento\Framework\View\Result\PageFactory $resultPageFactory
     * @param \Magento\Framework\Mail\Template\TransportBuilder $transportBuilder
     */
    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Framework\Registry $coreRegistry,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory,
        \Magento\Framework\Mail\Template\TransportBuilder $transportBuilder
    ) {
        $this->resultPageFactory = $resultPageFactory;
        parent::__construct($context, $coreRegistry, $transportBuilder);
    }

    /**
     * Index action
     *
     * @return \Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        /** @var \Magento\Backend\Model\View\Result\Page $resultPage */
        $resultPage = $this->resultPageFactory->create();
        $this->initPage($resultPage)->getConfig()->getTitle()->prepend(__('Questions'));
        return $resultPage;
    }
}