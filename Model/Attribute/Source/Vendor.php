<?php
/**
 * class Vendor
 *
 * @category  Slavik\Elogic\Model\Attribute\Source;
 * @package   Slavik\Elogic
 * @author    Stanislav Lelyuk <lelyuk.stanislav@gmail.com>
 * @copyright 2019 Stanislav Lelyuk
 */

namespace Slavik\Elogic\Model\Attribute\Source;

use Magento\Eav\Model\Entity\Attribute\Source\AbstractSource;
use Slavik\Elogic\Model\ResourceModel\Vendor\CollectionFactory;
use Slavik\Elogic\Model\VendorRepository;
use Slavik\Elogic\Model\ResourceModel\Vendor\Collection;;

class Vendor extends AbstractSource
{
    /**
     * @var VendorRepository
     */
    protected $vendorRepository;

    protected $collectionFactory;

    /**
     * @param VendorRepository $vendorRepository
     * @param CollectionFactory $collectionFactory
     */
    public function __construct(VendorRepository $vendorRepository, CollectionFactory $collectionFactory)
    {
        $this->vendorRepository = $vendorRepository;
        $this->collectionFactory = $collectionFactory;
    }

    /**
     * Retrieve All options
     *
     * @return array
     */
    public function getAllOptions()
    {
        /** @var Collection $vendors */
        $vendors = $this->collectionFactory->create();
        if (!$this->_options) {
            /** @var \Slavik\Elogic\Model\Vendor $vendor */
            foreach ($vendors->getItems() as $vendor)
            {
                $this->_options[] = ['label'=>__($vendor->getName()),'value'=>$vendor->getId()];
            }
        }
        return $this->_options;
       // return $vendorNames;
    }
}