<?php

if(isset($_COOKIE['login'])){
    $login = $_COOKIE['login'];
    $password = $_COOKIE['pass'];

    require_once "scripts/php/bd.php";

    $result = $mysqli->query("SELECT * FROM `users` WHERE `login`= '$login' AND `password`='$password'");
    $userData = $result->fetch_assoc();
    if(empty($userData)){
        exit();
    }else{
        setcookie('login', $login, time()+3600,"/");
        setcookie('pass', $password, time()+3600,"/");
        header('Location:main.php');
    }
}
?>