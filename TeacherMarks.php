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
            <a href="TeacherQuest.php"><h2>Просмотр задания</h2></a>
            <a href="TeacherAddQuest.php"><h2>Добавить задание</h2></a>
            <a href="TeacherMarks.php"><h2>Журнал оценок</h2></a>
    </div>
    <div class="mainContainerAdmin">
        
        <div class="infoTeacher">
            <div class="infoGroup">Группа:<?php echo $info['nameGroup']?></div>
            <div class="infoName">Преподователь:<?php echo $info['surname']." ".$info['name']." ".$info['middleName']?></div>
        </div>
        <div class="infoExit">
        <a class="buttonOut" href="scripts/php/exitAuth.php">Выход</a>
        </div>
    </div>
    <div class="mainContainerAdmin">
        <div>
        
        <div class="homeworkData">
            <div class="homeworkTitleHead">Задание</div>
            <div class="homeworkComplHead">Выполнили</div>
        </div>
        <?php 
        foreach($reqData as $item){
            ?>

        <div class="homeworkData">
            <div class="homeworkTitle"><?php echo $item['2']?></div>
            <div class="homeworkDate"><?php echo $item['4']?></div>
            <div class="homeworkCompl">
                <?php
                    $compl = $mysqli->query("SELECT * FROM `homework` JOIN `users_has_homework` ON `homework`.`idhomework` = `users_has_homework`.`homework_idhomework` JOIN `users` ON `users_has_homework`.`users_idusers` = `users`.`idusers` WHERE `homework`.`idhomework` = '$item[0]'");
            
                    $dataCompl = $compl->fetch_all();
                    // print_r($dataCompl);
                    foreach($dataCompl as $compl){
                        ?>
                        <div class="homeComplInner">
                            <?php  echo $compl[13].' '.$compl[14]. ' '. 'оценка:' . $compl[8]; ?>
                            <a href="chechHomework.php?userid=<?php echo $compl[6]?>&homeworkid=<?php echo $compl[7] ?>">Проверить задание</a>
                        </div>
                       
                        <?php
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