<?php
$filepata = realpath(dirname(__FILE__));
include_once ($filepata.'/../lib/database.php');
include_once ($filepata.'/../helps/format.php');
?>
<?php
class category {
	private $db;
	private $fm;
	public function __construct() {
		$this->db = new Database();
		$this->fm = new Format();
	}
	public function insert_category($catName) {
		$catName = $this->fm->validation($catName);
		$catName = mysqli_real_escape_string($this->db->link, $catName);

		if (empty($catName)) {
			?>
			<script>
			            alert("cat name must be empty");
			        </script>
			<?php
		} else {
			$query  = "INSERT INTO tblcategory (catName) VALUES('$catName')";
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
				                    alert("not successful");
				                </script>
				<?php
			}

		}
	}
	public function Show_category() {
		$query  = "SELECT * FROM tblcategory ORDER BY catID DESC";
		$result = $this->db->select($query);
		return $result;
	}
	public function getcatNameByID($id) {
		$query  = "SELECT * FROM tblcategory WHERE catID = '$id'";
		$result = $this->db->select($query);
		return $result;
	}
	public function updateCategory($catName, $catID) {
		$catName = $this->fm->validation($catName);
		$catName = mysqli_real_escape_string($this->db->link, $catName);
		$catID   = mysqli_real_escape_string($this->db->link, $catID);

		if (empty($catName)) {
			?>
			<script>
			            alert("cat name must be empty");
			        </script>
			<?php
		} else {
			$query  = "UPDATE tblcategory SET catName = '$catName' WHERE catID ='$catID'";
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
				                    alert("not successful");
				                </script>
				<?php
			}

		}
	}
	public function deleteCategory($id) {
		$query  = "DELETE FROM tblcategory WHERE catID = '$id'";
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