<?php include './inc/header.php';?>
<?php include '../classes/brand.php';?>
 <?php 
 $brand = new brand(); // goi class
if ($_SERVER['REQUEST_METHOD'] =='POST') {
	$brName = $_POST['brName']; 
	$brand_check = $brand->insert_brand($brName);
}
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Add Brand</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Add Brand</h2>
  <?php 
  if (isset($brand_check)) {
    echo $brand_check;
  }
   ?>
  <form action="AddBrand.php" method ="POST">
    <div class="form-group">
      <label for="uname"> Brand name</label>
      <input type="text" class="form-control" id="uname" placeholder="Enter username" name="brName" required>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>

</body>
</html>

 <?php 
include './inc/footer.php';
 ?>     