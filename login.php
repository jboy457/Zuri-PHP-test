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
    <form action="login.php" method="POST">
        <p>Firstname</p>
        <input type="text" name="fname" id="" placeholder="firstname">
        <p>Lastname</p>
        <input type="text" name="lname" id="" placeholder="lastname">
        <p>Email</p>
        <input type="text" name="email" id="" placeholder="Enter Email">
        <p>Phone</p>
        <input type="text" name="phone" id="" placeholder="Enter Phone">
        <p>Password</p>
        <input type="password" name="pass" id="">
        <input type="submit" name="submit" value="Register">
    </form>
</body>
</html>