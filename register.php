<?php

    include ("./configs/init.php");
    include ("./frontend/register.php");

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
    <form method="post" action="" class="form-signin">
      
        <img class="mb-4" src="<?php echo STATIC_PATH ?>images/img/logo.png" alt="logo" height="50">
      <h1 class="h4 mb-3 font-weight-normal">Sign in</h1>
        <?php echo $output; ?>
        <label for="firstname" class="sr-only">First name</label>
        <input name="firstname" type="text" id="firstname" class="form-control" placeholder="First name" required >
        <label for="lastname" class="sr-only">Last name</label>
        <input name="lastname" type="text" id="lastname" class="form-control" placeholder="Last name" required >
        <label for="inputEmail" class="sr-only">Email address</label>
        <input name="email" type="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
        <label for="mobileno" class="sr-only">Mobile number</label>
        <input name="mobileno" type="text" id="mobileno" class="form-control" placeholder="Mobile number" required >
        <label for="inputPassword" class="sr-only">Password</label>
        <input name="password" type="password" id="inputPassword" class="form-control" placeholder="Password" required>
        <label for="inputPassword" class="sr-only">Confirm Password</label>
        <input name="conf_password" type="password" id="inputPassword" class="form-control" placeholder="Confirm Password" required>
      <input class="btn btn-lg btn-primary btn-block" name="submit" type="submit" value="Register" />
      <br /><br />
      <a href="login.php" class="btn btn-lg btn-outline-primary btn-block">Login</a>
    </form>
    
    <p class="mt-5 mb-3 text-muted">&copy; 2017-2018</p>
  </body>
</html>
