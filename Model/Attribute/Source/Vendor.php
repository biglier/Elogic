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
     * Vendor repository
     *
     * @var VendorRepository
     */
    protected $vendorRepository;

    /**
     * Collection factory
     *
     * @var CollectionFactory
     */
    protected $collectionFactory;

    /**
     * Vendor constructor.
     *
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
    }

    /**
     * Get text for options
     *
     * @param int|string $value
     * @return bool|string
     */
    public function getOptionText($value)
    {
        foreach ($this->getAllOptions() as $option) {
            if ($option['value'] == $value) {
                return $option['label'];
            }
        }
        return false;
    }
}