<?php

class Sasha_Reviews_Helper_Data extends Mage_Core_Helper_Abstract
{
    public function getSurname()
    {
        return 'surname';
    }

    public function getReviewsRating()
    {
        $collection = Mage::getModel('reviews/reviews')->getCollection();
        $ratingArray = array();
        $sortRatingArray = array();
        foreach ($collection as $value) {
            $ratingArray[$value->getReting()] = $value->getReting();
        }
        ksort($ratingArray);
        foreach ($ratingArray as $key => $val) {
            $sortRatingArray[$key] = $val;
        }
        return $sortRatingArray;
    }
}
