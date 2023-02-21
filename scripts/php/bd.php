<?php


$mysqli = new mysqli('localhost','root','','kindergartenWEB');
if ($mysqli->connect_error) {
    die('Ошибка подключения (' . $mysqli->connect_errno . ') '
     . $mysqli->connect_error);
}