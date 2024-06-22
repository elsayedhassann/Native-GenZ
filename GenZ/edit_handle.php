<?php
session_start();
$first_name= strip_tags(trim($_REQUEST["first_name"]));
$last_name=  strip_tags(trim($_REQUEST["last_name"]));
$status=  strip_tags(trim($_REQUEST["status"]));
$information=  strip_tags(trim($_REQUEST["information"]));
$password= strip_tags($_REQUEST["pw"]);
$confirmation_password= strip_tags($_REQUEST["pc"]);
require_once("classes.php");
$user = unserialize($_SESSION["user"]);
    if ($_FILES["img"]["name"]) {
        $imgname= "IMGS".$_FILES["img"]["name"];
    }else {
        $imgname=null;
    }
    move_uploaded_file($_FILES["img"]["tmp_name"],$imgname);
$resulte= user::edit($imgname,$first_name, $last_name, $status ,$information,md5($password),$user_id);
header("location:portfolio.php?msg=done edit");
?>