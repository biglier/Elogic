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
use Slavik\Elogic\Api\VendorRepositoryInterface;
use Magento\Framework\Api\SearchResultsInterfaceFactory;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\NoSuchEntityException;
use Slavik\Contact\Api\Data\ContactInterface;
use Slavik\Elogic\Model\ResourceModel\Vendor as ObjectResourceModel;
use Slavik\Elogic\Model\ResourceModel\Vendor\CollectionFactory;

class VendorRepository implements VendorRepositoryInterface
{
    /**
     * Vendor Factory
     *
     * @var Slavik\Elogic\Model\VendorFactory
     */
    protected $objectFactory;

    /**
     * Object Resource Model
     *
     * @var Slavik\Elogic\Model\ResourceModel\Vendor
     */
    protected $objectResourceModel;

    /**
     * Collection Factory
     *
     * @var Slavik\Elogic\Model\ResourceModel\Vendor\CollectionFactory
     */
    protected $collectionFactory;

    /**
     * Search Result Interface Factory
     *
     * @var Magento\Framework\Api\SearchResultsInterfaceFactory
     */
    protected $searchResultsFactory;

    /**
     * VendorRepository constructor.
     * @param VendorFactory $vendorFactory
     * @param ObjectResourceModel $objectResourceModel
     * @param CollectionFactory $collectionFactory
     * @param SearchResultsInterfaceFactory $searchResultsFactory
     */
    public function __construct(
        VendorFactory $vendorFactory,
        ObjectResourceModel $objectResourceModel,
        CollectionFactory $collectionFactory,
        SearchResultsInterfaceFactory $searchResultsFactory
    )
    {
        $this->objectFactory = $vendorFactory;
        $this->objectResourceModel = $objectResourceModel;
        $this->collectionFactory = $collectionFactory;
        $this->searchResultsFactory = $searchResultsFactory;
    }

    /**
     * Save Vendor to db
     *
     * @param VendorInterface $object
     * @return mixed|VendorInterface
     * @throws CouldNotSaveException
     */
    public function save(VendorInterface $object)
    {
        try {
            $this->objectResourceModel->save($object);
        } catch (\Exception $e) {
            throw new CouldNotSaveException(__($e->getMessage()));
        }
        return $object;
    }

    /**
     * Return vendor by it's id
     *
     * @param $id
     * @return mixed|Vendor
     * @throws NoSuchEntityException
     */
    public function getById($id)
    {

        /** @var Vendor $object */
        $object = $this->objectFactory->create();
        $this->objectResourceModel->load($object, $id);
        if (!$object->getId()) {
            throw new NoSuchEntityException(__('Object with id "%1" does not exist.', $id));
        }
        return $object;
    }

    /**
     * Delete vendor from db
     *
     * @param VendorInterface $object
     * @return bool|mixed
     * @throws CouldNotDeleteException
     */
    public function delete(VendorInterface $object)
    {
        try {
            $this->objectResourceModel->delete($object);
        } catch (\Exception $exception) {
            throw new CouldNotDeleteException(__($exception->getMessage()));
        }
        return true;
    }

    /**
     * Delete vendor from db bi it's id
     *
     * @param $id
     * @return mixed
     * @throws CouldNotDeleteException
     * @throws NoSuchEntityException
     */
    public function deleteById($id)
    {
        return $this->delete($this->getById($id));
    }

    /**
     * Get list of vendor instance bu searchCriteria
     *
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return mixed
     */
    public function getList(\Magento\Framework\Api\SearchCriteriaInterface $searchCriteria)
    {

    }
}