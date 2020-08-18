<?php
require $_SERVER['DOCUMENT_ROOT']  . '/connection.php';

$name = $_POST['name'];
$login = $_POST['login'];
$password = trim($_POST['password']);
$hashPassword = password_hash($password, PASSWORD_DEFAULT);

$query = $pdo->prepare('INSERT INTO users(`name`, `login`, `password` ) VALUES(?,?,?)');
$query->execute(array($name, $login, $hashPassword));