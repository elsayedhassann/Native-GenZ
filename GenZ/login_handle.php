<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>handle</title>
</head>
<body>
    <?php
    session_start();
    $email= filter_var( $_REQUEST["email"], FILTER_SANITIZE_EMAIL);
if (!empty($email)&& !empty($_REQUEST["password"])) {
    require_once("classes.php");
   $user=  user::login($email,md5($_REQUEST["password"])); 
   if (!empty($user)) {
    $_SESSION["user"]= serialize($user);
    if ($user->role=="job_seeker") {
        header("location:index.php");
    }elseif ($user->role=="hire") {
        header("location:index.php");
    }
   }else {
    header("location:login_page.php?msg2=no_user");
   }

}else {
    header("location:login_page.php?msg2=some error");
}

?>
</body>
</html>