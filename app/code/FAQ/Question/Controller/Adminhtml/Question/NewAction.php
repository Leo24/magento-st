<?php
/**
 * Copyright © 2016 AionNext Ltd. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace FAQ\Question\Controller\Adminhtml\Question;

class NewAction extends \FAQ\Question\Controller\Adminhtml\Question
{
    /**
     * @var \Magento\Backend\Model\View\Result\ForwardFactory
     */
    protected $resultForwardFactory;

    /**
     * @param \Magento\Backend\App\Action\Context $context
     * @param \Magento\Framework\Registry $coreRegistry
     * @param \Magento\Backend\Model\View\Result\ForwardFactory $resultForwardFactory
     * @param \Magento\Framework\Mail\Template\TransportBuilder $transportBuilder
     */
    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Framework\Registry $coreRegistry,
        \Magento\Backend\Model\View\Result\ForwardFactory $resultForwardFactory,
        \Magento\Framework\Mail\Template\TransportBuilder $transportBuilder
    ) {
        $this->resultForwardFactory = $resultForwardFactory;
        parent::__construct($context, $coreRegistry, $transportBuilder);
    }

    /**
     * Create new item
     *
     * @return \Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        /** @var \Magento\Framework\Controller\Result\Forward $resultForward */
        $resultForward = $this->resultForwardFactory->create();
        return $resultForward->forward('edit');
    }
}