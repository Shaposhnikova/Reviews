<?php

class Sasha_Reviews_ReviewController extends Mage_Core_Controller_Front_Action
{
    public function checkLength($value = "", $min, $max)
    {
        $result = (mb_strlen($value) < $min || mb_strlen($value) > $max);
        return !$result;
    }

    public function createAction()
    {
        $params = $this->getRequest()->getParams();
        $reviewsModel = Mage::getModel('reviews/reviews');

        if (array_key_exists('customer_id', $params)) {
            $customerId = $params['customer_id'];
            $isParameterValid = true;
            if (empty($customerId)) {
                echo "You have not filled in the field 'customer_id', please, go back and try again <br>";
                $isParameterValid = false;
            }
            if ($this->checkLength($customerId, 1, 3)) {
                echo "The 'customer_id' is filled correctly! <br>";
            } else {
                echo "The 'customer_id' is invalid! <br>";
                $isParameterValid = false;
            }
            if ($isParameterValid == true) {
                $reviewsModel->setCustomerId($customerId);
            }
        }
        if (array_key_exists('description', $params)) {
            $description = $params['description'];
            $isParameterValid = true;
            if (empty($description)) {
                echo "You have not filled in the field 'description', please, go back and try again <br>";
                $isParameterValid = false;
            } else {
                echo "The 'description' is filled correctly! <br>";
            }
            if ($isParameterValid == true) {
                $reviewsModel->setDescription($description);
            }
        }
        if (array_key_exists('advantage', $params)) {
            $advantage = $params['advantage'];
            $isParameterValid = true;
            if (empty($advantage)) {
                echo "You have not filled in the field 'advantage', please, go back and try again <br>";
                $isParameterValid = false;
            } else {
                echo "The 'advantage' is filled correctly! <br>";
            }
            if ($isParameterValid == true) {
                $reviewsModel->setAdvantage($advantage);
            }
        }
        if (array_key_exists('disadvantage', $params)) {
            $disadvantage = $params['disadvantage'];
            $isParameterValid = true;
            if (empty($disadvantage)) {
                echo "You have not filled in the field 'disadvantage', please, go back and try again <br>";
                $isParameterValid = false;
            } else {
                echo "The 'disadvantage' is filled correctly! <br>";
            }
            if ($isParameterValid == true) {
                $reviewsModel->setDisadvantage($disadvantage);
            }
        }
        if (array_key_exists('rating', $params)) {
            $rating = $params['rating'];
            $isParameterValid = true;
            if (empty($rating)) {
                echo "You have not filled in the field 'rating', please, go back and try again <br>";
                $isParameterValid = false;
            }
            if ($this->checkLength($rating, 1, 5)) {
                echo "The 'rating' is filled correctly! <br>";
            } else {
                echo "The 'rating' is invalid! <br>";
                $isParameterValid = false;
            }
            if ($isParameterValid == true) {
                $reviewsModel->setReting($rating);
            }
        }
        if (array_key_exists('recommend', $params)) {
            $recommend = $params['recommend'];
            $isParameterValid = true;
            if (empty($recommend)) {
                echo "You have not filled in the field 'recommend', please, go back and try again <br>";
                $isParameterValid = false;
            } else {
                echo "The 'recommend' is filled correctly!";
            }
            if ($isParameterValid == true) {
                $reviewsModel->setRecommend($recommend);
            }
        }
        if (array_key_exists('data_add', $params)) {
            $dataAdd = $params['data_add'];
            $isParameterValid = true;
            if (empty($dataAdd)) {
                echo "You have not filled in the field 'data_add', please, go back and try again <br>";
                $isParameterValid = false;
            }
            if ($this->checkLength($dataAdd, 2, 8)) {
                echo "The 'data_add' is filled correctly! <br>";
            } else {
                echo "The 'data_add' is invalid! <br>";
                $isParameterValid = false;
            }
            if ($isParameterValid == true) {
                $reviewsModel->setDataAdd($dataAdd);
            }
        }
        if (array_key_exists('product_id', $params)) {
            $productId = $params['product_id'];
            $isParameterValid = true;
            if (empty($productId)) {
                echo "You have not filled in the field 'product_id', please, go back and try again <br>";
                $isParameterValid = false;
            }
            if ($this->checkLength($productId, 1, 3)) {
                echo "The 'product_id' is filled correctly! <br>";
            } else {
                echo "The 'product_id' is invalid! <br>";
                $isParameterValid = false;
            }
            if ($isParameterValid == true) {
                $reviewsModel->setProductId($productId);
            }
        }
        $reviewsModel->save();
    }

