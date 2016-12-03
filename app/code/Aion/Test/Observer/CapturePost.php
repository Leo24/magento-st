<?php
namespace Aion\Test\Observer;

use Magento\Framework\Event\ObserverInterface;
use Aion\Test\Helper\Data as DataHelper;
use Psr\Log\LoggerInterface;
use Magento\Framework\Event\Observer;
use Magento\Customer\Model\Customer;
use Magento\Framework\Exception\LocalizedException;

class CapturePost implements ObserverInterface
{
    /**
     * Aion Test helper
     *
     * @var DataHelper
     */
    protected $_helper;

    /**
     * @var LoggerInterface
     */
    protected $_logger;

    /**
     * Capture Post Observer constructor
     *
     * @param DataHelper $helper
     * @param LoggerInterface $logger
     */
    public function __construct(
        DataHelper $helper,
        LoggerInterface $logger
    ) {
        $this->_helper = $helper;
        $this->_logger = $logger;
    }

    /**
     * Sample post capture event handler
     *
     * @param Observer $observer
     * @return self
     */
    public function execute(Observer $observer)
    {
        if ($this->_helper->isEnabled()) {

            $controller = $observer->getEvent()->getControllerAction();
            $post = $controller->getRequest()->getPostValue();

            if ($post) {

                try {

                    $this->_logger->debug('CapturePostObserver');
                    $this->_logger->log(100, print_r($post, true));

                    // comment out to check data
                    //\Zend_Debug::dump($post);
                    //die();

                    // do some logic

                } catch (LocalizedException $e) {
                    $this->_logger->error($e->getMessage());
                } catch (\Exception $e) {
                    $this->_logger->critical($e);
                }

            }

        }

        return $this;
    }
}
