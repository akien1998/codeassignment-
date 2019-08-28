

<?php
include './inc/header.php';
?>


<?php
$id      = Session::get('customer_id');
$profile = $cus->showCustomer($id);
?>
<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['save'])) {
	$id        = Session::get('customer_id');
	$updateCus = $cus->UpdateCusByID($_POST, $id);
}

?>
<div class="container">
	<form action="" method="POST">
<?php
if ($profile) {
	while ($getCustomer = $profile->fetch_assoc()) {
		?>
								<div class="form-group">
									<label for="">First Name</label>
									<input type="text" class="form-control" id="email"  name="firstName"  value="<?php echo $getCustomer['firstName']?>">
								</div>
								<div class="form-group">
									<label for="pwd">Last name</label>
									<input type="text" class="form-control" id="pwd" value="<?php echo $getCustomer['lastName']?>" name="lastName">
								</div>
								<div class="form-group">
									<label for="pwd">User name</label>
									<input type="text" class="form-control" id="pwd" value="<?php echo $getCustomer['userName']?>" name="userName">
								</div>
								<div class="form-group">
									<label for="pwd">Password</label>
									<input type="password" class="form-control" id="pwd" value="<?php echo $getCustomer['password']?>" name="password">
								</div>
								<button type="submit" class="btn btn-default" name="save"><a href="editprofileCustomer.php"></a>Save</button>
		<?php
	}
}
?>
</form>
</div>
<?php
include './inc/footer.php';
?>