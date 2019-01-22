<?php
/**
 * class Collection
 *
 * @category  Slavik\Elogic\Model\Vendor\ResourceModel\Vendor;
 * @package   Slavik\Vendor
 * @author    Stanislav Lelyuk <lelyuk.stanislav@gmail.com>
 * @copyright 2019 Stanislav Lelyuk
 */

namespace Slavik\Elogic\Model\ResourceModel\Vendor;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
    protected $_idFieldName = 'vendor_id';
    /**
     * Init Vendor
     */
    protected function _construct()
    {
        $this->_init('Slavik\Elogic\Model\Vendor',
            'Slavik\Elogic\Model\ResourceModel\Vendor');
    }
}
