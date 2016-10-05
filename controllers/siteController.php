<?php 

/** Контроллер по умолчанию для рендеринга index.php Page
*/
class SiteController extends Controller {

	/* этот конструктор отработает в момент создания экземпляра Класса SiteController, что происходит в router.php см.//п.4
       $viewName здесь это имя папки для въюх для этого контроллера из $url[0] из router.php (см.//п.4) и там в router.php и идет
      создание экземпляра этого класса. В данном Контроллере в $viewName будет "site" т.е. public function __construct( site )
	*/
	public function __construct( $viewName ){ //var_dump($viewName);
		echo 'This is construct of <kbd>SiteController.php</kbd> <hr>';
		parent::__construct( $viewName ); //перегружаем род.конструктор из Кл.Controller и он тоже,соответствено,вызывается. После чего Классу SiteController доступен метод render() Класса View
	}

	/** this is action index() */
	public function index() {
		echo 'CONTROLLER: <kbd>SiteController</kbd> <br> ACTION(method): <kbd>index()</kbd> <br>';
		$data = [
			'title' => 'Some Title',
			'text' => '<p> Some Text....<br> This title & text rendered from <kbd>SiteController.php</kbd> in this view <kbd>index.php</kbd></p>',
		]; //массив этот потом будет возвращаться из Модели, а сейчас просто вручную тут сделали

		$this->view->render("site/index", $data);  //$this->view - это св-во из род.Класса Controller, и это св-во есть экземпляром Класса View, к методу render которого мы обращаемся
		//echo 'CONTROLLER: <kbd>SiteController</kbd> <br> METHOD: <kbd>index()</kbd> <br>';
	}
 

}  //__/class SiteController

?>
