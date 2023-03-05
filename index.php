<?php

// require_once "scripts/php/cookieCheck.php";

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="mainContainer">
        <div class="mainTitle"><h1>Добро пожаловать!</h1></div>
        <div class="mainSubText"><h3>Пожалуйста авторизуйтесь в системе с помошью вашего логина и пароля</h3></div>
        <div class="authForm">
            <form action="scripts/php/auth.php" method="post">
                <div class="formInputArea">
                    <p class="formText">Введите логин:</p>
                    <input type="text" name="login" id="login">
                    <p class="formText">Введите пароль:</p>
                    <input type="text" name="password" id="password">
                </div>
                <div class="formButtonArea">
                    <button>Войти</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>