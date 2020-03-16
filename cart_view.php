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

if(isset($_SESSION['uid'])){
	$uid=$_SESSION['uid'];
	//$pid=$_SESSION['pid'];
	//$pname=$_SESSION['name'];
	//$rid=$_SESSION['rid'];
	
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

//$email=$rowp1['email'];


$viewbrand="Select * from cart inner join products on cart.id=products.id  inner join users on users.uid=cart.uid where cart.uid='$uid'";

// * from cart inner join tbl_product on cart.pid=tbl_product.pid where cart.rid=10";
$d_seller_brand=mysqli_query($con,$viewbrand);
?>



	
	
	
	
		
		
		
		
		
			<?php
$cart_total=0;

			while ($rowp=mysqli_fetch_array($d_seller_brand))
					{
						
						?>
		
		
		
		
		  <div class="  product-grid">
		  
		  
			<div class="content_box"><a href="view_single.php?id=<?php echo $rowp['id'] ?>">
			   	<div class="left-grid-view grid-view-left">
			   	   	 <img src="img/<?php echo $rowp['productImage2'] ?>" width='10%' class="img-responsive watch-right" alt="image"/>
				   	   	<div class="mask">
	                        <div class="info"></div>
			            </div>
				   	  </a>
				</div>
				    <h4> <?php   echo $rowp['productName'] ;
					//$_SESSION['pname']=$rowp['name'];
					?></h4>
					
					
				     <p><?php   //echo $rowp['des'] ?> </p>
				    <p> Rs.<?php   echo $rowp['amount'] ;
					$cart_total=$cart_total+$rowp['amount'];
					
					?></p>
					 
				 Qtantity  <?php   echo $rowp['cart_quantity']; ?>
				 
				
			   	</div>
              </div>
			  
			  
								<?php }
								
								$_SESSION['cart_total']=$cart_total;
								?>
			 
			
				 
				  
				 
			<div class="clearfix"> </div>
			<!--<td class="text-right"><a style="color:#FF0000;"  href="dodelete.php?j=<?php echo $row['product_category_id']?>"><img src="images/delete.jfif" width="25" height="25"></a></td>-->
			<center>
			<div>
			
			<button name="cart" id="cart" style="color:white;background-color:green;padding:15px" > <a style="color:white;" href="checkout.php">Proceed to Buy</a></button>
				<!--<button name="update" id="update" style="color:white;background-color:green;padding:15px" > <a style="color:white;" href="http://localhost/organicshoppi/view_single.php">Update</a></button>	-->	
			</div>
			</center>
		</div>
		
	</div>
	

		
		
			
		
		
	</ul>
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
					
	   		     	<!-- <a class="view-all all-product" href="product.html">VIEW ALL PRODUCTS<span> </span></a> -->	
			</div>
	<div class="clearfix"> </div>
</div>
	<!---->
	<div class="footer">
		<!--<div class="footer-top">
			<div class="container">
				<div class="latter">
					<h6>NEWS-LETTER</h6>
					<div class="sub-left-right">
						<form>
							<input type="text" value="Enter email here"onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Enter email here';}" />
							<input type="submit" value="SUBSCRIBE" />
						</form>
					</div>
					<div class="clearfix"> </div>
				</div>
				<!--<div class="latter-right">
					<p>FOLLOW US</p>
					<ul class="face-in-to">
						<li><a href="#"><span> </span></a></li>
						<li><a href="#"><span class="facebook-in"> </span></a></li>
						<div class="clearfix"> </div>
					</ul>
					<div class="clearfix"> </div>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
		<div class="footer-bottom">
			<!--<div class="container">
				<div class="footer-bottom-cate">
					<h6>CATEGORIES</h6>
					<ul>
						<li><a href="#">Curabitur sapien</a></li>
						<li><a href="#">Dignissim purus</a></li>
						<li><a href="#">Tempus pretium</a></li>
						<li ><a href="#">Dignissim neque</a></li>
						<li ><a href="#">Ornared id aliquet</a></li>
						<li><a href="#">Ultrices id du</a></li>
						<li><a href="#">Commodo sit</a></li>
						<li ><a href="#">Urna ac tortor sc</a></li>
						<li><a href="#">Ornared id aliquet</a></li>
						<li><a href="#">Urna ac tortor sc</a></li>
						<li ><a href="#">Eget nisi laoreet</a></li>
						<li ><a href="#">Faciisis ornare</a></li>
					</ul>
				</div>
				<div class="footer-bottom-cate bottom-grid-cat">
					<h6>FEATURE PROJECTS</h6>
					<ul>
						<li><a href="#">Curabitur sapien</a></li>
						<li><a href="#">Dignissim purus</a></li>
						<li><a href="#">Tempus pretium</a></li>
						<li ><a href="#">Dignissim neque</a></li>
						<li ><a href="#">Ornared id aliquet</a></li>
						<li><a href="#">Ultrices id du</a></li>
						<li><a href="#">Commodo sit</a></li>
					</ul>
				</div>
				<div class="footer-bottom-cate">
					<h6>TOP BRANDS</h6>
					<ul>
						<li><a href="#">Curabitur sapien</a></li>
						<li><a href="#">Dignissim purus</a></li>
						<li><a href="#">Tempus pretium</a></li>
						<li ><a href="#">Dignissim neque</a></li>
						<li ><a href="#">Ornared id aliquet</a></li>
						<li><a href="#">Ultrices id du</a></li>
						<li><a href="#">Commodo sit</a></li>
						<li ><a href="#">Urna ac tortor sc</a></li>
						<li><a href="#">Ornared id aliquet</a></li>
						<li><a href="#">Urna ac tortor sc</a></li>
						<li ><a href="#">Eget nisi laoreet</a></li>
						<li ><a href="#">Faciisis ornare</a></li>
					</ul>
				</div>
				<div class="footer-bottom-cate cate-bottom">
					<h6>OUR ADDERSS</h6>
					<ul>
						<li>Aliquam metus  dui. </li>
						<li>orci, ornareidquet</li>
						<li> ut,DUI.</li>
						<li >nisi, dignissim</li>
						<li >gravida at.</li>
						<li class="phone">PH : 6985792466</li>
						<li class="temp"> <p class="footer-class">Design by <a href="http://w3layouts.com/" target="_blank">W3layouts</a> </p></li>
					</ul>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
</body>
</html>


<?php
}

?>
