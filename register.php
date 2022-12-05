<?php
session_start();
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
<div class="container align-items-center w-25">
    <form action="vendor/signup.php" method="post">
        <div class="mb-3">
            <label for="email" class="form-label">Электронная почта</label>
            <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">

        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Пароль</label>
            <input type="password" name="password" class="form-control" id="password">
        </div>
        <div class="mb-3">
            <label for="password_confirm" class="form-label">Подтверждение пароля</label>
            <input type="password" name="password_confirm" class="form-control" id="password_confirm">
        </div>
        <p class="text-danger ">
            <?php
                echo $_SESSION['message'];
                unset($_SESSION['message']);
            ?>
        </p>
        <button type="submit" class="btn btn-primary">Зарегистрироваться</button>
        <p class="m-2">У вас уже есть аккаунт? - <a href="index.php">авторизуйтесь</a>!</p>
    </form>
</div>
</body>
</html>