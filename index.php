<?php
session_start();

include("connection.php");
include("functions.php");
$user_data = check_login($con);

$_SESSION;

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Index Page</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <form action="">
        <h2>Welcome! <br> <?php echo $user_data['user_name']; ?> </h2>
        <p>Do you want to log out? <a href="login.php">LOGOUT</a></p>


</body>

</html>