<?php
/**
 * class NewAction
 *
 * @category  Slavik\Elogic\Controller\Adminhtml\Vendor;
 * @package   Slavik\Elogic
 * @author    Stanislav Lelyuk <lelyuk.stanislav@gmail.com>
 * @copyright 2019 Stanislav Lelyuk
 */
namespace Slavik\Elogic\Controller\Adminhtml\Vendor;

use Magento\Backend\App\Action;

class NewAction extends Action
{
    /**
     * Result forward factory
     *
     * @var \Magento\Backend\Model\View\Result\Forward
     */
    protected $_resultForwardFactory;

    /**
     * NewAction constructor.
     *
     * @param Action\Context $context
     * @param \Magento\Backend\Model\View\Result\ForwardFactory $resultForwardFactory
     */
    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Backend\Model\View\Result\ForwardFactory $resultForwardFactory
    ) {
        $this->_resultForwardFactory = $resultForwardFactory;
        parent::__construct($context);
    }

    /**
     * Forward to edit
     *
     * @return \Magento\Backend\Model\View\Result\Forward
     */
    public function execute()
    {
        /** @var \Magento\Backend\Model\View\Result\Forward $resultForward */
        $resultForward = $this->_resultForwardFactory->create();
        return $resultForward->forward('edit');
    }
}