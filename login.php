<?php
    session_start();
    if (!empty($_SESSION)) {
        header('location: home.php');
    }
    include 'function.php';

    $error = [];

    if(array_key_exists('submit', $_POST)) {

        // Valdiate inputs
        if (empty($_POST['email'])) {
            $error['email'] = 'Email is required';
        }
        if (empty($_POST['pass'])) {
            $error['pass'] = 'Password is required';
        }

        if(empty($error)) {
            $logged_in = doLogin($_POST);
            if(!$logged_in) {
                $error['login'] = "Invalid Username and password";
            } else {
                $_SESSION = $logged_in;
                header('location: home.php');
            }
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zuri Login</title>

    <style>
        input {
            padding: 15px;
            width: 20%;
            border-radius: 10px;
        }
    </style>
</head>
<body>
    <h1>Login here for Zuri </h1>
    <?= field_error('login', $error) ?>
    <form action="login.php" method="POST">
        <p>Email</p>
        <input type="text" name="email" id="" placeholder="Enter Email">
        <?= field_error('email', $error) ?>

        <p>Password</p>
        <input type="password" name="pass" id="">
        <?= field_error('pass', $error) ?>
        <p>
            <a href="register.php">Don't have an account, Register!</a>
            <br>
            <a href="password_reset.php">Fogort Password</a>
        </p>
        <input type="submit" style="margin: 10px;" name="submit" value="Login">
    </form>
</body>
</html>