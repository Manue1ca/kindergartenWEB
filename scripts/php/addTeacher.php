<?php

$Name = $_POST['Name'];
$Middlename = $_POST['Middlename'];
$Surname = $_POST['Surname'];
$Telephone = $_POST['Telephone'];
$Group = $_POST['Group'];
$Login = $_POST['Login'];
$Password = $_POST['Password'];
// $rePassword = $_POST['rePassword'];

// echo $Group;

require_once 'bd.php';
$sql = $mysqli->query("INSERT INTO `users`(`username`, `password`, `surname`, `name`, `middleName`, `telephon`, `group_idgroup`, `type_idtype`)
 VALUES ('$Login','$Password','$Surname','$Name','$Middlename','$Telephone','$Group',2)");
header('Location:/mainAdmin.php');
?>