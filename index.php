<?php
    session_start();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>PracticeTask-1</title>
</head>
<body>
    <div class="container align-items-center w-25">
        <form action="Feedback.php" method="post">
            <div class="mb-3">
                <label for="email" class="form-label">Электронная почта</label>
                <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">

            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Пароль</label>
                <input type="password" name="password" class="form-control" id="exampleInputPassword1">
            </div>
            <button type="submit" class="btn btn-primary">Войти</button>
            <p class="m-2">У вас нет аккаунта? - <a href="register.php">зарегиструйтесь</a>!</p>
            <p class="text-danger">
            <?php
                echo $_SESSION['message'];
                echo $_SESSION['incorrectData'];
                unset($_SESSION['incorrectData']);
                unset($_SESSION['message']);
            ?>
            </p>
            <p class="text-success">
                <?php
                    echo $_SESSION['success'];
                    unset($_SESSION['success']);
                ?>
            </p>
        </form>
    </div>
</body>
</html>