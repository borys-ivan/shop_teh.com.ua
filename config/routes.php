<?php


return array(

//    'product/([0-9]+)' => 'product/view/$1', // actionView в ProductController

//    'catalog' => 'catalog/index', // actionIndex в CatalogController
//    'category/([0-9]+)' => 'catalog/category/$1',  // actionCategory в CatalogController



    'admin/products_list/page-([0-9]+)' => 'admin/products/$1',



    'admin/delete_order/([0-9]+)'=> 'admin/delete_order/$1',

    'admin/delete_product/([0-9]+)'=> 'admin/delete_product/$1',

    'admin/update_order/([0-9]+)'=> 'admin/update_order/$1',



    'admin/update_product/([0-9]+)'=> 'admin/product/$1',




    'admin/add_product'=>'admin/addProduct',

    'admin/add_image'=>'admin/image',



    'admin/products_list'=> 'admin/products',

    'admin/users_list'=> 'admin/users',




    'admin/page-([0-9]+)'=>'admin/index/$1',

    'admin'=>'admin/index',




    'product/remove/([0-9]+)'=>'product/remove/$1', //++++

    'product/basket/([0-9]+)'=>'product/basket/$1',

    'product/([0-9]+)' => 'product/view/$1',


    'category/([a-z]+)/page-([0-9]+)' => 'category/view/$1/$2',


    'category/([a-z]+)' => 'category/view/$1',

    'cabinet/update_users/([0-9]+)'=>'cabinet/UpdateUsers/$1',


    'cabinet/registration_or_login'=>'cabinet/addUser',


    'cabinet/logout'=>'cabinet/logout',

    'cabinet/login'=>'cabinet/login',

    'cabinet'=>'cabinet/index',




    'basket/remove/([0-9]+)'=>'basket/remove/$1',





    'basket/loginBeforeOrder'=>'basket/loginBeforeOrder',



    'user_basket_confirm'=>'basket/confirmOrder',

    'user_basket'=>'basket/index',


    'basket/updateCount'=>'basket/updateCount',

    'basket/index'=>'basket/index',



    'basket/test'=>'basket/test',


    'site/SendingToMail'=>'site/SendingToMail',


    'main' => 'site/index',

    '' => 'site/index', // actionIndex в SiteController


);