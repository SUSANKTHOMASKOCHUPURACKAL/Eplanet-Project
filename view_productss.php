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

$viewbrand="Select * from products";

//$viewbrand="Select * from tbl_product where name=$pname ORDER BY name ASC";
$d_seller_brand=mysqli_query($con,$viewbrand);

?>
<!--
<form class="form-horizontal row-fluid" name="viewproducts" method="POST" enctype="multipart/form-data">
<div class="control-group">
<label class="control-label" for="basicinput">Category</label>
<div class="controls">
<select name="category" class="span8 tip" onChange="getSubcat(this.value);"  required>
<option value="">Select Category</option> 
//<?php $querycategory=mysqli_query($con,"select * from category");
//while($row=mysqli_fetch_array($querycategory))
//{?>

<option value="<?php echo $row['catid'];?>"><?php echo $row['categoryName'];?></option>

</select>
</div>
</div>
<div class="control-group">
<label class="control-label" for="basicinput">Sub Category</label>
<div class="controls">
<select   name="subcategory"  id="subcategory" class="span8 tip" required>
</select>
</div>
</div>
	<button type="submit" name="submit" value="submit" class="btn">search</button>
	</form>-->
	
	
	

		<!-- grids_of_4 -->
		<div class="grid-product">
		
		
		
		
			<?php while ($rowp=mysqli_fetch_array($d_seller_brand))
					{
						
						?>
		
		
		
		
		  <div class="  product-grid">
		  
		   <form  action="view_single.php" method="POST" name="prod" id="prod" >
			<div class="content_box">
			
			<div class="control-group">

			   	<div class="left-grid-view grid-view-left">
			   	   	 <img src="img/<?php echo $rowp['productImage2'] ?>"  width="20%" class="img-responsive watch-right" alt="image"/>
				   	   	<div class="mask">
	                        <div class="info"></div>
			            </div>
				   
				</div>
				    <h4> <?php echo $rowp['productName'] ;
					//$_SESSION['pname']=$rowp['name'];
					?></h4>
					
					
				    <!-- <p><?php   echo $rowp['productDescription'] ?> </p>-->
				    <h5> Rs.<?php   echo $rowp['productPrice'] ?></h5>
				       <H6>Available Quntity <?php   echo $rowp['quantity'] ?></h6>
				<input type="hidden" name="prod_id" id="prod_id" value="<?php   echo $rowp['id'] ?>" hidden>
				</br>
			  			</br>	  <input type="submit" name="view_detail" id="view_detail" value="View Details" style="color:white;background-color:red;padding:10px" >
				 </br>
			   	</div>
				
              </div>
			  
			  </form>
			  	<?php }?>
			 
			
				 
				  
				 
			<div class="clearfix"> </div>
		</div>
	</div>
	<div class="sub-cate">
			
	
		
		
			

		
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

?>
