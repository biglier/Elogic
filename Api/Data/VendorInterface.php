<?php
/**
 * interface VendorInterface for all Vendor instances
 *
 * @category  Slavik\Elogic\Api;
 * @package   Slavik\Elogic
 * @author    Stanislav Lelyuk <lelyuk.stanislav@gmail.com>
 * @copyright 2019 Stanislav Lelyuk
 */


namespace Slavik\Elogic\Api\Data;

interface VendorInterface
{
    /**#@+
     * Constants for keys of data array. Identical to the name of the getter in snake case
     */
    const VENDOR_ID = 'vendor_id';
    const VENDOR_NAME = 'name';
    const VENDOR_DESCRIPTION = 'description';
    const VENDOR_DATE_ADDED = 'date_added';
    const VENDOR_LOGO = 'logo';
    /**#@-*/

    /**
     * Return vendor id
     *
     * @return int/null
     */
    public function getId();

    /**
     * Set vendor id
     *
     * @param $id
     * @return VendorInterface
     */
    public function setId($id);

    /**
     * Return vendor name
     *
     * @return string/null
     */
    public function getName();

    /**
     * Set vendor name
     *
     * @param $vendorName
     * @return VendorInterface
     */
    public function setName($vendorName);

    /**
     * Return vendor description
     *
     * @return string/null
     */
    public function getDescription();

    /**
     * Set vendor description
     *
     * @param $vendorDescpirion
     * @return  VendorInterface
     */
    public function setDescription($vendorDescpirion);

    /**
     * Return vendor logo
     *
     * @return string/null
     */
    public function getLogo();

    /**
     * Set vendor logo
     *
     * @param $logo
     * @return VendorInterface
     */
    public function setLogo($logo);

    /**
     * Return vendor date added
     *
     * @return string/null
     */
    public function getDateAdded();

    /**
     * Set date added
     *
     * @param $date
     * @return VendorInterface
     */
    public function setDateAdded($date);
}
