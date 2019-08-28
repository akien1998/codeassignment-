<?php
include './inc/header.php';
include './inc/slider.php';
?>
<?php
if (!isset($_GET['prID']) || $_GET['prID'] == NULL) {
	echo "hehe";
} else {
	$prDetail = $_GET['prID'];
}
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
	$qunatity  = $_POST['quantity'];
	$addToCart = $cart->add_to_cart($qunatity, $prDetail);
}
?>
<div class="container">
<?php
$getproduct_detail = $pr->getProductDetail($prDetail);
if ($getproduct_detail) {
	while ($result_detail = $getproduct_detail->fetch_assoc()) {
		?>

					<div class="row">
						<div class="single-product">
							<div class="col-md-3">
								<div class="product-f-image">
									<img style="width:250px;height:295px;" src="admin/uploads/<?php echo $result_detail['pImage']?>">
								</div>
							</div>
							<div class="col-md-6">
								<h2><a href="single-product.html"><?php echo $result_detail['pName'];?></a></h2>

								<div>
									<p>Price : <?php echo $result_detail['Pprice']." VND";?></p>
									<p>Description : <?php echo $result_detail['p_Desc'];?></p>
		<?php
		$catID      = $result_detail['catID'];
		$catName    = $cat->getcatNameByID($catID);
		$result_cat = $catName->fetch_assoc();
		?><p><?php echo $result_cat['catName'];?></p>

		<?php
		$brID         = $result_detail['brandID'];
		$brName       = $br->getBrandNameByID($brID);
		$result_brand = $brName->fetch_assoc();
		?><p><?php echo $result_brand['brandName'];?></p>
									<form class="form-inline" action="" method="post">
										<input type="number" class="form-control" name="quantity" value="1" min="1"/>
										<input href="cart.php" type="submit" class="btn btn-primary" name="submit" value="Buy now"/>

									</form>
		<?php
		// if (isset($addToCart)) {
		// 	echo 'Product aliready added';
		// }
		?>
		</div>

							</div>
						</div>
					</div>
		<?php
	}
}
?>
</div>
<p></p>
<p></p>
<?php
include './inc/footer.php';
?>
