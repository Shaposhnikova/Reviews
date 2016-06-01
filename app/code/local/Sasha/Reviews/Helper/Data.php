<?php

class Sasha_Reviews_Helper_Data extends Mage_Core_Helper_Abstract
{
    public function getSurname()
    {
        return 'surname';
    }

    public function getReviewsIds()
    {
        $collection = Mage::getModel('reviews/reviews')->getCollection();
        $array = array();
        foreach ($collection as $value) {
            if (strlen($value->getAdvantage()) > 5) {
                $array[$value->getAdvantage()] = substr($value->getAdvantage(), 0, 5) . ' ...';
            } else if (strlen($value->getAdvantage()) < 5) ;
            {
                $array[$value->getAdvantage()] = $value->getAdvantage();
            }
        }
        return $array;
    }

    public function getReviewsRating()
    {
        $collection = Mage::getModel('reviews/reviews')->getCollection();
        $array = array();
        foreach ($collection as $value) {
            $array[$value->getReting()] = $value->getReting();
        }
        return $array;
    }
}
