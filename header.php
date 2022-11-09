<?php require_once('server/dbconn.php'); ?>
<?php include_once('server/functions.php'); ?>
<?php include_once('server/check-session.php'); ?>

<div class="top-header">
        <div class="container">
          <div class="logo">
            <a href="index.php"><img src="images/drinklogo.png" alt="" /></a>
          </div>
                    
          <div class="navigation">	
            <div>
              <ul class="nav">
                  <li class="active"><a href="index.php">Home</a></li>                       
                  <li class="dropdown1"><a href="#">Wines</a>
                    <ul class="dropdown2">
                      <li><a href="#">Red Wines</a></li>
                      <li><a href="#">Desert Wines</a></li>
                      <li><a href="#">Sparling Wines</a></li>
                      <li><a href="#">Rose Wines</a></li>
                      <li><a href="#">Fortified Wines</a></li>
                    </ul>
                  </li>                
                  <li class="dropdown1"><a href="#">Spirits</a>
                    <ul class="dropdown2">
                      <li><a href="#">Vodca</a></li>
                      <li><a href="#">Tequila</a></li>
                      <li><a href="#">Gin</a></li>
                      <li><a href="#">Whiskey</a></li>
                      <li><a href="#">Rum</a></li>
                    </ul>
                  </li> 
                  <li class="dropdown1"><a href="#">Carbonated</a>
                    <ul class="dropdown2">
                        <li><a href="#">Juice</a></li>
                        <li><a href="#">Soda</a></li>
                        <li><a href="#">Coffee</a></li>
                        <li><a href="#">Energy Drinks</a></li>
                    </ul>
                  </li>  
                  <li><a href="faq.php">FAQ</a></li>
                  <li><a href="contact.php">Contact US</a></li>

                  <!-- if a there is a logged in user -->
					        <?php if(isset($user)) { ?>
                      <!-- if logged in user is an admin -->
					              <?php if($user["usr_role"]=='admin') { ?>
                            <li><a href="user-list.php">Users </a></li>
                        <?php } ?>
                        <li><a href="logout.php">LOGOUT</a></li>
                        <b style="color: white;">
                          <?php echo $user["usr_firstname"] . ' ' . $user["usr_lastname"] ?>
                        </b>
                  <?php } 
                  else { ?>
                      <div class="signing text-right">
                        <div class="sign-in">
                          <a href="login.php">Sign In</a>
                        </div>
                        <div class="sign-up1">
                          <a href="register.php">Sign Up</a>
                        </div>
                      </div>
                  <?php } ?>
              </ul>
            </div>	
          </div>
        </div>
      </div>