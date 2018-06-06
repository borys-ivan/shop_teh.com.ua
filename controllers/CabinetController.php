<?php

include_once ROOT . '/models/Cabinet.php';


class CabinetController
{

    public function actionIndex()
    {
        // if (isset($_POST['submit'])) {
        //     $user = $_POST['user'];
        //     $pass = $_POST['pass'];
        // $user = 'ivan333bor';
        // $pass = '123321';

        // Cabinet::getUserID($user, $pass);


        // $users_inform = Cabinet::getUserInform($id);
        //echo $_SESSION['user_ID'];
        // }


        if (isset($_SESSION['user_ID'])) {
            $id = $_SESSION['user_ID'];
            //$id=1;
            $user_order = Cabinet::getUserOrder($id);
            $users_inform = Cabinet::getUserInform($id);
            //require_once(ROOT .'/views/cabinet/sidebar.php');
            require_once(ROOT . '/views/cabinet/view.php');
        } else {

            require_once(ROOT . '/views/cabinet/LoginForm.php');

        }


        return true;

    }

    public function actionLogin()
    {

        if (isset($_POST['user']) && isset($_POST['pass'])) {
            $user = $_POST['user'];
            $pass = $_POST['pass'];

            Cabinet::getUserID($user, $pass);
        }
        return true;
    }


    public function actionLogout()
    {
        //session_start();
        unset($_SESSION['user_ID']);
        header('Location: /');

        //return true;
    }


    public function actionUpdateUsers($id)
    {
        $users_inform = Cabinet::getUserInform($id);

        if (isset($_POST['submit'])) {

            //$user_name = $_POST['user_name'];
            $pass = $_POST['pass'];
            $email = $_POST['email'];
            $number = $_POST['number'];
            $name = $_POST['name'];
            $surname = $_POST['surname'];

            Cabinet::updateUsers($id, $pass, $email, $number, $name, $surname);

            header("Location: /cabinet");
        }


        require_once(ROOT . '/views/layouts/form/update_user_form.php');
        return true;
    }

    public function actionAddUser()
    {


        if (isset($_POST['submit'])) {
            $user_name = $_POST['user_name'];
            $pass = $_POST['pass'];
            $email = $_POST['email'];
            $number = $_POST['number'];
            $name = $_POST['name'];
            $surname = $_POST['surname'];


// Флаг ошибок
            $errors = false;

            // Валидация полей
            if (!Cabinet::checkName($name)) {
                $errors[] = 'Імя не повинно бути коротшим 2 символів';
            }
            if (!Cabinet::checkEmail($email)) {
                $errors[] = 'Неправильний email';
            }
            if (!Cabinet::checkPassword($pass)) {
                $errors[] = 'Пароль не повинен бути коротшим 6 символів';
            }
            if (Cabinet::checkEmailExists($email)) {
                $errors[] = 'Такий email вже використовуєця';
            }

            if (Cabinet::checkUserNameExists($user_name)) {
                $errors[] = 'Такий користувач вже зараєстрований';
            }



            if ($errors == false) {
                // Если ошибок нет
                // Регистрируем пользователя
                Cabinet::addUsers($user_name, $pass, $email, $number, $name, $surname);

                header("Location: /cabinet");
            }


        }

        require_once(ROOT . '/views/layouts/form/register_or_login.php');

        return true;
    }


}