<?php
  require 'db_connect.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Home | E-Shopper</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/price-range.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
	<link href="css/main.css" rel="stylesheet">
	<link href="css/responsive.css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->
<body>
	<header id="header"><!--header-->
		
		
		<div class="header-middle"><!--header-middle-->
			<div class="container">
				<div class="row">
					<div class="col-sm-4">
						<div class="logo pull-left">
							<a href="index.html"><img src="" alt="" /></a>
						</div>
						<!-- <div class="btn-group pull-right">
							
						</div> -->
					</div>
					<div class="col-sm-8">
						<div class="shop-menu pull-right">
							<ul class="nav navbar-nav">
								<li><a href="#"><i class="fa fa-user"></i> Account</a></li>
								<li><a href="checkout.html"><i class="fa fa-crosshairs"></i> Checkout</a></li>
								<li><a href="cart.html"><i class="fa fa-shopping-cart"></i> Cart</a></li>
								<li><a href="login.html"><i class="fa fa-lock"></i> Login</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-middle-->
	
		<div class="header-bottom"><!--header-bottom-->
			<div class="container">
				<div class="row">
					<div class="col-sm-9">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
						<!-- <div class="mainmenu pull-left">
							<ul class="nav navbar-nav collapse navbar-collapse">
								<li><a href="index.php" class="active">Home</a></li>
								<li class="dropdown"><a href="#">Shop<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                        <li><a href="shop.html">Products</a></li>
										<li><a href="product-details.html">Product Details</a></li> 
										<li><a href="checkout.html">Checkout</a></li> 
										<li><a href="cart.html">Cart</a></li> 
										<li><a href="login.html">Login</a></li> 
                                    </ul>
                                </li> 
								<li class="dropdown"><a href="#">Blog<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                        <li><a href="blog.html">Blog List</a></li>
										<li><a href="blog-single.html">Blog Single</a></li>
                                    </ul>
                                </li> 
								<li><a href="404.html">404</a></li>
								<li><a href="contact-us.html">Contact</a></li>
							</ul>
						</div> -->
					</div>
					<div class="col-sm-3">
						<div class="search_box pull-right">
							<input type="text" placeholder="Search"/>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-bottom-->
	</header><!--/header-->
    <section id="slider"><!--slider-->
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<div id="slider-carousel" class="carousel slide" data-ride="carousel">
						<ol class="carousel-indicators">
							<li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
							<li data-target="#slider-carousel" data-slide-to="1"></li>
							<li data-target="#slider-carousel" data-slide-to="2"></li>
							<li data-target="#slider-carousel" data-slide-to="3"></li>
						</ol>
						
						<div class="carousel-inner">
                            <?php
                              $sql="SELECT * FROM banners";
                              $res=mysqli_query($conn,$sql);
                              $i=0;
                              while($row=mysqli_fetch_assoc($res)){
                                  $i++;
                                  if($i==1){
                            ?>
							<div class="item active">
								<!-- <div class="col-sm-6">
									<h1><span></span></h1>
									<h2></h2>
									<p> </p>
								
								</div> -->
								<div class="col-sm-12">
									<img src="images/<?php echo $row['banner'] ?>" class="girl img-responsive" alt="" />
									<img src=""  class="pricing" alt="" />
								</div>
							</div>
                            <?php
                                  }
                                  else{
                            ?>
                            <div class="item">
								<!-- <div class="col-sm-6">
									<h1><span></span></h1>
									<h2></h2>
									<p> </p>
								
								</div> -->
								<div class="col-sm-12">
									<img src="images/<?php echo $row['banner'] ?>" class="girl img-responsive" alt="" />
									<img src=""  class="pricing" alt="" />
								</div>
							</div>
                            <?php
                                  }
                              }
                            ?>
							 <!-- <div class="item">
								<div class="col-sm-6">
									<h1><span></span></h1>
									<h2></h2>
									<p></p>
									
								</div>
								<div class="col-sm-6">
									<img src="images/food_banner.jpg" class="girl img-responsive" alt="" />
									<img src=""  class="pricing" alt="" />
								</div>
							</div> -->
							
							<!--<div class="item">
								<div class="col-sm-6">
									<h1><span></span></h1>
									<h2></h2>
									<p> </p>
									
								</div>
								<div class="col-sm-6">
									<img src="images/parcel_banner.jpg" class="girl img-responsive" alt="" />
									<img src="" class="pricing" alt="" />
								</div>
							</div>
							<div class="item">
								<div class="col-sm-6">
									<h1><span></span></h1>
									<h2></h2>
									<p> </p>
									
								</div>
								<div class="col-sm-6">
									<img src="images/pharmacy.jpg" class="girl img-responsive" alt="" />
									<img src="" class="pricing" alt="" />
								</div>
							</div> -->
							
						</div>
						
						<a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
							<i class="fa fa-angle-left"></i>
						</a>
						<a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
							<i class="fa fa-angle-right"></i>
						</a>
					</div>
					
				</div>
			</div>
		</div>
	</section><!--/slider-->
    <div class="container">
			<div class="row">
    <div class="col-sm-3 relative">
					<div class="left-sidebar" style=" !important;">
						<h2>Category</h2>
						<div class="panel-group category-products" id="accordian"><!--category-productsr-->
						   <?php
						      $sql="SELECT * FROM categories";
							  $res=mysqli_query($conn,$sql);
							  while ($row=mysqli_fetch_assoc($res)) { 
						   ?>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title">
										<a data-toggle="collapse" data-parent="#accordian" href="#sportswear">
											<?php echo ucfirst($row['cat_name']) ?>
										</a>
									</h4>
								</div>
								<!-- <div id="sportswear" class="panel-collapse collapse">
									<div class="panel-body">
										<ul>
											<li><a href="#">Nike </a></li>
											<li><a href="#">Under Armour </a></li>
											<li><a href="#">Adidas </a></li>
											<li><a href="#">Puma</a></li>
											<li><a href="#">ASICS </a></li>
										</ul>
									</div>
								</div> -->
							</div>
							<?php } ?>	
						</div><!--/category-products-->
					
					</div>
				</div>
				