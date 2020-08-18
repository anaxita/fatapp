<?php
session_start([
    'read_and_close' => true
]);
require_once $_SERVER['DOCUMENT_ROOT'] .  '/vendor/autoload.php'; 
require_once  $_SERVER['DOCUMENT_ROOT'] . '/connection.php';
date_default_timezone_set('Europe/Moscow');


$message = $_POST['message']; // AJAX

$userId = $_SESSION['user']['id'];
$username =  $_SESSION['user']['name'];
$date = date("j F H:i");

$query = $pdo->prepare('INSERT INTO chat(`message`, `username`, `userid`) VALUES(?,?,?)');
$query->execute(array($message, $username, $userId));
$msgId = $pdo->lastInsertId();

$data = [
    'username' => $username,
    'userid' => $userId,
    'message' => $message,
    'msgid' => $msgId,
    'date' => $date
];


$options = array(
    'cluster' => 'eu',
    'useTLS' => true
  );
  $pusher = new Pusher\Pusher(
    '5c739bbae47c174d32b1',
    '342a8886189d3e883d05',
    '1046989',
    $options
  );
echo json_encode($data);

$pusher->trigger('my-channel', 'my-event', $data); // кодирует $data в JSON и отправляет
