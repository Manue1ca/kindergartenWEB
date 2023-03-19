<?php

$login = $_COOKIE['login'];
require_once 'scripts/php/bd.php';
$sql = $mysqli->query("SELECT * FROM `users` JOIN `group` ON group_idgroup = idgroup WHERE username = '$login'");
$info = $sql->fetch_assoc();
$groupTeacher = $info['nameGroup'];
$student = $info['username'];


$req = $mysqli->query("SELECT * FROM `homework` JOIN `group` ON group_idgroup = idgroup WHERE nameGroup = '$groupTeacher'");
$reqData = $req->fetch_all();

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Линый кабинет ученика</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="headerAdmin">
        <h1 class="textTitle">Личный кабинет ученика</h1>
    </div>
    <div class="mainContainerAdmin">
        
        <div class="infoTeacher">
            <div class="infoGroup">Группа:<?php echo $info['nameGroup']?></div>
            <div class="infoName">Ученик:<?php echo $info['surname']." ".$info['name']?></div>
        </div>
        <div class="infoExit">
        <a class="buttonOut" href="scripts/php/exitAuth.php">Выход</a>
        </div>
    </div>
    <div class="mainContainerAdmin">
        <div class="allListHomeworks">
        <h2>Список всех заданий:</h2>
        <?php
        $getHomework = $mysqli->query("SELECT * FROM `homework` JOIN `group` ON `homework`.`group_idgroup` = `group`.`idgroup` WHERE nameGroup = '$info[nameGroup]'");
        $resultGetHome = $getHomework->fetch_all();
        // print_r($resultGetHome);
        foreach($resultGetHome as $res){
            ?>
            <div class="homework">
                <a href="lockHomework.php?idwork=<?php echo $res[0]?>"><?php  echo $res[2]?></a>
            </div>
           
            <?php
        }
        
        ?>
        </div>
        <div class="compliteListHomeworks">
            <h2>Список выполненых заданий:</h2>
        <?php
        $getComlHomework = $mysqli->query("SELECT * FROM `users_has_homework` JOIN `users` ON `users_has_homework`.`users_idusers` = `users`.`idusers` JOIN `homework` on `homework`.`idhomework` = `users_has_homework`.`homework_idhomework` WHERE username = '$student'");
        $resultComlHome = $getComlHomework->fetch_all();
        // print_r($resultComlHome);
        foreach($resultComlHome as $resComl){
            ?>
            <div class="homework">
                <?php
                if($resComl[2] == 0){
                    ?>
                    <p><?php  echo $resComl[16]. ' '. 'Задание провераяется'?></p>
                    <?php
                }else{
                    ?>
                    <p><?php  echo $resComl[16]. ' '. 'Оценка:'. $resComl[2]?></p>
                    <?php
                }
                ?>
                
            </div>
           
            <?php
        }
        
        ?>
        </div>
    </div>
</body>
</html>