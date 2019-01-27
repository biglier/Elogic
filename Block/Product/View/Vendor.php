<?php
/**
 * class Vendor
 *
 * @category  Slavik\Elogic\Block\Product\View;
 * @package   Slavik\Elogic
 * @author    Stanislav Lelyuk <lelyuk.stanislav@gmail.com>
 * @copyright 2019 Stanislav Lelyuk
 */

namespace Slavik\Elogic\Block\Product\View;

use Magento\Catalog\Model\Product;
use Slavik\Elogic\Model\VendorRepository;

class Vendor extends \Magento\Framework\View\Element\Template
{
    /**
     * Product
     *
     * @var Magento\Catalog\Model\Product;
     */
    protected $_product = null;

    protected $_vendor = null;
    /**
     * Core registry
     *
     * @var \Magento\Framework\Registry
     */
    protected $_coreRegistry = null;

    /**
     * Vendor repository
     *
     * @var VendorRepository
     */
    protected $vendorRepository;

    /**
     * Vendor constructor.
     *
     * @param \Magento\Framework\View\Element\Template\Context $context
     * @param \Magento\Framework\Registry $registry
     * @param array $data
     * @param VendorRepository $vendorRepository
     */
    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Magento\Framework\Registry $registry,
        VendorRepository $vendorRepository,
        array $data = []
    )
    {
        $this->vendorRepository = $vendorRepository;
        $this->_coreRegistry = $registry;
        /** @var \Slavik\Elogic\Model\Vendor $vendor */
        $this->_vendor =$this->vendorRepository->getById($this->getProduct()->getElogicVendor());
        parent::__construct($context, $data);
    }

    /**
     * Get vendor name
     *
     * @return mixed|\Slavik\Elogic\Model\Vendor
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */
    public function getVendorName()
    {
        return $this->_vendor->getName();
    }

    /**
     * Get product instance from registry
     *
     * @return mixed|Product
     */
    public function getProduct()
    {
        if (!$this->_product) {
            $this->_product = $this->_coreRegistry->registry('product');
        }
        return $this->_product;
    }

    /**
     * Get vendor description
     *
     * @return string
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */
    public function getVendorDescription()
    {
        return $this->_vendor->getDescription();
    }
}