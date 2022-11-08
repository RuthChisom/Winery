<!DOCTYPE html>
<html>
<head>
	<title>DrinksHub | Order Wine, Spirit & Carbonated Drinks</title>
	<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

	<link href="css/nav.css" rel="stylesheet" type="text/css" media="all"/>
</head>

<body>
	<div class="header" id="home">
		<!-- header-section-starts -->
		<div class="c-header" id="home">
			<?php include('header.php') ?>
		</div>
		<!-- alert -->
		<?php if(isset($_GET["msg"])){ ?>
			<div class="alert alert-success">
				<strong>Success!</strong> <?php echo $_GET["msg"] ?>
			</div>
			<?php } ?>

			<?php if(isset($_GET["err"])){ ?>
			<div class="alert alert-danger">
				<strong>Error!</strong> <?php echo $_GET["err"]; ?>
			</div>
		<?php } ?>
		<!-- banner -->
		<div class="banner">
			<!-- <div class="signing text-right">
				<div class="container">
					<div class="sign-in">
						<a href="login.php">Sign In</a>
					</div>
					<div class="sign-up1">
						<a href="register.php">Sign Up</a>
					</div>
					
				</div>
			</div> -->
			<div class="banner-info text-center">
				<h3>Leading Online Store For Premium Drinks</h3>
					<p></p>
					<a href="#">Order Now</a>
			</div>
		</div>
	</div>
	
	<div class="content">
        
		<div class="features-section">
			<div class="features-section-head text-center">
				<h3><span>F</span>eatured Drink</h3>
				<p>“this week's featured wines”</p>
			</div>
			<div class="features-section-grids">
				<div class="features-section-grid">
					<img src="images/bgwine.jpg" alt="" />
					<div class="drink-info">
						<div class="dhubfeatured">
							<div class="featured">
								<h4>Declan Red Wine</h4>
								<p>The Declan red wine is bold, slightly tannic, dry, and slightly acidic. </p>
							</div>
							<div class="drinkprice">
								<h3>$ <span>689</span></h3>
							</div>
							
						</div>
					</div>	
				</div>
			</div>
		</div>
        
		<div class="container">
			<div class="drink-section">
				<div class="drink-section2 text-center">
					<h3><span>D</span>rinks</h3>
					<p>“check out our drinks”</p>
				</div>
				<div class="drink-section-grids">
					<ul id="filters" >
						<li><span class="filter active" ><label class="active"></label>All</span></li>
						<li><span class="filter" ><label></label>Wine</span></li>
						<li><span class="filter"><label></label>Spirit</span></li>
						<li><span class="filter"><label></label>Carbonated</span></li>
					</ul>
					<div id="drinklist2">
						<div class="portfolio card mix_all" style="display: inline-block; opacity: 1;">                                                                                       
							<div class="portfolio-wrapper">		
								<a href="#" class="b-link-stripe b-animate-go  thickbox">
								<img src="images/firstdrink.png" class="img-responsive" alt="" /><div class="b-wrapper"><div class="atc"><p>Add To Cart</p></div>><h2 class="b-animate b-from-left    b-delay03 "><img src="images/icon-eye.png" class="img-responsive go" alt=""/></h2>
								</div></a>
								<div class="title">
									<div class="colors">
								<h4>Moet & Chandon</h4>
									<div class="main-price">
										<h3><span>$</span>30</h3>
									</div>
									
								</div>
								</div>
							</div>
						</div>				
						<div class="portfolio app mix_all"  data-cat="app" style="display: inline-block; opacity: 1;">
							<div class="portfolio-wrapper">		
								<a href="#" class="b-link-stripe b-animate-go  thickbox">
								<img src="images/seconddrink.png" class="img-responsive" alt="" /><div class="b-wrapper"><div class="atc"><p>Add To Cart</p></div><h2 class="b-animate b-from-left    b-delay03 "><img src="images/icon-eye.png" class="img-responsive go" alt=""/></h2>
								</div></a>
								<div class="title">
									<div class="colors">
									<h4>Belvedere Vodka</h4>
									
									</div>
									<div class="main-price">
										<h3><span>$</span>97</h3>
									</div>
									
								</div>
							</div>
						</div>		
						<div class="portfolio web mix_all"  data-cat="web" style="display: inline-block; opacity: 1;">
							<div class="portfolio-wrapper">		
								<a href="single.html" class="b-link-stripe b-animate-go  thickbox">
								<img src="images/thirddrink.png" class="img-responsive" alt="" /><div class="b-wrapper"><div class="atc"><p>Add To Cart</p></div><h2 class="b-animate b-from-left    b-delay03 "><img src="images/icon-eye.png" class="img-responsive go" alt=""/></h2>
								</div></a>
								<div class="title">
									<div class="colors">
									<h4>Ciroc Blue Vodka</h4>
									
									</div>
									<div class="main-price">
										<h3><span>$</span>890</h3>
									</div>
									
								</div>
							</div>
						</div>				
						<div class="portfolio icon mix_all"  data-cat="icon" style="display: inline-block; opacity: 1;">
							<div class="portfolio-wrapper">		
								<a href="single.html" class="b-link-stripe b-animate-go  thickbox">
								<img src="images/firstdrink.png" class="img-responsive" alt="" /><div class="b-wrapper"><div class="atc"><p>Add To Cart</p></div><h2 class="b-animate b-from-left    b-delay03 "><img src="images/icon-eye.png" class="img-responsive go" alt=""/></h2>
								</div></a>
								<div class="title">
									<div class="colors">
									<h4>Ciroc Blue Vodka</h4>
									
									</div>
									<div class="main-price">
										<h3><span>$</span>180</h3>
									</div>
									
								</div>
							</div>
						</div>
						<div class="portfolio icon mix_all"  data-cat="icon" style="display: inline-block; opacity: 1;">
							<div class="portfolio-wrapper">		
								<a href="single.html" class="b-link-stripe b-animate-go  thickbox">
								<img src="images/firstdrink.png" class="img-responsive" alt="" /><div class="b-wrapper"><div class="atc"><p>Add To Cart</p></div><h2 class="b-animate b-from-left    b-delay03 "><img src="images/icon-eye.png" class="img-responsive go" alt=""/></h2>
								<p class="b-animate b-from-right    b-delay03 "></p></div></a>
								<div class="title">
									<div class="colors">
									<h4>Ciroc Blue Vodka</h4>
									
									</div>
									<div class="main-price">
										<h3><span>$</span>30</h3>
									</div>
									<div class="clearfix"></div>
								</div>
							</div>
						</div>
						<div class="portfolio app mix_all"  data-cat="app" style="display: inline-block; opacity: 1;">
							<div class="portfolio-wrapper">		
								<a href="single.html" class="b-link-stripe b-animate-go  thickbox">
								<img src="images/firstdrink.png" class="img-responsive" alt="" /><div class="b-wrapper"><div class="atc"><p>Add To Cart</p></div><div class="clearfix"></div><h2 class="b-animate b-from-left    b-delay03 "><img src="images/icon-eye.png" class="img-responsive go" alt=""/></h2>
								</div></a>
								<div class="title">
									<div class="colors">
									<h4>Ciroc Blue Vodka</h4>
									
									</div>
									<div class="main-price">
										<h3><span>$</span>29</h3>
									</div>
									<div class="clearfix"></div>
								</div>
							</div>
						</div>	
						<div class="clearfix"></div>					
					</div>
					<div class="clearfix"></div>
					<div class="more">
							<div class="seemore">
								<a href="#">See More</a>
							</div>
							<div class="allproducts">
								<a href="#">All Drinks</a>
							</div>
							<div class="clearfix"></div>
					</div>
		  		</div>
		  	</div>
		</div>

		<div class="container">
				<div class="subscribe-section">
					<div class="subscribe text-center">
						<h4>Subscribe To Our Newsletter</h4>
						 <input type="text" class="text" value="Your email..." onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Your email...';}">
                        <br/> <br/>
						  <input type="submit" value="Subscribe">
					</div>
					
				</div>
		</div>
		<div class="seperator"></div>
		<div class="contact-section">
					<div class="contact-section-head text-center">
						<h3><span>C</span>ontact Us</h3>
						<p>“let us have your feedbacks and questions”</p>
					</div>
					<div class="contact-form-main">
						<form>
							<label class="span1"></label>
							<input type="text" class="text" value="Name..." onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Name...';}">
							<label class="span2"></label>
							<label class="span3"></label>
							<input type="text" class="text" value="Email..." onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email...';}">
							<label class="span4"></label>
							<label class="span5"></label>
							<input type="text" class="text" value="Phone..." onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Phone...';}">
							<label class="span6"></label>
							<label class="span7"></label>
							<textarea onfocus="if(this.value == 'Message...') this.value='';" onblur="if(this.value == '') this.value='Your Message';" >Message...</textarea>
							<label class="span8"></label>
							<input type="submit" value="">
						</form>
					</div>

		</div>
	</div>

    
    <!-- footer -->
    <?php include('footer.html') ?>
</body>
</html>