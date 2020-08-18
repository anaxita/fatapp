<?php
require_once  $_SERVER['DOCUMENT_ROOT'] . '/connection.php';
$name = $_POST['name'];
$login = $_POST['login'];
$password = trim($_POST['password']);

$query = $pdo->query("SELECT COUNT(*) as 'count' FROM `users` WHERE `login` = '$login' LIMIT 1");
$count = $query->fetch();

if (!$count['count']) {
    $hashPassword = password_hash($password, PASSWORD_DEFAULT);
    $addUser = $pdo->prepare('INSERT INTO users(`name`,`login`,`password`) VALUES(?,?,?)');
    $addUser->execute(array($name, $login, $hashPassword));
    echo "add";
} else {
    echo 'Логин уже существует';
}