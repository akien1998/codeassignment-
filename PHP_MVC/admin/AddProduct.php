<?php include '../classes/brand.php';?>
<?php include './inc/header.php';?>
<?php include '../classes/category.php';?>
<?php include '../classes/product.php';?>

<?php
$pr = new product();// goi class
// if (isset($_POST['catID'])=='NULL' && isset($_POST['brID'])=='NULL') {
//   echo " <font color=red><b>Please select one category</b></font>";
// }else {
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {

	$pd = $pr->insertProduct($_POST, $_FILES);
}
// }

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

<?php
if (isset($pd)) {
	echo $pd;
}
?>
  <form  action="AddProduct.php" method ="POST" enctype="multipart/form-data">
    <div class="container">
    <div class="row justify-content-center">
    <div class="col-md-8">
    <div class="card" style="width:600px">
         <h4 class="row justify-content-center">Add Product</h4>
    <div class="form-group">
      <input type="text" class="form-control" id="uname" placeholder="Product's name" name="pName" required>
    </div>

        <select select class="custom-select mr-sm-2" id="inlineFormCustomSelect"style="width:200px" name="catID">
        <option >--Select category--</option><?php
$cat     = new Category();
$catList = $cat->Show_category();
if ($catList) {
	while ($result = $catList->fetch_assoc()) {
		?>
				            <option value="<?php echo $result['catID'];?>"><?php echo $result['catName'];
		?></option>
		<?php }}?>
</select>

        <p></p>
     <select select class="custom-select mr-sm-2" id="inlineFormCustomSelect"style="width:200px" name="brID">
        <option >--Select brand--</option>
<?php
$brand     = new brand();
$brandList = $brand->showBrand();
if ($catList) {
	while ($result = $brandList->fetch_assoc()) {
		?>
				            <option value="<?php echo $result['brandID'];?>"><?php echo $result['brandName'];
		?></option>
		<?php }}?>
</select>
  <p></p>
   <div class="form-group">
    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Product description" name="pDesc"></textarea>
  </div>

      <div class="form-group">
      <input type="text" class="form-control" id="uname" placeholder="Price" name="pPrice" required>
    </div>
       <div class="custom-file">
    <input type="file" class="custom-file-input" id="customFile" name ="image">
    <label class="custom-file-label" for="customFile">Choose file</label>
  </div>
    <p></p>
         <select select class="custom-select mr-sm-2" id="inlineFormCustomSelect"style="width:200px" name = "pType">
        <option value="1">Non-Featured</option>
        <option value="0">Featured</option>
        </select>
    <p></p>
<button type="submit" class="btn btn-primary" name="submit"><i class="fas fa-plus-circle"></i></button>

</div>
</div>
</div>
</div>
  </form>
</div>
</body>
<script>
$(".custom-file-input").on("change", function() {
  var fileName = $(this).val().split("\\").pop();
  $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
});
</script>
</html>
<?php
include './inc/footer.php';
?>
