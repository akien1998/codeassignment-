<?php include './inc/header.php';?>
<?php include '../classes/category.php';?>
 <?php 
 $cat = new category(); // goi class
 if (!isset($_GET['catid']) || $_GET['catid']==NULL) {
      echo "<script>window.location='catList.php'<?script>";
 }else {
      $catid = $_GET['catid'];
 }
 if ($_SERVER['REQUEST_METHOD'] =='POST') {
  $catName = $_POST['catName']; 
  $cat_check = $cat->updateCategory($catName,$catid);
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
	if (isset($cat_check)) {
	echo $cat_check;
  }
	?>
  <?php 
  $getCatName = $cat->getcatNameByID($catid);
  if ($getCatName) {
    while ($result = $getCatName->fetch_assoc()) {
  
   ?>
  <form action="" method="POST">
    <div class="form-group">
      <label for="email">Email:</label>
      <input type="text" value="<?php echo $result['catName']; ?>" class="form-control" id="email" placeholder="Enter Category name" name="catName">
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