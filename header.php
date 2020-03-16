<?php
session_start();
if (isset($_SESSION['email'])){
	$email=$_SESSION['email'];
	$uid=$_SESSION['uid'];
	?>
<nav class="navbar navbar-inverse navabar-fixed-top">
               <div class="container">
                   <div class="navbar-header">
                       <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                           <span class="icon-bar"></span>
                           <span class="icon-bar"></span>
                           <span class="icon-bar"></span>
                       </button>
                       <a href="index.php" class="navbar-brand">Eplanet</a>
                   </div>
                   
                   <div class="collapse navbar-collapse" id="myNavbar">
				  
                       <ul class="nav navbar-nav navbar-right">
                           <?php
                           if(isset($_SESSION['email'])){
                           ?>
						   <?php
				 if(isset($_SESSION['uid'])){
                           ?>
						 
   
                           <li><a href="cart_view.php"><span class="glyphicon glyphicon-shopping-cart"></span> Cart</a></li>
                        
						     <li><a href="settings.php"><span class=""></span><?php echo $email?></a></li>
                           <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
						     <li><a href="customer_profile.php"><span class=""></span>view profile</a></li>
							   <li><a href="customer_update.php"><span class=""></span> change password</a></li>
	
                           <?php
                           }else{
                            ?>
                            <li><a href="signup.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
                           <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
					             <?php
                           }
                           ?>
                           
                       </ul>
                   </div>
               </div>
</nav>


<?php
}
?>
<?php 
}
?>