<?php 
include './inc/header.php';
 ?>
<?php include_once '../classes/category.php';?>
 <?php 
 $cat = new category(); // goi class
if ($_SERVER['REQUEST_METHOD'] =='POST') {
	$catName = $_POST['catName']; 
	$cat_check = $cat->insert_category($catName);
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
<title>Add Category</title>
<div class="container">
  <h2>Add Category</h2>
  <?php 
  if (isset($cat_check)) {
    echo $cat_check;
  }
   ?>
  <form action="AddCategory.php" method ="POST">
    <div class="form-group">
      <label for="uname"> Category name</label>
      <input type="text" class="form-control" id="uname" placeholder="Enter username" name="catName" required>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>
</body>
</html>
 <?php 
include './inc/footer.php';
 ?>     
