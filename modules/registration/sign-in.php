<?php
require_once  $_SERVER['DOCUMENT_ROOT'] . '/connection.php';

$login = $_POST['login'];
$password = trim($_POST['password']);

$result = $pdo->query("SELECT COUNT(*) as 'count' FROM `users` WHERE `login` = '$login' LIMIT 1");
$count = $result->fetch();

if ($count['count']) {
    $getPassword = $pdo->query("SELECT * FROM `users` WHERE `login` = '$login' LIMIT 1");
    $arrData = $getPassword->fetch();
    $verify = password_verify($password, $arrData['password']); 
    if ($verify) {
        session_start(); 
        $_SESSION['user'] = [
            "id" => $arrData['id'],
            "name" => $arrData['name'],
            "login" => $arrData['login']
        ];
        session_write_close();
        echo "success";

    } else {
        echo  "Неверный логин или пароль";
    }

} else {
    echo  "Неверный логин или пароль";


};