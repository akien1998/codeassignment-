 <?php
include './inc/header.php';
include './inc/slider.php';
?>
 <?php
if (isset($_GET['deltCartID'])) {
	$DeletcarID = $_GET['deltCartID'];
	$deleteCart = $cart->deleteDetailCart($DeletcarID);
}
?>
 <?php
$cusID = Session::get('customer_login');
if ($cusID == false) {
	echo "<script type='text/javascript'>window.top.location='Customerlogin.php';</script>";
}
?>
 <?php

if (isset($_GET['confirmid'])) {
	$confirmID       = $_GET['confirmid'];
	$confirm_product = $cart->confirm_Product($confirmID);
}
?>
 <?php
$loginCheck = Session::get('customer_login');
if ($loginCheck == false) {
	echo "<script type='text/javascript'>window.top.location='Customerlogin.php';</script>";
}
?>
<div class="product-big-title-area">
 	<div class="container">
 		<div class="row">
 			<div class="col-md-12">
 				<div class="product-bit-title text-center">
 					<h3>Your detail cart</h3>
 				</div>
 			</div>
 		</div>
 	</div>
 </div> <!-- End Page title area -->


 <div class="single-product-area">
 	<div class="zigzag-bottom"></div>
 	<div class="container">
 		<div class="row">
 			<div class="col-md-8">
 				<div class="product-content-right">
 					<div class="woocommerce">

 						<table cellspacing="0" class="shop_table cart">
 							<thead>
 								<tr>
 									<th class="product-remove">STT</th>
 									<th class="product-thumbnail">Image</th>
 									<th class="product-name">Product name</th>
 									<th class="product-quantity">Quantity</th>
 									<th class="product-price">Price</th>
 									<th class="product-price">Status</th>
 									<th class="product-subtotal">Action</th>
 								</tr>
<?php
$cusID            = Session::get('customer_id');
$get_product_cart = $cart->getAllDetailOrderByID($cusID);
if ($get_product_cart) {
	$i        = 0;
	$subTotal = 0;
	while ($result = $get_product_cart->fetch_assoc()) {
		$i++;

		?>
		 									</thead>
		 									<tbody>
		 										<form action="cart.php" method="POST" accept-charset="utf-8">
		 											<tr class="cart_item">
		 												<td class="product-remove">
		 													<a title="Remove this item" class="remove" href="#"><?php echo $i;?></a>
		 												</td>

		 												<td class="product-thumbnail">
		 													<a href="single-product.html"><img width="145" height="145" alt="poster_1_up" class="shop_thumbnail" src="admin/uploads/<?php echo $result['productImage']?>"></a>
		 												</td>

		 												<td class="product-name">
		 													<a href="single-product.html"><?php echo $result['productName'];?></a>
		 												</td>


		 												<td class="product-quantity">
		 													<div class="quantity buttons_added">
		 														<p><?php echo $result['quantity']?></p>
		 													</div>
		 													<p></p>

		 													<input type="hidden" value="<?php echo $result['cartID']?>" name="carID" class="button">
		 												</td>
		 												<td class="product-price">
		 													<span class="amount"><?php echo $total = $result['price'];?></span>
		 												</td>
		 												<td class="product-price">

		<?php
		if ($result['orStatus'] == '0') {
			?>
			<p>Pending</p>
			<?php
		} elseif ($result['orStatus'] == '1') {
			?>
			<a >Shifted</a>
			<?php
		} elseif ($result['orStatus'] == '2') {
			?>
			<p>Received</p>
			<?php
		}
		?>
		</td>
		<?php
		if ($result['orStatus'] == '0') {
			?>
			 													<td><?php echo 'N/A';?></td>
			<?php
		} elseif ($result['orStatus'] == '1') {
			?>
			 													<td><a href="?confirmid=<?php echo $result['orID']?>&price=<?php echo $result['price']?>">confirm</a></td>
			<?php
		} else {
			?>
			 													<td><?php echo 'Received';?></td>
			<?php
		}
		?>
		</tr>
		 											?>
		 										</form>

		<?php

		$subTotal += $total;
	}
}
?>
 							</tbody>
 						</table>

 						<div class="cart-collaterals">
 							<div class="cart_totals ">
 								<h2>Cart Totals</h2>

 								<table cellspacing="0">
 									<tbody>
 										<tr class="cart-subtotal">
 											<th>Subtotal</th>
 											<td><span class="amount"><?php echo $subTotal." VND";
?></span></td>
 										</tr>

 										<tr class="shipping">
 											<th>Delivery charges</th>
 											<td>10%</td>
 										</tr>
 										<tr class="shipping">
 											<th>Grand Total</th>
 											<td><?php
$thue = $subTotal*0.1;
echo $thue+$subTotal;
?></td>
 										</tr>

 										<tr class="order-total">
 											<th>Order Total</th>
 											<td><strong><span class="amount"><?php echo $i;?></span></strong> </td>
 										</tr>
 									</tbody>
 								</table>
 							</div>
 						</div>
 					</div>
 				</div>
 			</div>
 		</div>
 	</div>



 </div>


<?php
include './inc/footer.php';
?>
