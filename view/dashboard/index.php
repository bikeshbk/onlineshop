
<?php
	$imgs=base_url()."admin/public/image/category/".$this->getCategory[0]->image;
	$img1=base_url()."admin/public/image/category/".$this->getCategory[0]->image;	
?>
<style type="text/css">
	.banner{
		background:url(<?php echo $imgs;?>) no-repeat 0px 0px;
		background-size:cover;
		-webkit-background-size:cover;
		-moz-background-size:cover;
		-o-background-size:cover;
		-ms-background-size:cover;
		min-height:700px;
	}

</style>
<!-- banner -->
	<div class="banner">
		<div class="container">
			<div class="banner-info animated wow zoomIn" data-wow-delay=".5s">
				<h3>Free Online Shopping</h3>
				<h4>Up to <span>50% <i>Off/-</i></span></h4>
				<div class="wmuSlider example1">
					<div class="wmuSliderWrapper">
						<article style="position: absolute; width: 100%; opacity: 0;"> 
							<div class="banner-wrap">
								<div class="banner-info1">
									<p>T-Shirts + Formal Pants + Jewellery + Cosmetics</p>
								</div>
							</div>
						</article>
						<article style="position: absolute; width: 100%; opacity: 0;"> 
							<div class="banner-wrap">
								<div class="banner-info1">
									<p>Toys + Furniture + Lighting + Watches</p>
								</div>
							</div>
						</article>
						<article style="position: absolute; width: 100%; opacity: 0;"> 
							<div class="banner-wrap">
								<div class="banner-info1">
									<p>Tops + Books & Media + Sports</p>
								</div>
							</div>
						</article>
					</div>
				</div>
					<script src="<?php echo base_url(); ?>public/js/jquery.wmuSlider.js"></script> 
					<script>
						$('.example1').wmuSlider();         
					</script> 
			</div>
		</div>
	</div>
<!-- //banner -->
<!-- banner-bottom -->
	<div class="banner-bottom">
		<div class="container"> 
			<div class="banner-bottom-grids">
				<div class="banner-bottom-grid-left animated wow slideInLeft" data-wow-delay=".5s">
					<div class="grid">
						<figure class="effect-julia">
							<img src="<?php echo base_url(); ?>admin/public/image/category/<?php echo $this->getSubcategory[2]->image; ?>" alt=" " class="img-responsive" />
							<figcaption>
								<h3>Best <span>Store</span><i> in online shopping</i></h3>
								<div>
									<p>Best Place For Onlineshopping</p>
									<p>You gone love our Product</p>
									<p>Best item of world is here</p>
								</div>
							</figcaption>			
						</figure>
					</div>
				</div>
				<div class="banner-bottom-grid-left1 animated wow slideInUp" data-wow-delay=".5s">
					<div class="banner-bottom-grid-left-grid left1-grid grid-left-grid1">
						<div class="banner-bottom-grid-left-grid1">
							<img src="<?php echo base_url(); ?>admin/public/image/category/<?php echo $this->getSubcategory[3]->image; ?>" alt=" " class="img-responsive" />
						</div>
						<div class="banner-bottom-grid-left1-pos">
							<p>Discount 45%</p>
						</div>
					</div>
					<div class="banner-bottom-grid-left-grid left1-grid grid-left-grid1">
						<div class="banner-bottom-grid-left-grid1">
							<img src="<?php echo base_url(); ?>admin/public/image/category/<?php echo $this->getSubcategory[6]->image; ?>" alt=" " class="img-responsive" />
						</div>
						<div class="banner-bottom-grid-left1-position">
							<div class="banner-bottom-grid-left1-pos1">
								<p>Latest New Collections</p>
							</div>
						</div>
					</div>
				</div>
				<div class="banner-bottom-grid-right animated wow slideInRight" data-wow-delay=".5s">
					<div class="banner-bottom-grid-left-grid grid-left-grid1">
						<div class="banner-bottom-grid-left-grid1">
							<img src="<?php echo base_url(); ?>admin/public/image/category/<?php echo $this->getSubcategory[5]->image; ?>" alt=" " class="img-responsive" />
						</div>
						<div class="grid-left-grid1-pos">
							<p>top and classic designs <span><?php echo date("Y");?> Collection</span></p>
						</div>
					</div>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
