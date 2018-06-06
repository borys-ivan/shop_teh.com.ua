<?php

include_once ROOT . '/models/CategoryList.php';
include_once ROOT . '/models/Busket.php';
include_once ROOT . '/components/Pagination.php';

class CategoryController
{

    public function actionView($id,$page=1)
    {
        if ($id) {

            $recommend_product=CategoryList::recommend_product($id);

            $CategoryId = CategoryList::getCategoryId($id,$page);

            $total=CategoryList::getProductCount($id);
            
            Busket::basket();

            $pagination=new Pagination($total,$page,CategoryList::SHOW_BY_DEFAULT,'page-');


            require_once (ROOT.'/views/category/view.php');
        }
        
        
        
        return true;
    }

}