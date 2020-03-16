 <?php
                require 'header.php';
            ?>
<?php

	
	$ctot=$_SESSION['ctot'];
	$select_del_adrs=1;
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="shortcut icon" href="img/lifestyleStore.png" />
        <title>Eplanet</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- latest compiled and minified CSS -->
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" type="text/css">
        <!-- jquery library -->
        <script type="text/javascript" src="bootstrap/js/jquery-3.2.1.min.js"></script>
        <!-- Latest compiled and minified javascript -->
        <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
        <!-- External CSS -->
        <link rel="stylesheet" href="css/style.css" type="text/css">
    </head>
  
           


<?php
$con=mysqli_connect("localhost","root","","eplanet")or die ("Couldnt connect");

//$disp="SELECT  *from cart ORDER BY name ASC";

//$disp_result=mysqli_query($con,$disp);
//$prodname="";



$view="SELECT * FROM `users` WHERE email='$email'";

//$viewbrand="Select * from tbl_product where name=$pname ORDER BY name ASC";

$view1=mysqli_query($con,$view);
$rowp1=mysqli_fetch_array($view1);
$uid=$rowp1['uid'];


$viewbrand="Select * from cart inner join products on cart.id=products.id  inner join users on users.email=cart.email";
$d_seller_brand=mysqli_query($con,$viewbrand);


$customer_bank_info=mysqli_query($con,"SELECT * FROM `tbl_bank_info` WHERE  status='VALID' and user_type_id=2");

$row_customer=mysqli_fetch_array($customer_bank_info);
?>


	
	 <div class="container"> 
	 	
	 	<div class=" single_top">
		
	      <div class="single_grid">
		 
				<div class="grid images_3_of_2">
						<ul id="etalage">
							
							
						    
						</ul>
						 <div class="clearfix"> </div>		
				  </div> 
				  <div class="desc1 span_3_of_2">
				  
					
			   
				
			
				
	  <div>
	                           <form action="payment_action.php" method="POST" class="creditly-card-form agileinfo_form">
      
        <div class="row">
          <div class="col-50">
            
          </div>

          <div class="col-100">
            <h3>Payment</h3>
            <label for="fname">Accepted Cards</label>
            <div class="icon-container">
              <i class="fa fa-cc-visa" style="color:navy;"></i>
              <i class="fa fa-cc-amex" style="color:blue;"></i>
              <i class="fa fa-cc-mastercard" style="color:red;"></i>
              <i class="fa fa-cc-discover" style="color:orange;"></i>
            </div>
            
													
            <label >Card Number</label>
															<input type="text" name="cnumber" id="cnumber" input mode="numeric" autocomplete="cc-number" autocomplete type="cc-number" x-autocompletetype="cc-number"
																		  style="color:grey" value="<?php echo $row_customer['card_number'] ?>" required>
																		  
																		  <label >Name on Card</label>
													<input type="text" name="name" id="name" style="color:grey" value="" placeholder="Card Owner Name"required>
																		  
            <label >CVV</label>
															<input 
																		 maxlength="3" min="3" pattern="^[0-9]{3}$" title="Enter Valid CVV"
																		  type="password" name="security_code" id="security_code"
																		  placeholder="Enter CVV" required>
         
             </br>
			 </br>
			 
			 
			 
			 
                <label class="control-label">Expiration Date</label>
													<input type="text" name="expiration" id="expiration" style="color:grey" value="<?php echo $row_customer['expiration_date'] ?>" disabled>
              

			<button class="btn" name="payment" id="payment"><span>Pay and confirm Order </span></button>
          </div>
          
        
        
      </form>
	  </div>
	</div>
          	  
          	   </div>
          	   <!--<ul id="flexiselDemo1">
			<li><img src="images/pi.jpg" /><div class="grid-flex"><a href="#">Bloch</a><p>Rs 850</p></div></li>
			<li><img src="images/pi1.jpg" /><div class="grid-flex"><a href="#">Capzio</a><p>Rs 850</p></div></li>
			<li><img src="images/pi2.jpg" /><div class="grid-flex"><a href="#">Zumba</a><p>Rs 850</p></div></li>
			<li><img src="images/pi3.jpg" /><div class="grid-flex"><a href="#">Bloch</a><p>Rs 850</p></div></li>
			<li><img src="images/pi4.jpg" /><div class="grid-flex"><a href="#">Capzio</a><p>Rs 850</p></div></li>
		 </ul>-->
	    <script type="text/javascript">
		 $(window).load(function() {
			$("#flexiselDemo1").flexisel({
				visibleItems: 5,
				animationSpeed: 1000,
				autoPlay: true,
				autoPlaySpeed: 3000,    		
				pauseOnHover: true,
				enableResponsiveBreakpoints: true,
		    	responsiveBreakpoints: { 
		    		portrait: { 
		    			changePoint:480,
		    			visibleItems: 1
		    		}, 
		    		landscape: { 
		    			changePoint:640,
		    			visibleItems: 2
		    		},
		    		tablet: { 
		    			changePoint:768,
		    			visibleItems: 3
		    		}
		    	}
		    });
		    
		});
	</script>
	<script type="text/javascript" src="js/jquery.flexisel.js"></script>

          	    	
          	   </div>
          	   
          	   <!---->

				<!--initiate accordion-->
		<script type="text/javascript">
			$(function() {
			    var menu_ul = $('.menu > li > ul'),
			           menu_a  = $('.menu > li > a');
			    menu_ul.hide();
			    menu_a.click(function(e) {
			        e.preventDefault();
			        if(!$(this).hasClass('active')) {
			            menu_a.removeClass('active');
			            menu_ul.filter(':visible').slideUp('normal');
			            $(this).addClass('active').next().stop(true,true).slideDown('normal');
			        } else {
			            $(this).removeClass('active');
			            $(this).next().stop(true,true).slideUp('normal');
			        }
			    });
			
			});
		</script>
					   		     		
	   		     		<div class="grid-chain-bottom chain-watch">
		   		     		<!--<span class="actual dolor-left-grid">300$</span>
		   		     		<span class="reducedfrom">500$</span>  
		   		     		<h6>Lorem ipsum dolor</h6>  	     			   		     										
		   		     		<h6>Lorem ipsum dolor</h6>  -->		     			   		     										
	   		     		</div>
	   		     	</div>
	   		     	<!-- <a class="view-all all-product" href="product.html">VIEW ALL PRODUCTS<span> </span></a> 	-->
			</div>
<div class="clearfix"> </div>			
		</div>
	<!---->
	<div class="footer">
		<div class="footer-top">
			<div class="container">
				<!--<div class="latter">
					<h6>NEWS-LETTER</h6>
					<div class="sub-left-right">
						<form>
							<input type="text" value="Enter email here"onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Enter email here';}" />
							<input type="submit" value="SUBSCRIBE" />
						</form>
					</div>
					<div class="clearfix"> </div>
				</div>
				<div class="latter-right">
					<p>FOLLOW US</p>
					<ul class="face-in-to">
						<li><a href="#"><span> </span></a></li>
						<li><a href="#"><span class="facebook-in"> </span></a></li>
						<div class="clearfix"> </div>
					</ul>
					<div class="clearfix"> </div>
				</div>-->
				<div class="clearfix"> </div>
			</div>
		</div>
		<div class="footer-bottom">
			<div class="container">
				
				
				
				
</body>
</html>
<?php


?>