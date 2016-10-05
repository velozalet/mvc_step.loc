<?php
/*
	Главный контроллер,от которого будут наследовать все остальные Controllers в папке [controllers]
	Kонструктор этого Класса,через свойство(protected $view), создает экземпляр Класса View.
	Т.е,теперь, через $view этого Класса(class Controller) мы имеем доступ к методам Класса View( в частности к методу render() )
	Последний(Класс View) подтягивает (require) нужную view из [views]. Папки с коннкретными вьюхами в папке [views] называются также, как и имя соответствующего
	раб.Контроллера - напр. [views]/[site] для siteController.php и  [views]/[user] для userController.php
 */
class Controller { 
	protected $view;

	 public function __construct( $viewName ) {
	 	$this->view = new View();
	 }
}  //__/class Controller

?>  