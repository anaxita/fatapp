<?php
session_start();
setcookie("userid", $_SESSION['user']['id'], time()-3600*24);
session_destroy();
session_write_close();
header('Location: /');
