<?php session_start([
    'read_and_close' => true
]);
if (!isset($_SESSION['user'])) {
  header('Location: /');
}
setcookie("userid", $_SESSION['user']['id'], time()+3600*24);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
<link rel="stylesheet" href="/css/chat.css">

<title>Пухлый чат</title>
</head>
<body>
<nav class="navbar navbar-expand-sm navbar-dark bg-dark justify-content-sm-center" id="navbar-main">
    <ul class="navbar-nav">
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="dropdown08" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><button class="btn btn-outline-success btn-lg my-2 my-sm-0" type="button"><?php echo $_SESSION['user']['name'];?></button></a>
        <div class="dropdown-menu" aria-labelledby="dropdown08">
            <a class="dropdown-item" href="/">Мои калории</a>
            <a class="dropdown-item" href="/views/user/statistic.php">Статистика</a>
            <a class="dropdown-item" href="/views/user/profile.php">Настройки</a>
            <a class="dropdown-item text-danger" href="/modules/registration/out.php">Выйти</a>
      </li>
    </ul>
  </div>
</nav>


<!-- Grid row -->
  <!-- Grid column -->
    <div class="card chat-room small-chat wide" id="main-chat-window">  
      <div class="my-custom-scrollbar" id="message">
        <div class="card-body p-3">
          <div class="chat-message">

<!--
              <div class="d-flex justify-content-start">
              <div class="profile-photo message-photo">
                <img src="https://mdbootstrap.com/img/Photos/Avatars/avatar-6.jpg" alt="avatar" class="avatar rounded-circle mr-2 ml-0">
                <span class="state"></span>
              </div>
              <div class="card bg-light rounded w-75 z-depth-0 mb-2">                    
                <div class="card-body p-2">
                  <p class="card-text black-text">Qui animi molestiae autem nihil optio recusandae nisi sit ab quo est.</p><small>17 августа 22:49</small>
                </div>
              </div>
            </div>

            <div class="card bg-primary rounded w-75 float-right z-depth-0 mb-1 last">
              <div class="card-body p-2">
                <p class="card-text text-white">Maxime nostrum ut blanditiis a quod quam, quidem deleniti?</p><small>17 августа 22:49</small>
              </div>
            </div>
-->

          </div>
        </div>
      </div>
    </div>
      <div class="card-footer text-muted white pt-1 pb-2 px-3" id="chat-form">
        <textarea id="chat-input-message" class="form-control" aria-multiline="true" role="textbox" placeholder="Type a message..."></textarea>
        <button class="btn btn-success form-control" id="send-chat-message">Отправить</button>
      </div>

<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
<script src="https://js.pusher.com/7.0/pusher.min.js"></script>
<script src="/js/chat.js"></script>
</body>
</html>