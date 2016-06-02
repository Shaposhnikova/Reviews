<?php
class Sasha_Reviews_Block_Adminhtml_SashaReport_Grid extends Mage_Adminhtml_Block_Widget_Grid
{
    /**
     * Init grid
     */
    public function __construct()
    {
        parent::__construct();
        $this->setId('sasha_reviews_sasha_report');
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
        $this->addColumn('product_id', array(
            'header' => Mage::helper('sasha_reviews')->__('Product id'),
            'width' => '100',
            'index' => 'product_id'
        ));
        $this->addColumn('product_name', array(
            'header' => Mage::helper('sasha_reviews')->__('Product name'),
            'width' => '100',
            'index' => 'product_id',
            'renderer' => 'Sasha_Reviews_Block_Adminhtml_Render_ProductName',
            'sortable' => false,
            'filter' => false
        ));
        $this->addColumn('customer_name', array(
            'header' => Mage::helper('sasha_reviews')->__('Customer  name'),
            'width' => '100',
            'index' => 'customer_id',
            'renderer' => 'Sasha_Reviews_Block_Adminhtml_Render_CustomerName',
            'sortable' => false,
            'filter' => false

        ));
        $this->addColumn('description', array(
            'header' => Mage::helper('sasha_reviews')->__('Description'),
            'width' => '100',
            'index' => 'description',
        ));
        $this->addColumn('advantage', array(
            'header' => Mage::helper('sasha_reviews')->__('Advantage'),
            'width' => '100',
            'index' => 'advantage',
            'renderer' => 'Sasha_Reviews_Block_Adminhtml_Render_Advantage'
        ));
        $this->addColumn('disadvantage', array(
            'header' => Mage::helper('sasha_reviews')->__('Disadvantage'),
            'width' => '100',
            'index' => 'disadvantage',
        ));
        $this->addColumn('rating', array(
            'header' => Mage::helper('sasha_reviews')->__('Rating'),
            'width' => '100',
            'index' => 'reting',
            'type' => 'options',
            'options' => Mage::helper('sasha_reviews')->getReviewsRating(),
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