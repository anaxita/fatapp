<?php session_start([
    'read_and_close' => true
]);

if (isset($_SESSION['user'])) {
  include  $_SERVER['DOCUMENT_ROOT']  . '/views/include/user-page.php';
} else {
  include $_SERVER['DOCUMENT_ROOT']  . '/views/include/guest-page.php';
}