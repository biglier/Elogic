<?php
/**
 * class Vendor
 *
 * @category  Slavik\Elogic\Model\Vendor\ResourceModel;
 * @package   Slavik\Vendor
 * @author    Stanislav Lelyuk <lelyuk.stanislav@gmail.com>
 * @copyright 2019 Stanislav Lelyuk
 */

namespace Slavik\Elogic\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class Vendor extends AbstractDb
{
    /**
     *  Init Vendor
     */
    protected  function  _construct()
    {
        $this->_init('slavik_elogic_vendor','vendor_id');
    }
}