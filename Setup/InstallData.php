<?php
/**
 * Created by PhpStorm.
 * User: slava
 * Date: 17.01.19
 * Time: 19:20
 */

namespace Slavik\Elogic\Setup;

use Magento\Catalog\Api\Data\ProductAttributeInterface;
use Magento\Catalog\Api\Data\ProductAttributeInterfaceFactory;
use Magento\Eav\Setup\EavSetupFactory;
use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;

class InstallData implements InstallDataInterface
{
    /**
     * Eav setup factory
     * @var EavSetupFactory
     */
    private $eavSetupFactory;

    /**
     * Init
     * @param EavSetupFactory $eavSetupFactory
     */
    public function __construct(\Magento\Eav\Setup\EavSetupFactory $eavSetupFactory)
    {
        $this->eavSetupFactory = $eavSetupFactory;
    }
    /**
     * Upgrades data for a module
     *
     * @param ModuleDataSetupInterface $setup
     * @param ModuleContextInterface $context
     * @return void
     */
    public function install(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        $eavSetup = $this->eavSetupFactory->create();
        $attributeCode="elogic_vendor";
        $eavSetup->addAttribute(ProductAttributeInterface::ENTITY_TYPE_CODE, $attributeCode,[
            'group' => 'General',
            'type' => 'int',
            'label' => 'Elogic Vendor',
            'input' => 'multiselect',
            'frontend' => 'Slavik\Elogic\Model\Vendor',
            'backend' => 'Slavik\Elogic\Model\Vendor',
            'source' =>  'Slavik\Elogic\Model\Attribute\Source\Vendor',
            'table' => 'slavik_elogic_vendor',
            'required' => false,
            'sort_order' => 990,
            'global' => \Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface::SCOPE_GLOBAL,
            'is_used_in_grid' => false,
            'is_visible_in_grid' => false,
            'is_filterable_in_grid' => false,
            'visible' => true,
            'is_html_allowed_on_front' => true,
            'visible_on_front' => true
        ]);
    }
}