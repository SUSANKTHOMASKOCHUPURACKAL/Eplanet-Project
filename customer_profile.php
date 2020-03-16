<?php
	$con=mysqli_connect("localhost","root","","eplanet")or die ("Couldn't connect");
	
	$disp="SELECT  users.name,users.email, users.contact,users.city,users.address FROM users";


$disp_result=mysqli_query($con,$disp);
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
    <body>
        <div>
            <?php
                require 'header.php';
            ?>
			</div>
			</body>
			</html>
			<?php

if(isset($_POST['submit']))
{
	$username=$_POST['email'];
	$password=($_POST['password']);
$ret=mysqli_query($con,"SELECT * FROM users WHERE email='$username' and password='$password'");
$num=mysqli_fetch_array($ret);
if($num>0)
{
$extra="change-password.php";//
$_SESSION['email']=$_POST['email'];
$_SESSION['id']=$num['id'];
$host=$_SERVER['HTTP_HOST'];
$uri=rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
header("location:http://$host$uri/$extra");
exit();
}
else
{
$_SESSION['errmsg']="Invalid username or password";
$extra="index.php";
$host  = $_SERVER['HTTP_HOST'];
$uri  = rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
header("location:http://$host$uri/$extra");
exit();
}
}
?>


			<?php 	
			$con=mysqli_connect("localhost","root","","eplanet")or die ("Couldn't connect");
	
			$disp="SELECT  users.name, users.email,users.contact,users.city,users.address FROM users where email='$email'";

			$ret=mysqli_query($con,$disp);
			$num=mysqli_fetch_array($ret);
			
			$name=$num['name'];
			$eemail=$num['email'];
			$contact=$num['contact'];
			$city=$num['city'];
			$address=$num['address'];
			?>
			
				<label> Name &nbsp &nbsp : &nbsp <?php echo $name; ?></label>
			
			</br>
			</br>
			<label>email &nbsp &nbsp  :&nbsp <?php echo $_SESSION['email']; ?></label>
			</br>
			</br>
			<label>contact  &nbsp &nbsp : &nbsp  <?php echo $contact; ?></label>
			</br>
			</br>
			<label>city  &nbsp &nbsp : &nbsp  <?php echo $city; ?></label>
			</br>
			</br>
			<label>address  &nbsp &nbsp  &nbsp  <?php echo $address; ?></label>
			</br>
			</br>
			   </div>	
			   <div>
			  
			   <form onsubmit="return validateForm()" action="customer_update_profile1.php" method="POST" id="update" name="update" > 
			   <h2 style "text-color:red";> Update details</h2>
			   <input type="text" name="name" id="name" placeholder=" Name" value="<?php echo $name;?>" onblur="checkName()"class="input input1 form-control"  required>
		
			     <span id="errorname" class="errmessage">    </span>	
				 <script>
					
							function checkName()
									{
									var letters = /^[a-zA-Z][a-zA-Z\\s]+$/;
								
									var namevalue=document.getElementById("name").value;
									//document.getElementById('errorname').innerHTML=fnamevalue;
									
									if (fnamevalue==null || update.name.value.length==0)
									{
									document.getElementById('errorname').innerHTML="Mandatory Field!";
	
									}
									else if(document.getElementById("name").value.match(letters))
									{
									document.getElementById('errorname').innerHTML=" ";

									}

									else
									{
										
									document.getElementById('errorname').innerHTML="Information entered is incorrectly formatted!";
									document.getElementById('name').value = " "; 
									}

									}
					
					</script>
					</br>
			</br>
			 <input type="email" name="email" id="email"  placeholder="email" value="<?php echo $eemail;?>"class="input input1 form-control" onblur="checkemail()"required>
					  <span id="errornameL" class="errmessage" >    </span>
					  <script>
					function checkLName()
									{
									var letters = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;


									if(document.getElementById('email').value==null || update.email.value.length==0)
									{
									document.getElementById('errornameL').innerHTML="Mandatory Field!";

									}
									else if(document.getElementById('email').value.match(letters))
									{
									document.getElementById('errornameL').innerHTML=" ";
									
									}

									else
									{
									document.getElementById('errornameL').innerHTML="Information entered is incorrectly formatted!";
									document.getElementById('email').value = ""; 
									}
									}
					
					</script>
					</br>
			</br>
			<input type="text" name="contact" id="contact" placeholder="Contact"  value="<?php echo $contact;?>" class="input input1 form-control"onblur="checkMob()"required>
					<span id="errormob" class="errmessage" >    </span>
					
					<script>
					
							function checkMob() { 
											var mobnum = document.getElementById("contact").value;
									///^([+]\d{2})?\d{10}$/
									//   /^\d{10}$/
									var phoneno =/^(?!(\d)\1{9})(?!0123456789|1234567890|0987654321)\d{10}$/ ;
											if(document.getElementById("phonem").value==null ||update.phonem.value.length==0)
								{
								document.getElementById("errormob").innerHTML="Mandatory Field!";
								
								}
								else if(document.getElementById('contact').value.match(phoneno))
								{
									
									if(document.getElementById("contact").value=='0000000000')
									{
										document.getElementById("errormob").innerHTML="Please enter a valid Mobile number";
										document.getElementById("contact").value="";
									}
									else
									document.getElementById('errormob').innerHTML=" ";
								
								}

								else
								{
								document.getElementById('errormob').innerHTML="Please enter a valid Mobile number";
								document.getElementById("contact").value="";
								}
										}
					</script>
					<br><br><input type="submit" value="Update Profile" name="submitd" id="submitd" style="background-color:green;width:150px;height:50px;color:white;font-family:bold;border-radius:10px;border:2px solid white"  >
			</br>
			</br>
			
			   </div>
			   
			   <?php
			while($row=mysqli_fetch_array($disp_result))
	{
	
	$name=$row['name'];
	$email=$row['email'];
	$contact=$row['contact'];
	$city=$row['city'];
	$address=$row['address'];
	
		
	
 }
			?>
			    
			   <div class="clearfix"> </div>
			 </div>
			 <div class="sub-cate">
				
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
					
	   		     	   		     		
	   		     	
		   		     		<!--<span class="actual dolor-left-grid">300$</span>
		   		     		<span class="reducedfrom">500$</span>  
		   		     		<h6>Lorem ipsum dolor</h6>  		     			   		     										
	   		     		</div>
	   		     	</div>
	   		     	 <a class="view-all all-product" href="product.html">VIEW ALL PRODUCTS<span> </span></a> 	
			</div>
			  <div class="clearfix"> </div>
      	 </div>
	<!---->
	<div class="footer">
		
		<div class="footer-bottom">
			<!--<div class="container">
				<div class="footer-bottom-cate">
					<h6>CATEGORIES</h6>
					
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
	</div>-->
	
	
</body>
</html>
<?php


?>