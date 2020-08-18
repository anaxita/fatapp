<?php
session_start([
    'read_and_close' => true
]);
require_once $_SERVER['DOCUMENT_ROOT'] .  '/vendor/autoload.php'; 
require_once  $_SERVER['DOCUMENT_ROOT'] . '/connection.php';
date_default_timezone_set('Europe/Moscow');

$query = $pdo->query("SELECT * FROM  chat  ORDER BY id ASC");
$data = [];
while ($info = $query->fetch()) {
    $data[] = [
        'username' => $info['username'],
        'userid' => $info['userid'],
        'message' => $info['message'],
        'msgid' => $info['msgid'],
        'date' => date("j F H:i", strtotime($info['created_at']))
    ];
};

echo json_encode($data);



