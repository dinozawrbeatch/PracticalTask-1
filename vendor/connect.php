<?php
$host = 'localhost';
$user = 'root';
$password = '';
$db = 'practicetask-1';

$connect = mysqli_connect($host, $user, $password, $db);
$huy = 'huy';

if(!$connect){
    die('Error connect to DB');
}