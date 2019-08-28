
<?php
include 'lib/session.php';
Session::init();// khoi toa sesson
?>
<?php
include_once 'lib/database.php';
include_once 'helps/format.php';
spl_autoload_register(function ($className) {
		include_once "classes/".$className.".php";
	});
$db   = new database();
$fm   = new Format();
$cart = new ShopingCart();
$use  = new user();
$pr   = new product();
$cat  = new category();
$br   = new brand();
$cus  = new customer();
?>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ustora Demo</title>

    <!-- Google Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,200,300,700,600' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,100' rel='stylesheet' type='text/css'>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="css/font-awesome.min.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/owl.carousel.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/responsive.css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body>

    <div class="header-area">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="user-menu">
                        <ul>
                            <li><a href="#"><i class="fa fa-user"></i> My Account</a></li>
                            <li><a href="#"><i class="fa fa-heart"></i> Wishlist</a></li>
                            <li><a href="cart.php"><i class="fa fa-user"></i> My Cart</a></li>
<?php
if (isset($_GET['cusID'])) {
	$delCart = $cart->detele_cart();
	Session::destroy();
}
?>
<li>
<?php
$loginCheck = Session::get('customer_login');
if ($loginCheck == false) {
	echo '<a href="Customerlogin.php"><i class="fa fa-user"></i> Login</a>';
} else {
	echo '<a href="?cusID='.Session::get('customer_id').'"> <i class="fa fa-user"> </i> Logout</a>';
}
?>
</li>
                   </ul>
               </div>
           </div>

           <div class="col-md-4">
            <div class="header-right">
                <ul class="list-unstyled list-inline">
                    <li class="dropdown dropdown-small">
                        <a data-toggle="dropdown" data-hover="dropdown" class="dropdown-toggle" href="#"><span class="key">currency :</span><span class="value">USD </span><b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="#">USD</a></li>
                            <li><a href="#">INR</a></li>
                            <li><a href="#">GBP</a></li>
                        </ul>
                    </li>

                    <li class="dropdown dropdown-small">
                        <a data-toggle="dropdown" data-hover="dropdown" class="dropdown-toggle" href="#"><span class="key">language :</span><span class="value">English </span><b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="#">English</a></li>
                            <li><a href="#">French</a></li>
                            <li><a href="#">German</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
</div> <!-- End header area -->

<div class="site-branding-area">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <div class="logo">
                    <h1><a href="./"><img src="img/logo.png"></a></h1>
                </div>
            </div>

            <div class="col-sm-6">
                <div class="shopping-item">
                    <a href="cart.php"><span class="cart-amunt">
<?php
$getcheck = $cart->check_cart();
if ($getcheck) {
	$sum = Session::get("sum");
	$Qty = Session::get("qty");
	echo $sum.'.VNĐ'.'-'.'Qty'.$Qty;
} else {
	echo 'Empty';
}

?>
</span> <i class="fa fa-shopping-cart"></i> <span class="product-count"></span></a>
               </div>
           </div>
       </div>
   </div>
</div> <!-- End site branding area -->

<div class="mainmenu-area">
    <div class="container">
        <div class="row">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="index.php">Home</a></li>
<?php
$Checkcart = $cart->check_cart();
if ($loginCheck == false) {
	echo '';
} else {
	echo '<li><a href="cart.php">Cart</a></li>';
}

?>

<?php
$Checkcart = $cart->check_cart();// day lam o bang ỏder cung dc
if ($loginCheck == false) {
	echo '';
} else {
	echo '<li><a href="detailOrder.php">Ordered</a></li>';
}

?>
<li><a href="#">Category</a></li>
<?php
$loginCheck = Session::get('customer_login');
if ($loginCheck == false) {
	echo '';
} else {
	echo '<li><a href="profileCustomer.php">Profile</a></li>';
}

?>
<li><a href="#">Others</a></li>
</ul>
</div>
</div>
</div>
    </div> <!-- End mainmenu area -->