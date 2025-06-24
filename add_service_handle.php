<?php
session_start();
if (!empty($_REQUEST["title"] && !empty($_REQUEST["describe"]))) {
    require_once("classes.php");
    $user = unserialize($_SESSION["user"]);


    $user->store_projects($_REQUEST["depart"], $_REQUEST["title"], $_REQUEST["describe"], $_REQUEST["experince"], $_REQUEST["price"], $user->user_id);
    header("location:find_one.php");
} else {
    header("location:add_service.php?msg=field");
}
