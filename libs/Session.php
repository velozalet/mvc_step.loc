<?php

class Session
{ 
	public static function init() { //open(start) Session
		@session_start();
	}

	public static function set($key, $value) { //set Name Session
		$_SESSION[$key] = $value;
	}

	public static function get($key) { //get Name Session if this name is exists
		if( isset($_SESSION[$key]) ) {
			return $_SESSION[$key];
		}
	}

	public static function destroy() { //destroy Session
		session_destroy();
	}

}  //__/class Session