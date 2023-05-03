<?php

// require_once "scripts/php/cookieCheck.php";

require_once 'scripts/php/bd.php';
$teacher = $mysqli->query("SELECT * FROM `users` WHERE `type_idtype`= '2'");
$teacherResult= $teacher->fetch_all();

$students = $mysqli->query("SELECT * FROM `users` WHERE `type_idtype`= '3'");
$studentsResult= $students->fetch_all();

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Личный кабинет администратора</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/auth.css">
</head>
<body>
    <div class="headerAdmin">
        <h1 class="textTitle">Личный кабинет администратора</h1>
        <a class="buttonOut" href="scripts/php/exitAuth.php">Выход</a>
    </div>
    <div class="mainContainerAdmin">
        <div class="listStudents">
            <h2>Список учащихся</h2>
            <div class="list">
            <?php
                    foreach ($studentsResult as $item){
                        ?>
                            <div class="nameText"><?php echo $item['3'].$item['4']?></div>
                        <?php
                    }
                ?>
            </div>
            <div>
              <a class="buttonClass" href="addStudent.php">Добавить учащегося</a>  
            </div>
        </div>
        <div class="listTeacher">
        <h2>Список преподавателей</h2>
            <div class="list">
                <?php
                    foreach ($teacherResult as $item){
                        ?>
                            <div class="nameText"><?php echo $item['1']?></div>
                        <?php
                    }
                ?>
            </div>
            <div >
                <a class="buttonClass" href="addTeacher.php">Добавить преподавтеля</a>
            </div>

        </div>
    </div>
</body>
</html>