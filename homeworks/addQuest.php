<?php
require_once '../scripts/php/bd.php';

$group = $_POST['idGroup'];
$title = $_POST['Title'];
$description = $_POST['Description'];
$uploadfile = $_FILES['userfile']['tmp_name'];
$fileFullname = $_FILES['userfile']['name'];
$date = date('dmY');
$pathFile = 'homeworks/'.$fileFullname;

// echo $group . " " . $title . " ". $description. " ". $uploadfile;

$addQuest = $mysqli->query("INSERT INTO `homework`(`group_idgroup`, `titleHomework`, `description`, `file`, `Date`) VALUES ('$group','$title','$description','$pathFile',NOW())");

move_uploaded_file($uploadfile, $fileFullname);

header('Location: /TeacherMarks.php');

?>