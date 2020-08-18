<?php
session_start([
    'read_and_close' => true
]);
$userId = $_SESSION['user']['id'];
require_once  $_SERVER['DOCUMENT_ROOT'] . '/connection.php';

$id = $_POST['id'];
$newId = str_replace('msg-id', '', $id);


$addProduct = $pdo->prepare('DELETE FROM products WHERE  `id` = ? AND `userid` = ? ');
$addProduct->execute(array($newId, $userId));
