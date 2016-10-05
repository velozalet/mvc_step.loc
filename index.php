<?php
require_once('libs/config.php');  //main configuration
require_once('libs/Controller.php');  //main Controller
require_once('libs/View.php');  //main View
require_once('libs/router.php'); //Router
require_once('libs/db_connect.php');  //сonnecting to database
require_once('libs/Model.php');  //main Model
require_once('libs/Session.php');  //class "Session" for session User
//require_once('libs/mail.php');  //for "Php-Mailer" resource

$rout = new Router();  //cоздаем экземпляр Класса Router() и в этот момент отрабатывает конструктор этого Класса