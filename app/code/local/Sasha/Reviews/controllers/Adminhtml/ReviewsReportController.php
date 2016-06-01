<?php
/**
 * Tim
 *
 * @category   Tim
 * @package    Tim_CustomerWithoutOrder
 * @copyright  Copyright (c) 2015 Tim (http://tim.pl)
 * @author     Bogdan Bakalov <bakalov.bogdan@gmail.com>
 */
class Sasha_Reviews_Adminhtml_ReviewsReportController extends Mage_Adminhtml_Controller_Action
{
    public function indexAction()
    {
        $this->_title($this->__('Reviews'));
        $this->loadLayout();
        $this->_setActiveMenu('report/sasha');
        $this->_addContent($this->getLayout()->createBlock('reviews/adminhtml_reviewsReport'));
        $this->renderLayout();
    }

    /**
     * Grid action
     *
     * @return null
     */
    public function gridAction()
    {
        $this->loadLayout();
        $this->getResponse()->setBody(
            $this->getLayout()->createBlock('reviews/adminhtml_reviewsReport_grid')->toHtml()
        );
    }

    /**
     * Check is allowed access to action
     *
     * @return bool
     */
    protected function _isAllowed()
    {
        return Mage::getSingleton('admin/session')->isAllowed('report/sasha/sasha_reviews_report');
    }
}