<?php include './inc/header.php';?>
<?php include '../classes/brand.php';?>
 <?php 
 $br = new brand(); // goi class
 if (!isset($_GET['brid']) || $_GET['brid']==NULL) {
      echo "<script>window.location='brandList.php'<?script>";
 }else {
      $brID = $_GET['brid'];
 }
 if ($_SERVER['REQUEST_METHOD'] =='POST') {
  $brName = $_POST['brName']; 
  $br_check = $br->updateBrand($brName,$brID);
}
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Update Category</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Update Category</h2>
  <?php 
	if (isset($br_check)) {  
	echo $br_check;
  }
	?>
  <?php 
  $getbrName = $br->getBrandNameByID($brID);
  if ($getbrName) {
    while ($result = $getbrName->fetch_assoc()) {
  
   ?>
  <form action="" method="POST">
    <div class="form-group">
      <label for="email">Email:</label>
      <input type="text" value="<?php echo $result['brandName']; ?>" class="form-control" id="email" placeholder="Enter Category name" name="brName">
    </div>
    <button type="submit" class="btn btn-default">Submit</button>
  </form>
  <?php 
     }
  }
   ?>
</div>

</body>
</html>

 <?php 
include './inc/footer.php';
 ?>     