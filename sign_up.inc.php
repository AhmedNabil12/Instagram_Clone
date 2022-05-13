<?php
    session_start();

    include("utilities.inc.php");
    include("db_handle.inc.php");

    if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        $user_details = array();

        $user_details[0] = $_POST['first_name'];
        $user_details[1] = $_POST['last_name'];
        $user_details[2] = $_POST['gender'];
        $user_details[3] = $_POST['date_of_birth'];
        $user_details[4] = $_POST['user_name'];
        $user_details[5] = $_POST['email'];
        $user_details[6] = $_POST['password'];

        $is_str_valid = !is_numeric($user_details[0]) && !is_numeric($user_details[1]) && !is_numeric($user_details[3]);

        if($is_str_valid)
        {
            $insertion_query = "INSERT INTO users (first_name, last_name, gender, date_of_birth, user_name, email, password) 
                                VALUES ('$user_details[0]', '$user_details[1]', '$user_details[2]', 
                                        '$user_details[3]', '$user_details[4]', '$user_details[5]', 
                                        '$user_details[6]');";
            mysqli_query($db_connection, $insertion_query);
            
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
        <title>Instagram Clone - Signup</title>
    </head>
    
    <body>
        <div class="container">
            <div class="title">Sign Up</div>

            <form method="POST">
                <div class="user-details">
                    <div class="input-box">
                        <p class="details">First Name</p>
                        <input type="text" placeholder="Enter your first name" name="first_name" required>
                    </div>
                    <div class="input-box">
                        <p class="details">Last Name</p>
                        <input type="text" placeholder="Enter your last name" name="last_name" required>
                    </div>
                    <div class="input-box">
                        <p class="details">Date of birth</p>
                        <input type="date" name="date_of_birth" required>
                    </div>
                    <div class="input-box">
                        <p class="details">Username</p>
                        <input type="text" placeholder="Enter your username" name="user_name" required>
                    </div>
                    <div class="input-box">
                        <p class="details">Email</p>
                        <input type="email" placeholder="Enter your email" name="email" required>
                    </div>
                    <div class="input-box">
                        <p class="details">Password</p>
                        <input type="password" placeholder="Enter your password" name="password" required>
                    </div>
                </div>
                <div class="gender-details">
                    <input type="radio" name="gender" value="male" id="dot-1">
                    <input type="radio" name="gender" value="female" id="dot-2">
                    <input type="radio" name="gender" value="unspecified" id="dot-3">

                    <span class="gender-title">Gender</span>
                    <div class="category">
                        <label for="dot-1">
                            <span class="dot one"></span>
                            <span class="gender">Male</span>
                        </label>
                        <label for="dot-2">
                            <span class="dot two"></span>
                            <span class="gender">Female</span>
                        </label>
                        <label for="dot-3">
                            <span class="dot three"></span>
                            <span class="gender">Prefer not to say</span>
                        </label>
                    </div>
                </div>
                <div class="button">
                    <input type="submit" value="Sign Up">
                </div>
                <div class="details">
                    <a style="font-weight: 500;" href="log_in.inc.php">Log In</a>
                </div>
            </form>
        </div>
    </body>

</html>