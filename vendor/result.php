<?php
session_start();

require_once 'DB.php';

$db = new DB();

$email = $_POST['email'];
$problem_text = $_POST['problem'];
$gender = $_POST['gender'];
$mailing = $_POST['mailing'];
if ($email && $problem_text && $gender) {
    $_SESSION['addComplaint'] = 'Жалоба была отпрвлена';
    $db->addComplaint($email, $problem_text, $gender, $mailing);
} else {
    $_SESSION['invalidData'] = 'Заполните все поля';
    header('Location: Feedback.php');
}

if (!$_POST['success']) {
    $_SESSION['success'] = 'Согласитесь на обработку данных, чтобы отправить жалобу';
    header('Location: ../Feedback.php');
}
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
<h1 class="text-success">
    <?php
        echo $_SESSION['addComplaint'];
        unset($_SESSION['addComplaint']);
    ?>
</h1>
</body>
</html>

