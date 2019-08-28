<?php include './inc/header.php';?>
<?php include '../classes/brand.php';?>
<?php
$br = new brand(); // goi class
if (isset($_GET['deleteid'])) {
	$catid = $_GET['deleteid'];
	$brand_check = $br->deleteBrandByID($catid);
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
        <th>Brand name</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
<?php
$show_brand = $br->showBrand();
if ($show_brand) {
	$i = 0;
	while ($result = $show_brand->fetch_assoc()) {
		$i++;

		?>
				          <tr>
				            <td><?php echo $i; ?></td>
				            <td><?php echo $result['brandName'] ?></td>
				            <td>
				             <a onclick="return confirm('Are you sure delete ?')"  href="?deleteid=<?php echo $result['brandID'] ?> "><button type="button" class="btn btn-primary">Delete</button></a>
				             <a href="<u></u>pdateBrand.php?brid=<?php echo $result['brandID'] ?>"><button type="button" class="btn btn-primary" href>Update</button></a>
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