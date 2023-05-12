<?php
$idWork =  $_GET['idwork'];

require_once 'scripts/php/bd.php';

$sql = $mysqli->query("SELECT * FROM `homework` WHERE `homework`.`idhomework` = '$idWork'");
$sqlRes = $sql->fetch_assoc();

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Задание <?php echo $sqlRes['titleHomework']?></title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="mainContainerAdmin">
        <div class="aboutHomework">
        <h1>Задание:<?php echo $sqlRes['titleHomework']?>     <a class="closeMark" href="mainStudent.php">X</a></h1>
        <h2>Описание выполнения: <?php echo $sqlRes['description']?></h2>
        <a href="<?php echo $sqlRes['file']?>"><h2>Файл преподавателя</h2></a>
        </br>
        <?php 

        $checkCompl = $mysqli->query("SELECT * FROM `users_has_homework` JOIN `users` ON `users_has_homework`.`users_idusers` = `users`.`idusers` WHERE username = '$_COOKIE[login]' AND usersCompliteHomework > 0  AND homework_idhomework = '$idWork'");
        $resChek = $checkCompl->fetch_assoc();
        if ($resChek){
            echo '<h1>Задание выполнено</h1>';
        }
        else{
            ?>
            <form enctype="multipart/form-data" action="doneHomework/addQuest.php" method="post">
            <h2>Прикрепить выполненное задание:</h2>
            <input type="text" name="idWork" value="<?php echo $idWork ?>" hidden>
            <input name="userfile" type="file" />
            <p></p>
            <button>Выполнить задание</button>
            </form>
            
            <?php
        }
        ?>
        
            
        
       
        </div>

        
    </div>
</body>
</html>
