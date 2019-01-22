<?php
/**
 * interface VendorRepositoryInterface for all Vendor Repositories
 *
 * @category  Slavik\Elogic\Api;
 * @package   Slavik\Elogic
 * @author    Stanislav Lelyuk <lelyuk.stanislav@gmail.com>
 * @copyright 2019 Stanislav Lelyuk
 */

namespace Slavik\Elogic\Api;

use Slavik\Elogic\Api\Data\VendorInterface;

interface VendorRepositoryInterface
{
    /**
     * Save Vendor to db
     *
     * @param VendorInterface $page
     * @return mixed
     */
    public function save(VendorInterface $page);

    /**
     * Return vendor by it id
     *
     * @param $id
     * @return mixed
     */
    public function getById($id);

    /**
     * Delete vendor from db
     *
     * @param VendorInterface $page
     * @return mixed
     */
    public function delete(VendorInterface $page);

    /**
     * Delete vendor from db by it id
     *
     * @param $id
     * @return mixed
     */
    public function deleteById($id);

    /**
     * Get list of vendor instance bu searchCriteria
     *
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return mixed
     */
    public function getList(\Magento\Framework\Api\SearchCriteriaInterface $searchCriteria);
}
