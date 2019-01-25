<?php
/**
 * class EditAction
 *
 * @category  Slavik\Elogic\Controller\Adminhtml\Vendor;
 * @package   Slavik\Elogic
 * @author    Stanislav Lelyuk <lelyuk.stanislav@gmail.com>
 * @copyright 2019 Stanislav Lelyuk
 */
namespace Slavik\Elogic\Controller\Adminhtml\Vendor;

use Magento\Backend\App\Action;
use Slavik\Elogic\Model\VendorFactory;
use Slavik\Elogic\Model\VendorRepository;

class Edit extends Action
{
    /**
     * Core registry
     *
     * @var \Magento\Framework\Registry
     */
    protected $_coreRegistry = null;

    /**
     * Result page factory
     *
     * @var \Magento\Framework\View\Result\PageFactory
     */
    protected $_resultPageFactory;

    /**
     * Vendor repository
     *
     * @var VendorRepository
     */
    protected $vendorRepository;

    /**
     * Vendor factory
     *
     * @var VendorFactory
     */
    protected $vendorFactory;

    /**
     * Edit constructor.
     * @param Action\Context $context
     * @param \Magento\Framework\View\Result\PageFactory $resultPageFactory
     * @param \Magento\Framework\Registry $registry
     * @param VendorRepository $vendorRepository
     * @param VendorFactory $vendorFactory
     */
    public function __construct(
        Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory,
        \Magento\Framework\Registry $registry,
        VendorRepository $vendorRepository,
        VendorFactory $vendorFactory
    ) {
        $this->_resultPageFactory = $resultPageFactory;
        $this->_coreRegistry = $registry;
        $this->vendorRepository = $vendorRepository;
        parent::__construct($context);
        $this->vendorFactory = $vendorFactory;
    }

    /**
     * Init actions
     *
     * @return \Magento\Backend\Model\View\Result\Page
     */
    protected function _initAction()
    {
        // load layout, set active menu and breadcrumbs
        /** @var \Magento\Backend\Model\View\Result\Page $resultPage */
        $resultPage = $this->_resultPageFactory->create();
        $resultPage->setActiveMenu('Slavik_Elogic::Vendor')
            ->addBreadcrumb(__('Vendors'), __('Vendors'))
            ->addBreadcrumb(__('Manage Vendors'), __('Manage Vendors'));
        return $resultPage;
    }

    /**
     * Edit Vendor
     *
     * @return \Magento\Backend\Model\View\Result\Page|\Magento\Backend\Model\View\Result\Redirect
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     * @SuppressWarnings(PHPMD.NPathComplexity)
     */
    public function execute()
    {
        $vendor = $this->vendorFactory->create();
        $resultPage = $this->_initAction();
        $id = $this->getRequest()->getParam('id');
        if ($id) {
            $vendor=$this->vendorRepository->getById($id);
            if (!$vendor) {
                $this->messageManager->addError(__('This vendor not exists.'));
                /** \Magento\Backend\Model\View\Result\Redirect $resultRedirect */
                $resultRedirect = $this->resultRedirectFactory->create();

                $resultPage->addBreadcrumb(
                    $id ? __('Edit Vendor') : __('New Vendor'),
                    $id ? __('Edit Vendor') : __('New Vendor')
                );
                $this->_coreRegistry->register('elogic_vendor', $vendor);
                $resultPage->getConfig()->getTitle()->prepend(__('Vendors'));
                $resultPage->getConfig()->getTitle()->prepend($vendor->getName());
                return $resultRedirect->setPath('*/*/');
            }
        }
        $this->_coreRegistry->register('elogic_vendor', $vendor);
        $resultPage->getConfig()->getTitle()->prepend('New Vendor');
        return $resultPage;
    }
}