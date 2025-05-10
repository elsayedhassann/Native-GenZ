<?php
session_start();
require_once("classes.php");
if (empty($user = unserialize($_SESSION["user"]))) {
  header("location:../../index.php?msg=noAuth");
}if (!empty($_REQUEST["content"])) {
    $user->store_comment($_REQUEST["content"],$_REQUEST["project_id"],$user->user_id);
    header("Location: " . $_SERVER['HTTP_REFERER']."?msg=addedcomm");
    }else {
    header("location:" . $_SERVER['HTTP_REFERER']."?msg=emptycomm");
}
?>