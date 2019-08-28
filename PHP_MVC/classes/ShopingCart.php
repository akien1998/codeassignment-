<?php
$filepata = realpath(dirname(__FILE__));
include_once $filepata.'/../lib/database.php';
include_once $filepata.'/../helps/format.php';
?>
<?php
class ShopingCart {
	private $db;
	private $fm;
	public function __construct() {
		$this->db = new Database();
		$this->fm = new Format();
	}
	public function add_to_cart($quantity, $id) {
		$quantity = $this->fm->validation($quantity);
		$quantity = mysqli_real_escape_string($this->db->link, $quantity);
		$id       = mysqli_real_escape_string($this->db->link, $id);
		$sID      = session_id();

		$query  = "SELECT * FROM tblproduct WHERE pID ='$id'";
		$result = $this->db->select($query)->fetch_assoc();

		$images      = $result['pImage'];
		$productname = $result["pName"];
		$Pprice      = $result["Pprice"];
		//$check       = "SELECT * FROM tbl_cart WHERE productID = '$id' AND sID = '$sID'";
		// if ($check) {
		// 	$msg = "Product already added";
		// 	return $msg;
		// } else {
		$query_insert = "INSERT INTO `tbl_cart`(`productID`, `sID`, `productName`, `price`, `quantity`, `image`) VALUES('$id','$sID','$productname','$Pprice','$quantity','$images')";
		$insert_cart  = $this->db->insert($query_insert);// thuc thi cau select o tren
		if ($insert_cart) {
			?>
			<script>
																alert("Buy successful");
															</script>
			<?php
		} else {
			echo "not success !!!";
		}
		//}
	}
	public function getProductCart() {
		$sID    = session_id();
		$query  = "SELECT * FROM tbl_cart WHERE sID = '$sID'";
		$result = $this->db->select($query);
		return $result;
	}
	public function updateCart($quantity, $Cartid) {
		$quantity = mysqli_real_escape_string($this->db->link, $quantity);
		$Cartid   = mysqli_real_escape_string($this->db->link, $Cartid);
		$query    = "UPDATE `tbl_cart` SET
		quantity ='$quantity'
		WHERE cartID = '$Cartid'
";
		$result = $this->db->update($query);
		return $result;
		if ($result) {
			$msg = "Product update success";
			return $msg;
		} else {
			$msg = "Can not update qunatity";
			return $msg;
		}
	}
	public function delete_a_cart($id) {
		$query  = "DELETE FROM tbl_cart WHERE cartID = '$id'";
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
	public function check_cart() {
		$sID    = session_id();
		$query  = "SELECT * FROM tbl_cart WHERE sID = '$sID'";// check xem cos rong
		$result = $this->db->select($query);
		return $result;
	}
	public function detele_cart() {
		$sID    = session_id();
		$query  = "DELETE  FROM tbl_cart WHERE sID = '$sID'";
		$result = $this->db->delete($query);
		return $result;
	}
	public function insertOrder($customerID) {
		$sID         = session_id();
		$query       = "SELECT * FROM tbl_cart WHERE sID = '$sID'";
		$get_product = $this->db->select($query);
		if ($get_product) {
			// lay du liu product
			while ($result = $get_product->fetch_assoc()) {
				// lay du liue de them vao bang order
				$productID    = $result['productID'];
				$productName  = $result['productName'];
				$quantity     = $result['quantity'];
				$price        = $result['price']*$quantity;
				$pImage       = $result['image'];
				$cusID        = $customerID;
				$query_insert = "INSERT INTO `tbl_order`(`productID`, `productName`, `customerID`, `quantity`, `price`, `productImage`) VALUES('$productID','$productName','$cusID','$quantity','$price','$pImage')";
				$insert_order = $this->db->insert($query_insert);// thuc thi cau select o tren
			}
		}
	}
	public function getAllDetailOrderByID($id) {
		$query  = "SELECT * FROM tbl_order WHERE customerID ='$id'";
		$result = $this->db->select($query);
		return $result;
	}
	public function deleteDetailCart($id)// xoa don dat hang
	{
		$query  = "DELETE FROM tbl_order WHERE orID = '$id'";
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
	public function getAllOrder() {
		$query  = "SELECT * FROM tbl_order ORDER BY dateOrder";
		$result = $this->db->select($query);
		return $result;
	}
	public function Shifted($shifOderdID, $time, $price) {
		$shifOderdID = mysqli_real_escape_string($this->db->link, $shifOderdID);
		$time        = mysqli_real_escape_string($this->db->link, $time);
		$price       = mysqli_real_escape_string($this->db->link, $price);
		$query       = "UPDATE `tbl_order` SET
		orStatus ='1'
		WHERE orID = '$shifOderdID' AND dateOrder = '$time' AND price = '$price'";
		$result = $this->db->update($query);
		return $result;
		if ($result) {
			$msg = "update success";
			return $msg;
		} else {
			$msg = "Can not update product";
			return $msg;
		}
	}
	public function deleteOrderByID($id) {
		$query  = "DELETE FROM tbl_order WHERE orID = '$id'";
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
	public function confirm_Product($confirmID) {
		$confirmID = mysqli_real_escape_string($this->db->link, $confirmID);
		$query     = "UPDATE `tbl_order` SET
		orStatus ='2'
		WHERE orID = '$confirmID'";
		$result = $this->db->update($query);
		return $result;
		if ($result) {
			$msg = "confirmed";
			return $msg;
		} else {
			$msg = "Can not confirmed product";
			return $msg;
		}
	}
	public function getDetailorder($id) {
		$query  = "SELECT * FROM tbl_order WHERE orID = '$id'";
		$result = $this->db->select($query);
		return $result;
	}
	public function updatestatus($id, $status) {
		$shifOderdID = mysqli_real_escape_string($this->db->link, $id);
		$status      = mysqli_real_escape_string($this->db->link, $status);
		$query       = "UPDATE `tbl_order` SET
		orStatus ='$status'
		WHERE orID = '$shifOderdID'";
		$result = $this->db->update($query);
		return $result;
		if ($result) {
			$msg = "update success";
			return $msg;
		} else {
			$msg = "Can not update product";
			return $msg;
		}
	}

}
?>
