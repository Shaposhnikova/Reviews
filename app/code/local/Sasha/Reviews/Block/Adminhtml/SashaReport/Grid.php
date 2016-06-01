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
//        echo '<pre>';
//        var_dump($collection->getData());
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
            'renderer' => 'Sasha_Reviews_Block_Adminhtml_Render_Description'
        ));
        $this->addColumn('advantage', array(
            'header' => Mage::helper('sasha_reviews')->__('Advantage'),
            'width' => '100',
            'index' => 'advantage',
        ));
        $this->addColumn('opinion_id_options', array(
            'header' => Mage::helper('sasha_reviews')->__('option ids'),
            'width' => '100',
            'index' => 'recommend',
            'type' => 'options',
            'options' => Mage::helper('sasha_reviews')->getReviewsIds(),
        ));
        $this->addColumn('rating', array(
            'header' => Mage::helper('sasha_reviews')->__('rating'),
            'width' => '100',
            'index' => 'rating',
            'type' => 'options',
            'options' => Mage::helper('sasha_reviews')->getReviewsRating(),
        ));
//        $this->addColumn('package_id', array(
//            'header' => 'Package',
//            'width' => '50',
//            'index' => 'package_id',
////            'type' => 'options',
////            'options' => Mage::helper('tim_customer_without_order')->getPackageOptions(),
//            'filter_index' => 'tim_package.tim_package_name',
//            'renderer' => 'Tim_CustomerWithoutOrder_Block_Adminhtml_Render_Package'
//        ));
//        $this->addColumn('channel', array(
//            'header' => Mage::helper('tim_customer_without_order')->__('Channel'),
//            'width' => '30',
//            'index' => 'channel'
//        ));
//        $this->addColumn('date_add', array(
//            'header' => Mage::helper('tim_customer_without_order')->__('Date add'),
//            'index' => 'date_add',
//            'type' => 'datetime',
//            'width' => '100'
//        ));
//
//        $this->addExportType('*/*/exportCsv', Mage::helper('sales')->__('CSV'));
//        $this->addExportType('*/*/exportExcel', Mage::helper('sales')->__('Excel XML'));

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
//
//    /**
//     * Returns a row URL
//     *
//     * @param mixed $row row
//     *
//     * @return string
//     */
//    public function getRowUrl($row)
//    {
//        return $this->getUrl('*/customer/edit', array(
//                'store' => $this->getRequest()->getParam('store'),
//                'id' => $row->getCustomerId())
//        );
//    }
}