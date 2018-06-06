<?php

include_once ROOT . '/models/Admin.php';
include_once ROOT . '/models/Product.php';
include_once ROOT . '/models/CategoryList.php';

include_once ROOT . '/components/Pagination.php';

class AdminController
{

    public function actionIndex($page=1)
    {

        $ListOrders = Admin::getOrderList($page);

        $total = Admin::getListOrdersCount();

        $pagination_list_orders = new Pagination($total, $page, Admin::SHOW_BY_DEFAULT, 'page-');

        require_once(ROOT . '/views/admin/view_orders.php');

        return true;
    }

    public function actionUsers($page=1)
    {

        $ListUsers = Admin::getUsersList($page);

        $total = Admin::getListUsersCount();

        $pagination_list_users = new Pagination($total, $page, Admin::SHOW_BY_DEFAULT, 'page-');

        require_once(ROOT . '/views/admin/view_users.php');

        return true;
    }

    public function actionProducts($page = 1)
    {
        $ListProduct = Admin::getListProduct($page);


        $total = Admin::getListProductsCount();

        $pagination_list_products = new Pagination($total, $page, Admin::SHOW_BY_DEFAULT, 'page-');

        require_once(ROOT . '/views/admin/view_products.php');

        return true;
    }

    public function actionProduct($id)
    {

        $productID = Product::getProductId($id);

        if (isset($_POST['submit'])) {

            $id_product = $_POST['id_product'];
            $name = $_POST['name'];
            $description = $_POST['description'];
            $specifications = $_POST['specifications'];
            $price = $_POST['price'];
            $new = $_POST['new'];
            $status = $_POST['status'];
            $count = $_POST['count'];


            $errors = false;

            // Валидация полей
         //   if (!Cabinet::checkNameExists($id,$name)) {
         //       $errors[] = 'Імя не повинно бути коротшим 2 символів';
         //   }



         //   if ($errors == false) {
                Admin::edit($id, $id_product, $name, $description, $specifications, $price, $new,
                    $status, $count);

                header("Location: /admin/products_list");

        //    }

        }

        require_once(ROOT . '/views/layouts/form/update_product_form.php');

        return true;
    }

    public function actionAddProduct()
    {
        $categories = CategoryList::getCategoriesList();

        if (isset($_POST['submit'])) {

            $category = $_POST['category'];
            $id_product = $_POST['id_product'];
            $name = $_POST['name'];

            //$image = $_FILES['image']['name'];


            $description = $_POST['description'];
            $specifications = $_POST['specifications'];
            $price = $_POST['price'];


            $name_image = $_FILES['image']['name'];

            $temp_name = $_FILES['image']['tmp_name'];

            $new = $_POST['new'];
            $status = $_POST['status'];
            $count = $_POST['count'];


            $errors = false;

            // Валидация полей
            if (!Product::checkNameProduct($name)) {
                $errors[] = 'Введіть найменування товару';
            }
            if (!Product::checkCategory($category)) {
                $errors[] = 'Виберіть категорію';
            }
            if (!Product::checkArticle($id_product)) {
                $errors[] = 'Введіть артикил товару';
            }


            if ($errors == false) {
                //echo $image;
                Admin::image($name_image, $temp_name);
                Product::addProduct($category, $id_product, $name, $name_image, $description,
                    $specifications, $price, $new, $status, $count);

                header("Location: /admin/products_list");

            }



        }

        //$product= Product::getProductId();


       // header("Location: /admin/products_list");

        require_once(ROOT . '/views/layouts/form/add_product_form.php');

        return true;
    }

    public function actionDelete_product($id)
    {

        Admin::delete_product($id);

        header("Location: /admin/products_list");


        return true;
    }


    public function actionDelete_order($id)
    {

        Admin::delete_order($id);

        header("Location: /admin");


        return true;
    }

    public function actionUpdate_order($id)
    {
        $ListUpdateOrders = Admin::getOrder($id);

        $ListProduct = Admin::list_product();

        if (isset($_POST['submit'])) {

            $name = $_POST['name'];
            $date = $_POST['date'];
            $amount = $_POST['count'];
            $amount_price = $_POST['sum'];

            Admin::update_order($id, $name, $date, $amount, $amount_price);

            header("Location: /admin");

        }

        require_once(ROOT . '/views/layouts/form/update_order_form.php');


        return true;
    }
}