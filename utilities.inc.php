<?php

function check_login($connection)
{
    if(isset($_SESSION['user_id']))
    {
        $id = $_SESSION['user_id'];

        $query = "SELECT * FROM users WHERE user_id = '$id';";
        $result = mysqli_query($connection, $query);
        if($result && mysqli_num_rows($result) > 0)
        {
            $user_data = mysqli_fetch_assoc($result);
            return $user_data;
        }
    }

    header("Location: log_in.inc.php");
    die;
}
