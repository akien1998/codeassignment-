<?php
$filepata = realpath(dirname(__FILE__));
include_once $filepata.'/../lib/database.php';
include_once $filepata.'/../helps/format.php';
?>
<?php
class brand {
	private $db;
	private $fm;
	public function __construct() {
		$this->db = new Database();
		$this->fm = new Format();
	}
	public function insert_brand($bran_dName) {
		$bran_dName = $this->fm->validation($bran_dName);
		$bran_dName = mysqli_real_escape_string($this->db->link, $bran_dName);//để loại bỏ những kí tự có thể gây ảnh hưởng đến câu lệnh SQL

		if (empty($bran_dName)) {
			?>
			<script>
						            alert("brand name name must not be empty");
						        </script>
			<?php
		} else {
			$query  = "INSERT INTO brand (brandName) VALUES('$bran_dName')";
			$result = $this->db->insert($query);// thuc thi cau select o tren
			if ($result) {
				?>
				<script>
								                    alert("Insert successful");
								                </script>
				<?php
			} else {
				?>
				<script>
								                    alert("Can not successful");
								                </script>
				<?php
			}

		}
	}
	public function showBrand() {
		$query  = "SELECT * FROM brand ORDER BY brandID DESC";
		$result = $this->db->select($query);
		return $result;
	}
	public function getBrandNameByID($id) {
		$query  = "SELECT * FROM brand WHERE brandID = '$id'";
		$result = $this->db->select($query);
		return $result;
	}
	public function updateBrand($brName, $brID) {
		$brName = $this->fm->validation($brName);
		$brName = mysqli_real_escape_string($this->db->link, $brName);
		$brID   = mysqli_real_escape_string($this->db->link, $brID);

		if (empty($brName)) {
			?>
			<script>
						            alert("Brand name must not be empty");
						        </script>
			<?php
		} else {
			$query  = "UPDATE brand SET brandName = '$brName' WHERE brandID ='$brID'";
			$result = $this->db->update($query);// thuc thi cau select o tren
			if ($result) {
				?>
				<script>
								                    alert("Update successful");
								                </script>
				<?php
			} else {
				?>
				<script>
								                    alert("Can not successful");
								                </script>
				<?php
			}

		}
	}
	public function deleteBrandByID($id) {
		$query  = "DELETE FROM brand WHERE brandID = '$id'";
		$result = $this->db->delete($query);
		if ($result) {
			?>
			<script>
						            alert("Delete successful");
						        </script>
			<?php
		} else {
			?>
			<script>
						            alert("Can not delete");
						        </script>
			<?php
		}
	}
}
?>