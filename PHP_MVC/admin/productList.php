<?php include './inc/header.php';?>
<?php include_once '../classes/brand.php';?>
<?php include '../classes/category.php';?>
<?php include '../classes/product.php';?>
<?php include_once '../helps/format.php';?>
<?php $fm = new Format();?>
<?php $pd = new product();?>
<?php
if (isset($_GET['deletepid'])) {
	$pdID     = $_GET['deletepid'];
	$pd_check = $pd->deleteProductByID($pdID);
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
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
</head>
<body>

  <div class="container">
    <h4>List product</h4>
    <table class="table table-bordered">
      <thead>
        <tr>
          <th>STT</th>
          <th>Product name</th>
          <th>Category</th>
          <th>Brand</th>
          <th>Descriptions</th>
          <th>Price</th>
          <th>Image</th>
          <th>Type</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
<?php

$pdList = $pd->showProduct();
if ($pdList) {
	$i = 0;
	while ($result = $pdList->fetch_assoc()) {
		$i++;
		?>
		          <tr>
		            <td><?php echo $i;?></td>
		            <td><?php echo $result['pName'];?></td>
		            <td><?php echo $result['catName'];?></td>
		            <td><?php echo $result['brandName'];?></td>
		            <td><?php echo $fm->textShorten($result['p_Desc'], 30);?></td>
		            <td><?php echo $result['Pprice'];?></td>
		            <td><img src="uploads/<?php echo $result['pImage'];?>" class="img-thumbnail" alt="Sample image" width="120" height="100"></td>
		            <td><?php
		if ($result['type'] == 0) {
			echo "Feathered";
		} else {
			echo "Non-Feathered";
		}
		?></td>
		           <td>
		            <a onclick="return confirm('Are you sure delete ?')"  href="?deletepid=<?php echo $result['pID']?>"><button type="submit" class="btn btn-primary">
		              <i class="fas fa-trash-alt"></i></button></a>
		              <a href="updateProduct.php?pdid=<?php echo $result['pID']?>"><button type="submit" class="btn btn-primary">
		                <i class="fas fa-edit"></i></button></a>
		              </td>
		            </tr>
		<?php
	}
}
?>
</tbody>
    </table>
  </div>

</body>
</html>
<?php
include './inc/footer.php';
?>