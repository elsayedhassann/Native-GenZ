<?php
session_start();
if(empty($request["title"]&& !empty($request["content"]))){
    $user = unserialize($session["user"]);


    if($_FILES["image"]["name"]){
        $imagename="../../images/posts/".$filter["image"]["name"];
        move_uploaded_file($_filte["image"]["top_name"],$imagename);
    }else{
        $imagename = null;
        header("<location:login_page.php?msg-done");
    }

$user->store_post($ $request["title"],$request["content"],$imagename,$user->id);
}