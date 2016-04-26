<?php

class Sasha_Reviews_ReviewController extends Mage_Core_Controller_Front_Action
{
    public function checkLength($value, $min, $max)
    {
        $result = (mb_strlen($value) < $min || mb_strlen($value) > $max);
        return !$result;
    }

    public function createAction($opinionId = null)
    {
        $params = $this->getRequest()->getParams();

        if (empty($opinionId)) {
            $reviewsModel = Mage::getModel('reviews/reviews');
        } else {
            $reviewsModel = Mage::getModel('reviews/reviews')->load($opinionId);
        }
//        if (!empty($params['customer_id'])) {
//            $customerId = $params['customer_id'];
//            $isParameterValid = true;
//            if ($this->checkLength($customerId, 1, 3)) {
//                Mage::getSingleton('core/session')->addSuccess('The "customer_id" is filled correctly!');
//            } else {
//                Mage::getSingleton('core/session')->addError('The "customer_id" is invalid!');
//                $isParameterValid = false;
//            }
//        } else {
//            Mage::getSingleton('core/session')->addError('You have not filled in the field "customer_id", please, go back and try again');
//            $isParameterValid = false;
//        }
//        if ($isParameterValid) {
//            $reviewsModel->setCustomerId($customerId);
//        }
        if (!empty($params['description'])) {
            $description = $params['description'];
            $isParameterValid = true;

        } else {
            Mage::getSingleton('core/session')->addError('You have not filled in the field "description", please, go back and try again');
            $isParameterValid = false;
        }
        if ($isParameterValid) {
            $reviewsModel->setDescription($description);
        }
        if (!empty($params['advantage'])) {
            $advantage = $params['advantage'];
            $isParameterValid = true;
        } else {
            Mage::getSingleton('core/session')->addError('You have not filled in the field "advantage", please, go back and try again');
            $isParameterValid = false;
        }
        if ($isParameterValid) {
            $reviewsModel->setAdvantage($advantage);
        }
        if (!empty($params['disadvantage'])) {
            $disadvantage = $params['disadvantage'];
            $isParameterValid = true;
        } else {
            Mage::getSingleton('core/session')->addError('You have not filled in the field "disadvantage", please, go back and try again');
            $isParameterValid = false;
        }
        if ($isParameterValid) {
            $reviewsModel->setDisadvantage($disadvantage);
        }
        if (!empty($params['rating'])) {
            $rating = $params['rating'];
            $isParameterValid = true;
        } else {
            Mage::getSingleton('core/session')->addError('You have not filled in the field "rating", please, go back and try again');
            $isParameterValid = false;
        }
        if ($isParameterValid) {
            $reviewsModel->setReting($rating);
        }
        if (!empty($params['recommend'])) {
            $recommend = $params['recommend'];
            $isParameterValid = true;
        } else {
            Mage::getSingleton('core/session')->addError('You have not filled in the field "recommend", please, go back and try again');
            $isParameterValid = false;
        }
        if ($isParameterValid) {
            $reviewsModel->setRecommend($recommend);
        }
        if (!empty($params['productId'])) {
            $productId = $params['productId'];
            $reviewsModel->setProductId($productId);
        }
        $dataAdd = Mage::getModel('core/date')->date('Y-m-d H:i:s');
        $reviewsModel->setDataAdd($dataAdd);
        $reviewsModel->save();
        $this->_redirectReferer();
        Mage::getSingleton('core/session')->addSuccess('Review successfully added!');

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
                echo "Opinion Id: <br>" . $opinionId . "<br>";
            }
        }
        if ($isOpinionIdValid == true) {
            $reviewsModel = Mage::getModel('reviews/reviews')->load($params['opinion_id']);
            $customerId = $reviewsModel->getCustomerId();
            if (!empty($customerId)) {
                echo "Customer Id: <br>" . $customerId . "<br>";
            }
            $description = $reviewsModel->getDescription();
            if (!empty($description)) {
                echo "Description: <br>" . $description . "<br>";
            }
            $advantage = $reviewsModel->getAdvantage();
            if (!empty($advantage)) {
                echo "Advantage: <br>" . $advantage . "<br>";
            }
            $disadvantage = $reviewsModel->getDisadvantage();
            if (!empty($disadvantage)) {
                echo "Disadvantage: <br>" . $disadvantage . "<br>";
            }
            $rating = $reviewsModel->getRating();
            if (!empty($rating)) {
                echo "Rating: <br>" . $rating . "<br>";
            }
            $recommend = $reviewsModel->getRecommend();
            if (!empty($recommend)) {
                echo "Recommend: <br>" . $recommend . "<br>";
            }
            $dataAdd = $reviewsModel->getDataAdd();
            if (!empty($dataAdd)) {
                echo "Data Add: <br>" . $dataAdd . "<br>";
            }
            $productId = $reviewsModel->getProductId();
            if (!empty($productId)) {
                echo "Product Id: <br>" . $productId . "<br>";
            }
        }
    }

    public function updateAction()
    {
        $params = $this->getRequest()->getParams();
        if($this->getRequest()->getParam('opinion_id')){
            $this->createAction($params['opinion_id']);
        }else{
            Mage::getSingleton('core/session')->addError('Please add "opinion id"!');
        }
    }

    public function deleteAction()
    {
        $params = $this->getRequest()->getParams();
        if (!empty($params['opinion_id'])) {
            $opinion = Mage::getModel('reviews/reviews')->load($params['opinion_id']);
            if($opinion->getData()){
                $opinion->delete();
                Mage::getSingleton('core/session')->addSuccess('Opinion was delete!');
            }else{
                Mage::getSingleton('core/session')->addError('Opinion id doesn\'t exist');
            }
        }
        $this->_redirectReferer();
    }
}