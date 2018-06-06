<?php

class Cabinet
{
    public static function getUserID($user, $pass)
    {
        $db = Db::dbConnect();
        $accounts = $db->get_results("SELECT*FROM user WHERE user_name='" . $db->escape($user) . "' AND pass='" . $db->escape($pass) . "'", ARRAY_A);

        if ($accounts) {
            foreach ($accounts as $account) {
                $rez[] = array('ID' => $account['ID'], 'user' => $account['user_name'], 'pass' => $account['pass'], 'email' => $account['email']
                , 'number' => $account['number'], 'name' => $account['name'], 'surname' => $account['surname']);
            }
            $_SESSION['user_ID'] = $account['ID'];
            $_SESSION['user_name'] = $account['user_name'];

            require_once(ROOT . '/views/layouts/form/user_form.php');

            return $rez;

            // $test="test";
            // echo $test;


            /*$user = $account->user_name;
            $pass = $account->pass;
            $email = $account->email;
            $number = $account->number;
            $name = $account->name;
            $surname = $account->surname;*/
        } else {
            echo "такого користувача не знайдено в базі";
        }

    }


    public static function getUserInform($id)
    {
        $db = Db::dbConnect();
        $getUsers = $db->get_results("SELECT*FROM user WHERE ID='" . $db->escape($id) . "'", ARRAY_A);
        if ($getUsers) {
            foreach ($getUsers as $getUser) {
                $rez[] = array('ID' => $getUser['ID'], 'user' => $getUser['user_name'], 'pass' => $getUser['pass'],
                    'email' => $getUser['email'], 'number' => $getUser['number'], 'name' => $getUser['name'],
                    'surname' => $getUser['surname']);
            }
            return $rez;

        }


    }


    public static function getUserOrder($id)

    {
        $db = Db::dbConnect();
        $history = $db->get_results("SELECT order1.ID, product.ID_product, product.name, order1.data, order1.state, 
          order1.amount_product, order1.amount_price 
          FROM user, order1
          RIGHT JOIN product ON product.ID = order1.ID_product
          WHERE user.ID = order1.ID_user
          AND user.ID='" . $db->escape($id) . "'", ARRAY_A);

        if ($history) {
            foreach ($history as $row) {
                $rez[] = array(
                    "art" => $row['ID_product'], "prod" => $row['name'], "data" => $row['data'], "item" => $row['amount_product']
                , "sum" => $row['amount_price']
                );

            }
            return $rez;

        }

    }

    public static function updateUsers($id, $pass, $email, $number, $name, $surname)
    {
        $db = Db::dbConnect();
        $db->query("UPDATE user SET pass='".$db->escape($pass)."',email='".$db->escape($email)."'
        ,number='".$db->escape($number)."',name='".$db->escape($name)."',surname='".$db->escape($surname)."' 
        WHERE ID=".$db->escape($id));


    }

    public static function addUsers($user_name,$pass,$email,$number,$name,$surname){
        $db = Db::dbConnect();
        $add_user = $db->query("INSERT INTO `user` (`user_name`, `pass`, `email`, `number`, `name`,`surname`) 
              VALUES ('" . $db->escape($user_name) . "', '" . $db->escape($pass) . "','" . $db->escape($email) . "',
               '" . $db->escape($number) . "', '" . $db->escape($name) ."', '".$db->escape($surname)."')");
        //echo $db->debug();
    }






    public static function checkName($name)
    {
        if (strlen($name) >= 2) {
            return true;
        }
        return false;
    }

    /**
     * Проверяет телефон: не меньше, чем 10 символов
     * @param string $phone <p>Телефон</p>
     * @return boolean <p>Результат выполнения метода</p>
     */
    /*    public static function checkPhone($phone)
        {
            if (strlen($phone) >= 10) {
                return true;
            }
            return false;
        }*/

    /**
     * Проверяет имя: не меньше, чем 6 символов
     * @param string $password <p>Пароль</p>
     * @return boolean <p>Результат выполнения метода</p>
     */
    public static function checkPassword($password)
    {
        if (strlen($password) >= 6) {
            return true;
        }
        return false;
    }

    /**
     * Проверяет email
     * @param string $email <p>E-mail</p>
     * @return boolean <p>Результат выполнения метода</p>
     */
    public static function checkEmail($email)
    {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return true;
        }
        return false;
    }


    /**
     * Проверяет не занят ли email другим пользователем
     * @param type $email <p>E-mail</p>
     * @return boolean <p>Результат выполнения метода</p>
     */
    public static function checkEmailExists($email)
    {
        // Соединение с БД
        $db = Db::dbConnect();

        $check_email=$db->query("SELECT * FROM user WHERE email='".$db->escape($email)."'");
        //$check_email=$db->get_var("SELECT email FROM user WHERE email=".$db->escape($email));

        if($check_email){
            return true;
        }

        return false;

    }


    public static function checkUserNameExists($user_name)
    {
        // Соединение с БД
        $db = Db::dbConnect();

        $check_user_name=$db->query("SELECT * FROM user WHERE user_name='".$db->escape($user_name)."'");
        //$check_email=$db->get_var("SELECT email FROM user WHERE email=".$db->escape($email));

        if($check_user_name){
            return true;
        }

        return false;

    }
}