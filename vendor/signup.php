<?php

session_start();

require_once 'DB.php';

class Registration
{
    public function __construct()
    {
        $db = new DB();
        $this->db = $db;
    }

    public function checkData()
    {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $password_confirm = $_POST['password_confirm'];
        if ($email && $password && $password_confirm) {
            if ($password !== $password_confirm) {
                $_SESSION['message'] = 'Пароли не совпадают';
                header('Location: ../register.php');
                return false;
            } elseif (!$this->db->getUser($email)) {
                $_SESSION['success'] = 'Регистрация прошла успешно!';
                header('Location: ../index.php');
                return $this->db->addUser($email, md5($password));
            } else {
                $_SESSION['message'] = 'Такой email уже зарегистрирован';
                header('Location: ../register.php');
                return false;
            }
        }
        $_SESSION['message'] = 'Проверьте правильность введных данных';
        header('Location: ../register.php');
        return false;
    }
}

$signUp = new Registration();
$signUp->checkData();


