<?php
session_start([
    'read_and_close' => true
]);
require_once  $_SERVER['DOCUMENT_ROOT'] . '/connection.php';

$product = $_POST['product'];
$countproduct = $_POST['countproduct'];
$callories = $_POST['callories'];
$userId = $_SESSION['user']['id'];

$sumCallories = $countproduct * $callories / 100;

$query = $pdo->prepare('INSERT INTO products(product, countproduct, callories, userid ) VALUES(?,?,?,?)');
$query->execute(array($product, $countproduct, $sumCallories, $userId));
$msgId = $pdo->lastInsertId();


$data = [
    'id' => $msgId,
    'callories' => $sumCallories
    ];
echo json_encode($data);