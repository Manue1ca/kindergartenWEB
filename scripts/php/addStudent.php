<?php

$Name = $_POST['Name'];
$Parent = $_POST['Parent'];
$Surname = $_POST['Surname'];
$Telephone = $_POST['Telephone'];
$Group = $_POST['Group'];
$Login = $_POST['Login'];
$Password = $_POST['Password'];
// $rePassword = $_POST['rePassword'];

// echo $Group;

require_once 'bd.php';
$sql = $mysqli->query("INSERT INTO `users`(`username`, `password`, `surname`, `name`, `parent`, `telephon`, `group_idgroup`, `type_idtype`)
 VALUES ('$Login','$Password','$Surname','$Name','$Parent','$Telephone','$Group',3)");
header('Location:/mainAdmin.php');
?>