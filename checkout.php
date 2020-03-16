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
    <body>
        <div>
  <?php
            require 'header.php';
           ?>



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

$viewbrand="Select * from cart inner join products on cart.id=products.id  inner join users on users.uid=cart.uid and cart.uid='$uid'";
$d_seller_brand=mysqli_query($con,$viewbrand);




$del_adrs="SELECT * FROM `tbl_customer_delv_address` WHERE email='$email' and status='VALID'";

$d_del_adrs=mysqli_query($con,$del_adrs);
?>


	  		<?php

 $ctot=0;
			while ($rowp=mysqli_fetch_array($d_seller_brand))
					{
						
						?>
		
			
							 
      <p><?php echo $rowp['name']?><span class="price"> <?php echo $rowp['amount'] ;
	   $ctot= $ctot+$rowp['amount'];
	  ?></span></p>
  
					<?php } ?>
      <hr>
      <p>Cart  Total <span class="price" style="color:black"><b>Rs.<?php echo $ctot;
		$_SESSION['ctot']=$ctot;

	  ?></b></span></p>
	  </div>
	  <div>
	       
      
        <div class="row">
          <div class="col-80">
		  </br>
		  </br>
            <center> <h4 style="color:green">Select Delivery Address</h4>
				<form action="payment.php" method="POST" class="creditly-card-form agileinfo_form" name="sel_adrs" id="sel_adrs">
									
								<?php
										$sel="select * from tbl_customer_delv_address where email='$email'";
										$sel2=mysqli_query($con,$sel);
										$sel3=mysqli_fetch_array($sel2);
										$add1=$sel3['address_line'];
										$add2=$sel3['landmark'];
										$add3=$sel3['town_city'];
										$add4=$sel3['pin_code'];
										
									?>
									
									<textarea name="address" rows="10" cols="30" style="overflow:hidden" disabled>
									<?php
										echo "$add1 
									$add2
									$add3
									$add4";
										
									?>
								
									</textarea>
									
									
									
								</br>
								</br>
									
									
									<button class="btn" name="select_adrs" id="select_adrs">Delivery to this Address</button>
									
									
									
									
									</form>
									
									
									<form action="delvery_address_action.php" method="POST" class="creditly-card-form agileinfo_form" name="d_adrs" id="d_adrs">
									</br><center><label class="control-label" style="color:red">OR </label></br>
									<label class="control-label" style="color:red">ADD NEW ADDRESS AND SELECT </label></center>
									</br>

            <div class="row">
              <div class="col-30">
               <label class="control-label">Name: </label>
													<input class="billing-address-name form-control" type="text" name="name" id="name" pattern="^\D*$" id="name"placeholder="Enter name" onblur="checkLName()"required>
													
													
													
													<p id="errornameL" class="errmessage" >    </p>
						
					<script>
					function checkLName()
										{
										var letters = /^[a-zA-Z][a-zA-Z\\s]+$/;


										if(document.getElementById('name').value==null || register.lastname.value.length==0)
										{
										document.getElementById('errornameL').innerHTML="Mandatory Field!";

										}
										else if(document.getElementById('name').value.match(letters))
										{
										document.getElementById('errornameL').innerHTML=" ";
										
										}

										else
										{
										document.getElementById('errornameL').innerHTML="Information entered is incorrectly formatted!";
										document.getElementById('name').value = ""; 
										}
										}
					
					</script>
              </div>
              <div class="col-50">
                <label class="control-label">Mobile number:</label>
														    <input class="form-control" type="text" placeholder="Mobile number" name="mob" id="mob" required>
              </div>
			  
			  
			  
			     <div class="col-50">
<label class="control-label">Address line 1: </label>
														 <input type="text" class="form-control"  name="address_line" id="address_line" form="d_adrs" placeholder="Address line 1" required>
              </div>
			  
			  
			  
			       <div class="col-50">
<label class="control-label">Landmark: </label>
														 <input class="form-control" type="text" placeholder="Landmark" name="landmark"  id="landmark" required>
              </div>
			  
			       <div class="col-50">
<label class="control-label">Town/City: </label>
												 <input class="form-control" type="text" placeholder="Town/City" name="town" id="town"required>
              </div>
			  
			       <div class="col-50">
<label class="control-label">Pin code:</label>
												 <input class="form-control" type="text" placeholder="pin code" name="pincode" id="pincode"required>
              </div>
			  
			  
			  
			   <div class="col-50">
			  
			  <label class="control-label">Address type: </label>
												     <select  name="atype" id="atype" style="border-color:#E0E0E0; width:100%;" required>
																							<option value="">--select --</option>
																							<option value="1">Office</option>
																							<option value="2">Home</option>
																							<option value="3">Commercial</option>
							
																					</select>
			  
			       </div>
				   <button class="btn" name="address" id="address">Add Address</button>
            </div>
          </div>

          <div class="col-50">
           
            
            <div class="row">
              
              <div class="col-50">
                
              </div>
            </div>
          </div>
          
        </div>
      
		</center>		
      </form>
	  </div>
	 
          	    <div class="clearfix"> </div>
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


					</div>
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