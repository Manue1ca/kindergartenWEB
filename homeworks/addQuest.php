<?php
require_once '../scripts/php/bd.php';

$group = $_POST['idGroup'];
$title = $_POST['Title'];
$description = $_POST['Description'];
$uploadfile = $_FILES['userfile']['tmp_name'];
$fileFullname = $_FILES['userfile']['name'];
$pathFile = 'homeworks/'.$fileFullname;

// echo $group . " " . $title . " ". $description. " ". $uploadfile;

$addQuest = $mysqli->query("INSERT INTO `homework`(`group_idgroup`, `titleHomework`, `description`, `file`) VALUES ('$group','$title','$description','$pathFile')");

move_uploaded_file($uploadfile, $fileFullname);

header('Location: /TeacherMarks.php');

?>