<?php

class Sasha_Test_Block_Adminhtml_Render_Country extends Mage_Adminhtml_Block_Widget_Grid_Column_Renderer_Abstract
{
    public function render(Varien_Object $row)
    {
        $customerId = $row->getData($this->getColumn()->getIndex());
        if ($customerId != null && !empty($customerId)) {
            $customer = Mage::getModel('customer/customer')->load($customerId);
            $customerAddress = array();

            foreach ($customer->getAddresses() as $address) {
                $customerAddress = $address->toArray();
            }

            $country_id = $customerAddress['country_id'];
            $countryModel = Mage::getModel('directory/country')->loadByCode($country_id);
            $countryName = $countryModel->getName();

            return $countryName;
        } else {
            echo '';
        }
    }
}

