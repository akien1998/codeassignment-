<?php
class Session {
	public static function init() {
		if (version_compare(phpversion(), '5.4.0', '<')) {
			if (session_id() == '') {
				session_start();
			}
		} else {
			if (session_status() == PHP_SESSION_NONE) {
				session_start();
			}
		}
	}

	public static function set($key, $val) {
		$_SESSION[$key] = $val;
	}

	public static function get($key) {
		if (isset($_SESSION[$key])) {
			return $_SESSION[$key];
		} else {
			return false;
		}
	}

	public static function checkSession() {
		// chek xem phien lam viec co ton tai hay khong
		self::init();
		if (self::get("adminLogin") == false) {
			self::destroy();
			header("Location:login.php");
		}
	}

	public static function checkLogin() {
		// neu dung thi cho vao
		self::init();
		if (self::get("adminLogin") == true) {
			header("Location:admin.php");
		}
	}

	public static function destroy() {
		// huy phien lam viec
		session_destroy();
		header("Location:Customerlogin.php");
	}
}
?>

