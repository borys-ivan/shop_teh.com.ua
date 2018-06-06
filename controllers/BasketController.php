<?php

//include_once ROOT . '/models/Busket.php';
include_once ROOT . '/models/User_basket.php';
include_once ROOT . '/models/Cabinet.php';

class BasketController
{
    public function actionIndex()
    {
        if ($_SESSION['basket']) {
            $list_order = User_basket::getListOrder();

        }

        // if (isset($_POST['id'])) {

        //     $id = $_POST['id'];
        //     $count = $_POST['count'];


        //     User_basket::test($id, $count);
        // }

        require_once(ROOT . '/views/basket/view.php');

        return true;
    }


    public function actionConfirmOrder()
    {

//echo '1';
        if (isset($_SESSION['user_ID'])) {
            User_basket::add_order();
            User_basket::clean_basket();
            require_once(ROOT . '/views/layouts/form/basket_confirm_form.php');
        } else {

            header("Location: /cabinet/registration_or_login");
            //require_once(ROOT . '/views/layouts/form/register_or_login.php');
        }
        return true;
    }


    public function actionRemove($id)
    {

        User_basket::remove_from_order_basket($id);
        User_basket::getListOrder();

        return true;
    }


    public function actionUpdateCount()
    {
        $id = $_POST['ID'];
        $count = $_POST['count'];
        User_basket::remove_item($id, $count);
        User_basket::checking_product($id, $count);

        return true;
    }


    public function actionLoginBeforeOrder()
    {
        if (isset($_POST['user_name']) && isset($_POST['pass'])) {
            $user = $_POST['user_name'];
            $pass = $_POST['pass'];

            header("Location: /user_basket");

            Cabinet::getUserID($user, $pass);


        }

        return true;
    }



}