<?php

$login = $_POST['login'];
$password = $_POST['password'];


require_once "bd.php";

$result = $mysqli->query("SELECT * FROM `users` WHERE `login`= '$login' AND `password`='$password'");
$userData = $result->fetch_assoc();


if(empty($userData)){
    echo 'Введен неверный логин или пароль';
    exit();
}else{
    setcookie('login', $login, time()+3600,"/");
    setcookie('pass', $password, time()+3600,"/");
    if($userData['type'] == 'admin'){
        header('Location:../../mainAdmin.php');
    }
    if($userData['type'] == 'teacher'){
        header('Location:../../mainTeacher.php');
    }
    
}


?>