<?php
/**
 * class InstallData
 *
 * @category  Slavik\Elogic\Setup;
 * @package   Slavik\Elogic
 * @author    Stanislav Lelyuk <lelyuk.stanislav@gmail.com>
 * @copyright 2019 Stanislav Lelyuk
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
     * Upgrades data for the module
     *
     * @param ModuleDataSetupInterface $setup
     * @param ModuleContextInterface $context
     * @return void
     */
    public function install(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        $eavSetup = $this->eavSetupFactory->create();
        $eavSetup->removeAttribute(ProductAttributeInterface::ENTITY_TYPE_CODE,'elogic_vendor');
        $attributeCode="elogic_vendor";
        $eavSetup->addAttribute(ProductAttributeInterface::ENTITY_TYPE_CODE, $attributeCode,[
            'group' => 'General',
            'type' => 'int',
            'label' => 'Elogic Vendor',
            'input' => 'select',
            'source' =>  'Slavik\Elogic\Model\Attribute\Source\Vendor',
            'required' => false,
            'sort_order' => 990,
            'global' => \Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface::SCOPE_GLOBAL,
            'visible' => true,
            'is_html_allowed_on_front' => true,
            'visible_on_front' => false,
            'option' => [
                'values' => [],
    ]
        ]);
    }
}