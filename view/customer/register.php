<!-- breadcrumbs -->
	<div class="breadcrumbs">
		<div class="container">
			<ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
				<li><a href="<?php echo base_url(); ?>public/index.html"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
				<li class="active">Register Page</li>
			</ol>
		</div>
	</div>
<!-- //breadcrumbs -->
<!-- register -->
	<div class="register">
		<div class="container">
			<h3 class="animated wow zoomIn" data-wow-delay=".5s">Register Here</h3>
			<p class="est animated wow zoomIn" data-wow-delay=".5s"> </p>
			<div class="login-form-grids">
				<h5 class="animated wow slideInUp" data-wow-delay=".5s">profile information</h5>
				<form class="animated wow slideInUp" data-wow-delay=".5s" method="post" action="">
					<?php SessionHelper::flashMessage(); ?>
					<input type="text" name="name" placeholder="Name..." required=" " >
					<input type="text" name="address" placeholder="Address..." required=" " >				
				<div class="register-check-box animated wow slideInUp" data-wow-delay=".5s">
					<div class="check">
					</div>
				</div>
				<h6 class="animated wow slideInUp" data-wow-delay=".5s">Login information</h6>
					<input type="email" name="email" placeholder="Email Address" required=" " >
					<input type="password" name="password" placeholder="Password" required=" " >
					<input type="password" name="cpassword" placeholder="Password Confirmation" required=" " >
					<div class="register-check-box">
						<div class="check">
						</div>
					</div>
					<input type="submit" name="btnsave" value="Register">
				</form>
			</div>
			<div class="register-home animated wow slideInUp" data-wow-delay=".5s">
				<a href="<?php echo base_url(); ?>dashboard/index">Home</a>
			</div>
		</div>
	</div>
<!-- //register -->