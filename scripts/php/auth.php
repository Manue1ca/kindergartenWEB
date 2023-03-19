<?php

$login = $_POST['login'];
$password = $_POST['password'];


require_once "bd.php";

$result = $mysqli->query("SELECT * FROM `users` WHERE `username`= '$login' AND `password`='$password'");
$userData = $result->fetch_assoc();


if(empty($userData)){
    echo 'Введен неверный логин или пароль';
    exit();
}else{
    setcookie('login', $login, time()+3600,"/");
    setcookie('pass', $password, time()+3600,"/");
    
    if($userData['type_idtype'] == '1'){
        header('Location:../../mainAdmin.php');
    }
    if($userData['type_idtype'] == '2'){
        header('Location:../../TeacherMarks.php');
    }
    if($userData['type_idtype'] == '3'){
        header('Location:../../mainStudent.php');
    }
    
}


?>