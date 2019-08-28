<<?php
$filepata = realpath(dirname(__FILE__));
include './inc/header.php';
include_once $filepata.'/../classes/customer.php';
include_once $filepata.'/../helps/format.php';
?>
<?php
$cus = new customer();
if (!isset($_GET['customerID']) || $_GET['customerID'] == NULL) {
	echo "<script>window.location='showOder.php'<?script>";
} else {
	$cusID = $_GET['customerID'];
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>List brand</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body>

  <div class="container">
    <h3>List brand</h3>
<?php
if (isset($brand_check)) {
	echo $brand_check;
}
?>
<table class="table table-hover">
    <thead>
      <tr>
        <th>Number</th>
        <th>First name</th>
        <th>Last name</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
<?php
$show_cus = $cus->showCustomer($cusID);
if ($show_cus) {
	$i = 0;
	while ($result = $show_cus->fetch_assoc()) {
		$i++;

		?>
						        <tr>
						          <td><?php echo $i;?></td>
						          <td><?php echo $result['firstName']?></td>
						          <td><?php echo $result['lastName']?></td>
						          <td><?php echo $result['userName']?></td>
						          <td>
						           <a href="showOrder.php">Back </a>
						         </td>
		<?php
	}
}
?>
</tr>
 </tbody>
</table>
</div>

</body>
</html>
<?php
include './inc/footer.php';
?>