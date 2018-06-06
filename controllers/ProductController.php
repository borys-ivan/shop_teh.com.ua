<?php

include_once ROOT . '/models/Product.php';
include_once ROOT . '/models/Busket.php';

class ProductController
{
    public function actionView($id)
    {
        if ($id) {

            $ProductId = Product::getProductId($id);

            Busket::basket();

            // if(isset($_POST())) {
            //     Busket::add_to_basket($id);
            // }

            require_once(ROOT . '/views/product/view.php');
        }


        return true;
    }

    public function actionBasket($id)
    {

        Busket::add_to_basket($id);
        //$busket=$_SESSION['busket'];
        Busket::total_items();
        Busket::total_price();

        return true;
    }


    public function actionRemove($id)
    {

        //Busket::remove_from_basket($id);
        Busket::subtract_total_items($id);
        Busket::subtract_total_price($id);

        return true;
    }

}