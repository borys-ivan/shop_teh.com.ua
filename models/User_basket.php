<?php

class User_basket
{
    public static function getListOrder()
    {
        $db = Db::dbConnect();
        $price = 0.00;

        //$basket = $_SESSION['basket'];

////////
        if ($_SESSION['basket']) {
////////

            foreach ($_SESSION['basket'] as $id => $qty) {


                $users_basket = $db->get_row("
                 SELECT name,price,ID_product
                 FROM product 
                 WHERE ID='" . $db->escape($id) . "'", ARRAY_A);


                $result = $db->get_var("SELECT count FROM product WHERE ID=" . $db->escape($id));

                if ($qty <= $result) {
                    $warning_p=true;
                    $class_warning = "true";
                    $warning = "Достатня зазначена кількість на складі";

                } else {
                    $warning_p=false;
                    $class_warning = "false";
                    $warning = "Відсутня зазначена кількість на складі";

                }


                $rez[] = array('ID' => $id, 'ID_product' => $users_basket['ID_product'], 'name' => $users_basket['name']
                , 'price' => $users_basket['price'], 'qty' => $qty, 'warning' => $warning, 'class_warning' => $class_warning,
                    'warning_p'=>$warning_p);


            }


            return $rez;

/////
        } else {
            echo '<h1>Корзина пуста,виберіть товар</h1>';
        }

/////

    }


    public static function remove_from_order_basket($id)
    {
        if (isset($_SESSION['basket'])) {
            unset($_SESSION['basket'][$id]);
            unset($_SESSION['total_items'][$id]);

        }

        return true;
    }


    public static function add_order()
    {
        $today = date("Y-m-d H:i:s");
        $ID_user = $_SESSION['user_ID'];
        $price = 0.00;

        //  echo "<br>".$today;
        //  echo "<br>".$ID_user;


        foreach ($_SESSION['basket'] as $arr_id => $arr_count) {
            $db = Db::dbConnect();
            $prod = $db->get_row("SELECT ID,price FROM product WHERE ID='" . $db->escape($arr_id) . "'");

            if (isset($prod->price) && isset($prod->ID)) {
                $prod_p = $prod->price;
                $ID = $prod->ID;

                //////////////////////
                //  echo "<br>" . $prod_p;
                //  echo "<br>" . $arr_id;
                //  echo "<br>" . $arr_count;
                //////////////////////////////////////////////////////
                $p_price = ("<br> Ціна:" . $prod_p);
                //  echo $p_price;
                /////////////////////////////////////////////////////////////
                $price = $prod_p * $arr_count;

                //  echo "<br>".$price;
                //}

            }
            $add_list_order = $db->query("INSERT INTO `order1` (`ID_user`, `ID_product`, `data`, `state`, `amount_product`, `amount_price`) 
              VALUES ('" . $db->escape($ID_user) . "', '" . $db->escape($arr_id) . "','" . $db->escape($today) . "', '1',
               '" . $db->escape($arr_count) . "', '" . $db->escape($price) . "')");

            $is_recommended = $db->get_var("SELECT is_recommended FROM product WHERE ID=" . $db->escape($arr_id));


            $update_product = $db->query("UPDATE product SET is_recommended=" . $db->escape($is_recommended + $arr_count) . " WHERE ID=" . $db->escape($arr_id));
            // echo $db->debug();
        }


        // echo $price;
        // return $price;

    }

    public static function remove_item($id, $count)
    {

        $_SESSION['basket'][$id] = $count;
        //print_r($_SESSION['basket']);

    }

    public static function clean_basket()
    {
        $_SESSION['basket'] = array();
        $_SESSION['total_items'] = 0;
        $_SESSION['total_price'] = 0.00;
    }


    public static function checking_product($id, $count)
    {
        $db = Db::dbConnect();
        $result = $db->get_var("SELECT count FROM product WHERE ID=" . $db->escape($id));

        if ($count <= $result && $count > 0) {
            //echo $warning_p=true;
            //$class_warning="true";
            echo "<span class='warning_true'>Достатня зазначена кількість на складі</span>";

        } else {
            //echo $warning_p=false;
            //$class_warning="false";
            echo "<span class='warning_false'>Відсутня зазначена кількість на складі</span>";

        }

        if ($count == 0) {
           // echo $warning_p=false;
            echo $warning=false;
            echo "<span class='warning_false'>,введіть кількість більше 0</span>";
        }


        return true;
    }

}