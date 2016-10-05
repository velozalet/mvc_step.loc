<?php
/**
	Главный View,который наследуют рабочие(запрошенные Контроллеры такие как userController и из siteController).
	Инклюдит нужные въюхи по параметрам, передаваемым из рабочих(запрошенных Контроллеров), $path, $data
*/
class View { 

	public $data; //отображаемый текст на странице

	 public function render( $path, $data) {  //отображать ту или иную страницу
	 	//$path = "site/index"
	 	//$path = "user/login"
	 	$this->data = $data;

	 	require 'views/header.php'; //инклюдим Header
		require "views/{$path}.php"; //Инклюдим путь к нужной въю($path) и динамический контент($data) из соответствующего Контроллера,который запрошен (наприм.из userController или из siteController)
	 	require 'views/footer.php'; //инклюдим Footer
	 }

}  //__/class View

/*
     Где $path - строка в зависим.от того,что введено в адр.строку и это путь к нужной вью в [views]. $path приходит из раб.Контроллера (из userController или из siteController),
                 а именно из экшена этого Контроллера (см.Контроллер userController и siteController).
                 Тут может быть "user/registr" или "user/login" или "site/index" ...
     $data - данные(массив),которые мы будем передавать в эту самую вьюху. $data приходит из раб.Контроллера (из userController и из siteController),а именно из экшена этого
             Контроллера (см.Контроллер userController и siteController).
*/
?>  