<?php
session_start();
require_once('classes.php');
if (empty($user = unserialize($_SESSION["user"]))) {
  header("location:index.php?msg=noAuth");
}?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon shortcut" href="imgs/Genz_logo.ico" />
        <link rel="stylesheet" href="assets/CSS/header.css">
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    <title>GenZ</title>
</head>

<body>
    <nav>
        <div class="nav-bar">
            <div class="nv">
                <div class="menu">
                    <div><i onclick="toggleDropdown()"><img src="<?php if (!empty($user->img)) echo $user->img;
                                        else echo "IMGS/userico.png" ?>" class="PicUser"></i>
                        <div class="profile-dropdown">
                            <div class="dropdown" id="dropdown">
                                <a href="profile.htm" >Dashboard</a>
                                <a href="Portfolio.php" >About User</a>
                                <a href="edit.php" >Edit Profile</a>
                                <a href="logout_handle.php">Logout</a>
                            </div>
                        </div>
                    </div>
                    <ul class="nav-links">
                        <li><a href="home.php" ><img src="IMGS/Genz_logo.png" alt="home"
                                    class="logo-pic"></a></li>
                        <li><a href="add_service.php">Add Service</a></li>
                        <li><a href="find_one.php">find one</a></li>
                        <li><a href="" ></a></li>
                        <div class="darkLight-searchBox">
                            <div class="dark-light">
                                <i class='bx bx-moon moon'></i>
                                <i class='bx bx-sun sun'></i>
                            </div>
                            <div class="searchBox">
                                <div class="searchToggle">
                                    <i class='bx bx-x cancel'></i>
                                    <i class='bx bx-search search'></i>
                                </div>
                                <div class="search-field">
                                    <form action="search.php" method="get" style="display: flex;">
                                        
                                    <input type="text" name="keyword" placeholder="Search..." required>
                                    <button type="submit" style=" display: inline;"><i class='bx bx-search'></i></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </ul>
                </div>
            </div>
        </div>
