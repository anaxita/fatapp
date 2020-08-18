<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
<link rel="stylesheet" href="css\style.css">

<title>Мои калории</title>
</head>
<body>
<nav class="navbar navbar-expand-sm navbar-dark bg-dark justify-content-sm-center">
    <ul class="navbar-nav">
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="dropdown08" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><button class="btn btn-outline-success btn-lg my-2 my-sm-0" type="button"><?php echo $_SESSION['user']['name'];?></button></a>
        <div class="dropdown-menu" aria-labelledby="dropdown08">
            <a class="dropdown-item" href="/views/user/chat.php">Чат</a>
            <a class="dropdown-item" href="/views/user/statistic.php">Статистика</a>
          <a class="dropdown-item" href="/views/user/profile.php">Настройки</a>
          <a class="dropdown-item text-danger" href="/modules/registration/out.php">Выйти</a>
      </li>
    </ul>
  </div>
</nav>
<div class="container-sm mb-5">
    <form name="addproduct-form">
        <div class="form-row mt-5">
            <div class="col-sm">
                <input type="text"  autocomplete="off" placeholder="Что ела?" name="product" id="product" class="form-control mb-2">
            </div>
            <div class="col-sm">
                <input type="number" autocomplete="off" placeholder="Сколько грамм?" name="countproduct" id="countproduct" class="form-control mb-2">
            </div>
            <div class="col-sm">
                <input type="number" autocomplete="off" placeholder="Ккал на 100г"name="callories" id="callories" class="form-control mb-2">
            </div>
            <div class="col-sm">
                <button type="submit" id="sendProduct" class="btn btn-success form-control">Добавить</button>
            </div>
        </div>
    </form>
    <p class="alert alert-danger text-center" id="validation" hidden>Text</p>
    <div id="div-product-list">
        <ul class="list-group" id="product-list"></ul>
    </div>   
    <div class="alert" id="day-callories">
    </div>
</div>
<footer class="footer mt-auto py-3">
<div class="container">
<span class="text-muted">ПохЕдим!  &#169; 2020</span>
</div>
</footer>
<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
<script src="js/main.js"></script>
</body>
</html>