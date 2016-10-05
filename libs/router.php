<?php 

//echo $_GET['url']; echo '<br/>';//user/registr или user/login или site

/** Обрабатывает $_GET-запросы и разбивает строку(то,что в $_GET[] на составные,формируя имя Контроллера,к торому будет обращение и имя экшена в этом Контроллере,
	а также имя папки для въюх для этого Контроллера,когда мы формируем экземпляр Класса запрошенного(рабочего) Контроллера:
	$controller = new $contr( $url[0] );  где $url[0] - имя папки для въюх запрошенного раб.Контроллера
*/
class Router {

	public function __construct() {
	//1.считываем $_GET['url'] если он есть в адрес.строке,иначе(по-умолч.) в $url ставим 'site'
		$url = ( isset($_GET['url']) ) ? $_GET['url'] : 'site'; //напр. user/registr или user/login или site
	//2.разбиваем то,что пришло в $url
		$url = explode ('/', $url);  //напр. $url[0]=user $url[1]=registr или $url[0]=user $url[1]=login
		//var_dump($url);

	//3.формируем путь к рабочему Контроллеру в папке [controllers]
		$file = 'controllers/'.$url[0].'Controller.php';  //controllers/userController.php или controllers/siteController
		//var_dump($file);

	//4.если сущест.такой путь к файлу (т.е.у нас есть такой контроллер в [controllers]). Напр. controllers/userController.php или controllers/siteController
		if( file_exists($file) ) {
			require_once $file;  //то инклюдим такой файл(Контроллер) по такому пути (т.е.тут имеено путь к контроллеру который сформировался)
			//ложим в $contr отдельно имя нашего рабочего Контроллера
			$contr = $url[0].'Controller'; //напр. userController или siteController  //var_dump($contr);

			/* создается экземпляр Класса запрошенного(рабочего) Контроллера (т.е.$controller=userController(user) или $controller=siteController(site)),
			   где в круглых скобках передается $url[0] - это 1-я часть $_GET['url'] и это будет имя папки для views для этого Контроллера,которые должны
			   называться также как и сам Контроллер (напр. userController.php а папка с views для него [user]).
			   $url[0] в круглых скобках это значит входн.параметр для конструктора запрошенного(рабочего) Контроллера
			*/
			//$controller = new $contr();
			$controller = new $contr( $url[0] ); //$controller = new userController(user) или $controller = new siteController(site)

			/* теперь берем 2-ю часть $_GET['url'] (т.е.берем $url[1]) (из п.1 и 2) для создания имени экшена в запрошенном раб.Контроллере.
			Напр. в $url[1] находится registr или login. Если нету $url[1],то в $actionMethod ложим 'index' - это как по-умолч.
			Таким обр.если в адр.строке будет:
			- user/registr то $contr = userController; в $controller = new userController(user); в $actionMethod = registr;
			- user/login то $contr = userController; в $controller = new userController(user); в $actionMethod = login;
			- user  то $contr = userController; в $controller = new userController(user); в $actionMethod = index;
			- site  то $contr = siteController; в $controller = new siteController(site); в $actionMethod = index;*/
			$actionMethod = ( isset($url[1]) & $url[1] !== '' ) ? $url[1] : 'index';  //Напр. registr или login. Или index,- если в $url[1] нет ничего или там пустая строка(такое может быть,когда в $_GET['url'] передано ../site/  вместо полноценных 2-х параметров ../site/index или просто ../site  )

			//теперь вызываем этот метод-action(кот.должен быть описан в соответств.запрошенном Контроллере) из запрошенного рабочего Контроллера
			$controller->$actionMethod();
		}
		else { //иначе,если не сущест.такой путь к файлу (т.е.у нас нет такого контроллера вообще в [controllers])
			echo 'Not Find .....';  //сюда можно отображать(рендерить/инклюдить страницу 404.php)
		}
	} //__/construct
	

} //__/class Router



 ?>
