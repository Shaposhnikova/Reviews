<?php
/**
 * Tim
 *
 * @category   Tim
 * @package    Tim_CustomerWithoutOrder
 * @copyright  Copyright (c) 2015 Tim (http://tim.pl)
 * @author     Bogdan Bakalov <bakalov.bogdan@gmail.com>
 */
class Sasha_Reviews_Block_Adminhtml_ReviewsReport_Grid extends Mage_Adminhtml_Block_Widget_Grid
{
    /**
     * Init grid
     */
    public function __construct()
    {
        parent::__construct();
        $this->setId('sasha_reviews_reviews_report');
        $this->setDefaultDir('DESC');
        $this->setSaveParametersInSession(true);
        $this->setUseAjax(true);
    }

    protected function _prepareCollection()
    {
        $collection = Mage::getModel('reviews/reviews')->getCollection();
        $this->setCollection($collection);

        return parent::_prepareCollection();
    }

    /**
     * Prepare grid columns
     *
     */
    protected function _prepareColumns()
    {
        $this->addColumn('opinion_id', array(
            'header' => Mage::helper('sasha_reviews')->__('Id'),
            'width' => '100',
            'index' => 'opinion_id'
        ));
        $this->addColumn('description', array(
            'header' => Mage::helper('sasha_reviews')->__('Description'),
            'width' => '100',
            'index' => 'description',
            'filter' => false
        ));
        $this->addColumn('advantage', array(
            'header' => Mage::helper('sasha_reviews')->__('Advantage'),
            'width' => '100',
            'index' => 'advantage',
            'renderer' => 'Sasha_Reviews_Block_Adminhtml_Render_Advantage'
        ));
        $this->addColumn('opinion_id_options', array(
            'header' => Mage::helper('sasha_reviews')->__('option ids'),
            'width' => '100',
            'index' => 'recommend',
            'type' => 'options',
            'options' => Mage::helper('sasha_reviews')->getReviewsIds(),
        ));

        return parent::_prepareColumns();
    }

    /**
     * Returns a grid URL
     *
     * @return string
     */
    public function getGridUrl()
    {
        return $this->getUrl('*/*/grid', array('_current' => true));
    }
}