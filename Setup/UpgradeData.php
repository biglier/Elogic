<?php
/**
 * Created by PhpStorm.
 * User: slava
 * Date: 17.01.19
 * Time: 19:20
 */

namespace Slavik\Elogic\Setup;

use Magento\Catalog\Api\Data\ProductAttributeInterface;
use Magento\Eav\Setup\EavSetupFactory;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\UpgradeDataInterface;

class UpgradeData implements UpgradeDataInterface
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
    public function __construct(EavSetupFactory $eavSetupFactory)
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
    public function upgrade(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        /*if (version_compare($context->getVersion(), '1.0.0.0') < 0)
        {

            $eavSetup = $this->eavSetupFactory->create();
            $eavSetup->removeAttribute(ProductAttributeInterface::ENTITY_TYPE_CODE,'elogic_vendor');
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
        }*/
    }
}