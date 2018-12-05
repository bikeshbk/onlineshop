<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html>
<head>
<title><?php echo $this->title ;?></title>
<!-- for-mobile-apps -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Best Store Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //for-mobile-apps -->
<link href="<?php echo base_url(); ?>public/css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="<?php echo base_url(); ?>public/css/style.css" rel="stylesheet" type="text/css" media="all" />
<!-- js -->
<script src="<?php echo base_url(); ?>public/js/jquery.min.js"></script>
<!-- //js -->
<!-- cart -->
<script src="<?php echo base_url(); ?>public/js/simpleCart.min.js"></script>
<!-- cart -->
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/css/jquery-ui.css">
<script type="text/javascript" src="<?php echo base_url(); ?>public/js/bootstrap-3.1.1.min.js"></script>
<!-- //for bootstrap working -->
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Lato:400,100,100italic,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
<!-- timer -->
<link rel="stylesheet" href="<?php echo base_url(); ?>public/css/jquery.countdown.css" />
<link rel="shortcut icon" href="<?php echo base_url(); ?>public/images/favicon.png">
<!-- //timer -->
<!-- animation-effect -->
<link href="<?php echo base_url(); ?>public/css/animate.min.css" rel="stylesheet"> 
<script src="<?php echo base_url(); ?>public/js/wow.min.js"></script>
<script>
 new WOW().init();
</script>
<!-- //animation-effect -->
</head>
	
<body>
<!-- header -->
	<div class="header">
		<div class="container">
			<div class="header-grid">
				<div class="header-grid-left animated wow slideInLeft" data-wow-delay=".5s">
					<ul>
						<li><i class="glyphicon glyphicon-envelope" aria-hidden="true"></i><a href="<?php echo base_url(); ?>public/mailto:info@example.com">e-commerce@gmail.com</a></li>
						<li><i class="glyphicon glyphicon-earphone" aria-hidden="true"></i>+1234 567 892</li>
						<li><i class="glyphicon glyphicon-log-in" aria-hidden="true"></i><a href="<?php echo base_url(); ?>customer/login">Login</a></li>
						<li><i class="glyphicon glyphicon-book" aria-hidden="true"></i><a href="<?php echo base_url(); ?>customer/register">Register</a></li>
					</ul>
				</div>
				<div class="header-grid-right animated wow slideInRight" data-wow-delay=".5s">
					<ul class="social-icons">
						<li><a href="<?php echo base_url(); ?>public/#" class="facebook"></a></li>
						<li><a href="<?php echo base_url(); ?>public/#" class="twitter"></a></li>
						<li><a href="<?php echo base_url(); ?>public/#" class="g"></a></li>
						<li><a href="<?php echo base_url(); ?>public/#" class="instagram"></a></li>
					</ul>
				</div>
				<div class="clearfix"> </div>
			</div>
			<div class="logo-nav">
				<div class="logo-nav-left animated wow zoomIn" data-wow-delay=".5s">
					<h1><a href="<?php echo base_url(); ?>public/index.html">Best Store <span>Shop anywhere</span></a></h1>
				</div>
				<div class="logo-nav-left1">
					<nav class="navbar navbar-default">
					<!-- Brand and toggle get grouped for better mobile display -->
					<div class="navbar-header nav_2">
						<button type="button" class="navbar-toggle collapsed navbar-toggle1" data-toggle="collapse" data-target="#bs-megadropdown-tabs">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
					</div> 
					<div class="collapse navbar-collapse" id="bs-megadropdown-tabs">
						<ul class="nav navbar-nav">
							<li class="active"><a href="<?php echo base_url(); ?>dashboard/index" class="act">Home</a></li>	
							<!-- Mega Menu -->
							<?php foreach ($this->getCategory as $gc) { ?>
								<li class="dropdown">
								<a href="<?php echo base_url(); ?>public/#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $gc->name; ?><b class="caret"></b></a>
								<ul class="dropdown-menu multi-column columns-3">
									<div class="row">
										<?php 
											$getScat=array();
											foreach ($this->getSubcategory as $g) {
												if ($gc->id == $g->parent_id ) {
													$getScat[]=$g;
												}
											}											
										 ?>
										<?php foreach ($getScat as $gs) { ?>
										<?php 
											$getPtitle=array();
											foreach ($this->getProductTitle as $gpt) {
												if ($gs->id == $gpt->parent_id ) {
													$getPtitle[]=$gpt;
												}
											}											
										?>
											<div class="col-sm-4">
												<ul class="multi-column-dropdown">
													<h6><?php echo $gs->name; ?></h6>
													<?php foreach ($getPtitle as $p) { ?>
														<li><a href="<?php echo base_url(); ?>dashboard/productlist/<?php echo substr($p->name,1).'-'.$p->id.'.html'; ?>"><?php echo substr($p->name,1) ; ?></a></li>
													<?php } ?>													
												</ul>
											</div>	
										<?php }?>																				
										<div class="clearfix"></div>
									</div>
								</ul>
							</li>
							<?php }?>
						</ul>
					</div>
					</nav>
				</div>
				<div class="logo-nav-right">
					<div class="search-box">
						<div id="sb-search" class="sb-search">
							<form>
								<input class="sb-search-input" placeholder="Enter your search term..." type="search" id="search">
								<input class="sb-search-submit" type="submit" value="">
								<span class="sb-icon-search"> </span>
							</form>
						</div>
					</div>
						<!-- search-scripts -->
						<script src="<?php echo base_url(); ?>public/js/classie.js"></script>
						<script src="<?php echo base_url(); ?>public/js/uisearch.js"></script>
							<script>
								new UISearch( document.getElementById( 'sb-search' ) );
							</script>
						<!-- //search-scripts -->
				</div>
				<div class="header-right">
					<div class="cart box_1">
						<a href="<?php echo base_url(); ?>public/checkout.html">
							<h3> <div class="total">
								<span class="simpleCart_total"></span> (<span id="simpleCart_quantity" class="simpleCart_quantity"></span> items)</div>
								<img src="<?php echo base_url(); ?>public/images/bag.png" alt="" />
							</h3>
						</a>
						<p><a href="<?php echo base_url(); ?>public/javascript:;" class="simpleCart_empty">Empty Cart</a></p>
						<div class="clearfix"> </div>
					</div>	
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
<!-- //header -->