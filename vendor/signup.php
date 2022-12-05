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
            } elseif (!$this->db->getUser($email)) {
                $this->registration($email, md5($password));
                return true;
            }
        }
        return false;
    }

    public function registration($email, $password)
    {
        $_SESSION['message'] = 'Регистрация прошла успешно!';
        header('Location: ../index.php');
        return $this->db->addUser($email, $password);
    }
}

$signUp = new Registration();
if($signUp->checkData()){
    $signUp->registration();
}


