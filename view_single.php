

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

$disp="SELECT  *from products ORDER BY productName ASC";

$disp_result=mysqli_query($con,$disp);
$prodname="";

if(isset($_POST['view_detail']))
	
	{$id=$_POST['prod_id'];
	$_SESSION['id']=$id;
	
	$viewbrand="Select * from products where id=$id";

//$viewbrand="Select * from tbl_product where name=$pname ORDER BY name ASC";
$d_seller_brand=mysqli_query($con,$viewbrand);


$rowp=mysqli_fetch_array($d_seller_brand);
		
	
	}
	else
		
		{
				header('Location:view_products.php');
		}
	
			
						
?>

	<!---->
	
	 <div class="container"> 
	 	
	 	<div class=" single_top">
	      <div class="single_grid">
		
				<div class="grid images_3_of_2">
						<ul id="etalage">
							<li>
								<a href="optionallink.html">
									<img class="etalage_thumb_image" src="img/<?php echo $rowp['productImage2'] ?>" width="20%" class="img-responsive watch-right" alt="image"/>
									
								</a>
							</li>
							
							
						    
						</ul>
						 <div class="clearfix"> </div>		
				  </div> 
				  <div class="desc1 span_3_of_2">
				  
					
				  <h4><?php   echo $rowp['productName'] ;
					$_SESSION['productName']=$rowp['productName'];
					?></h4></h4>
					 
					 
					 
					 <form  action="cart.php" method="POST" name="form1" id="form1">
					 
				<div class="cart-b">
					<div class="left-n ">Rs.<?php   echo $rowp['productPrice'] ?></div>
				   
				    <div class="clearfix"></div>
				 </div>
				 <h6 class="clearfix" >items in stock: <?php   echo $rowp['quantity'] ?></h6>
			
			
				 
<div class="input-group">
   
   
      <span id="items_error_message" style="color:red"></span>
	  </br>
	  </br>
	 
    </div>
<div class="cart-b">
   	<p><?php   echo $rowp['productDescription'] ?></p>
	</div>
	<p><b>Required Quntity</b></p>
	<input type="number" name="qty" id="" class="form-control" min="1" max="<?php   echo $rowp['quantity'] ?>" placeholder="Required Quntity" required></br>
	<button name="add_cart"  class="now-get get-cart-in" id="add_cart" > ADD TO CART</button>
	
	
</form>			
			   	<!--<div class="share">
							<h5>Share Product :</h5>
							<ul class="share_nav">
								<li><a href="#"><img src="images/facebook.png" title="facebook"></a></li>
								<li><a href="#"><img src="images/twitter.png" title="Twiiter"></a></li>
								<li><a href="#"><img src="images/rss.png" title="Rss"></a></li>
								<li><a href="#"><img src="images/gpluse.png" title="Google+"></a></li>
				    		</ul>
						</div>-->
			   
				
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