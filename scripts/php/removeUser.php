<?php 

require 'bd.php';

$id = $_GET['id'];


$query = $mysqli->query("SET foreign_key_checks = 0;");
$query = $mysqli->query("DELETE FROM users WHERE `users`.`idusers` = $id");
$query = $mysqli->query("SET foreign_key_checks = 0;");

header('Location:/mainAdmin.php');
?>