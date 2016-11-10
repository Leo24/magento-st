<?php
namespace Tutorial\SimpleNews\Block;

use Tutorial\SimpleNews\Model\NewsFactory;

class SimpleNews extends \Magento\Framework\View\Element\Template
{

//    /**
//     * @var \Tutorial\SimpleNews\Model\NewsFactory
//     */
//    protected $_modelNewsFactory;
//
//    /**
//     * @var \Magento\Framework\Registry
//     */
//    protected $_coreRegistry;
//
//    public function __construct(
//        \Magento\Framework\View\Element\Template\Context $context,
//        \Magento\Framework\Registry $coreRegistry,
//        NewsFactory $modelNewsFactory,
//        array $data = []
//    ) {
//        $this->_coreRegistry = $coreRegistry;
//        parent::__construct($context, $data);
//    }
//
//    public function execute()
//    {
//        /**
//         * When Magento get your model, it will generate a Factory class
//         * for your model at var/generaton folder and we can get your
//         * model by this way
//         */
//        $newsModel = $this->_modelNewsFactory->create();
//
//        // Load the item with ID is 1
//        $item = $newsModel->load(1);
//        var_dump($item->getData());
//
//        // Get news collection
//        $newsCollection = $newsModel->getCollection();
//        // Load all data of collection
//        var_dump($newsCollection->getData());
//    }
//
//
//


    public function getHelloWorldTxt()
    {
        // will return 'bar'
//        return $this->_coreRegistry->registry('foo');
//        return $this->execute();
        return 'SimpleNews';

    }



}