<?php

class Sasha_Reviews_ReviewController extends Mage_Core_Controller_Front_Action
{
    public function createAction()
    {
        $params = $this->getRequest()->getParams();
        $reviewsModel = Mage::getModel('reviews/reviews');

        function check_length($value = "", $min, $max)
        {
            $result = (mb_strlen($value) < $min || mb_strlen($value) > $max);
            return !$result;
        }

        // $reviewsModel->setCustomerId($params['customer_id']);

        if (array_key_exists('customer_id', $params)) {
            $customer_id = $params['customer_id'];

            $isParameterValid = true;

            if (empty($params['customer_id'])) {

                echo "You have not filled in the field 'customer_id', please, go back and try again <br>";

                $isParameterValid = false;
            }

            if (check_length($params['customer_id'], 1, 3)) {

                echo "Thank you, all right! <br>";

            } else {

                echo "Keeping data in the 'customer_id' incorrectly! <br>";

                $isParameterValid = false;
            }

            if ($isParameterValid == true) {
                $reviewsModel->setCustomerId($customer_id);
            }
        }

        //  $reviewsModel->setDescription($params['description']);

        if (array_key_exists('description', $params)) {
            $description = $params['description'];
            $isParameterValid = true;


            if (empty($params['description'])) {

                echo "You have not filled in the field 'description', please, go back and try again <br>";

                $isParameterValid = false;
            }

            if (check_length($params['description'], 2, 25)) {

                echo "Thank you, all right! <br>";

            } else {

                echo "Keeping data in the 'customer_id' incorrectly! <br>";

                $isParameterValid = false;
            }


            if ($isParameterValid == true) {
                $reviewsModel->setDescription($description);
            }
        }

        //  $reviewsModel->setAdvantage($params['advantage']);

        if (array_key_exists('advantage', $params)) {
            $advantage = $params['advantage'];
            $isParameterValid = true;


            if (empty($params['advantage'])) {

                echo "You have not filled in the field 'advantage', please, go back and try again <br>";
                $isParameterValid = false;
            }

            if (check_length($params['advantage'], 2, 25)) {

                echo "Thank you, all right! <br>";

            } else {

                echo "Keeping data in the 'customer_id' incorrectly! <br>";

                $isParameterValid = false;
            }


            if ($isParameterValid == true) {
                $reviewsModel->setAdvantage($advantage);
            }
        }

        // $reviewsModel->setDisadvantage($params['disadvantage']);

        if (array_key_exists('disadvantage', $params)) {
            $disadvantage = $params['disadvantage'];
            $isParameterValid = true;


            if (empty($params['disadvantage'])) {

                echo "You have not filled in the field 'disadvantage', please, go back and try again <br>";
                $isParameterValid = false;
            }

            if (check_length($params['disadvantage'], 2, 25)) {

                echo "Thank you, all right! <br>";

            } else {

                echo "Keeping data in the 'customer_id' incorrectly! <br>";

                $isParameterValid = false;
            }

            if ($isParameterValid == true) {
                $reviewsModel->setDisadvantage($disadvantage);
            }
        }

        //  $reviewsModel->setReting($params['reting']);

        if (array_key_exists('reting', $params)) {
            $reting = $params['reting'];
            $isParameterValid = true;

            if (empty($params['reting'])) {

                echo "You have not filled in the field 'reting', please, go back and try again <br>";
                $isParameterValid = false;
            }

            if (check_length($params['reting'], 1, 5)) {

                echo "Thank you, all right! <br>";

            } else {

                echo "Keeping data in the 'customer_id' incorrectly! <br>";

                $isParameterValid = false;
            }

            if ($isParameterValid == true) {
                $reviewsModel->setReting($reting);
            }
        }

        //   $reviewsModel->setRecommend($params['recommend']);

        if (array_key_exists('recommend', $params)) {
            $recommend = $params['recommend'];
            $isParameterValid = true;

            if (empty($params['recommend'])) {

                echo "You have not filled in the field 'recommend', please, go back and try again <br>";
                $isParameterValid = false;
            }

            if (check_length($params['recommend'], 2, 50)) {

                echo "Thank you, all right! <br>";

            } else {

                echo "Keeping data in the 'customer_id' incorrectly! <br>";

                $isParameterValid = false;
            }

            if ($isParameterValid == true) {
                $reviewsModel->setRecommend($recommend);
            }
        }


        //   $reviewsModel->setDataAdd($params['data_add']);

        if (array_key_exists('data_add', $params)) {
            $data_add = $params['data_add'];
            $isParameterValid = true;

            if (empty($params['data_add'])) {

                echo "You have not filled in the field 'data_add', please, go back and try again <br>";
                $isParameterValid = false;
            }

            if (check_length($params['data_add'], 2, 50)) {

                echo "Thank you, all right! <br>";

            } else {

                echo "Keeping data in the 'customer_id' incorrectly! <br>";

                $isParameterValid = false;
            }

            if ($isParameterValid == true) {
                $reviewsModel->setDataAdd($data_add);
            }
        }

        //    $reviewsModel->setProductId($params['product_id']);

        if (array_key_exists('product_id', $params)) {
            $product_id = $params['product_id'];
            $isParameterValid = true;

            if (empty($params['product_id'])) {

                echo "You have not filled in the field 'product_id', please, go back and try again <br>";
                $isParameterValid = false;
            }

            if (check_length($params['product_id'], 2, 50)) {

                echo "Thank you, all right! <br>";

            } else {

                echo "Keeping data in the 'customer_id' incorrectly! <br>";

                $isParameterValid = false;
            }

            if ($isParameterValid == true) {
                $reviewsModel->setProductId($product_id);
            }
        }
        $reviewsModel->save();
    }

