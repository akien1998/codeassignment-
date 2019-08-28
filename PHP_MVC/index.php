<?php
include './inc/header.php';
include './inc/slider.php';
?>
<?php echo session_id();?>
<div class="promo-area">

    <div class="zigzag-bottom"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-6">
                <div class="single-promo promo1">
                    <i class="fa fa-refresh"></i>
                    <p>30 Days return</p>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="single-promo promo2">
                    <i class="fa fa-truck"></i>
                    <p>Free shipping</p>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="single-promo promo3">
                    <i class="fa fa-lock"></i>
                    <p>Secure payments</p>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="single-promo promo4">
                    <i class="fa fa-gift"></i>
                    <p>New products</p>

                </div>
            </div>
        </div>
    </div>
</div> <!-- End promo area -->

<div class="maincontent-area">
    <div class="zigzag-bottom"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="latest-product">
                    <h2 class="section-title">Feature products</h2>
                    <div class="product-carousel">

<?php
$getproduct_Feature = $pr->getProductFeature();
if ($getproduct_Feature) {
	while ($result = $getproduct_Feature->fetch_assoc()) {
		?>
				                              <div class="single-product">
				                               <div class="product-f-image">
				                                   <img style="width:220px;height:265px;" src="admin/uploads/<?php echo $result['pImage']?>">
				                                   <div class="product-hover">
				                                       <a href="#" class="add-to-cart-link"><i class="fa fa-shopping-cart"></i> Add to cart</a>
				                                       <a href="detailProduct.php?prID=<?php echo $result['pID'];?>" class="view-details-link"><i class="fa fa-link"></i> See details</a>
				                                   </div>
				                               </div>

				                               <h2><a href="single-product.html"><?php echo $result['pName'];?></a></h2>

				                               <div class="product-carousel-price">
				                                 <ins><?php echo $result['Pprice']." VND";?></ins>
				                             </div>
				                         </div>
		<?php
	}
}
?>
</div>
         </div>
     </div>
 </div>
</div>
</div> <!-- End main content area -->

<div class="brands-area">
    <div class="zigzag-bottom"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="brand-wrapper">
                    <div class="brand-list">
                        <img src="img/brand1.png" alt="">
                        <img src="img/brand2.png" alt="">
                        <img src="img/brand3.png" alt="">
                        <img src="img/brand4.png" alt="">
                        <img src="img/brand5.png" alt="">
                        <img src="img/brand6.png" alt="">
                        <img src="img/brand1.png" alt="">
                        <img src="img/brand2.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> <!-- End brands area -->

<div class="product-widget-area">
    <div class="zigzag-bottom"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="single-product-widget">
                    <h2 class="product-wid-title">New Product</h2>
<?php
$getproduct_New = $pr->getProductNew();
if ($getproduct_New) {
	while ($result1 = $getproduct_New->fetch_assoc()) {
		?>
				                          <div class="single-wid-product">
				                              <a href="single-product.html"><img src="admin/uploads/<?php echo $result1['pImage']?>" alt=""class="product-thumb"></a>
				                              <h2><a href="single-product.html">Name : <?php echo $result1['pName'];?></a></h2>
				                              <div class="product-wid-price">
				                                  <ins>Price : <?php echo $result1['Pprice']." VND";?></ins>
				                              </div>
				                              <a href="detailProduct.php?prID=<?php echo $result1['pID'];?>" class="view-details-link"><i class="fa fa-link"></i> See details</a>
				                          </div>

		<?php
	}
}
?>
</div>
          </div>

      </div>
  </div>
</div> <!-- End product widget area -->


<?php
include './inc/footer.php';
?>