<!-- //banner-bottom -->
<!-- collections -->
	<div class="new-collections">
		<div class="container">
			<h3 class="animated wow zoomIn" data-wow-delay=".5s">New Collections</h3>
			<p class="est animated wow zoomIn" data-wow-delay=".5s">Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia 
				deserunt mollit anim id est laborum.</p>
			<div class="new-collections-grids">
				<?php foreach ($this->newProduct as $np) { ?>
				<div class="col-md-3 new-collections-grid">
					<div class="new-collections-grid1 animated wow slideInUp" data-wow-delay=".5s">
						<div class="new-collections-grid1-image">
							<a href="single.html" class="product-image"><img src="<?php echo base_url(); ?>admin/public/image/product/<?php echo $np->image1 ; ?>" alt=" " class="img-responsive" /></a>
							<div class="new-collections-grid1-image-pos">
								<a href="<?php echo base_url(); ?>dashboard/productdetail/<?php echo $np->name.'-'.$np->id.'.html'; ?>">Quick View</a>
							</div>
							<div class="new-collections-grid1-right">
								<div class="rating">
									<div class="rating-left">
										<img src="<?php echo base_url(); ?>public/images/2.png" alt=" " class="img-responsive" />
									</div>
									<div class="rating-left">
										<img src="<?php echo base_url(); ?>public/images/2.png" alt=" " class="img-responsive" />
									</div>
									<div class="rating-left">
										<img src="<?php echo base_url(); ?>public/images/2.png" alt=" " class="img-responsive" />
									</div>
									<div class="rating-left">
										<img src="<?php echo base_url(); ?>public/images/1.png" alt=" " class="img-responsive" />
									</div>
									<div class="rating-left">
										<img src="<?php echo base_url(); ?>public/images/1.png" alt=" " class="img-responsive" />
									</div>
									<div class="clearfix"> </div>
								</div>
							</div>
						</div>
						<h4><a href="single.html"><?php echo $np->name ; ?></a></h4>
						<p><?php echo substr(html_entity_decode($np->description), 0,30) ; ?></p>
						<div class="new-collections-grid1-left simpleCart_shelfItem">
							<p><i>$<?php echo $np->price ; ?></i> <span class="item_price">$<?php echo ($np->price-$np->discount) ; ?></span><a class="item_add" href="#">add to cart </a></p>
						</div>
					</div>					
				</div>	
				<?php } ?>								
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
<!-- //collections -->
<!-- new-timer -->
	<div class="timer">
		<div class="container">
			<div class="timer-grids">
				<div class="col-md-8 timer-grid-left animated wow slideInLeft" data-wow-delay=".5s">
					<h3><a href="products.html"></a><?php echo ucwords($this->specialProduct[0]->name); ?></h3>
					<div class="rating">
						<div class="rating-left">
							<img src="<?php echo base_url(); ?>public/images/2.png" alt=" " class="img-responsive" />
						</div>
						<div class="rating-left">
							<img src="<?php echo base_url(); ?>public/images/2.png" alt=" " class="img-responsive" />
						</div>
						<div class="rating-left">
							<img src="<?php echo base_url(); ?>public/images/2.png" alt=" " class="img-responsive" />
						</div>
						<div class="rating-left">
							<img src="<?php echo base_url(); ?>public/images/2.png" alt=" " class="img-responsive" />
						</div>
						<div class="rating-left">
							<img src="<?php echo base_url(); ?>public/images/1.png" alt=" " class="img-responsive" />
						</div>
						<div class="clearfix"> </div>
					</div>
					<div class="new-collections-grid1-left simpleCart_shelfItem timer-grid-left-price">
						<p><i>$<?php echo $this->specialProduct[0]->price; ?></i> <span class="item_price">$<?php echo ($this->specialProduct[0]->price-$this->specialProduct[0]->discount); ?></span></p>
						<h4><?php echo html_entity_decode($this->specialProduct[0]->description) ; ?></h4>
						<p><a class="item_add timer_add" href="#">add to cart </a></p>
					</div>
					<div id="counter"> </div>
					<script src="<?php echo base_url(); ?>public/js/jquery.countdown.js"></script>
					<script src="<?php echo base_url(); ?>public/js/script.js"></script>
				</div>
				<div class="col-md-4 timer-grid-right animated wow slideInRight" data-wow-delay=".5s">
					<div class="timer-grid-right1">
						<img src="<?php echo base_url(); ?>admin/public/image/product/<?php echo $this->specialProduct[0]->image1; ?>" alt=" " class="img-responsive" />
						<div class="timer-grid-right-pos">
							<h4>Special Offer</h4>
						</div>
					</div>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
<!-- //new-timer -->
<!-- collections-bottom -->
	<div class="collections-bottom">
		<div class="container">
			<div class="collections-bottom-grids">
				<div class="collections-bottom-grid animated wow slideInLeft" data-wow-delay=".5s">
					<h3>45% Offer For <span>Women & Children's</span></h3>
				</div>
			</div>
			<div class="newsletter animated wow slideInUp" data-wow-delay=".5s">
				<h3>Newsletter</h3>
				<p>Join us now to get all news and special offers.</p>
				<form>
					<span class="glyphicon glyphicon-envelope" aria-hidden="true"></span>
					<input type="email" value="Enter your email address" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Enter your email address';}" required="">
					<input type="submit" value="Join Us" >
				</form>
			</div>
		</div>
	</div>
<!-- //collections-bottom -->