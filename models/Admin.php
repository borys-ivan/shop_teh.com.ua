<?php


class Admin
{
    const SHOW_BY_DEFAULT = 10;

    public static function getListProduct($page = 1)
    {
        $db = Db::dbConnect();

        $page = intval($page);
        $offset = ($page - 1) * self::SHOW_BY_DEFAULT;

        $admin_list_prod = $db->get_results("SELECT*FROM product ORDER BY ID ASC LIMIT "
            . self::SHOW_BY_DEFAULT . " OFFSET " . $offset, ARRAY_A);


        if ($admin_list_prod) {
            foreach ($admin_list_prod as $row) {
                $rez[] = array('ID' => $row['ID'], 'name' => $row['name'], 'description' => $row['description'],
                    'price' => $row['price'], 'specifications' => $row['specifications'], 'ID_product' => $row['ID_product'],
                    'image' => $row['image'],'new'=>$row['is_new']);
            }
            return $rez;
        }

    }

    public static function getUsersList($page = 1)
    {
        $db = Db::dbConnect();

        $page = intval($page);
        $offset = ($page - 1) * self::SHOW_BY_DEFAULT;

        $admin_list_user = $db->get_results("SELECT*FROM user ORDER BY ID ASC LIMIT "
            . self::SHOW_BY_DEFAULT . " OFFSET " . $offset, ARRAY_A);


        if ($admin_list_user) {
            foreach ($admin_list_user as $user) {
                $rez[] = array('ID' => $user['ID'], 'user_name' => $user['user_name'], 'email' => $user['email'],
                    'number' => $user['number'], 'name' => $user['name'], 'surname' => $user['surname']);
            }
            return $rez;
        }
    }


    public static function getOrderList($page = 1)
    {
        $db = Db::dbConnect();

        $page = intval($page);
        $offset = ($page - 1) * self::SHOW_BY_DEFAULT;

        $orders_list = $db->get_results("SELECT order1.ID, user.user_name,user.email,user.number,user.name, product.ID_product, product.name, 
                   order1.data, order1.state, order1.amount_product, order1.amount_price
                   FROM user, order1
                   RIGHT JOIN product ON product.ID = order1.ID_product
                   WHERE user.ID = order1.ID_user ORDER BY ID ASC LIMIT "
            . self::SHOW_BY_DEFAULT . " OFFSET " . $offset, ARRAY_A);

        if ($orders_list) {
            foreach ($orders_list as $order) {

                $rez[] = array('ID' => $order['ID'], 'user_name' => $order['user_name'], 'name' => $order['name'], 'data' => $order['data'],
                    'amount_product' => $order['amount_product'], 'amount_price' => $order['amount_price'],
                    'email'=>$order['email'],'number'=>$order['number']);

            }

            return $rez;

        }

    }


    public static function edit($id, $id_product, $name, $description, $specifications, $price,$new,
                $status, $count)
    {
        $db = Db::dbConnect();

        $db->query("UPDATE product SET name='" . $db->escape($name) . "',description='" . $db->escape($description) . "',
        price='" . $db->escape($price) . "',specifications='" . $db->escape($specifications) . "',
        ID_product='" . $db->escape($id_product) . "',is_new=".$db->escape($new).",status=".$db->escape($status).",
        count=".$db->escape($count)." WHERE ID=" . $db->escape($id));

    }


    public static function image($name_image, $temp_name)
    {

        //$uploaddir = '/var/www/uploads/';
        $uploaddir = 'image/';
        $uploadfile = $uploaddir . basename($name_image);


        move_uploaded_file($temp_name, $uploadfile);

       /* echo '<pre>';
        if (move_uploaded_file($temp_name, $uploadfile)) {
            echo "Файл корректен и был успешно загружен.\n";
        } else {
            echo "Возможная атака с помощью файловой загрузки!\n";
        }

        echo 'Некоторая отладочная информация:';
        print_r($_FILES);

        print "</pre>";*/
    }


    public static function getListProductsCount()
    {
        $db = Db::dbConnect();
        $result = $db->get_var("SELECT count(ID) AS count FROM product ");

        return $result;
    }

    public static function getListUsersCount()
    {
        $db = Db::dbConnect();
        $result = $db->get_var("SELECT count(ID) AS count FROM user ");

        return $result;
    }

    public static function getListOrdersCount()
    {
        $db = Db::dbConnect();
        $result = $db->get_var("SELECT count(ID) AS count FROM order1 ");

        return $result;
    }


    public static function delete_product($id)
    {
        $db = Db::dbConnect();

        $delete_product = $db->query("DELETE FROM product WHERE ID=" . $db->escape($id));


        return true;
    }


    public static function getOrder($id)
    {
        $db = Db::dbConnect();
        $orders_list = $db->get_results("SELECT order1.ID, user.user_name, product.ID_product, product.name, 
                   order1.data, order1.state, order1.amount_product, order1.amount_price
                   FROM user, order1
                   RIGHT JOIN product ON product.ID = order1.ID_product
                   WHERE user.ID = order1.ID_user AND order1.ID=" . $db->escape($id), ARRAY_A);


        if ($orders_list) {
            foreach ($orders_list as $order) {

                $rez[] = array('ID' => $order['ID'], 'user_name' => $order['user_name'], 'name' => $order['name'], 'data' => $order['data'],
                    'amount_product' => $order['amount_product'], 'amount_price' => $order['amount_price']);

            }

            return $rez;
        }
    }


    public static function update_order($id, $name, $date, $amount, $amount_price)
    {
        $db = Db::dbConnect();

        $db->query("UPDATE order1 SET ID_product='" . $db->escape($name) . "',data='" . $db->escape($date) . "'
        ,amount_product=" . $db->escape($amount) . ",amount_price=" . $db->escape($amount_price) . "
         WHERE ID=" . $db->escape($id));


        return true;
    }


    public static function list_product()
    {

        $db = Db::dbConnect();


        $list_product = $db->get_results("SELECT ID,name FROM product", ARRAY_A);

        if ($list_product) {
            foreach ($list_product as $name) {
                $rez[] = array('ID'=>$name['ID'],'list_product' => $name['name']);
            }

            return $rez;
        }

    }


 /*   public static function checkNameExists($id,$name)
    {
        // Соединение с БД
        $db = Db::dbConnect();

        $check_product_name=$db->query("SELECT * FROM product WHERE ID=".$db->escape($id)."
         AND name='".$db->escape($name)."'");


        if($check_product_name){
            return true;
        }

        return false;

    }*/

}




