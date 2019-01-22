<?php
/**
 * class MassDelete
 *
 * @category  Slavik\Elogic\Controller\Adminhtml\Vendor;
 * @package   Slavik\Elogic
 * @author    Stanislav Lelyuk <lelyuk.stanislav@gmail.com>
 * @copyright 2019 Stanislav Lelyuk
 */

namespace Slavik\Elogic\Controller\Adminhtml\Vendor;

use Magento\Framework\Controller\ResultFactory;
use Magento\Backend\App\Action\Context;
use Magento\Ui\Component\MassAction\Filter;
use Slavik\Elogic\Model\ResourceModel\Vendor\CollectionFactory;
use Slavik\Elogic\Model\Vendor;
use Slavik\Elogic\Model\VendorRepository;

class MassDelete extends \Magento\Backend\App\Action
{

    /**
     * Execute action based on request and return result
     *
     * Note: Request will be added as operation argument in future
     *
     * @return \Magento\Framework\Controller\ResultInterface|ResponseInterface
     * @throws \Magento\Framework\Exception\NotFoundException
     */
    protected $filter;

    /**
     * @var CollectionFactory
     */
    protected $collectionFactory;

    /**
     * @var VendorRepository
     */
    protected $vendorRepository;

    /**
     * MassDelete constructor.
     * @param Context $context
     * @param Filter $filter
     * @param CollectionFactory $collectionFactory
     * @param VendorRepository $vendorRepository
     */
    public function __construct(
        Context $context,
        Filter $filter,
        CollectionFactory $collectionFactory,
        VendorRepository $vendorRepository
    ){
        $this->filter = $filter;
        $this->collectionFactory = $collectionFactory;
        $this->vendorRepository = $vendorRepository;
        parent::__construct($context);
    }

    /**
     * @return \Magento\Framework\App\ResponseInterface|\Magento\Framework\Controller\ResultInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function execute()
    {
        $collection = $this->filter->getCollection($this->collectionFactory->create());
        $vendorDeleted = 0;
        /** @var Vendor $vendor */
        foreach ($collection->getItems() as $vendor)
        {
            $this->vendorRepository->delete($vendor);
            $vendorDeleted++;
        }

        if ($vendorDeleted) {
            $this->messageManager->addSuccessMessage(
                __('A total of %1 record(s) have been deleted.', $vendorDeleted)
            );
        }

        return $this->resultFactory->create(ResultFactory::TYPE_REDIRECT)->setPath('*/*/');
    }
}