<!-- breadcrumbs -->
	<div class="breadcrumbs">
		<div class="container">
			<ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
				<li><a href="<?php echo base_url() ; ?>dashboard/index"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
				<li class="active"><?php echo ucfirst(substr($this->gpt[0]->cname, 1)); ?></li>
			</ol>
		</div>
	</div>
	<div class="products">
		<div class="container">
			<div class="col-md-4 products-left">
				<div class="filter-price animated wow slideInUp" data-wow-delay=".5s">
					<h3>Filter By Price</h3>
					<ul class="dropdown-menu1">
							<li><a href="">								               
							<div id="slider-range"></div>							
							<input type="text" id="amount" style="border: 0" />
							</a></li>	
					</ul>
						<script type='text/javascript'>//<![CDATA[ 
						$(window).load(function(){
						 $( "#slider-range" ).slider({
								range: true,
								min: 0,
								max: 100000,
								values: [ 20000, 80000 ],
								slide: function( event, ui ) {  $( "#amount" ).val( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
								}
					 });
					$( "#amount" ).val( "$" + $( "#slider-range" ).slider( "values", 0 ) + " - $" + $( "#slider-range" ).slider( "values", 1 ) );


						});//]]>
						</script>
						<script type="text/javascript" src="<?php echo base_url(); ?>public/js/jquery-ui.min.js"></script>
					 <!---->
				</div>
				<div class="categories animated wow slideInUp" data-wow-delay=".5s">
					<h3>Categories</h3>
					<ul class="cate">
						<li><a href="products.html">Best Selling</a> <span>(15)</span></li>
						<li><a href="products.html">Man</a> <span>(16)</span></li>
							<ul>
								<li><a href="products.html">Accessories</a> <span>(2)</span></li>
								<li><a href="products.html">Coats & Jackets</a> <span>(5)</span></li>
								<li><a href="products.html">Jeans</a> <span>(1)</span></li>
								<li><a href="products.html">New Arrivals</a> <span>(0)</span></li>
								<li><a href="products.html">Suits</a> <span>(1)</span></li>
								<li><a href="products.html">Casual Shirts</a> <span>(0)</span></li>
							</ul>
						<li><a href="products.html">Sales</a> <span>(15)</span></li>
						<li><a href="products.html">Woman</a> <span>(15)</span></li>
							<ul>
								<li><a href="products.html">Accessories</a> <span>(2)</span></li>
								<li><a href="products.html">New Arrivals</a> <span>(0)</span></li>
								<li><a href="products.html">Dresses</a> <span>(1)</span></li>
								<li><a href="products.html">Casual Shirts</a> <span>(0)</span></li>
								<li><a href="products.html">Shorts</a> <span>(4)</span></li>
							</ul>
					</ul>
				</div>
				<div class="new-products animated wow slideInUp" data-wow-delay=".5s">
					<h3>New Products</h3>
					<div class="new-products-grids">
						<div class="new-products-grid">
							<div class="new-products-grid-left">
								<a href="single.html"><img src="<?php echo base_url(); ?>public/images/6.jpg" alt=" " class="img-responsive" /></a>
							</div>
							<div class="new-products-grid-right">
								<h4><a href="single.html">occaecat cupidatat</a></h4>
								<div class="rating">
									<div class="rating-left">
										<img src="<?php echo base_url(); ?>public/images/2.png" alt=" " class="img-responsive">
									</div>
									<div class="rating-left">
										<img src="<?php echo base_url(); ?>public/images/2.png" alt=" " class="img-responsive">
									</div>
									<div class="rating-left">
										<img src="<?php echo base_url(); ?>public/images/2.png" alt=" " class="img-responsive">
									</div>
									<div class="rating-left">
										<img src="<?php echo base_url(); ?>public/images/1.png" alt=" " class="img-responsive">
									</div>
									<div class="rating-left">
										<img src="<?php echo base_url(); ?>public/images/1.png" alt=" " class="img-responsive">
									</div>
									<div class="clearfix"> </div>
								</div>
								<div class="simpleCart_shelfItem new-products-grid-right-add-cart">
									<p> <span class="item_price">$180</span><a class="item_add" href="#">add to cart </a></p>
								</div>
							</div>
							<div class="clearfix"> </div>
						</div>
						<div class="new-products-grid">
							<div class="new-products-grid-left">
								<a href="single.html"><img src="<?php echo base_url(); ?>public/images/26.jpg" alt=" " class="img-responsive" /></a>
							</div>
							<div class="new-products-grid-right">
								<h4><a href="single.html">eum fugiat quo</a></h4>
								<div class="rating">
									<div class="rating-left">
										<img src="<?php echo base_url(); ?>public/images/2.png" alt=" " class="img-responsive">
									</div>
									<div class="rating-left">
										<img src="<?php echo base_url(); ?>public/images/2.png" alt=" " class="img-responsive">
									</div>
									<div class="rating-left">
										<img src="<?php echo base_url(); ?>public/images/2.png" alt=" " class="img-responsive">
									</div>
									<div class="rating-left">
										<img src="<?php echo base_url(); ?>public/images/1.png" alt=" " class="img-responsive">
									</div>
									<div class="rating-left">
										<img src="<?php echo base_url(); ?>public/images/1.png" alt=" " class="img-responsive">
									</div>
									<div class="clearfix"> </div>
								</div>
								<div class="simpleCart_shelfItem new-products-grid-right-add-cart">
									<p> <span class="item_price">$250</span><a class="item_add" href="#">add to cart </a></p>
								</div>
							</div>
							<div class="clearfix"> </div>
						</div>
						<div class="new-products-grid">
							<div class="new-products-grid-left">
								<a href="single.html"><img src="<?php echo base_url(); ?>public/images/11.jpg" alt=" " class="img-responsive" /></a>
							</div>
							<div class="new-products-grid-right">
								<h4><a href="single.html">officia deserunt</a></h4>
								<div class="rating">
									<div class="rating-left">
										<img src="<?php echo base_url(); ?>public/images/2.png" alt=" " class="img-responsive">
									</div>
									<div class="rating-left">
										<img src="<?php echo base_url(); ?>public/images/2.png" alt=" " class="img-responsive">
									</div>
									<div class="rating-left">
										<img src="<?php echo base_url(); ?>public/images/2.png" alt=" " class="img-responsive">
									</div>
									<div class="rating-left">
										<img src="<?php echo base_url(); ?>public/images/1.png" alt=" " class="img-responsive">
									</div>
									<div class="rating-left">
										<img src="<?php echo base_url(); ?>public/images/1.png" alt=" " class="img-responsive">
									</div>
									<div class="clearfix"> </div>
								</div>
								<div class="simpleCart_shelfItem new-products-grid-right-add-cart">
									<p> <span class="item_price">$259</span><a class="item_add" href="#">add to cart </a></p>
								</div>
							</div>
							<div class="clearfix"> </div>
						</div>
					</div>
				</div>
				<div class="men-position animated wow slideInUp" data-wow-delay=".5s">
					<a href="single.html"><img src="<?php echo base_url(); ?>public/images/27.jpg" alt=" " class="img-responsive" /></a>
					<div class="men-position-pos">
						<h4>Summer collection</h4>
						<h5><span>55%</span> Flat Discount</h5>
					</div>
				</div>
			</div>
			<div class="col-md-8 products-right">
				<div class="products-right-grid">
					<div class="products-right-grids animated wow slideInRight" data-wow-delay=".5s">
						<div class="sorting">
							<select id="country" onchange="change_country(this.value)" class="frm-field required sect">
								<option value="null">Default sorting</option>
								<option value="null">Sort by popularity</option> 
								<option value="null">Sort by average rating</option>					
								<option value="null">Sort by price</option>								
							</select>
						</div>
						<!-- <div class="sorting-left">
							<select id="pagination" name="pagination" onchange="change_country(this.value)" class="frm-field required sect">
								<option value="9">Item on page 9</option>
								<option value="18">Item on page 18</option> 
								<option value="32">Item on page 32</option>					
								<option value="">All</option>								
							</select>
						</div> -->
						<div class="clearfix"> </div>
					</div>
					<div class="products-right-grids-position animated wow slideInRight" data-wow-delay=".5s">
						<img src="<?php echo base_url(); ?>admin/public/image/category/<?php echo $this->gpt[0]->cimage; ?>" alt=" " class="img-responsive" />
						<div class="products-right-grids-position1">
							<h4><?php echo date("Y"); ?>  New Collection</h4>
							<p>Temporibus autem quibusdam et aut officiis debitis aut rerum 
								necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae 
								non recusandae.</p>
						</div>
					</div>
				</div>
				<div class="products-right-grids-bottom">
					<div class="col-md-4 products-right-grids-bottom-grid">
						<div class="new-collections-grid1 products-right-grid1 animated wow slideInUp" data-wow-delay=".5s">
							<div class="new-collections-grid1-image">
								<a href="<?php echo base_url(); ?>public/single.html" class="product-image"><img src="<?php echo base_url(); ?>public/images/19.jpg" alt=" " class="img-responsive"></a>
								<div class="new-collections-grid1-image-pos products-right-grids-pos">
									<a href="<?php echo base_url(); ?>public/single.html">Quick View</a>
								</div>
								<div class="new-collections-grid1-right products-right-grids-pos-right">
									<div class="rating">
										<div class="rating-left">
											<img src="<?php echo base_url(); ?>public/images/2.png" alt=" " class="img-responsive">
										</div>
										<div class="rating-left">
											<img src="<?php echo base_url(); ?>public/images/2.png" alt=" " class="img-responsive">
										</div>
										<div class="rating-left">
											<img src="<?php echo base_url(); ?>public/images/2.png" alt=" " class="img-responsive">
										</div>
										<div class="rating-left">
											<img src="<?php echo base_url(); ?>public/images/1.png" alt=" " class="img-responsive">
										</div>
										<div class="rating-left">
											<img src="<?php echo base_url(); ?>public/images/1.png" alt=" " class="img-responsive">
										</div>
										<div class="clearfix"> </div>
									</div>
								</div>
							</div>
							<h4><a href="<?php echo base_url(); ?>public/single.html">Formal Shirt</a></h4>
							<p>Vel illum qui dolorem.</p>
							<div class="simpleCart_shelfItem products-right-grid1-add-cart">
								<p><i>$325</i> <span class="item_price">$250</span><a class="item_add" href="<?php echo base_url(); ?>public/#">add to cart </a></p>
							</div>
						</div>
						<div class="new-collections-grid1 products-right-grid1 animated wow slideInUp" data-wow-delay=".5s">
							<div class="new-collections-grid1-image">
								<a href="<?php echo base_url(); ?>public/single.html" class="product-image"><img src="<?php echo base_url(); ?>public/images/21.jpg" alt=" " class="img-responsive"></a>
								<div class="new-collections-grid1-image-pos products-right-grids-pos">
									<a href="<?php echo base_url(); ?>public/single.html">Quick View</a>
								</div>
								<div class="new-collections-grid1-right products-right-grids-pos-right">
									<div class="rating">
										<div class="rating-left">
											<img src="<?php echo base_url(); ?>public/images/2.png" alt=" " class="img-responsive">
										</div>
										<div class="rating-left">
											<img src="<?php echo base_url(); ?>public/images/2.png" alt=" " class="img-responsive">
										</div>
										<div class="rating-left">
											<img src="<?php echo base_url(); ?>public/images/2.png" alt=" " class="img-responsive">
										</div>
										<div class="rating-left">
											<img src="<?php echo base_url(); ?>public/images/1.png" alt=" " class="img-responsive">
										</div>
										<div class="rating-left">
											<img src="<?php echo base_url(); ?>public/images/1.png" alt=" " class="img-responsive">
										</div>
										<div class="clearfix"> </div>
									</div>
								</div>
							</div>
							<h4><a href="<?php echo base_url(); ?>public/single.html">Casual Shoes</a></h4>
							<p>Vel illum qui dolorem.</p>
							<div class="simpleCart_shelfItem products-right-grid1-add-cart">
								<p><i>$325</i> <span class="item_price">$250</span><a class="item_add" href="<?php echo base_url(); ?>public/#">add to cart </a></p>
							</div>
						</div>
						<div class="new-collections-grid1 products-right-grid1 animated wow slideInUp" data-wow-delay=".5s">
							<div class="new-collections-grid1-image">
								<a href="<?php echo base_url(); ?>public/single.html" class="product-image"><img src="<?php echo base_url(); ?>public/images/24.jpg" alt=" " class="img-responsive"></a>
								<div class="new-collections-grid1-image-pos products-right-grids-pos">
									<a href="<?php echo base_url(); ?>public/single.html">Quick View</a>
								</div>
								<div class="new-collections-grid1-right products-right-grids-pos-right">
									<div class="rating">
										<div class="rating-left">
											<img src="<?php echo base_url(); ?>public/images/2.png" alt=" " class="img-responsive">
										</div>
										<div class="rating-left">
											<img src="<?php echo base_url(); ?>public/images/2.png" alt=" " class="img-responsive">
										</div>
										<div class="rating-left">
											<img src="<?php echo base_url(); ?>public/images/2.png" alt=" " class="img-responsive">
										</div>
										<div class="rating-left">
											<img src="<?php echo base_url(); ?>public/images/1.png" alt=" " class="img-responsive">
										</div>
										<div class="rating-left">
											<img src="<?php echo base_url(); ?>public/images/1.png" alt=" " class="img-responsive">
										</div>
										<div class="clearfix"> </div>
									</div>
								</div>
							</div>
							<h4><a href="<?php echo base_url(); ?>public/single.html">Blazer</a></h4>
							<p>Vel illum qui dolorem.</p>
							<div class="simpleCart_shelfItem products-right-grid1-add-cart">
								<p><i>$585</i> <span class="item_price">$489</span><a class="item_add" href="<?php echo base_url(); ?>public/#">add to cart </a></p>
							</div>
						</div>
					</div>
					<div class="col-md-4 products-right-grids-bottom-grid">
						<div class="new-collections-grid1 products-right-grid1 animated wow slideInUp" data-wow-delay=".5s">
							<div class="new-collections-grid1-image">
								<a href="<?php echo base_url(); ?>public/single.html" class="product-image"><img src="<?php echo base_url(); ?>public/images/7.jpg" alt=" " class="img-responsive"></a>
								<div class="new-collections-grid1-image-pos products-right-grids-pos">
									<a href="<?php echo base_url(); ?>public/single.html">Quick View</a>
								</div>
								<div class="new-collections-grid1-right products-right-grids-pos-right">
									<div class="rating">
										<div class="rating-left">
											<img src="<?php echo base_url(); ?>public/images/2.png" alt=" " class="img-responsive">
										</div>
										<div class="rating-left">
											<img src="<?php echo base_url(); ?>public/images/2.png" alt=" " class="img-responsive">
										</div>
										<div class="rating-left">
											<img src="<?php echo base_url(); ?>public/images/2.png" alt=" " class="img-responsive">
										</div>
										<div class="rating-left">
											<img src="<?php echo base_url(); ?>public/images/1.png" alt=" " class="img-responsive">
										</div>
										<div class="rating-left">
											<img src="<?php echo base_url(); ?>public/images/1.png" alt=" " class="img-responsive">
										</div>
										<div class="clearfix"> </div>
									</div>
								</div>
							</div>
							<h4><a href="<?php echo base_url(); ?>public/single.html">Formal Shirt</a></h4>
							<p>Vel illum qui dolorem.</p>
							<div class="simpleCart_shelfItem products-right-grid1-add-cart">
								<p><i>$280</i> <span class="item_price">$250</span><a class="item_add" href="<?php echo base_url(); ?>public/#">add to cart </a></p>
							</div>
						</div>
						<div class="new-collections-grid1 products-right-grid1 animated wow slideInUp" data-wow-delay=".5s">
							<div class="new-collections-grid1-image">
								<a href="<?php echo base_url(); ?>public/single.html" class="product-image"><img src="<?php echo base_url(); ?>public/images/22.jpg" alt=" " class="img-responsive"></a>
								<div class="new-collections-grid1-image-pos products-right-grids-pos">
									<a href="<?php echo base_url(); ?>public/single.html">Quick View</a>
								</div>
								<div class="new-collections-grid1-right products-right-grids-pos-right">
									<div class="rating">
										<div class="rating-left">
											<img src="<?php echo base_url(); ?>public/images/2.png" alt=" " class="img-responsive">
										</div>
										<div class="rating-left">
											<img src="<?php echo base_url(); ?>public/images/2.png" alt=" " class="img-responsive">
										</div>
										<div class="rating-left">
											<img src="<?php echo base_url(); ?>public/images/2.png" alt=" " class="img-responsive">
										</div>
										<div class="rating-left">
											<img src="<?php echo base_url(); ?>public/images/1.png" alt=" " class="img-responsive">
										</div>
										<div class="rating-left">
											<img src="<?php echo base_url(); ?>public/images/1.png" alt=" " class="img-responsive">
										</div>
										<div class="clearfix"> </div>
									</div>
								</div>
							</div>
							<h4><a href="<?php echo base_url(); ?>public/single.html">Casual Shoes</a></h4>
							<p>Vel illum qui dolorem.</p>
							<div class="simpleCart_shelfItem products-right-grid1-add-cart">
								<p><i>$500</i> <span class="item_price">$480</span><a class="item_add" href="<?php echo base_url(); ?>public/#">add to cart </a></p>
							</div>
						</div>
						<div class="new-collections-grid1 products-right-grid1 animated wow slideInUp" data-wow-delay=".5s">
							<div class="new-collections-grid1-image">
								<a href="<?php echo base_url(); ?>public/single.html" class="product-image"><img src="<?php echo base_url(); ?>public/images/25.jpg" alt=" " class="img-responsive"></a>
								<div class="new-collections-grid1-image-pos products-right-grids-pos">
									<a href="<?php echo base_url(); ?>public/single.html">Quick View</a>
								</div>
								<div class="new-collections-grid1-right products-right-grids-pos-right">
									<div class="rating">
										<div class="rating-left">
											<img src="<?php echo base_url(); ?>public/images/2.png" alt=" " class="img-responsive">
										</div>
										<div class="rating-left">
											<img src="<?php echo base_url(); ?>public/images/2.png" alt=" " class="img-responsive">
										</div>
										<div class="rating-left">
											<img src="<?php echo base_url(); ?>public/images/2.png" alt=" " class="img-responsive">
										</div>
										<div class="rating-left">
											<img src="<?php echo base_url(); ?>public/images/1.png" alt=" " class="img-responsive">
										</div>
										<div class="rating-left">
											<img src="<?php echo base_url(); ?>public/images/1.png" alt=" " class="img-responsive">
										</div>
										<div class="clearfix"> </div>
									</div>
								</div>
							</div>
							<h4><a href="<?php echo base_url(); ?>public/single.html">Blazer</a></h4>
							<p>Vel illum qui dolorem.</p>
							<div class="simpleCart_shelfItem products-right-grid1-add-cart">
								<p><i>$585</i> <span class="item_price">$489</span><a class="item_add" href="<?php echo base_url(); ?>public/#">add to cart </a></p>
							</div>
						</div>
					</div>
					<div class="col-md-4 products-right-grids-bottom-grid">
						<div class="new-collections-grid1 products-right-grid1 animated wow slideInUp" data-wow-delay=".5s">
							<div class="new-collections-grid1-image">
								<a href="<?php echo base_url(); ?>public/single.html" class="product-image"><img src="<?php echo base_url(); ?>public/images/20.jpg" alt=" " class="img-responsive"></a>
								<div class="new-collections-grid1-image-pos products-right-grids-pos">
									<a href="<?php echo base_url(); ?>public/single.html">Quick View</a>
								</div>
								<div class="new-collections-grid1-right products-right-grids-pos-right">
									<div class="rating">
										<div class="rating-left">
											<img src="<?php echo base_url(); ?>public/images/2.png" alt=" " class="img-responsive">
										</div>
										<div class="rating-left">
											<img src="<?php echo base_url(); ?>public/images/2.png" alt=" " class="img-responsive">
										</div>
										<div class="rating-left">
											<img src="<?php echo base_url(); ?>public/images/2.png" alt=" " class="img-responsive">
										</div>
										<div class="rating-left">
											<img src="<?php echo base_url(); ?>public/images/1.png" alt=" " class="img-responsive">
										</div>
										<div class="rating-left">
											<img src="<?php echo base_url(); ?>public/images/1.png" alt=" " class="img-responsive">
										</div>
										<div class="clearfix"> </div>
									</div>
								</div>
							</div>
							<h4><a href="<?php echo base_url(); ?>public/single.html">Formal Shirt</a></h4>
							<p>Vel illum qui dolorem.</p>
							<div class="simpleCart_shelfItem products-right-grid1-add-cart">
								<p><i>$305</i> <span class="item_price">$280</span><a class="item_add" href="<?php echo base_url(); ?>public/#">add to cart </a></p>
							</div>
						</div>
						<div class="new-collections-grid1 products-right-grid1 animated wow slideInUp" data-wow-delay=".5s">
							<div class="new-collections-grid1-image">
								<a href="<?php echo base_url(); ?>public/single.html" class="product-image"><img src="<?php echo base_url(); ?>public/images/23.jpg" alt=" " class="img-responsive"></a>
								<div class="new-collections-grid1-image-pos products-right-grids-pos">
									<a href="<?php echo base_url(); ?>public/single.html">Quick View</a>
								</div>
								<div class="new-collections-grid1-right products-right-grids-pos-right">
									<div class="rating">
										<div class="rating-left">
											<img src="<?php echo base_url(); ?>public/images/2.png" alt=" " class="img-responsive">
										</div>
										<div class="rating-left">
											<img src="<?php echo base_url(); ?>public/images/2.png" alt=" " class="img-responsive">
										</div>
										<div class="rating-left">
											<img src="<?php echo base_url(); ?>public/images/2.png" alt=" " class="img-responsive">
										</div>
										<div class="rating-left">
											<img src="<?php echo base_url(); ?>public/images/1.png" alt=" " class="img-responsive">
										</div>
										<div class="rating-left">
											<img src="<?php echo base_url(); ?>public/images/1.png" alt=" " class="img-responsive">
										</div>
										<div class="clearfix"> </div>
									</div>
								</div>
							</div>
							<h4><a href="<?php echo base_url(); ?>public/single.html">Casual Shoes</a></h4>
							<p>Vel illum qui dolorem.</p>
							<div class="simpleCart_shelfItem products-right-grid1-add-cart">
								<p><i>$389</i> <span class="item_price">$299</span><a class="item_add" href="<?php echo base_url(); ?>public/#">add to cart </a></p>
							</div>
						</div>
						<div class="new-collections-grid1 products-right-grid1 animated wow slideInUp" data-wow-delay=".5s">
							<div class="new-collections-grid1-image">
								<a href="<?php echo base_url(); ?>public/single.html" class="product-image"><img src="<?php echo base_url(); ?>public/images/26.jpg" alt=" " class="img-responsive"></a>
								<div class="new-collections-grid1-image-pos products-right-grids-pos">
									<a href="<?php echo base_url(); ?>public/single.html">Quick View</a>
								</div>
								<div class="new-collections-grid1-right products-right-grids-pos-right">
									<div class="rating">
										<div class="rating-left">
											<img src="<?php echo base_url(); ?>public/images/2.png" alt=" " class="img-responsive">
										</div>
										<div class="rating-left">
											<img src="<?php echo base_url(); ?>public/images/2.png" alt=" " class="img-responsive">
										</div>
										<div class="rating-left">
											<img src="<?php echo base_url(); ?>public/images/2.png" alt=" " class="img-responsive">
										</div>
										<div class="rating-left">
											<img src="<?php echo base_url(); ?>public/images/1.png" alt=" " class="img-responsive">
										</div>
										<div class="rating-left">
											<img src="<?php echo base_url(); ?>public/images/1.png" alt=" " class="img-responsive">
										</div>
										<div class="clearfix"> </div>
									</div>
								</div>
							</div>
							<h4><a href="<?php echo base_url(); ?>public/single.html">Blazer</a></h4>
							<p>Vel illum qui dolorem.</p>
							<div class="simpleCart_shelfItem products-right-grid1-add-cart">
								<p><i>$585</i> <span class="item_price">$489</span><a class="item_add" href="<?php echo base_url(); ?>public/#">add to cart </a></p>
							</div>
						</div>
					</div>
					<div class="clearfix"> </div>
				</div>
				<nav class="numbering animated wow slideInRight" data-wow-delay=".5s">
				  <ul class="pagination paging">
					<li>
					  <a href="#" aria-label="Previous">
						<span aria-hidden="true">&laquo;</span>
					  </a>
					</li>
					<li class="active"><a href="#">1<span class="sr-only">(current)</span></a></li>
					<li><a href="#">2</a></li>
					<li><a href="#">3</a></li>
					<li><a href="#">4</a></li>
					<li><a href="#">5</a></li>
					<li>
					  <a href="#" aria-label="Next">
						<span aria-hidden="true">&raquo;</span>
					  </a>
					</li>
				  </ul>
				</nav>
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
<!-- //breadcrumbs -->