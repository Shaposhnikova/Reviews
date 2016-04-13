<?php

class Sasha_Reviews_Model_Resource_Reviews extends Mage_Core_Model_Resource_Db_Abstract
{
    public function _construct()
    {
        $this->_init('reviews/reviews_table', 'opinion_id');
    }
}
