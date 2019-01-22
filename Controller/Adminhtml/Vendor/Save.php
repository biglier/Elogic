<?php
/**
 * class Save
 *
 * @category  Slavik\Elogic\Controller\Adminhtml\Vendor;
 * @package   Slavik\Elogic
 * @author    Stanislav Lelyuk <lelyuk.stanislav@gmail.com>
 * @copyright 2019 Stanislav Lelyuk
 */

namespace Slavik\Elogic\Controller\Adminhtml\Vendor;

use Magento\Backend\App\Action;
use Slavik\Elogic\Model\VendorRepository;
use Slavik\Elogic\Model\VendorFactory;

class Save extends Action
{
    /**
     * @var \Slavik\Elogic\Model\VendorRepository
     */
    protected $vendorRepository;

    /**
     * @var \Slavik\Elogic\Model\VendorFactory
     */
    protected $vendorFactory;

    /**
     * @var \Magento\Framework\Stdlib\DateTime\DateTime
     */
    protected $date;

    /**
     * @param Action\Context $context
     * @param VendorRepository $vendorRepository
     * @param VendorFactory $vendorFactory
     * @param \Magento\Framework\Stdlib\DateTime\DateTime $date
     */
    public function __construct(
        Action\Context $context,
        VendorRepository $vendorRepository,
        VendorFactory $vendorFactory,
        \Magento\Framework\Stdlib\DateTime\DateTime $date
    ) {
        parent::__construct($context);
        $this->vendorRepository = $vendorRepository;
        $this->vendorFactory = $vendorFactory;
        $this->date = $date;
    }

    /**
     * Save action
     *
     * @return \Magento\Framework\Controller\ResultInterface
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */
    public function execute()
    {
        $resultRedirect = $this->resultRedirectFactory->create();
        $data = $this->getRequest()->getPostValue();
        if (!$data) {
            return $resultRedirect->setPath('*/*/');
        }
        $id = $this->getRequest()->getParam('id');
        if ($id) {
            $vendor=$this->vendorRepository->getById($id);
        }
        else{
            $vendor = $this->vendorFactory->create();
        }
        $vendor->setName($data['name']);
        $vendor   ->setDescription($data['description']);
         $vendor   ->setDateAdded($this->date->gmtDate());
        try {
            $this->vendorRepository->save($vendor);
            $this->messageManager->addSuccessMessage(__('Vendor saved'));
            if ($this->getRequest()->getParam('back')) {
                return $resultRedirect->setPath('*/*/edit', ['id' => $vendor->getId(), '_current' => true]);
            }
            return $resultRedirect->setPath('*/*/');
        } catch (\Magento\Framework\Exception\LocalizedException $e) {
            $this->messageManager->addErrorMessage($e->getMessage());
        } catch (\RuntimeException $e) {
            $this->messageManager->addErrorMessage($e->getMessage());
        } catch (\Exception $e) {
            $this->messageManager->addErrorMessage($e, __('Something went wrong while saving the vendor'));
        }
        $this->_getSession()->setFormData($data);
        return $resultRedirect->setPath('*/*/edit', ['vendor_id' => $this->getRequest()->getParam('id')]);
    }
}