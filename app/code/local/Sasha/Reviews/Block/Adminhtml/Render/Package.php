<?php
/**
 * Tim
 *
 * @category  Tim
 * @package   Tim_Customization
 * @copyright Copyright (c) 2015 Tim (http://tim.pl)
 * @author    Bogdan Bakalov <bakalov.bogdan@gmail.com>
 */
class Tim_CustomerWithoutOrder_Block_Adminhtml_Render_Package extends Mage_Adminhtml_Block_Widget_Grid_Column_Renderer_Abstract
{
    public function render(Varien_Object $row)
    {
        $value = $row->getData($this->getColumn()->getIndex());
        $collection = Mage::getModel('tim_package/package')->getCollection();
        $collection->addFieldToFilter('package_id', $value);
        $item = $collection->getFirstItem();
        $packageName = $item->getTimPackageName() ? $item->getTimPackageName() : '';

        return $packageName;
    }
}