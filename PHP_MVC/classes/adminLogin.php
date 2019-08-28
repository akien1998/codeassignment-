<?php
include_once ($filepata.'/../lib/session.php');
Session::checkLogin();
$filepata = realpath(dirname(__FILE__));
include_once ($filepata.'/../lib/database.php');
include_once ($filepata.'/../helps/format.php');

?>


<?php
class adminLogin {
	private $db;
	private $fm;
	public function __construct() {
		$this->db = new Database();
		$this->fm = new Format();
	}
	public function login_admin($adminUser, $adminPass) {
		$adminUser = $this->fm->validation($adminUser);
		$adminPass = $this->fm->validation($adminPass);

		$adminUser = mysqli_real_escape_string($this->db->link, $adminUser);
		$adminPass = mysqli_real_escape_string($this->db->link, $adminPass);

		if (empty($adminUser) || empty($adminPass)) {
			$alert = "User and Pass must be not empty";
			return $alert;
		} else {
			$query  = "SELECT * FROM tbl_admin WHERE adminUser = '$adminUser' AND adminPass = '$adminPass'";
			$result = $this->db->select($query);// thuc thi cau select o tren

			if ($result != false) {
				$value = $result->fetch_assoc();// lay ket qua
				Session::set('adminLogin', true);// da ton tai cai adminLogin, tyuyen tu result truyen cho value
				Session::set('adminId', $value['adminID']);
				Session::set('adminUser', $value['adminUser']);
				Session::set('adminName', $value['adminName']);
				header('Location:admin.php');

			} else {
				$alert = "User and Pass not match";
				return $alert;
			}
		}
	}
}
?>