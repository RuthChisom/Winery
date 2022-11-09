<?php include("server/dh-config.php"); ?>
<!DOCTYPE html>
<html>
<head>
<title>Contact | <?php echo $config['title'] ?></title>
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<link href="css/nav.css" rel="stylesheet" type="text/css" media="all"/>
</head>

<body>
		<?php include('header.php') ?>
		
	<!-- contact starts -->
	<!-- <div class="container">
		<div class="callnowfield">
			   	<ul class="callnow">
                    <li class="home">
                       <a href="#" title="Call"><img src="images/telephone.png" alt=""/></a>
                    </li>
                    <li>
                       Contact DrinksHub
                    </li>
                </ul>
                <ul class="previous">
                	<li><a href="index.php">Back to  Page</a></li>
                </ul>
                <div class="clearfix"></div>
		</div>
	</div> -->

	<div class="container">
		<div class="contact">				
					<div class="contact_info">
						<h2>get in touch</h2>
			    	 		<div class="contact-map">
					   			<iframe width="100%" height="250" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2238.1395618533943!2d-4.270096124041615!3d55.87759368237345!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4888443a1404dce7%3A0x95cdb0e552ee9571!2s22%20Nansen%20St%2C%20Glasgow%20G20%207HS%2C%20UK!5e0!3m2!1sen!2sng!4v1666158658892!5m2!1sen!2sng"></iframe><br><small><a href="https://goo.gl/maps/GzXiDARwttX6N8bJ9" style="color:#777777;text-align:left;font-size:13px;">View Larger Map</a></small>
					   		</div>
      				</div>
				  	<div class="contact-form">
			 	  	 	<h2>Contact Us</h2>
			 	 	    <form method="post" action="contact-post.html">
					    	<div>
						    	<span><label>Name</label></span>
						    	<span><input name="userName" type="text" class="textbox"></span>
						    </div>
						    <div>
						    	<span><label>E-mail</label></span>
						    	<span><input name="userEmail" type="text" class="textbox"></span>
						    </div>
						    <div>
						     	<span><label>Mobile</label></span>
						    	<span><input name="userPhone" type="text" class="textbox"></span>
						    </div>
						    <div>
						    	<span><label>Subject</label></span>
						    	<span><textarea name="userMsg"> </textarea></span>
						    </div>
						   <div>
						   		<span><input type="submit" class="" value="Submit"></span>
						  </div>
					    </form>
				    </div>
  					<div class="clearfix"></div>		
		</div>
	</div>
	<!-- content-section-ends -->
		
	<!-- footer -->
	<?php include('footer.html') ?>
	
</body>
</html>