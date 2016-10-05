<?php
require 'Models/UserModel.php'; //include model "UserModel"

/** Контроллер для регистрации(registr.php) и логинации(login.php) Юзера
*/
class UserController extends Controller {

	/* этот конструктор отработает в момент создания экземпляра Класса UserController, что происходит в router.php см.//п.4
	   $viewName здесь это имя папки для въюх для этого контроллера из $url[0] из router.php (см.//п.4) и там в router.php и идет
	   создание экземпляра этого класса. В данном Контроллере в $viewName будет "user" т.е. public function __construct( user )
	*/
	public function __construct( $viewName ){ //var_dump($viewName);
		echo 'This is construct of <kbd>UserController.php</kbd> <hr>';
		parent::__construct( $viewName );  //перегружаем род.конструктор из Кл.Controller и он тоже,соответствено,вызывается. После чего Классу UserController доступен метод render() Класса View
	}


	/** action INDEX() */
	public function index() {
		echo 'CONTROLLER: <kbd>UserController</kbd> <br> ACTION(method): <kbd>index()</kbd> <br>';
		$data = [
			'title' => 'Some Title..',
			'text' => '<p> Some Text....<br> This title & text rendered from <kbd>UserController.php</kbd> in this view <kbd>index.php</kbd></p>',
		]; //массив этот потом будет возвращаться из Модели, а сейчас просто вручную тут сделали

		$this->view->render("user/index", $data); //$this->view - это св-во из род.Класса Controller, и это св-во есть экземпляром Класса View к методу render которого мы обращаемся
	}

	/** action REGISTR() */
	public function registr() {
		echo 'CONTROLLER: <kbd>UserController</kbd> <br> ACTION(method): <kbd>registr()</kbd> <br>';

		$info = [];
		if( isset($_POST['registr'])) {  //если сущ.$_POST['registr']- а это переменная из кнопки(<button type='submit' name="registr">) формы регистрации во view/registr.php

			//registration User
			$user = new UserModel(); //созд.экземпляр Класса UserModel,после чего тут доступны методы Класса UserModel()

			if( $user->save($_POST) ) { //вызываем метод save() куда передаем то,что в $_POST(т.е.то,что ввел Юзер в форму регистрации и отправил).Если метод save() отработал и данные ушли в БД,то шлем Юзеру письмо через ресурc "PHPMailer"
				//send a letter to User when his data registration success save in DB (table `users`)
				require_once('libs/mail.php');
				$mail->setFrom('from@example.com', 'Mailer');
				$mail->addAddress('athlonnus@gmail.com', 'YA');
				$mail->isHTML(true);
				$mail->Subject='Subject...';
				$mail->Body='Body...message <b>in bold</b>';
				$mail->send();

				//info for user when his data registration success save in DB(table `users`)
				$info['message'] = "Success Registration!";
				$info['error'] = false;
			}
			else { //info for user when his data registration not success save in DB(table `users`)
				$info['message'] = "This email is already in use this site!";
				$info['error'] = true;
			}
		}
			$this->view->render("user/registr", $info); //$this->view - это св-во из род.Класса Controller, и это св-во есть экземпляром Класса View  к методу render которого мы обращаемся
	}


	/** action LOGIN() */
	public function login() {
		echo 'CONTROLLER: <kbd>UserController</kbd> <br> ACTION(method): <kbd>login()</kbd> <br>';

		if( isset($_POST['login'])) { //если сущ.$_POST['login']- а это переменная из кнопки(<button type='submit' name="login">) формы регистрации во view/login.php
			$user = new UserModel(); //созд.экземпляр Класса UserModel,после чего тут доступны методы Класса UserModel()

			if( $user->check($_POST) ) {  //вызываем метод check() куда передаем то,что в $_POST(т.е.то,что ввел Юзер в форму логинации и отправил).Если метод check() отработал и данные ушли в БД,то шлем Юзеру письмо через ресурc "PHPMailer"
				Session::init(); //open(start) Session. @session_start()
				Session::set('logged', true); //устанавливаем сессионую переменную logged,передавая в статичкский мотод set($key, $value),Класса Session.php. Т.е.тут будет по-сути: $_SESSION['logged'] = true;
				Session::set('name', $_POST['email']); //устанавливаем сессионую переменную name,передавая в статичкский мотод set($key,$value),Класса Session.php,- з-е E-mail из $POST. Т.е.тут будет по-сути: $_SESSION['name'] = $_POST['email'];
				header('location: /'); //перенаправляем на Главную страницу успешно залогиненного Юзера
			}
		}

		$this->view->render("user/login", ""); //$this->view - это св-во из род.Класса Controller, и это св-во есть экземпляром Класса View  к методу render которого мы обращаемся
	}


	/** action LOGOUT() */
	public function logout() {
		Session::init(); //open(start) Session. @session_start()
		Session::destroy(); //destroy Session. session_destroy();
		header('location: /'); //перенаправляем на Главную страницу уже разлогиненного Юзера
	}


	/** action SHOW ALL USERS */
	public function users() {  //var_dump($model);die;
		$user = new UserModel();
		$model = $user->getAll(); //in $model - array with users from DB (table `users`)

		$this->view->render("user/show_users", $model);
	}


	/** action EDIT USER by id */
	public function edit() {
		if( !isset($_GET['id']) || empty($_GET['id']) ):
			header('location: '.URL.'user/users');
		else:
			$user = new UserModel();
			$model = $user->findById( $_GET['id'] );
			$this->view->render("user/edit", $model);
		endif;
	}
	/** action SAVE USER by id after EDIT data of User */
	public function save() {
		$m = new UserModel();
		$m->update($_POST);
		header('location: '.URL.'user/users');
	}


	/** action DELETE USER by id */
	public function del() {
		if( !isset($_GET['id']) || empty($_GET['id']) ):
			header('location: '.URL.'user/users');
		else:
			$user = new UserModel();
			$user->delete( $_GET['id'] );
			header('location: '.URL.'user/users?del=true');
		endif;
	}



}  //__/class UserController