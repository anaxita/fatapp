<!doctype html>
<html lang="ru">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">

    <link rel="stylesheet" href="/css/style.css">
    <title>Регистрация</title>
  </head>
  <body">
  <nav class="navbar  navbar-dark bg-dark justify-content-center">
      <a class="navbar-brand " href="/index.php">pohedim.ru</a>
</nav>
    <form class="form-signin mt-5" id="sign-up-form" name="sign-up-form">
      <h3 class="text-center">Регистрация</h3>
      <div class="form-group">
        <label for="name">Имя</label>
        <input type="text" class="form-control" id="name" required>
      </div>

      <div class="form-group">
        <label for="login">Логин</label>
        <input type="text" class="form-control" id="login" aria-describedby="emailHelp" required>
      </div>

      <div class="form-group">
        <label for="password">Пароль</label>
        <input type="password" class="form-control" id="password" required>
        <label><input type="checkbox" class="password-checkbox"> Показать пароль</label>      
      </div>

      <button type="button" class="mb-2 btn btn-primary btn-lg btn-block" id="sign-up-button">Зарегистрироваться</button>
      <p class="alert alert-danger text-center" id="validation" hidden>Text</p>
    </form>
    <footer class="footer mt-auto py-3">
  <div class="container">
    <span class="text-muted">ПохЕдим!  &#169; 2020</span>
  </div>
</footer>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <script src="/js/registration.js"></script>
  </body>
</html>