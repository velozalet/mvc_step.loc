<?php
//$dsn = "mysql:host=".DBHOST.";dbname=".DBNAME.";port=3307;charcet=UTF8"; //если порт виртуального сервера отличается и нестандартный
$dsn = "mysql:host=".DBHOST.";dbname=".DBNAME.";charcet=UTF8";
$pdo = new PDO($dsn, DBUSER,DBPASSWORD);