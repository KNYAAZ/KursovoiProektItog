<?php
  // require "db.php";
  $data = $_POST;
  if (isset($data['do_signup']))
  {
    $errors = array();
    if (trim($data['login']==''))
    {
      $errors[] = 'Введите login!';
    }
    if (trim($data['email']==''))
    {
      $errors[] = 'Введите Почту!';
    }
    if ($data['password']=='')
    {
      $errors[] = 'Введите Пароль!';
    }
    if ($data['password2'] != $data['password'])
    {
      $errors[] = 'Повторный пароль введен неверно!';
    }

    if (empty($errors))
    {
      $user = R::dispense('users');
      $user -> Имя = $data['login'];
      $user -> Почта = $data['email'];
      $user -> Пароль = $data['password'];
      $user -> Другой = $data['password2'];
      R::store($user);
      echo '<div style = "color: green;">Вы успешно зарегистрированы</div><hr>';
    }
    else 
    {
      echo '<div style = "color: red;">'.array_shift($errors).'</div><hr>';
    }
  }
?>

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="source/styles/signin.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@700&display=swap" rel="stylesheet">
  <title>Форма регистрации</title>
</head>
<body>
  <form action="signup.php" method = "POST">
    <main>
        <div class="register-form-container">
          <h1 class="form-title">
            Регистрация
          </h1>
          <div class="form-fields">
            <div class="form-field">
              <input type="text" placeholder="Имя" name = "login" value = "<?php echo @$data['login']; ?>" >
            </div>
            <div class="form-field">
              <input type="email" placeholder="Почта" name = "email" value = "<?php echo @$data['email']; ?>">
            </div>
            <div class="form-field">
              <input type="password" placeholder="Пароль" name = "password" value = "<?php echo @$data['password']; ?>">
            </div>
            <div class="form-field">
              <input type="password" placeholder="Подтвердите пароль" name="password2" value = "<?php echo @$data['password2']; ?>">
            </div>
          </div>
          <div class="form-buttons">
            <button class="button" type = "submit" name = "do_signup"> Регистрация </button>
            <!-- <div class="divider"> или </div>
            <a href="#" class="button button-Авторизация">Авторизация</a>
          </div> -->
        </div>
    </main>
  </form>
</body>
