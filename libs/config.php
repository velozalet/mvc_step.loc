<?php
    //define('URL', 'http://localhost/Project_mvc/');
    define('URL', 'http://'.$_SERVER['HTTP_HOST'].'/'); //устанавливаем константу URL, которая будет содержать url сайта(доменное имя)

    define('DBHOST', 'localhost');
    define('DBNAME', 'mvc_db');
    define('DBUSER', 'root');
    define('DBPASSWORD', '1111');

/*
    CREATE TABLE users(
    id int NOT NULL auto_increment primary key,
    name varchar(100) NOT NULL,
    email varchar(100) NOT NULL,
    password varchar(100),
    date int NOT NULL,
    active enum('0', '1') NOT NULL DEFAULT '0'
     );
*/


?>