<?php
    session_start();
    if (!empty($_SESSION)) {
        header('location: home.php');
    }
    include 'function.php';

    $error = [];

    if(array_key_exists('submit', $_POST)) {

        // Valdiate inputs
        if(empty($_POST['fname'])) {
            $error['fname'] = 'Firstname is required';
        } 
        if (empty($_POST['lname'])) {
            $error['lname'] = 'Lastname is required';
        } 
        if (empty($_POST['email'])) {
            $error['email'] = 'Email is required';
        } 
        if (empty($_POST['phone'])) {
            $error['phone'] = 'Phone is required';
        } 
        if (empty($_POST['pass'])) {
            $error['pass'] = 'Password is required';
        }

        if(empty($error)) {
            $registered = register($_POST);
            if(!$registered) {
                $error['register'] = "Users already registered";
            } else {
                $_SESSION = $_POST;
                // var_dump($_SESSION['fname']);
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
    <title>Zuri Registration</title>

    <style>
        input {
            padding: 15px;
            width: 20%;
            border-radius: 10px;
        }
    </style>
</head>
<body>
    <h1>Register here for Zuri </h1>
    <?= field_error('register', $error) ?>
    <form action="register.php" method="POST">
        <p>Firstname</p>
        <input type="text" name="fname" id="" placeholder="firstname">
        <?= field_error('fname', $error) ?>
        <p>Lastname</p>
        <input type="text" name="lname" id="" placeholder="lastname">
        <?= field_error('lname', $error) ?>

        <p>Email</p>
        <input type="text" name="email" id="" placeholder="Enter Email">
        <?= field_error('email', $error) ?>

        <p>Phone</p>
        <input type="text" name="phone" id="" placeholder="Enter Phone">
        <?= field_error('phone', $error) ?>

        <p>Password</p>
        <input type="password" name="pass" id="">
        <?= field_error('pass', $error) ?>
        <br>
        <input type="submit" style="margin: 10px;" name="submit" value="Register">
    </form>
</body>
</html>