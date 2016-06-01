<?php

/**
 * Tim
 *
 * @category   Tim
 * @package    Tim_CustomerWithoutOrder
 * @copyright  Copyright (c) 2015 Tim (http://tim.pl)
 * @author     Bogdan Bakalov <bakalov.bogdan@gmail.com>
 */
class Sasha_Reviews_Block_Adminhtml_SashaReport extends Mage_Adminhtml_Block_Widget_Grid_Container
{
    /**
     * Init grid container
     */
    public function __construct()
    {
        $this->_blockGroup = 'reviews';
        $this->_controller = 'adminhtml_sashaReport';
        $this->_headerText = Mage::helper('sasha_reviews')->__('Reviews8');

        parent::__construct();
        $this->_removeButton('add');
    }
}
