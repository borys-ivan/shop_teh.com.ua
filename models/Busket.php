<?php

//session_start();

class Busket
{
    //  public static function getBasket()
    //  {

    public static function basket()
    {

        //print_r($_SESSION['total_items']);
        //echo $_SESSION['total_items'];
        //echo $t_itm = "Загальна кількість:" . ($_SESSION['total_items']) . ".шт<br>";
        //   echo $t_p = "Загальна ціна:" . ($_SESSION['total_price']) . ".грн<br>";
        //  echo $basket = $_SESSION['basket'];
        //  echo $sign_in_basket = "<a href='user_busket.html'>Увійти в корзину</a><br>";

        //$true_basket = ("В корзині щось є");
        //$false_basket = ("корзина пуста");

//print_r($_SESSION['total_items']);
//    print_r($_SESSION['basket']);
        if (!isset($_SESSION['basket'])) {
            $_SESSION['basket'] = array();
            $_SESSION['total_items'] = 0;
            $_SESSION['total_price'] = 0.00;


            return true;
        }


        if (($_SESSION['basket']) == false) {

            //   print_r($_SESSION['basket']);
            //echo "<br>" . $false_basket;
            return true;
        } else {
// 	print_r($_SESSION['basket']);
            //echo $true_basket;
            return true;
        }
        return true;

    }

 /*   public static function view_basket()
    {

        print_r($_SESSION['basket']);
        echo "<br><br>".$_SESSION['total_items'];
        echo "<br>".$_SESSION['total_price'];
    } */


    public static function add_to_basket($id)
    {

        if (isset($_SESSION['basket'][$id])) {
            $_SESSION['basket'][$id]++;

            //print_r($_SESSION['total_items']);
            //   echo $true_basket = ("<br>В корзині щось є<br>");


            //print_r($_SESSION['basket']);


            return true;
        } else {
            $_SESSION['basket'][$id] = 1;
            // print_r($_SESSION['basket']);
            //  echo $true_basket = ("<br>В корзині щось є<br>");


            //print_r($_SESSION['basket']);
            return true;
        }
        return false;
    }


    public static function total_items()
    {
        $num_items = 0;
        foreach ($_SESSION['basket'] as $id => $qty) {
            $num_items += $qty;

        }
        $_SESSION['total_items'] = $num_items;
        // echo $t_itm = "<br><br>Загальна кількість:" . ($_SESSION['total_items']) . ".шт<br>";
        echo "<br><br>Загальна кількість:" . ($_SESSION['total_items']) . ".шт<br>";
        return $num_items;

    }


    public static function total_price()
    {
        $price13 = 1;
        $price = 0.00;

        if (is_array($_SESSION['basket'])) {

            foreach ($_SESSION['basket'] as $id => $qty) {

                $db = Db::dbConnect();
                $prod = $db->get_row("SELECT price FROM product WHERE ID='" . $db->escape($id) . "'");

                if (isset($prod->price)) {
                    $prod_p = $prod->price;


                    //////////////////////////////////////////////////////
                    $p_price = ("<br> Ціна:" . $prod_p);

                    $price += $prod_p * $qty;
                    //}
                }

            }
        }
        $_SESSION['total_price'] = $price;
        //  echo $t_price = ("Cумма:" . $_SESSION['total_price'] . ".грн");
        echo("Сумма:" . $_SESSION['total_price'] . ".грн");
        //  echo $t_price;
        // echo $sign_in_basket = "<br><a href='user_busket.html'>Увійти в корзину</a><br>";
        echo "<br><a href='/user_basket'>Увійти в корзину</a><br>";
        return $price;
    }


    public static function remove_from_basket($id)
    {
        //if (isset($_SESSION['basket'])) {


        // unset($_SESSION['basket'][$id]);
        // unset($_SESSION['total_items'][$id]);

        //print_r($_SESSION['basket']);
        // echo "<br>Загальна кількість:0.шт";
        // echo "<br>Загальна ціна:0.грн";
        //echo "<br><a href='/user_basket'>Увійти в корзину</a><br>";
        //print_r($_SESSION['total_items']-$_SESSION['total_items'][$id]);
        // echo "<br><br>Загальна кількість:" . 0 . ".шт<br>";
        // echo $t_p = "Сумма:" . 0 . ".грн<br>";

        // }


        return TRUE;
    }


    public static function subtract_total_items($id)
    {
        $subtract_items = 0;

        $_SESSION['basket'][$id]--;
        foreach ($_SESSION['basket'] as $id => $qty) {
            $subtract_items += $qty;
            if ($_SESSION['basket'][$id] == 0) {
                unset($_SESSION['basket'][$id]);
            }
        }
        $_SESSION['total_items'] = $subtract_items;


        //print_r($_SESSION['basket']);


        // echo $t_itm = "<br><br>Загальна кількість:" . ($_SESSION['total_items']) . ".шт<br>";
        echo "<br><br>Загальна кількість:" . ($_SESSION['total_items']) . ".шт<br>";
        return $subtract_items;

    }


    public static function subtract_total_price($id)
    {
        $price = 0.00;
        if (is_array($_SESSION['basket'])) {
            foreach ($_SESSION['basket'] as $id => $qty) {
                $db = Db::dbConnect();
                $prod = $db->get_row("SELECT price FROM product WHERE ID='" . $db->escape($id) . "'");
                if (isset($prod->price)) {
                    $prod_p = $prod->price;
                    $p_price = ("<br> Ціна:" . $prod_p);
                    $price += $prod_p * $qty;
                }
            }
        }
        $_SESSION['total_price'] = $price;
        echo("Сумма:" . $_SESSION['total_price'] . ".грн");
        echo "<br><a href='/user_basket'>Увійти в корзину</a><br>";
        return $price;
    }


}


function remove_from_basket($id)
{
    if (isset($_SESSION['basket'])) {
        unset($_SESSION['basket'][$id]);
        unset($_SESSION['total_items'][$id]);
        echo $false_basket = ("<br>корзина пуста<br>");
        print_r($_SESSION['busket'] . "<br>");
        echo $t_itm = "Загальна кількість:0.шт<br>";
        echo $t_p = "Загальна ціна:0.грн<br>";
        echo $sign_in_basket = "<a href='user_busket.html'>Увійти в корзину</a><br>";
        if (($_SESSION['basket']) == true) {
            echo $true_basket = ("В корзині щось є");
            print_r($_SESSION['basket'] . "<br>");
            echo $t_itm = "Загальна кількість:" . ($_SESSION['total_items'][$id]) . ".шт<br>";
            echo $t_p = "Загальна ціна:" . ($_SESSION['total_price'][$id]) . ".грн<br>";
            echo $sign_in_basket = "<a href='user_busket.html'>Увійти в корзину</a><br>";
            return true;
        }
        return true;
    } else {
        echo $false_basket = ("корзина пуста<br>");
        print_r($_SESSION['basket'] . "<br>");
        echo $t_itm = "Загальна кількість:" . ($_SESSION['total_items'][$id]) . ".шт<br>";
        echo $t_p = "Загальна ціна:" . ($_SESSION['total_price'][$id]) . ".грн<br>";
        echo $sign_in_basket = "<a href='user_busket.html'>Увійти в корзину</a><br>";
        return true;
    }
    return false;
}


function remove_from_basket_all()
{
    unset($_SESSION['basket']);


    //print_r($_SESSION['basket']);


    //echo $false_busket;
    return true;
    //       }
    //   }

}