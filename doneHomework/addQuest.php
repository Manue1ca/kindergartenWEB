<?php
$login = $_COOKIE['login'];
$idwork = $_POST['idWork'];
require_once '../scripts/php/bd.php';

$uploadfile = $_FILES['userfile']['tmp_name'];
$uploadfileFullName = $_FILES['userfile']['name'];

$finduser = $mysqli->query("SELECT idusers , username FROM `users` WHERE username = '$login'");
$userdata = $finduser->fetch_assoc();

$userForAdd = $userdata["idusers"];

$pathSQL = 'doneHomework/'.$uploadfileFullName;



move_uploaded_file($uploadfile, $uploadfileFullName);

$addLinkToHomework = $mysqli->query("INSERT INTO `users_has_homework`(`users_idusers`, `homework_idhomework`, `usersCompliteHomework`, `fileHomework`) VALUES ('$userForAdd','$idwork','0', '$pathSQL')");

header('Location: /mainStudent.php')


?>