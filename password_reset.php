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
        if(empty($error)) {
            $reset = reset_password($_POST['email']);
            if(!$reset) {
                $error['reset'] = "Invalid Email";
            } else {
                $newPassword = $reset;
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
    <title>Zuri Password Reset</title>

    <style>
        input {
            padding: 15px;
            width: 20%;
            border-radius: 10px;
        }
    </style>
</head>
<body>
    <h1>Password Reset for Zuri </h1>
    <?= field_error('reset', $error) ?>
    <?php
        if(isset($newPassword)) {
            echo "New Password:<b> $newPassword</b>";
        }

    ?>
    <form action="password_reset.php" method="POST">
        <p>Email</p>
        <input type="text" name="email" id="" placeholder="Enter Email">
        <?= field_error('email', $error) ?>
        <p>
            <a href="login.php">Click here to Login!</a>
        </p>
        <input type="submit" style="margin: 10px;" name="submit" value="Reset Password">
    </form>
</body>
</html>