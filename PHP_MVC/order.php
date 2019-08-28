
<?php
include './inc/header.php';
?>
<?php
$loginCheck = Session::get('customer_login');
if ($loginCheck == false) {
	echo "<script type='text/javascript'>window.top.location='Customerlogin.php';</script>";
}
?>
<style >
	.order_Page{
		font-size: 30px;
		font-weight: bold;
		color: red;
	}
</style>
<div class="main">

	<div class="content">
		<div class="cartoption">

			<div class="cartpage">
				<div class="order_Page">
					<h3>Order page</h3>
				</div>
			</div>

		</div>
		<div class="clear">

		</div>
	</div>

</div>
<?php
include './inc/footer.php';
?>
