<?php

setcookie('login', '1', time()+0,"/");
setcookie('pass', '1', time()+0,"/");

header('Location:/');
?>