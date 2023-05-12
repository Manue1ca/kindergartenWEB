<?php

$login = $_COOKIE['login'];
require_once 'scripts/php/bd.php';
$sql = $mysqli->query("SELECT * FROM `users` JOIN `group` ON group_idgroup = idgroup WHERE username = '$login'");
$info = $sql->fetch_assoc();
$groupTeacher = $info['nameGroup'];


$req = $mysqli->query("SELECT * FROM `homework` JOIN `group` ON group_idgroup = idgroup WHERE nameGroup = '$groupTeacher'");
$reqData = $req->fetch_all();


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
        <div>
        
        <div class="homeworkData">
            <div class="homeworkTitleHead">Задание</div>
            <div class="homeworkDateHead">Дата</div>
            <div class="homeworkComplHead">Выполнили</div>
        </div>
        <?php 
        foreach($reqData as $item){
            ?>

        <div class="homeworkData">
            <div class="homeworkTitle">
            
                <?php echo $item['2']?>
                </div>
                <a class="removeItem" href="/scripts/php/removeQuest.php?id=<?php echo $item['0'] ?>"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="black" d="M4 6H3V4h18v2h-1l-1.4 7c-.77.07-1.49.26-2.15.58L17.96 6H6.04l.46 2.22l-1.85 1.05L4 6m8.86 2a.976.976 0 0 0-1.36-.37l-8.23 4.75a.998.998 0 1 0 1 1.73l8.23-4.75c.47-.27.64-.89.36-1.36M13 19H8.64l-.91-4.57L5.9 15.5L7 21h6.35c-.22-.63-.35-1.3-.35-2m8.12-3.54L19 17.59l-2.12-2.13l-1.42 1.42L17.58 19l-2.12 2.12l1.41 1.42L19 20.41l2.12 2.13l1.41-1.42L20.41 19l2.12-2.12l-1.41-1.42Z"/></svg></a>
            
            <div class="homeworkDate"><?php echo $item['4']?></div>
            <div class="homeworkCompl">
                <?php
                    $compl = $mysqli->query("SELECT * FROM `homework` JOIN `users_has_homework` ON `homework`.`idhomework` = `users_has_homework`.`homework_idhomework` JOIN `users` ON `users_has_homework`.`users_idusers` = `users`.`idusers` WHERE `homework`.`idhomework` = '$item[0]'");
            
                    $dataCompl = $compl->fetch_all();
                    // print_r($dataCompl);
                    foreach($dataCompl as $compl){
                        if($compl[8] == 2){
                        ?>
                        <div class="homeComplInner">
                            <?php  echo $compl[13].' '.$compl[14]. ' '. 'оценка: Зачтено'?>
                            <a href="chechHomework.php?userid=<?php echo $compl[6]?>&homeworkid=<?php echo $compl[7] ?>">Проверить задание</a>
                        </div>
                       
                        <?php
                        }
                        else{
                            ?>

                        <div class="homeComplInner">
                            <?php  echo $compl[13].' '.$compl[14]. ' '. 'оценка: Не зачтено'?>
                            <a href="chechHomework.php?userid=<?php echo $compl[6]?>&homeworkid=<?php echo $compl[7] ?>">Проверить задание</a>
                        </div>
                            <?php
                        }
                    }
                    
                ?>
            </div>
        </div>


            <?php
        }
        ?>
        
        </div>
        
    </div>
</body>
</html>