<?php

$idStud = $_GET['userid'];
$idHomeWork = $_GET['homeworkid'];


require_once 'scripts/php/bd.php';

$findWork = $mysqli->query("SELECT * FROM `users_has_homework` WHERE `users_has_homework`.`users_idusers` = $idStud AND `users_has_homework`.`homework_idhomework` = $idHomeWork");
$workResult = $findWork->fetch_assoc();

$findStudent = $mysqli->query("SELECT * FROM `users` JOIN `group` ON `users`.`group_idgroup` = `group`.`idgroup` WHERE `idusers` = $idStud");
$student = $findStudent->fetch_assoc();

$findHomework = $mysqli->query("SELECT * FROM `homework` WHERE `idhomework` = $idHomeWork");
$resHomework = $findHomework->fetch_assoc();

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <div class="headerAdmin">
        <h1 class="textTitle">Проверка задания <a class="closeMark" href="/TeacherMarks.php">X</a></h1>
    </div>
        
        <div class="infoStudent">
            <h2>Работа студента: <?php echo $student['surname'].' '.$student['name']?></h2>
            <h2>Группы: <?php echo $student['nameGroup']?></h2>
        </div>
        <div class="infoWork">
            <h1>Просмотр задания преподавателя</h1>
            <h2><?php echo $resHomework['titleHomework'] ?></h2>
            <h3><?php echo $resHomework['description'] ?></h3>
            <h3><a href="file">Файл преподавателя</a></h3>
        </div>
        <div class="infoHomework">
            <h1>Просмотр задания Студента</h1>
            <h3><a href="<?php echo $workResult['fileHomework']?>">Файл студента</a></h3>
            <form action="scripts/php/addMark.php" method="post">
            <input type="text" hidden value="<?php echo $idStud?>" name="idStud">
            <input type="text" hidden value="<?php echo $idHomeWork?>" name="idWork">
            <h2>Оценка студента: 
                <!-- <input type="number" name="mark" id="" value="<?php echo $workResult['usersCompliteHomework'] ?>"> -->
                <select name="mark">
                    <option value="2">Зачтено</option>
                    <option value="1">Не зачтено</option>
                </select>
            </h2>
            <button class="buttonClass">Поставить оценку</button>
            </form>
        </div>

</body>
</html>