<?php
session_start([
    'read_and_close' => true
]);
require_once  $_SERVER['DOCUMENT_ROOT'] . '/connection.php';

$userId = $_SESSION['user']['id'];
$date = date('Y-m-d');

$query = $pdo->query("SELECT * FROM `products` WHERE `userid` = '$userId' AND `created_at` = '$date' ");
$result = [];
while ($product = $query->fetch()){
    $result[] = [
        'id' => $product['id'],
        'product' => $product['product'],
        'callories' => $product['callories'],
    ];
};

echo json_encode($result);
