<?php

// require_once "scripts/php/cookieCheck.php";

require_once 'scripts/php/bd.php';
$teacher = $mysqli->query("SELECT * FROM `users` WHERE `type`= 'teacher'");
$teacherResult= $teacher->fetch_all();

$students = $mysqli->query("SELECT * FROM `users` WHERE `type`= 'student'");
$studentsResult= $students->fetch_all();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Личный кабинет преподавателя</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="headerAdmin">
        <h1 class="textTitle">Личный кабинет администратора</h1>
        <a class="buttonOut" href="#">Выход</a>
    </div>
    <div class="mainContainerAdmin">
        <div class="listStudents">
            <div class="list">
            <?php
                    foreach ($studentsResult as $item){
                        ?>
                            <div class="nameText"><?php echo $item['1']?></div>
                            <div class="group"><?php echo $item['6']?></div>
                        <?php
                    }
                ?>
            </div>
            <div class="addUser">
              <a href="">Добавить учащегося</a>  
            </div>
        </div>
        <div class="listTeacher">
            <div class="list">
                <?php
                    foreach ($teacherResult as $item){
                        ?>
                            <div class="nameText"><?php echo $item['1']?></div>
                        <?php
                    }
                ?>
            </div>
            <div class="addUser">
                <a href="">Добавить преподавтеля</a>
            </div>

        </div>
    </div>
</body>
</html>