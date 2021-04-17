<?php
    session_start();
    if (empty($_SESSION)) {
        header('location: login.php');
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zuri Board</title>
</head>
<body>
    <h1>My Dashboard</h1>
    <p>Name: <?= $_SESSION['fname']. ' ' . $_SESSION['lname'] ?></p>
    <p>Email: <?= $_SESSION['email'] ?></p>
    <p>Phone Number: <?= $_SESSION['phone'] ?></p>
    <a href="logout.php">
        <button>Log me Out</button>
    </a>
</body>
</html>