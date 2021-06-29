<?php
session_start();

include("connection.php");
include("functions.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $user_name = $_POST['user_name'];
    $password = $_POST['password'];

    if (!empty($user_name) && !empty($password) && !is_numeric($user_name)) {
        //read from database
        $query = "Select * from users where user_name = '$user_name' limit 1";

        $result = mysqli_query($con, $query);

        if ($result) {
            if ($result && mysqli_num_rows($result) > 0) {
                $user_data = mysqli_fetch_assoc($result);

                if ($user_data['password'] === $password) {
                    $_SESSION['user_id'] = $user_data['user_id'];
                    header("Location: index.php");
                    die;
                }
            }

            echo "Please enter valid information";
        } else {
            echo "Please enter valid information";
        }
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Login Page</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <form method="post">
        <h2>LOG<span>IN</span></h2>
        <input id="text" type="text" name="user_name" placeholder="Enter your Username" required><br>
        <input id="password" type="password" name="password" placeholder="Enter your Password" required><br>
        <button id="btn" type="submit" value="Login"> Login</button>
        <p>Dont have an account? <a href="signup.php">Sign up</a></p>
    </form>
    <script src="main.js" async defer></script>
</body>

</html>