
<?php
include './inc/header.php';
?>
<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
	$cusID       = Session::get('customer_id');
	$insertOrder = $cart->insertOrder($cusID);
	$delCart     = $cart->detele_cart();
	?>
	<script>
					alert("Order successful");
				</script>
	<?php
}

?>
<form action="" method="POST" accept-charset="utf-8">


	<div class="container">
		<div class="row">
			<div class="col-md-8">
				<div class="product-content-right">
					<div class="woocommerce">
						<h3>Your cart</h3>
						<table cellspacing="0" class="shop_table cart">
							<thead>
								<tr>
									<th class="product-remove">STT</th>
									<th class="product-name">Product name</th>
									<th class="product-quantity">Quantity</th>
									<th class="product-price">Price</th>
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
																<tr class="cart_item">
																	<td class="product-remove">
																		<p ><?php echo $i;?></p>
																	</td>
																	<td class="product-name">
																		<p><?php echo $result['productName'];?></p>
																	</td>
																	<td class="product-quantity">
																		<div class="quantity buttons_added">
																			<p><?php echo $result['quantity']?></p>
																		</div>
																		<input type="hidden" value="<?php echo $result['cartID']?>" name="carID" class="button">
																	</td>
																	<td class="product-price">
																		<span class="amount"><?php echo $total = $result['price']*$result['quantity'];?></span>
																	</td>
																</tr>

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
<p></p>
								<button type="submit" name="submit" class="btn btn-primary">Payment</button>
								<p></p>

							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</form>
<a href="detailOrder.php"><button type="submit" name="submit" class="btn btn-primary">Detali order </button></a>
<?php
include './inc/footer.php';
?>