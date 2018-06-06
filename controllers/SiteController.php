<?php

include_once ROOT . '/models/CategoryList.php';



//include_once ROOT . '/models/Product.php';

class SiteController
{

    public function actionIndex()
    {
        //$categories = array();
        $categories = CategoryList::getCategoriesList();

        //print_r($categories);
        //echo $categories;

        //       $latestProducts = array();
        //       $latestProducts = Product::getLatestProducts(6);

        require_once(ROOT . '/views/site/index.php');

        return true;
    }

    public function actionView($id)
    {
        if ($id) {

            $CategoryId = CategoryList::getCategoryId($id);


            require_once(ROOT . '/views/category/view.php');
        }
        return true;
    }





}