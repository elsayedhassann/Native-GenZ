<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
$errors=[];
if (empty($_REQUEST["first_name"])) {
    $errors["first_name"]= "first name is required";
}
if (empty($_REQUEST["last_name"])) {
    $errors["last_name"]= "last name is required";
}
if (empty($_REQUEST["email"])) {
    $errors["email"]= "email is required";
}
if (empty($_REQUEST["pw"])|| empty($_REQUEST["pc"])) {
    $errors["pw"]= "password is required";
}
else if ($_REQUEST["pw"]!= $_REQUEST["pc"]) {
    $errors["pc"]="password must equal confirmation";
}

$first_name= strip_tags(trim($_REQUEST["first_name"]));
$last_name=  strip_tags(trim($_REQUEST["last_name"]));
$email= filter_var( $_REQUEST["email"], FILTER_SANITIZE_EMAIL);
$password= strip_tags($_REQUEST["pw"]);
$confirmation_password= strip_tags($_REQUEST["pc"]);
$phone= strip_tags($_REQUEST["phone"]);

if (!filter_var($email,FILTER_VALIDATE_EMAIL)) {
    $errors["email"]= " invalid email";
}
if (!empty($_REQUEST["email"])&& !filter_var($_REQUEST["email"],FILTER_VALIDATE_EMAIL)) {
    $errors["email"];
}

if (empty($errors)) {
    require_once("classes.php");
    try {
        $resulte= job_seeker::register($first_name,$last_name,$email,$phone,md5($password));
        header("location:index.php?msg=done register");
    } catch (\Throwable $th) {
        header("location:index.php?msg=some error");
    }
}else {
    $_SESSION["errors"]= $errors;
    header("location:index.php");
}
?>
</body>
</html>