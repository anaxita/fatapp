<?php
session_start([
    'read_and_close' => true
]);
require_once  $_SERVER['DOCUMENT_ROOT'] . '/connection.php';

$startdate = $_POST['startdate'];
$enddate = $_POST['enddate'];

$userId = $_SESSION['user']['id'];
$query2 = $pdo->query("SELECT COUNT(*) as 'count' FROM `products` WHERE `userid` = '$userId' AND (`created_at` BETWEEN CAST('$startdate' AS DATE) AND CAST('$enddate' AS DATE)) LIMIT 1 ");
$count = $query2->fetch();
if($count['count']) {
    $query = $pdo->query("SELECT * FROM `products` WHERE `userid` = '$userId' AND `created_at` BETWEEN CAST('$startdate' AS DATE) AND CAST('$enddate' AS DATE) ORDER BY `created_at` ");
    $arDates = [];
    $arCallories = [];
    $pastDate = "";
    while ($product = $query->fetch()){
            $date = date("d-m-Y", strtotime($product['created_at']));
            $arDates[$date] = $date;
            $arCallories[$date] += $product['callories'];
    };
    $result = [
        'date' => array_values($arDates),
        'callories' => array_values($arCallories),

    ];
    echo json_encode($result);
} else {
    $result = false;
    echo json_encode($result);
}
