<?php
session_start();

include("utilities.inc.php");
include("db_handle.inc.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user_name = $_POST['user_name'];
    $password = $_POST['password'];

    $is_str_valid = !is_numeric($user_name);

    if ($is_str_valid) {
        $query = "SELECT * FROM users WHERE user_name = '$user_name';";
        $result = mysqli_query($db_connection, $query);

        if ($result) {
            $user_data = mysqli_fetch_assoc($result);
            if ($user_data['password'] === $password) {
                $_SESSION['user_id'] = $user_data['user_id'];

                $user_id = $user_data['user_id'];
                $time_stamp = date("d/m/Y");

                $login_histroy_query = "INSERT INTO login_history (user_id) 
                    VALUES('$user_id')";

                mysqli_query($db_connection, $login_histroy_query);

                header("Location: index.php");
                die;
            }
        }

        header("Location: log_in.inc.php");
        die;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="registeration_form_style.css">
    <title>Instagram Clone - Login</title>
</head>

<body>
    <div class="container">
        <div class="title">Log In</div>

        <form method="POST">
            <div class="user-details">
                <div class="input-box">
                    <p class="details">Username</p>
                    <input type="text" placeholder="Enter your username" name="user_name" required>
                </div>
                <div class="input-box">
                    <p class="details">Password</p>
                    <input type="password" placeholder="Enter your password" name="password" required>
                </div>
            </div>
            <div class="button">
                <input type="submit" value="Log In">
            </div>
            <div class="details">
                <a style="font-weight: 500;" href="sign_up.inc.php">Sign Up</a>
            </div>
        </form>
    </div>
</body>

</html>