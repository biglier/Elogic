<?php
/**
 * class Vendor
 *
 * @category  Slavik\Elogic\Model;
 * @package   Slavik\Elogic
 * @author    Stanislav Lelyuk <lelyuk.stanislav@gmail.com>
 * @copyright 2019 Stanislav Lelyuk
 */

namespace Slavik\Elogic\Model;

use Slavik\Elogic\Api\Data\VendorInterface;

class Vendor extends \Magento\Framework\Model\AbstractModel implements VendorInterface, \Magento\Framework\DataObject\IdentityInterface
{

    const CACHE_TAG = 'slavik_elogic_vendor';

    /**
     * Init vendor
     */
    protected function _construct()
    {
        $this->_init('Slavik\Elogic\Model\ResourceModel\Vendor');
    }

    /**
     * Return unique id of vendor
     *
     * @return array|string[]
     */
    public function getIdentities()
    {
        return [self::CACHE_TAG . '_' . $this->getId()];
    }

    /**
     * Return vendor name
     *
     * @return string/null
     */
    public function getName()
    {
        return $this->getData(self::VENDOR_NAME);
    }

    /**
     * Set vendor name
     *
     * @param $vendorName
     * @return VendorInterface
     */
    public function setName($vendorName)
    {
        $this->setData(self::VENDOR_NAME, $vendorName);
    }

    /**
     * Return vendor description
     *
     * @return string/null
     */
    public function getDescription()
    {
        return $this->getData(self::VENDOR_DESCRIPTION);
    }

    /**
     * Set vendor description
     *
     * @param $description
     * @return VendorInterface|void
     */
    public function setDescription($description)
    {
        $this->setData(self::VENDOR_DESCRIPTION, $description);
    }

    /**
     * Return vendor logo
     *
     * @return string/null
     */
    public function getLogo()
    {
        return $this->getData(self::VENDOR_LOGO);
    }

    /**
     * Set vendor logo
     *
     * @param $vendorLogo
     * @return void
     */
    public function setLogo($vendorLogo)
    {
        $this->setData(self::VENDOR_LOGO, $vendorLogo);
    }

    /**
     * Set vendor date_added
     *
     * @param $date
     */
    public function setDateAdded($date)
    {
        $this->setData(self::VENDOR_DATE_ADDED, $date);
    }

    /**
     * return Vendor date added
     *
     * @return mixed|string
     */
    public function getDateAdded()
    {
        return $this->getData(self::VENDOR_DATE_ADDED);
    }

    /**
     * return unique id of vendor
     *
     * @return int|mixed|void
     */
    public function getId()
    {
        return $this->getData(self::VENDOR_ID);
    }

    /**
     * Set id for vendor
     *
     * @param mixed $id
     * @return \Magento\Framework\Model\AbstractModel|VendorInterface|void
     */
    public function setId($id)
    {
        $this->setData(self::VENDOR_ID, $id);
    }
}