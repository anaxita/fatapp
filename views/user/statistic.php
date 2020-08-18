<?php session_start([
    'read_and_close' => true
])?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
<link rel="stylesheet" href="/css/style.css">

<title>История обжорства</title>
</head>
<body>
<nav class="navbar navbar-expand-sm navbar-dark bg-dark justify-content-sm-center">
    <ul class="navbar-nav">
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="dropdown08" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><button class="btn btn-outline-success btn-lg my-2 my-sm-0" type="button"><?php echo $_SESSION['user']['name'];?></button></a>
        <div class="dropdown-menu" aria-labelledby="dropdown08">
            <a class="dropdown-item" href="/">Мои калории</a>
            <a class="dropdown-item" href="/views/user/chat.php">Чат</a>
            <a class="dropdown-item" href="/views/user/profile.php">Настройки</a>
            <a class="dropdown-item text-danger" href="/modules/registration/out.php">Выйти</a>
      </li>
    </ul>
  </div>
</nav>
<div class="container" id="statistic">
    <h3 class="text-center mb-3">Выберите дату</h3>
    <form class="mb-5" id="statistic-form" name="statistic-form">
        <div class="row">
            <div class="col-sm mb-3">
                <label for="startdate">Начальная дата</label>
                <input type="date" name="startdate" class="form-control" id="startdate" min="2018-01-01" max="2022-08-15" value="2020-08-15" required >
            </div>
            <div class="col-sm mb-3">
            <label for="enddate">Конечная дата</label>

                <input type="date" name="enddate" class="form-control" id="enddate" min="2020-08-10" max="2022-08-15" value="2020-08-16" required > 
            </div>
            <div class="col-sm align-self-end mb-3">  
                <label for="startdate"></label>          
                <button type="button" class="btn btn-outline-primary content-justify" name="load-statistic-button" id="load-statistic-button">Показать</button>
            </div>
        </div>
        <div class="alert alert-danger text-center" hidden></div>
    </form>
        <canvas  id="myChart"></canvas>
</div><!-- /.container -->
<footer class="footer mt-auto py-3">
<div class="container">
<span class="text-muted">ПохЕдим!  &#169; 2020</span>
</div>
</footer>
<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
<script src="/js/statistic.js"></script>
</body>
</html>