<?php
$filepata = realpath(dirname(__FILE__));
include './inc/header.php';
include_once $filepata.'/../classes/ShopingCart.php';
include_once $filepata.'/../helps/format.php';
?>
<?php
$cart = new ShopingCart();
if (isset($_GET['shiftedid'])) {
	$shifOderdID = $_GET['shiftedid'];
	$time        = $_GET['time'];
	$price       = $_GET['price'];
	$shifted     = $cart->Shifted($shifOderdID, $time, $price);
}
if (isset($_GET['shiftedid'])) {
	$shifOderdID = $_GET['shiftedid'];
	$time        = $_GET['time'];
	$price       = $_GET['price'];
	$shifted     = $cart->Shifted($shifOderdID, $time, $price);
}
if (isset($_GET['deleteID'])) {
	$delorID  = $_GET['deleteID'];
	$delOrder = $cart->deleteOrderByID($delorID);
}
if (isset($_POST['submit'])) {
	$delorID  = $_POST['orderupdateID'];
	$status   = $_POST['status'];
	$delOrder = $cart->updatestatus($delorID, $status);
}
?>
<title>List brand</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
</head>
<body>
<?php
if (isset($shifted)) {
	echo $shifted;
}
?>
<div class="container">
		<h4>List order</h4>
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>STT</th>
					<th>Order name</th>
					<th>Product</th>
					<th>Quantity</th>
					<th>Price</th>
					<th>Date</th>
					<th>Adrress</th>
					<th>Status</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
<?php
if (isset($delOrder)) {
	echo $delOrder;
}
?>
				<?php
$cart     = new ShopingCart();
$fm       = new Format();
$getOrder = $cart->getAllOrder();
if ($getOrder) {
	$i = 0;
	while ($result = $getOrder->fetch_assoc()) {
		$i++;
		?>
										<form action="" method = "POST">
											<tr>
												<td><?php echo $i;?></td>
												<input type="hidden" name="orderupdateID" value="<?php echo $result['orID'];?>">

												<td><img src="uploads/<?php echo $result['productImage'];?>" class="img-thumbnail" alt="Sample image" width="120" height="100"></td>
												<td><?php echo $result['productName'];?></td>
												<td><?php echo $result['quantity'];?></td>
												<td><?php echo $result['price'];?></td>
												<td><?php echo $fm->formatDate($result['dateOrder']);?></td>
												<td><a href="listCustomer.php?customerID=<?php echo $result['customerID']?>">View Customer</a></td>
												<td>

													<select select class="custom-select mr-sm-2" id="inlineFormCustomSelect"style="width:200px" name = "status">
		<?php if ($result['orStatus'] == 0) {
			?>
			<option selected value="0">Pending</option>
																	<option value="1">Shifting</option>
																	<option value="2">Received</option>
			<?php } elseif ($result['orStatus'] == 1) {
			?>
			<option value="0">Pending</option>
																	<option selected value="1">Shifting</option>
																	<option value="2">Received</option>
			<?php
		} else {
			?>
			<option selected value="0">Pending</option>
																	<option value="1">Shifting</option>
																	<option selected value="2">Received</option>

			<?php
		}?>
		</select>
												</td>

												<td><input type="submit" class="btn btn-primary" name ="submit">
													</input></td>

												</form>
		<?php
	}
}
?>
</tbody>
				</table>
			</div>

		</body>
<?php
include './inc/footer.php';
?>

