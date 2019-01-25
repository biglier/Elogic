<?php
/**
 * Created by PhpStorm.
 * User: slava
 * Date: 25.01.19
 * Time: 13:11
 */

namespace Slavik\Elogic\Block\Product\View;

use Slavik\Elogic\Model\VendorRepository;

class Vendor extends \Magento\Framework\View\Element\Template
{
    /**
     * @var Product
     */
    protected $_product = null;

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
        /** @var \Slavik\Elogic\Model\Vendor $vendor */
        $vendor =$this->vendorRepository->getById($this->getProduct()->getElogicVendor());
        return $vendor->getName();
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
}