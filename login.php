<?php

    include ("./configs/init.php");
    include ("./frontend/login.php");

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">

    <title>Signin Template for Bootstrap</title>

    <link rel="stylesheet" href="<?php echo STATIC_PATH ?>css/dashlite.css?ver=1.4.0">
    <link id="skin-default" rel="stylesheet" href="<?php echo STATIC_PATH ?>css/theme.css?ver=1.4.0">

    <style>

        body {
            width: 100%;
            height: 100%;
        }

        .form-signin {
            width: 350px;
            margin-top: 50vh;
            margin-left: 50%;
            transform: translate(-50%, -50%)
        }

        input {
            margin-bottom: 10px;
        }
    </style>
  </head>

  <body class="text-center">
    <form class="form-signin">
      <img class="mb-4" src="<?php echo STATIC_PATH ?>images/img/logo.png" alt="logo" height="50">
      <h1 class="h4 mb-3 font-weight-normal">Sign in</h1>
        <label for="inputEmail" class="sr-only">Email address</label>
        <input type="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" id="inputPassword" class="form-control" placeholder="Password" required>
      <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
      <br /><br />
      <a href="" class="btn btn-lg btn-outline-primary btn-block">Create an account</a>
    </form>
    
    <p class="mt-5 mb-3 text-muted">&copy; 2017-2018</p>
  </body>
</html>
