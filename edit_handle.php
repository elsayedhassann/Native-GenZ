<?php
session_start();
require_once("classes.php");
if (empty($user = unserialize($_SESSION["user"]))) {
    header("location:index.php?msg=noAuth");
    exit();
}
$old_first_name = $user->first_name;
$old_last_name = $user->last_name;
$old_status = $user->status;
$old_information = $user->information;
$old_image = $user->img;
$first_name = !empty(trim($_REQUEST["first_name"])) ? strip_tags(trim($_REQUEST["first_name"])) : $old_first_name;
$last_name = !empty(trim($_REQUEST["last_name"])) ? strip_tags(trim($_REQUEST["last_name"])) : $old_last_name;
$status = !empty(trim($_REQUEST["status"])) ? strip_tags(trim($_REQUEST["status"])) : $old_status;
$information = !empty(trim($_REQUEST["information"])) ? strip_tags(trim($_REQUEST["information"])) : $old_information;
$password = strip_tags($_REQUEST["pw"]);
$confirmation_password = strip_tags($_REQUEST["pc"]);
if (!empty($_FILES["image"]["name"])) {
    $imgname = "IMGS/users/" . $_FILES["image"]["name"];
    move_uploaded_file($_FILES["image"]["tmp_name"], $imgname);
} else {
    $imgname = $old_image;
}
$result = user::edit($imgname, $first_name, $last_name, $status, $information, $password, $user->user_id);

if ($result) {
    $updatedUser = user::get_by_id($user->user_id);
    $_SESSION["user"] = serialize($updatedUser);
    header("location:portfolio.php?msg=done_edit");
    exit();
} else {
    header("location:portfolio.php?msg=edit_failed");
    exit();
}
