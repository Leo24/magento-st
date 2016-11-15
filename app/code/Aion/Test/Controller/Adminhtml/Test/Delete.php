<?php
/**
 * Copyright © 2016 AionNext Ltd. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Aion\Test\Controller\Adminhtml\Test;

class Delete extends \Aion\Test\Controller\Adminhtml\Test
{
    /**
     * Delete action
     *
     * @return \Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        /** @var \Magento\Backend\Model\View\Result\Redirect $resultRedirect */
        $resultRedirect = $this->resultRedirectFactory->create();
        // check if we know what should be deleted
        $id = $this->getRequest()->getParam('test_id');
        if ($id) {
            try {
                // init model and delete
                $model = $this->_objectManager->create('Aion\Test\Model\Test');
                $model->load($id);
                $model->delete();
                // display success message
                $this->messageManager->addSuccess(__('You deleted the item.'));
                // go to grid
                return $resultRedirect->setPath('*/*/');
            } catch (\Exception $e) {
                // display error message
                $this->messageManager->addError($e->getMessage());
                // go back to edit form
                return $resultRedirect->setPath('*/*/edit', ['test_id' => $id]);
            }
        }
        // display error message
        $this->messageManager->addError(__('We can\'t find the item to delete.'));
        // go to grid
        return $resultRedirect->setPath('*/*/');
    }
}