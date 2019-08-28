<?php
$filepata = realpath(dirname(__FILE__));
include_once $filepata.'/../lib/database.php';
include_once $filepata.'/../helps/format.php';
?>
<?php
class product {
	private $db;
	private $fm;
	public function __construct() {
		$this->db = new Database();
		$this->fm = new Format();
	}
	public function insertProduct($data, $files) {
		$prName   = mysqli_real_escape_string($this->db->link, $data['pName']);
		$category = mysqli_real_escape_string($this->db->link, $data['catID']);
		$brand    = mysqli_real_escape_string($this->db->link, $data['brID']);
		$pDesc    = mysqli_real_escape_string($this->db->link, $data['pDesc']);
		$pPrice   = mysqli_real_escape_string($this->db->link, $data['pPrice']);
		$pType    = mysqli_real_escape_string($this->db->link, $data['pType']);

		$permited       = array('jpg', 'jpeg', 'png', 'gif');
		$file_name      = $_FILES['image']['name'];
		$file_size      = $_FILES['image']['size'];
		$file_temp      = $_FILES['image']['tmp_name'];
		$div            = explode('.', $file_name);
		$file_ext       = strtolower(end($div));
		$unique_image   = substr(md5(time()), 0, 10).'.'.$file_ext;
		$uploaded_image = "uploads/".$unique_image;
		if ($prName == "" || $pDesc == "" || $pPrice == "" || $pType == "" || $file_name == "") {
			?>
			<script>
							alert("Fields must be not empty");
						</script>
			<?php
		} else {
			move_uploaded_file($file_temp, $uploaded_image);// them vao forder
			$query  = "INSERT INTO `tblproduct`(`pName`, `catID`, `brandID`, `p_Desc`, `type`, `Pprice`, `pImage`) VALUES('$prName','$category','$brand','$pDesc','$pType','$pPrice','$unique_image')";
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
	public function showProduct() {
		$query = "SELECT tblproduct.*, tblcategory.catName, brand.brandName
		FROM tblproduct INNER JOIN tblcategory ON tblproduct.catID = tblcategory.catID
		INNER JOIN brand ON tblproduct.brandID = brand.brandID
		ORDER BY tblproduct.pID DESC";
		$result = $this->db->select($query);
		return $result;
	}
	public function deleteProductByID($id) {
		$query  = "DELETE FROM tblproduct WHERE pID = '$id'";
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
	public function getpdNameByID($id) {
		$query  = "SELECT * FROM tblproduct WHERE pID = '$id'";
		$result = $this->db->select($query);
		return $result;
	}
	public function getProductFeature() {
		$query  = "SELECT * FROM tblproduct";
		$result = $this->db->select($query);
		return $result;
	}
	public function getProductNew() {
		$query  = "SELECT * FROM tblproduct order by pID desc LIMIT 4";
		$result = $this->db->select($query);
		return $result;
	}
	public function getProductDetail($id) {
		$query = "SELECT tblproduct.*, tblcategory.catName, brand.brandName
		FROM tblproduct INNER JOIN tblcategory ON tblproduct.catID = tblcategory.catID
		INNER JOIN brand ON tblproduct.brandID = brand.brandID
		WHERE tblproduct.pID = '$id'";
		$result = $this->db->select($query);
		return $result;
	}
	public function UpdateProductByID($data, $files, $id) {
		$prName   = mysqli_real_escape_string($this->db->link, $data['pName']);
		$category = mysqli_real_escape_string($this->db->link, $data['catID']);
		$brand    = mysqli_real_escape_string($this->db->link, $data['brID']);
		$pDesc    = mysqli_real_escape_string($this->db->link, $data['pDesc']);
		$pPrice   = mysqli_real_escape_string($this->db->link, $data['pPrice']);
		$pType    = mysqli_real_escape_string($this->db->link, $data['pType']);

		$permited       = array('jpg', 'jpeg', 'png', 'gif');
		$file_name      = $_FILES['image']['name'];
		$file_size      = $_FILES['image']['size'];
		$file_temp      = $_FILES['image']['tmp_name'];
		$div            = explode('.', $file_name);
		$file_ext       = strtolower(end($div));
		$unique_image   = substr(md5(time()), 0, 10).'.'.$file_ext;
		$uploaded_image = "uploads/".$unique_image;

		if ($prName == "" || $pDesc == "" || $pPrice == "" || $pType == "") {
			?>
			<script>
							alert("Fields must be not empty");
						</script>
			<?php
		} else {
			move_uploaded_file($file_temp, $uploaded_image);//
			if (!empty($file_name)) {
				// chon anh
				if ($file_size > 1048567) {
					$alert = "<span class ='error'>Images size should be less then 10MB</span>";
					return $alert;
				} elseif (in_array($file_ext, $permited) === false) {
					$alert = "<span class ='error'>You can upload only :-".implode(', ', $permited)."</span>";
					return $alert;
				}
				$query = "UPDATE `tblproduct` SET
				pName ='$prName',
				catID ='$category',
				brandID ='$brand',
				p_Desc ='$pDesc',
				type ='$pType',
				Pprice ='$pPrice',
				pImage ='$unique_image'
				WHERE pID = '$id'
";
			} else {
				// khong chon anh
				$query = "UPDATE `tblproduct` SET
				pName ='$prName',
				catID ='$category',
				brandID ='$brand',
				p_Desc ='$pDesc',
				type ='$pType',
				Pprice ='$pPrice'
				WHERE pID = '$id'
";
			}
		}
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
?>