    public function readAction()
    {
        echo '<pre>';
        $params = $this->getRequest()->getParams();

        $product = Mage::getModel('reviews/reviews')->load($params['opinion_id']);

        function check_length($value = "", $min, $max)
        {
            $result = (mb_strlen($value) < $min || mb_strlen($value) > $max);
            return !$result;
        }

        if (array_key_exists('opinion_id', $params)) {
            $opinion_id = $params['opinion_id'];
            $isParameterValid = true;
            if (empty($params['opinion_id'])) {

                echo "You have not filled in the field 'opinion_id', please, go back and try again <br>";
                $isParameterValid = false;
            }

            if (check_length($params['opinion_id'], 1, 3)) {

                echo "Thank you, all right! <br>";

            } else {

                echo "Keeping data in the 'opinion_id' incorrectly! <br>";

                $isParameterValid = false;
            }

            if ($isParameterValid == true) {
                $product->setOpinionId($opinion_id);
            }

            var_dump($product->getData());

        }
    }

    public function updateAction()
    {
        $params = $this->getRequest()->getParams();

        $reviewsModel = Mage::getModel('reviews/reviews');

        $opinion = $reviewsModel->load($params['opinion_id']);

        function check_length($value = "", $min, $max)
        {
            $result = (mb_strlen($value) < $min || mb_strlen($value) > $max);
            return !$result;
        }

        if (array_key_exists('opinion_id', $params)) {
            $opinion_id = $params['opinion_id'];

            $isParameterValid = true;

            if (empty($params['opinion_id'])) {

                echo "You have not filled in the field 'customer_id', please, go back and try again <br>";

                $isParameterValid = false;
            }

            if (check_length($params['opinion_id'], 1, 3)) {

                echo "Thank you, all right! <br>";

            } else {

                echo "Keeping data in the 'customer_id' incorrectly! <br>";

                $isParameterValid = false;
            }

            if ($isParameterValid == true) {
                $opinion->setOpinionId($opinion_id);
            }
        }

        if (array_key_exists('customer_id', $params)) {
            $customer_id = $params['customer_id'];

            $isParameterValid = true;

            if (empty($params['customer_id'])) {

                echo "You have not filled in the field 'customer_id', please, go back and try again <br>";

                $isParameterValid = false;
            }

            if (check_length($params['customer_id'], 1, 3)) {

                echo "Thank you, all right! <br>";

            } else {

                echo "Keeping data in the 'customer_id' incorrectly! <br>";

                $isParameterValid = false;
            }

            if ($isParameterValid == true) {
                $reviewsModel->setCustomerId($customer_id);
            }
        }

        if (array_key_exists('description', $params)) {
            $description = $params['description'];
            $isParameterValid = true;


            if (empty($params['description'])) {

                echo "You have not filled in the field 'description', please, go back and try again <br>";

                $isParameterValid = false;
            }

            if (check_length($params['description'], 2, 25)) {

                echo "Thank you, all right! <br>";

            } else {

                echo "Keeping data in the 'customer_id' incorrectly! <br>";

                $isParameterValid = false;
            }


            if ($isParameterValid == true) {
                $opinion->setDescription($description);
            }
        }

        if (array_key_exists('advantage', $params)) {
            $advantage = $params['advantage'];
            $isParameterValid = true;


            if (empty($params['advantage'])) {

                echo "You have not filled in the field 'advantage', please, go back and try again <br>";
                $isParameterValid = false;
            }

            if (check_length($params['advantage'], 2, 25)) {

                echo "Thank you, all right! <br>";

            } else {

                echo "Keeping data in the 'customer_id' incorrectly! <br>";

                $isParameterValid = false;
            }


            if ($isParameterValid == true) {
                $reviewsModel->setAdvantage($advantage);
            }
        }

        if (array_key_exists('disadvantage', $params)) {
            $disadvantage = $params['disadvantage'];
            $isParameterValid = true;


            if (empty($params['disadvantage'])) {

                echo "You have not filled in the field 'disadvantage', please, go back and try again <br>";
                $isParameterValid = false;
            }

            if (check_length($params['disadvantage'], 2, 25)) {

                echo "Thank you, all right! <br>";

            } else {

                echo "Keeping data in the 'customer_id' incorrectly! <br>";

                $isParameterValid = false;
            }

            if ($isParameterValid == true) {
                $reviewsModel->setDisadvantage($disadvantage);
            }
        }

        if (array_key_exists('reting', $params)) {
            $reting = $params['reting'];
            $isParameterValid = true;

            if (empty($params['reting'])) {

                echo "You have not filled in the field 'reting', please, go back and try again <br>";
                $isParameterValid = false;
            }

            if (check_length($params['reting'], 1, 5)) {

                echo "Thank you, all right! <br>";

            } else {

                echo "Keeping data in the 'customer_id' incorrectly! <br>";

                $isParameterValid = false;
            }

            if ($isParameterValid == true) {
                $reviewsModel->setReting($reting);
            }
        }

        if (array_key_exists('recommend', $params)) {
            $recommend = $params['recommend'];
            $isParameterValid = true;

            if (empty($params['recommend'])) {

                echo "You have not filled in the field 'recommend', please, go back and try again <br>";
                $isParameterValid = false;
            }

            if (check_length($params['recommend'], 2, 50)) {

                echo "Thank you, all right! <br>";

            } else {

                echo "Keeping data in the 'customer_id' incorrectly! <br>";

                $isParameterValid = false;
            }

            if ($isParameterValid == true) {
                $reviewsModel->setRecommend($recommend);
            }
        }

        if (array_key_exists('data_add', $params)) {
            $data_add = $params['data_add'];
            $isParameterValid = true;

            if (empty($params['data_add'])) {

                echo "You have not filled in the field 'data_add', please, go back and try again <br>";
                $isParameterValid = false;
            }

            if (check_length($params['data_add'], 2, 50)) {

                echo "Thank you, all right! <br>";

            } else {

                echo "Keeping data in the 'customer_id' incorrectly! <br>";

                $isParameterValid = false;
            }

            if ($isParameterValid == true) {
                $reviewsModel->setDataAdd($data_add);
            }
        }


        if (array_key_exists('product_id', $params)) {
            $product_id = $params['product_id'];
            $isParameterValid = true;

            if (empty($params['product_id'])) {

                echo "You have not filled in the field 'product_id', please, go back and try again <br>";
                $isParameterValid = false;
            }

            if (check_length($params['product_id'], 1, 3)) {

                echo "Thank you, all right! <br>";

            } else {

                echo "Keeping data in the 'customer_id' incorrectly! <br>";

                $isParameterValid = false;
            }

            if ($isParameterValid == true) {
                $reviewsModel->setProductId($product_id);

            }
        }
        $reviewsModel->save();
    }

    public function deleteAction()
    {
        $params = $this->getRequest()->getParams();
        $reviewsModel = Mage::getModel('reviews/reviews');

        function check_length($value = "", $min, $max)
        {
            $result = (mb_strlen($value) < $min || mb_strlen($value) > $max);
            return !$result;
        }

        if (array_key_exists('opinion_id', $params)) {
            $isParameterValid = true;
            if (empty($params['opinion_id'])) {

                echo "You have not filled in the field 'opinion_id', please, go back and try again <br>";
                $isParameterValid = false;
            }

            if (check_length($params['opinion_id'], 1, 3)) {

                echo "Thank you, all right! <br>";

            } else {

                echo "Keeping data in the 'opinion_id' incorrectly! <br>";

                $isParameterValid = false;
            }

            if ($isParameterValid == true) {
                $opinion = $reviewsModel->load($params['opinion_id']);
                $opinion->delete();
            }
        }
    }
}