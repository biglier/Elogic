<?php
/**
 * class Delete
 *
 * @category  Slavik\Elogic\Controller\Adminhtml\Vendor;
 * @package   Slavik\Elogic
 * @author    Stanislav Lelyuk <lelyuk.stanislav@gmail.com>
 * @copyright 2019 Stanislav Lelyuk
 */

namespace Slavik\Elogic\Controller\Adminhtml\Vendor;

use Magento\Backend\App\Action;
use Magento\Framework\App\ResponseInterface;
use Slavik\Elogic\Model\VendorRepository;

class Delete extends Action
{
    /**
     * Vendor repository
     *
     * @var VendorRepository
     */
    protected $vendorRepository;

    /**
     * Delete constructor.
     *
     * @param Action\Context $context
     * @param VendorRepository $vendorRepository
     */
    public function __construct(
        Action\Context $context,
        VendorRepository $vendorRepository
    )
    {
        parent::__construct($context);
        $this->vendorRepository = $vendorRepository;
    }

    /**
     * Execute action based on request and return result
     *
     * Note: Request will be added as operation argument in future
     *
     * @return \Magento\Framework\Controller\ResultInterface|ResponseInterface
     * @throws \Magento\Framework\Exception\NotFoundException
     */
    public function execute()
    {
        $id = $this->getRequest()->getParam('id');
        /** @var \Magento\Backend\Model\View\Result\Redirect $resultRedirect */
        $resultRedirect = $this->resultRedirectFactory->create();
        if ($id) {
            try {
                $this->vendorRepository->deleteById($id);
                $this->messageManager->addSuccessMessage(__('Department deleted'));
                return $resultRedirect->setPath('*/*/');
            } catch (\Exception $e) {
                $this->messageManager->addErrorMessage($e->getMessage());
                return $resultRedirect->setPath('*/*/edit', ['id' => $id]);
            }
        }
        $this->messageManager->addError(__('Vendor does not exist'));
        return $resultRedirect->setPath('*/*/');
    }
}