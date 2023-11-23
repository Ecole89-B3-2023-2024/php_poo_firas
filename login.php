<?php
require __DIR__ . "/inc/functions.php";
require __DIR__ . "/inc/db.php";

function redirect($url, $message){
    $_SESSION['message'] = $message;
    header("location: $url");
    exit();
}
if(!empty($_POST)){
    if(isset($_POST['email']) && isset($_POST['password']) && login($_POST['email'], $_POST['password'])){
        redirect("idex.php","conneted");
    }else{
        redirect("login.php","error connection");
    }
}
var_dump($_POST);
require __DIR__ . "/templates/header.php";
if(!loggedin()){
    include __DIR__ . "/connection.php";
}else{
    redirect("index.php","connected");
} 
var_dump($_SESSION);
require __DIR__ . "/templates/footer.php";