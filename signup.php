<?php
session_start();

include("connection.php");
include("functions.php");

// if user clicked post btn
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $user_name = $_POST['user_name'];
    $password = $_POST['password'];

    if (!empty($user_name) && !empty($password) && !is_numeric($user_name)) {
        //Save to datbase
        $user_id = random_num(20);
        $query = "insert into users (user_id, user_name, password) values ('$user_id', '$user_name', '$password')";

        mysqli_query($con, $query);
        header("Location: login.php");
        die;
    } else {
        echo "Please enter valid information";
    }
}

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Signup Page</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <form method="post">
        <h2>SIGN<span>UP</span></h2>
        <input id="text" type="text" name="user_name" placeholder="Enter your username" required><br>
        <input id="password" type="password" name="password" placeholder="Enter your Password" required><br>
        <button id="btn" type="submit" value="signup">Register</button>

        <p>Already have an account? <a href="login.php">Login</a></p>
    </form>
    <script src="main.js" async defer></script>
</body>

</html>