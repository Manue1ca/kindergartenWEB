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
                            <a class="remove" href="/scripts/php/removeUser.php?id=<?php echo $item['0'] ?>"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="black" d="M4 6H3V4h18v2h-1l-1.4 7c-.77.07-1.49.26-2.15.58L17.96 6H6.04l.46 2.22l-1.85 1.05L4 6m8.86 2a.976.976 0 0 0-1.36-.37l-8.23 4.75a.998.998 0 1 0 1 1.73l8.23-4.75c.47-.27.64-.89.36-1.36M13 19H8.64l-.91-4.57L5.9 15.5L7 21h6.35c-.22-.63-.35-1.3-.35-2m8.12-3.54L19 17.59l-2.12-2.13l-1.42 1.42L17.58 19l-2.12 2.12l1.41 1.42L19 20.41l2.12 2.13l1.41-1.42L20.41 19l2.12-2.12l-1.41-1.42Z"/></svg></a>
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
                            <a class="remove" href="/scripts/php/removeUser.php?id=<?php echo $item['0'] ?>"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="black" d="M4 6H3V4h18v2h-1l-1.4 7c-.77.07-1.49.26-2.15.58L17.96 6H6.04l.46 2.22l-1.85 1.05L4 6m8.86 2a.976.976 0 0 0-1.36-.37l-8.23 4.75a.998.998 0 1 0 1 1.73l8.23-4.75c.47-.27.64-.89.36-1.36M13 19H8.64l-.91-4.57L5.9 15.5L7 21h6.35c-.22-.63-.35-1.3-.35-2m8.12-3.54L19 17.59l-2.12-2.13l-1.42 1.42L17.58 19l-2.12 2.12l1.41 1.42L19 20.41l2.12 2.13l1.41-1.42L20.41 19l2.12-2.12l-1.41-1.42Z"/></svg></a>
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