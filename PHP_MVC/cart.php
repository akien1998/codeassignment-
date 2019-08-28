<?php
include './inc/header.php';
include './inc/slider.php';
?>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
	$cartID     = $_POST['carID'];
	$quantity   = $_POST['quantity'];
	$UpdateCart = $cart->updateCart($quantity, $cartID);
}
if (isset($_GET['deltCartID'])) {
	$DeletcarID = $_GET['deltCartID'];
	$deleteCart = $cart->delete_a_cart($DeletcarID);
}

?>
<div class="product-big-title-area">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="product-bit-title text-center">
					<h3>Your cart</h3>
<?php
if (isset($UpdateCart)) {
	echo $UpdateCart;
}
?>
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
									<th class="product-subtotal">Action</th>
								</tr>
<?php
$get_product_cart = $cart->getProductCart();
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
																	<a href="single-product.html"><img width="145" height="145" alt="poster_1_up" class="shop_thumbnail" src="admin/uploads/<?php echo $result['image']?>"></a>
																</td>

																<td class="product-name">
																	<a href="single-product.html"><?php echo $result['productName'];?></a>
																</td>


																<td class="product-quantity">
																	<div class="quantity buttons_added">
																		<input type="number" size="4" class="input-text qty text" title="Qty" value="<?php echo $result['quantity']?>" min="1" step="1" name="quantity">
																	</div>
																	<p></p>

																	<input type="hidden" value="<?php echo $result['cartID']?>" name="carID" class="button">
																	<input type="submit" value="Update Cart" name="submit" class="button">

																</td>
																<td class="product-price">
																	<span class="amount"><?php echo $total = $result['price']*$result['quantity'];?></span>
																</td>


																<td class="product-subtotal"><a title="Remove this item" class="remove" href="?deltCartID=<?php echo $result['cartID']?>">Delete</a></td>
															</tr>
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
<?php
$getcheck = $cart->check_cart();
if ($getcheck) {
	// $sum = Session::get("sum");
	// $Qty = Session::get("qty");
	// echo $sum.'.VNĐ'.'-'.'Qty'.$Qty;
	// } else {
	//     echo 'Empty';
	// }

	?>

											<table cellspacing="0">
												<tbody>
													<tr class="cart-subtotal">
														<th>Subtotal</th>
														<td><span class="amount"><?php echo $subTotal." VND";
	//$qty = $
	Session::set('sum', $subTotal);
	Session::set('qty', $i);
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
	<?php
} else {
	echo 'Your cart empty';
}
?>
								<?php
$checkCus  = Session::get('customer_id');
$Checkcart = $cart->check_cart();
if ($loginCheck == false AND $checkCus == false) {
	echo '<a title="Remove this item" class="remove" href="Customerlogin.php"><button type="submit" class="btn btn-primary">you have tologin</button></a>';
} else {
	echo '<a title="Remove this item" class="remove" href="payment.php"><button type="submit" class="btn btn-primary">Payment</button></a>';
}
?>
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
