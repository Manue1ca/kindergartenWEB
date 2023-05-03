<?php

$login = $_COOKIE['login'];
require_once 'scripts/php/bd.php';
$sql = $mysqli->query("SELECT * FROM `users` JOIN `group` ON group_idgroup = idgroup WHERE username = '$login'");
$info = $sql->fetch_assoc();
$groupTeacher = $info['nameGroup'];



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Линый кабинет педагога</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="headerAdmin">
        <h1 class="textTitle">Личный кабинет преподавателя</h1>
    </div>
    <div class="menuTeacher">
            <!-- <a href="TeacherQuest.php"><h2>Просмотр задания</h2></a> -->
            <a href="TeacherAddQuest.php"><h2>Добавить задание</h2></a>
            <a href="TeacherMarks.php"><h2>Журнал оценок</h2></a>
    </div>
    <div class="mainContainerAdmin">
        
    <div class="infoTeacher">
            <div class="contInfo">
            <div>
            <div class="infoGroup">Группа:<?php echo $info['nameGroup']?></div>
            <div class="infoName">Преподователь:<?php echo $info['surname']." ".$info['name']." ".$info['middleName']?></div>
            </div>
                <div class="infoExit">
                <a class="" href="scripts/php/exitAuth.php">Выход</a>
                </div>
            </div>
        </div>
    </div>
    <div class="mainContainerAdmin">
       <form enctype="multipart/form-data" action="homeworks/addQuest.php" method="post">
        <input name="idGroup" type="text" value="<?php echo $info['idgroup'] ?> "hidden>
        
        <p>Напишите название работы:</p>
        <input type="text" name="Title">
        <p>Опишите ваше задание:</p>
        <textarea name="Description" id="" cols="30" rows="10"></textarea>
        <p>Добавить файл к заданию:</p>
        <input name="userfile" type="file" />
        <p></p>
        <button>Добавить задание</button>
       </form>
        
    </div>
</body>
</html>