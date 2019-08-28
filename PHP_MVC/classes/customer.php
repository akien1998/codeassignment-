<?php
$filepata = realpath(dirname(__FILE__));
include_once $filepata.'/../lib/database.php';
include_once $filepata.'/../helps/format.php';
?>
<?php
class customer {
	private $db;
	private $fm;
	public function __construct() {
		$this->db = new Database();
		$this->fm = new Format();
	}
	public function insertCustomer($data) {
		$firstName = mysqli_real_escape_string($this->db->link, $data['firstName']);
		$lastName  = mysqli_real_escape_string($this->db->link, $data['lastName']);
		$userName  = mysqli_real_escape_string($this->db->link, $data['userName']);
		$password  = mysqli_real_escape_string($this->db->link, md5($data['password']));

		if ($firstName == "" || $lastName == "" || $userName == "" || $password == "") {
			?>
			<script>
										alert("Fields must be not empty");
									</script>
			<?php
		} else {
			$checkuserName = "SELECT * FROM tbl_Customer WHERE userName ='$userName' LIMIT 1";
			$result_check  = $this->db->select($checkuserName);
			if ($result_check) {
				?>
				<script>
													alert("User name already exitst");
												</script>
				<?php
			} else {
				$query  = "INSERT INTO `tbl_Customer`(`firstName`, `lastName`, `userName`, `password`) VALUES('$firstName','$lastName','$userName','$password')";
				$result = $this->db->insert($query);// thuc thi cau select o tren
				if ($result) {
					?>
					<script>
																alert("Create account successful");
															</script>
					<?php
				} else {
					?>
					<script>
																alert("Can notCreate account successful");
															</script>
					<?php
				}
			}

		}
	}
	public function loginCustomer($data) {
		$userName = mysqli_real_escape_string($this->db->link, $data['CususerName']);
		$password = mysqli_real_escape_string($this->db->link, md5($data['cusPassword']));
		if (empty($userName) || empty($password)) {
			?>
			<script>
										alert("Fields must be not empty");
									</script>
			<?php
		} else {
			$loginAccount = "SELECT * FROM tbl_Customer WHERE userName ='$userName' AND password='$password' LIMIT 1";
			$result_check = $this->db->select($loginAccount);
			if ($result_check != false) {
				$value = $result_check->fetch_assoc();
				Session::set('customer_login', true);// tao mot session customer_login
				Session::set('customer_id', $value['cusID']);
				Session::set('customer_name', $value['userName']);
				echo "<script type='text/javascript'>window.top.location='order.php';</script>";
				exit;

			} else {
				?>
				<script>
													alert("User name or password is false");
												</script>
				<?php
			}
		}
	}
	public function showCustomer($id) {
		$getProfile = "SELECT * FROM tbl_Customer WHERE cusID ='$id' LIMIT 1";
		$result     = $this->db->select($getProfile);
		return $result;
	}
	public function UpdateCusByID($data, $id) {
		$firstName = mysqli_real_escape_string($this->db->link, $data['firstName']);
		$lastName  = mysqli_real_escape_string($this->db->link, $data['lastName']);
		$userName  = mysqli_real_escape_string($this->db->link, $data['userName']);
		$password  = mysqli_real_escape_string($this->db->link, md5($data['password']));
		if ($firstName == "" || $lastName == "" || $userName == "" || $password == "") {
			?>
			<script>
										alert("Fields must be not empty");
									</script>
			<?php
		} else {
			$query = "UPDATE `tbl_Customer` SET
			firstName ='$firstName',
			lastName ='$lastName',
			userName ='$userName',
			password ='$password'
			WHERE cusID = '$id'
";
			$result = $this->db->update($query);// thuc thi cau select o tren
			if ($result) {
				?>
				<script>
													alert("edit successful");
												</script>
				<?php
			} else {
				?>
				<script>
													alert("Can not edit successful");
												</script>
				<?php
			}

		}
	}
}
?>
