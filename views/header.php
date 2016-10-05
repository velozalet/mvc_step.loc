<?php
Session::init(); //open (start) Session. @session_start()
$logged = Session::get('logged');  //если сущес.сессионая переменная $_SESSION['logged'] = true, то значит Юзер успешно залогинился и в $logged ложим з-е этой сесс.переменной $_SESSION['logged']. Т.е в $logged будет true
$logged_name_user = Session::get('name'); //если сущес.сессионая переменная $_SESSION['name'], то значит Юзер успешно залогинился и в $logged ложим з-е этой сесс.переменной $_SESSION['name']. Т.е в $logged_name_user будет e-mail залогиненого Юзера

if($logged_name_user): echo '<p class="text-right text-info"> <b>'.$logged_name_user.'</b> </p>'; endif;
?>
<!DOCTYPE html>
<html>
 <head>
   <title>document</title>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width,initial-sdcale=1">
   <link rel ="stylesheet" href="<?=URL; ?>assets/css/bootstrap.min.css">
 </head>
 <body>

<!-- NAVBAR -->
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span> 
      </button>
      <a class="navbar-brand" href="<?=URL; ?>">LITTUS</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="<?=URL; ?>">Home</a></li>
<!--        <li><a href="#">Page 1</a></li>-->
        <li><a href="<?=URL; ?>user/users" title="show all Users">Page 1</a></li>
        <li><a href="#">Page 2</a></li> 
        <li><a href="#">Page 3</a></li> 
      </ul>
      <ul class="nav navbar-nav navbar-right">
<!-- <li><a href="--><?//=URL; ?><!--user/registr"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li> -->
<!-- <li><a href="--><?//=URL; ?><!--user/login"><span class="glyphicon glyphicon-log-in"></span> Login</a></li> -->
        <?php if(!$logged): ?>
          <li><a href="<?=URL; ?>user/registr"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
          <li><a href="<?=URL; ?>user/login"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
        <?php else: ?>
          <li><a href="<?=URL; ?>user/logout"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
        <?php endif; ?>
      </ul>
    </div>
  </div>
</nav>
<!--/NAVBAR -->

