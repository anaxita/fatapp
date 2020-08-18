<?php
session_start([
    'read_and_close' => true
]);
require_once  $_SERVER['DOCUMENT_ROOT'] . '/connection.php';

$userId = $_SESSION['user']['id'];
$userName = $_SESSION['user']['name'];
$date = date('Y-m-d');

$query = $pdo->query("SELECT SUM(callories) as `sum` FROM `products` WHERE `userid` = '$userId' AND `created_at` = '$date' ");
$count = $query->fetch();

$dayCallories = 0;
if($count['sum' === null || 0]){
    $data = [
        'sum' => $dayCallories,
        'username' => $userName];
} else {
    $data = [
        'sum' => $count['sum'],
        'username' => $userName];
}

echo json_encode($data);