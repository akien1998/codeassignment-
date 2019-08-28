<?php include './inc/header.php';?>
<?php include '../classes/category.php';?>
<?php
$cat = new category();// goi class
if (isset($_GET['deleteid'])) {
	$catid     = $_GET['deleteid'];
	$cat_check = $cat->deleteCategory($catid);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>List category</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h3>List Category</h3>
<?php
if (isset($cat_check)) {
	echo $cat_check;
}
?>
<table class="table table-hover">
    <thead>
      <tr>
        <th>Number</th>
        <th>Category name</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
<?php
$show_cat = $cat->Show_category();
if ($show_cat) {
	$i = 0;
	while ($result = $show_cat->fetch_assoc()) {
		$i++;

		?>
		      <tr>
		        <td><?php echo $i;?></td>
		        <td><?php echo $result['catName']?></td>
		        <td>
		        	<a onclick="return confirm('Are you sure delete ?')"  href="?deleteid=<?php echo $result['catID']?> "><button type="button" class="btn btn-primary">Delete</button></a>
		        	<a href="updateCategory.php?catid=<?php echo $result['catID']?>"><button type="button" class="btn btn-primary" href>Update</button></a>
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