    public function readAction()
    {
        $params = $this->getRequest()->getParams();
        $isOpinionIdValid = false;
        $opinionId = 0;
        if (array_key_exists('opinion_id', $params)) {
            $opinionId = $params['opinion_id'];
            if (empty($opinionId)) {
                echo "You have not filled in the field 'opinion_id', please, go back and try again <br>";
            }
            if ($this->checkLength($opinionId, 1, 3)) {
                $isOpinionIdValid = true;
            echo "Opinion Id: <br>" . $opinionId ."<br>";
            }
        }
        if($isOpinionIdValid == true){
            $reviewsModel = Mage::getModel('reviews/reviews')->load($params['opinion_id']);
            $opinionId = $reviewsModel->getOpinionId();
            $customerId = $reviewsModel->getCustomerId();
            if (!empty($customerId)) {
                echo "Customer Id: <br>" . $customerId ."<br>";
            }
            $description = $reviewsModel->getDescription();
            if (!empty($description)) {
                echo "Description: <br>" . $description ."<br>";
            }
            $advantage = $reviewsModel->getAdvantage();
            if (!empty($advantage)) {
                echo "Advantage: <br>" . $advantage ."<br>";
            }
            $disadvantage = $reviewsModel->getDisadvantage();
            if (!empty($disadvantage)) {
                echo "Disadvantage: <br>" . $disadvantage ."<br>";
            }
            $rating = $reviewsModel->getRating();
            if (!empty($rating)) {
                echo "Rating: <br>" . $rating ."<br>";
            }
            $recommend = $reviewsModel->getRecommend();
            if (!empty($recommend)) {
                echo "Recommend: <br>" . $recommend ."<br>";
            }
            $dataAdd = $reviewsModel->getDataAdd();
            if (!empty($dataAdd)) {
                echo "Data Add: <br>" . $dataAdd ."<br>";
            }
            $productId = $reviewsModel->getProductId();
            if (!empty($productId)) {
                echo "Product Id: <br>" . $productId ."<br>";
            }
        }
    }

