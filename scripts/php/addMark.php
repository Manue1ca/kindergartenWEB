<?php

$idStud = $_POST['idStud'];
$idHomeWork = $_POST['idWork'];
$mark = $_POST['mark'];

echo $idStud.$idHomeWork.$mark;

require_once 'bd.php';

$updateMark = $mysqli->query("UPDATE `users_has_homework` SET `usersCompliteHomework`= $mark  WHERE `users_idusers` = $idStud AND `homework_idhomework` = $idHomeWork");

header('Location: /TeacherMarks.php')

?>