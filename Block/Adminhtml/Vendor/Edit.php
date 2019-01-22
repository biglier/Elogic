<?php
/**
 * class Edit
 *
 * @category  Slavik\Elogic\Block\Adminhtml\Vendor;
 * @package   Slavik\Elogic
 * @author    Stanislav Lelyuk <lelyuk.stanislav@gmail.com>
 * @copyright 2019 Stanislav Lelyuk
 */

namespace Slavik\Elogic\Block\Adminhtml\Vendor;

use Magento\Backend\Block\Widget\Form\Container;

class Edit extends Container
{
    /**
     * Core registry
     *
     * @var \Magento\Framework\Registry
     */
    protected $_coreRegistry = null;

    /**
     * @param \Magento\Backend\Block\Widget\Context $context
     * @param \Magento\Framework\Registry $registry
     * @param array $data
     */
    public function __construct(
        \Magento\Backend\Block\Widget\Context $context,
        \Magento\Framework\Registry $registry,
        array $data = []
    )
    {
        $this->_coreRegistry = $registry;
        parent::__construct($context, $data);
    }

    /**
     * Vendor edit block
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_objectId = 'vendor_id';
        $this->_blockGroup = 'Slavik_Elogic';
        $this->_controller = 'adminhtml_vendor';

        parent::_construct();

        $this->buttonList->update('save', 'label', __('Save Vendor'));
        $this->buttonList->add(
            'saveandcontinue',
            [
                'label' => __('Save and Continue Edit'),
                'class' => 'save',
                'data_attribute' => [
                    'mage-init' => [
                        'button' => ['event' => 'saveAndContinueEdit', 'target' => '#edit_form'],
                    ],
                ]
            ],
            -100
        );
    }

    /**
     * Get header with Vendor name
     *
     * @return \Magento\Framework\Phrase
     */
    public function getHeaderText()
    {
        if ($this->_coreRegistry->registry('elogic_vendor')->getId()) {
            return __("Edit Vendor '%1'", $this->escapeHtml($this->_coreRegistry->registry('elogic_vendor')->getName()));
        } else {
            return __('New Department');
        }
    }

    /**
     * Getter of url for "Save and Continue" button
     * tab_id will be replaced by desired by JS later
     *
     * @return string
     */
    protected function _getSaveAndContinueUrl()
    {
        return $this->getUrl('vendors/*/save', ['_current' => true, 'back' => 'edit', 'active_tab' => '']);
    }
}