    public function updateAction()
    {
        $params = $this->getRequest()->getParams();
        $reviewsModel = Mage::getModel('reviews/reviews');
        $opinion = $reviewsModel->load($params['opinion_id']);

        if (array_key_exists('customer_id', $params)) {
            $customerId = $params['customer_id'];
            $isParameterValid = true;
            if (empty($customerId)) {
                echo "You have not filled in the field 'customer_id', please, go back and try again <br>";
                $isParameterValid = false;
            }
            if ($this->checkLength($customerId, 1, 3)) {
                echo "The 'customer_id' is filled correctly! <br>";
            } else {
                echo "The 'customer_id' is invalid! <br>";
                $isParameterValid = false;
            }
            if ($isParameterValid == true) {
                $opinion->setCustomerId($customerId);
            }
        }
        if (array_key_exists('description', $params)) {
            $description = $params['description'];
            $isParameterValid = true;
            if (empty($description)) {
                echo "You have not filled in the field 'description', please, go back and try again <br>";
                $isParameterValid = false;
            } else {
                echo "The 'description' is filled correctly! <br>";
            }
            if ($isParameterValid == true) {
                $opinion->setDescription($description);
            }
        }
        if (array_key_exists('advantage', $params)) {
            $advantage = $params['advantage'];
            $isParameterValid = true;
            if (empty($advantage)) {
                echo "You have not filled in the field 'advantage', please, go back and try again <br>";
                $isParameterValid = false;
            } else {
                echo "The 'advantage' is filled correctly! <br>";
            }
            if ($isParameterValid == true) {
                $opinion->setAdvantage($advantage);
            }
        }
        if (array_key_exists('disadvantage', $params)) {
            $disadvantage = $params['disadvantage'];
            $isParameterValid = true;
            if (empty($disadvantage)) {
                echo "You have not filled in the field 'disadvantage', please, go back and try again <br>";
                $isParameterValid = false;
            } else {
                echo "The 'disadvantage' is filled correctly! <br>";
            }
            if ($isParameterValid == true) {
                $opinion->setDisadvantage($disadvantage);
            }
        }
        if (array_key_exists('rating', $params)) {
            $rating = $params['rating'];
            $isParameterValid = true;
            if (empty($rating)) {
                echo "You have not filled in the field 'rating', please, go back and try again <br>";
                $isParameterValid = false;
            }
            if ($this->checkLength($rating, 1, 5)) {
                echo "The 'rating' is filled correctly! <br>";
            } else {
                echo "The 'rating' is invalid! <br>";
                $isParameterValid = false;
            }
            if ($isParameterValid == true) {
                $opinion->setReting($rating);
            }
        }
        if (array_key_exists('recommend', $params)) {
            $recommend = $params['recommend'];
            $isParameterValid = true;
            if (empty($recommend)) {
                echo "You have not filled in the field 'recommend', please, go back and try again <br>";
                $isParameterValid = false;
            } else {
                echo "The 'recommend' is filled correctly!";
            }
            if ($isParameterValid == true) {
                $opinion->setRecommend($recommend);
            }
        }
        if (array_key_exists('data_add', $params)) {
            $dataAdd = $params['data_add'];
            $isParameterValid = true;
            if (empty($dataAdd)) {
                echo "You have not filled in the field 'data_add', please, go back and try again <br>";
                $isParameterValid = false;
            }
            if ($this->checkLength($dataAdd, 2, 8)) {
                echo "The 'data_add' is filled correctly! <br>";
            } else {
                echo "The 'data_add' is invalid! <br>";
                $isParameterValid = false;
            }
            if ($isParameterValid == true) {
                $opinion->setDataAdd($dataAdd);
            }
        }
        if (array_key_exists('product_id', $params)) {
            $productId = $params['product_id'];
            $isParameterValid = true;
            if (empty($productId)) {
                echo "You have not filled in the field 'product_id', please, go back and try again <br>";
                $isParameterValid = false;
            }
            if ($this->checkLength($productId, 1, 3)) {
                echo "The 'product_id' is filled correctly! <br>";
            } else {
                echo "The 'product_id' is invalid! <br>";
                $isParameterValid = false;
            }
            if ($isParameterValid == true) {
                $opinion->setProductId($productId);
            }
        }
        $reviewsModel->save();
    }

    public function deleteAction()
    {
        $params = $this->getRequest()->getParams();
        $reviewsModel = Mage::getModel('reviews/reviews');

        if (array_key_exists('opinion_id', $params)) {
            $isParameterValid = true;
            if (empty($params['opinion_id'])) {
                echo "You have not filled in the field 'opinion_id', please, go back and try again <br>";
                $isParameterValid = false;
            }
            if ($this->checkLength($params['opinion_id'], 1, 3)) {
                echo "The 'opinion_id' is filled correctly! <br>";
            } else {
                echo "The 'opinion_id' is invalid! <br>";
                $isParameterValid = false;
            }
            if ($isParameterValid == true) {
                $opinion = $reviewsModel->load($params['opinion_id']);
                $opinion->delete();
                echo "The 'opinion_id' is invalid! <br>";
            }
        }
    }
}