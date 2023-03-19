<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Добавить поспитателя</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="headerAdmin">
        <h1 class="textTitle">Форма для регистрации преподавателя</h1>
        <a class="buttonOut" href="/mainAdmin.php">Назад</a>
    </div>
    <div class="mainContainerAdmin">
    <form class="" action="scripts/php/addTeacher.php" method="post">
        <div class="addUser"><div class="oneHalfForm">
            <p>Введите имя преподавателя:</p>
            <input type="text" name="Name">
            <p>Введите отчество преподавателя:</p>
            <input type="text" name="Middlename">
            <p>Введите фамилию преподавателя:</p>
            <input type="text" name="Surname">
            <p>Введите номер телефона:</p>
            <input type="text" name="Telephone">  
        </div>
        <div class="oneHalfForm">
            <p>Выбирите группу:</p>
            <select name="Group">
                <?php
                require_once 'scripts/php/bd.php';
                $data = $mysqli->query("SELECT * FROM `group` WHERE idgroup > 2");
                $dataResult = $data->fetch_all();
                foreach($dataResult as $item){
                    ?>
                    <option value="<?php echo $item[0] ?>"><?php echo $item[1] ?></option>
                    <?php
                }
                ?>
            </select>
            <p>Введите Логин:</p>
            <input type="text" name="Login">
            <p>Введите пароль:</p>
            <input type="text" name="Password">
            <p>Повторите пароль:</p>
            <input type="text" name="rePasword">
       </div>
       </div>
       <button>Зарегистрировать</button>
    </form>
    </div>
</body>
</html>