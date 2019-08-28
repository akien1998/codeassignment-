<?php
include './inc/header.php';
?>
<?php
$loginCheck = Session::get('customer_login');
if ($loginCheck) {
	echo "<script type='text/javascript'>window.top.location='order.php';</script>";
}
?>
<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {

	$insertCus = $cus->insertCustomer($_POST);
}
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])) {

	$loginCus = $cus->loginCustomer($_POST);
}
?>
<div class="container">
  <h2>Login</h2>
  <form action="" method="POST">
    <div class="form-group">
      <label for="email">User name:</label>
      <input type="text" class="form-control" id="email" placeholder="Enter userName" name="CususerName">
    </div>
    <div class="form-group">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="cusPassword">
    </div>
    <div class="checkbox">
      <label><input type="checkbox" name="remember"> Remember me</label>
    </div>
    <button type="submit" name="login" class="btn btn-default">Login</button>
    </form>
</div>

<div class="container">
  <h2>Sign Up</h2>
<?php
if (isset($insertCus)) {
	echo $insertCus;
}
?>
<form action="" method="POST">
    <div class="form-group">
      <label for="">First Name</label>
      <input type="text" class="form-control" id="email" placeholder="Enter First Name" name="firstName">
    </div>
    <div class="form-group">
      <label for="pwd">Last name</label>
      <input type="text" class="form-control" id="pwd" placeholder="Enter last name" name="lastName">
    </div>
    <div class="form-group">
      <label for="pwd">User name</label>
      <input type="text" class="form-control" id="pwd" placeholder="Enter last name" name="userName">
    </div>
    <div class="form-group">
      <label for="pwd">Password</label>
      <input type="password" class="form-control" id="pwd" placeholder="Enter passs" name="password">
    </div>
    <button type="submit" class="btn btn-default" name="submit">Create account</button>
  </form>
</div>

<?php
include './inc/footer.php';
?>


