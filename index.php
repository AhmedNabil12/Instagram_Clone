<?php
session_start();

include("utilities.inc.php");
include("db_handle.inc.php");

$user_data = check_login($db_connection);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $searched_username = $_POST["search_text"];

    if (!is_numeric($searched_username)) {
        $sql_query = "SELECT * FROM users WHERE user_name = '$searched_username';";

        $result = mysqli_query($db_connection, $sql_query);
        if ($result) {
            $user_data = mysqli_fetch_assoc($result);

            $_SESSION['user_id'] = $user_data['user_id'];
            //die;
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
    <title>Instagram Clone</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">

</head>

<body>
    <div class="sidebar">
        <a href="#" class="logo">
            <img src="images/Instagram_logo_2016.svg.png" alt="">
        </a>

        <div class="profile">
            <div class="profile-img">
                <img src="images/very cute dog.jpg " alt="">
            </div>
            <div class="name">
                <h1><?php echo $user_data['first_name'] . " " . $user_data['last_name']; ?></h1>
                <p><?php echo "@" . $user_data['user_name'] ?></p>
            </div>

        </div>
        <div class="about">
            <div class="box">
                <h3><?php echo $user_data['post_num']; ?></h3>
                <span>Posts</span>
            </div>
            <div class="box">
                <h3><?php echo $user_data['user_followers']; ?></h3>
                <span>Followers</span>
            </div>
            <div class="box">
                <h3><?php echo $user_data['user_following']; ?></h3>
                <span>Following</span>
            </div>
        </div>
        <div class="menu">
            <a href="#" class="active">
                <span class="icon">
                    <i class="ri-function-line"></i>
                </span>
                Feed
            </a>
            <a href="#">
                <span class="icon">
                    <i class="ri-search-line"></i>
                </span>
                Explore
            </a>

            <a href="log_in.inc.php">
                <span class="icon">
                    <i class="ri-logout-box-r-line"></i>
                </span>
                Logout
            </a>

        </div>
    </div>

    <div class="main-home">
        <div class="header">
            <!-- Search -->
            <form method="POST">
                <div class="search">
                    <i class="ri-search-line"></i>
                    <input type="text" placeholder="Search" name="search_text">
                    <button type="submit" value="Search"></button>
                </div>
            </form>

            <!-- Content -->
            <div class="header-content">
                <i class="ri-notification-3-fill"></i>
                <i class="ri-mail-fill"></i>
                <!-- Button -->
                <a href="photo_upload.inc.php" class="btn">
                    <i class="ri-add-circle-fill"></i>
                    <div class="btn-text">Add Photos</div>
                </a>
            </div>
        </div>
        <!-- Stories -->
        <div class="stories-title">
            <h1> Stories</h1>
            <a href="#" class="btn">
                <i class="ri-play-circle-line"></i>
                <div class="text">Watch all</div>
            </a>
        </div>

        <!-- Stories Content -->
        <div class="stories">
            <div class="stories-img color">
                <img src="images/dog.jpg" alt="">
                <div class="add">+</div>
            </div>
            <div class="stories-img ">
                <img src="images/dog4.jpg" alt="">
            </div>
            <div class="stories-img ">
                <img src="images/dog3.jpg" alt="">
            </div>
            <div class="stories-img ">
                <img src="images/dog2.jpg" alt="">
            </div>
            <div class="stories-img ">
                <img src="images/dogg1.jpg" alt="">
            </div>
            <div class="stories-img ">
                <img src="images/dog5.jpg" alt="">
            </div>
            <div class="stories-img ">
                <img src="images/dog6.png" alt="">
            </div>
            <div class="stories-img ">
                <img src="images/dog7.jpg" alt="">
            </div>
            <div class="stories-img ">
                <img src="images/dog8.jpg" alt="">
            </div>
            <div class="stories-img ">
                <img src="images/dog9.jpg" alt="">
            </div>
        </div>

        <div class="main-posts">
            <div class="post-box">
                <img src="images/dogg1.jpg" alt="">

                <div class="post-info">
                    <div class="post-profile">
                        <p style="font-size: 18px; font-weight: 200;">This is a caption</p>
                    </div>

                    <div class="likes">
                        <i class="ri-heart-line"></i>
                        <span>84.4k</span>
                        <i class="ri-chat-3-line"></i>
                        <span>88</span>
                    </div>
                </div>
            </div>
        </div>

    </div>
</body>

</html>