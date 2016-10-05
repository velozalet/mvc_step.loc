<?php
/**
*/
class UserModel extends Model { 

	public $id;
	public $name;
	public $email;
	public $password;
	public $date;
	public $active;

	/** USE table `users` */
	private function tableName() { return "users"; }


	/** REGISTRATION USER in DB(table `users`)	*/
	public function save($data) //$data - там $_POST из формы регистрации Юзера(данные,кот.ввел Юзер) из /views/user/registr.php
	{
		//проверка перед сохранением данных Юзера при регистрации,есть ли уже в табл.`users` DB такой e-mail
		$res = $this->db->query( "SELECT id FROM ".$this->tableName()." WHERE email = '{$data['email']}'")->fetch();
		if($res) { return false; } //если в $res что-то есть она будет true и значит такой e-mail уже есть в в табл.`users` DB
		else { //иначе такого e-mail нету и тогда пишем запрос в в табл.`users` DB и сохраняем данные Юзера
			$data['password'] = md5($data['password']); //хешируем пароль через md5().Когда будем проверять на Логинацию, -не забыть расхешировать предварительно также через md5() и потом сравнивать пароли
			$q = "INSERT INTO ".$this->tableName()."(
				name, email, password, date) 
				VALUES('{$data['name']}', '{$data['email']}', '{$data['password']}', ".time().")";
				$this->db->query($q);
				return true;
		}
	}


	/** LOGIN USER. Check data from logination form with data from DB(table `users`) */
	public function check($data)
	{
		//хешируем пароль,кот.в $data(а это $POST['password']) из формы Логинации Юзера из /views/user/login.php, поскольку в Базе лежит таким же образом захешированный пароль.
		$data['password'] = md5($data['password']);
		$q = "SELECT name FROM ".$this->tableName()."
		WHERE email='{$data['email']}' AND password='{$data['password']}'";
		
		$res = $this->db->query($q)->fetch();
		return ($res) ? true : false;
	}

	/** GET ALL USERS  from DB (table `users`) */
	public function getAll() {
		$q = "SELECT * FROM ".$this->tableName();
		return $this->db->query($q)->fetchAll(PDO::FETCH_ASSOC);
	}


	/** GET SINGLE USER by id from DB(table `users`) */
	public function findById ($id) {
		$q = "SELECT * FROM ".$this->tableName()." WHERE id={$id}";
		return $this->db->query($q)->fetch();
	}


	/** UPDATE data of SINGLE USER by id in DB(table `users`) */
	public function update($data) {
		$q = 'UPDATE '.$this->tableName().' SET ';
		$q.='name = "'.$data['user_name'].'", ';
		$q.='email = "'.$data['user_email'].'" ';
		$q.='WHERE id=' .$data['user_id'];

		$this->db->query($q);
	}


	/** DELETE data of SINGLE USER by id in DB(table `users`) */
	public function delete($id) {
		//$q = "DELETE FROM ".$this->tableName()." WHERE id={$id}";
		//$this->db->query($q);
		//return $stmt->rowCount(); //1

	//or this with prepare & bindParam
		$stmt = $this->db->prepare('DELETE FROM '.$this->tableName().' WHERE id = :id');
		$stmt->bindParam(':id', $id);
		$stmt->execute();
		//return $stmt->rowCount(); //1
	}


}  //__/class UserModel