<?php
session_start();

require_once 'vendor/DB.php';

class Feedback
{
    public function __construct()
    {
        $db = new DB();
        $this->db = $db;
    }

    public function authValidation()
    {
        $email = $_POST['email'];
        $password = $_POST['password'];
        if (!($email && $password) || !(md5($password) == $this->db->getUser($email)->password)) {
            $_SESSION['incorrectData'] = 'Неверный email или пароль';
            header('Location: index.php');
            return false;
        }
        return true;
    }
}

$feedback = new Feedback();
$feedback->authValidation();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>PracticeTask-1</title>
</head>
<body>
<div class="container">
    <form class="col-3 mx-auto" action="vendor/result.php" method="post">
        <div class="col-12 mb-3">
            <label for="email" class="form-label">Электронная почта</label>
            <input type="text" class="form-control" name="email" id="email" required>
        </div>
        <div class="form-floating mb-3">
            <textarea class="form-control" name="problem" id="problem"></textarea>
            <label for="problem">Подробно опишите проблему.</label>
        </div>
        <div class="col-12 mb-3">
            <select class="form-select" name="gender" id="gender" required>
                <option selected disabled value="">Укажите ваш пол</option>
                <option value="man">Мужской</option>
                <option value="woman">Женский</option>
            </select>
        </div>
        <div class="col-12">
            <div class="form-check">
                <input class="form-check-input" name="mailing" type="checkbox" id="mailing">
                <label class="form-check-label mb-3" for="mailing">
                    Подписаться на рассылку
                </label>
            </div>
        </div>
        <div class="col-12 mb-3">
            <div class="form-check">
                <input class="form-check-input" type="radio" name="success" id="success" value="true">
                <label class="form-check-label fs" for="success">
                    Соглашение на обработку персональных данных.
                </label>
            </div>
        </div>
        <div class="col-12">
            <button class="btn btn-primary" type="submit">Отправить</button>
            <input type="reset" class="btn btn-danger ms-4">
            <p class="text-danger">
                <?php
                echo $_SESSION['success'];
                echo $_SESSION['invalidData'];
                unset($_SESSION['invalidData']);
                unset($_SESSION['success']);
                ?>
            </p>
        </div>
    </form>
</div>
</body>
</html>
