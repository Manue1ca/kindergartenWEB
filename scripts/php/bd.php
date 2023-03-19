<?php


$mysqli = new mysqli('localhost','root','','sadik');
if ($mysqli->connect_error) {
    die('Ошибка подключения (' . $mysqli->connect_errno . ') '
     . $mysqli->connect_error);
}