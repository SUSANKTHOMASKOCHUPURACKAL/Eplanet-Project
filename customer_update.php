
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

	<!---->
	<div class="container">
		
      	   <div class="account_grid">
			   <div class=" login-right">
			  	<h3>UPDATE PASSWORD</h3>
				
				<form  action="customer_update_pass.php" name="updatepass" id="updatepass" method="POST">
					
					
				  <div>
					<span >OLD PASSWORD<label style="color:red;">*</label></span>
					<input type="password"  placeholder="Enter password" name="oldpassword" id="oldpassword"onblur="checkoldpassword()" class="input input1 form-control"required>
				  </div>
				    <h3 id="errorpswrdold"  name="errorpswrdold" class="errmessage" ></h3>
				  <div>
					<span   >NEW PASSWORD<label style="color:red;">*</label></span>
					<input type="password" placeholder="Enter Password " class="input input1 form-control" name="password" id="password"onblur="checkpassword()" required>
				  </div>
				  <h3 id="errorpswrd"  name="errorpswrd" class="errmessage" ></h3>
				  
                   <div>
					<span >CONFIRM PASSWORD<label style="color:red;">*</label></span>
					<input type="password" placeholder="Enter Password " class="input input1 form-control" name="cpassword" id="cpassword"  onblur="checkCpassword()" required>
				  </div>
				  <h3 id="errorCpswrd"  name="errorCpswrd" class="errmessage" ></h3>

				  
				  <script>
					
							function checkoldpassword()

							{

							var passw=/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])(?!.*\s).{8,15}$/;

									
							if(document.getElementById("oldpassword").value==null ||updatepass.oldpassword.value.length==0)
								{
								document.getElementById("errorpswrdold").innerHTML="Mandatory Field!";

								}

							else if(document.getElementById("oldpassword").value.match(passw))
								{
								document.getElementById("errorpswrdold").innerHTML=" ";
								
								}

								else
								{
								document.getElementById('errorpswrdold').innerHTML="Please enter a valid password";
								  
								   document.getElementById("oldpassword").value="";
								   
									}

							}
							
							
							
							function checkpassword()

							{

							var passw=/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])(?!.*\s).{8,15}$/;

									
							if(document.getElementById("password").value==null ||updatepass.password.value.length==0)
								{
								document.getElementById("errorpswrd").innerHTML="Mandatory Field!";

								}

							else if(document.getElementById("password").value.match(passw))
								{
								document.getElementById("errorpswrd").innerHTML=" ";
								
								}

								else
								{
								document.getElementById('errorpswrd').innerHTML="Please enter a valid password";
								   alert(' Your password should be 8 to 20 characters which contain at least one lowercase letter, one uppercase letter, one numeric digit, and one special character');
								   document.getElementById("password").value="";
								   
									}

							}

							function checkCpassword()

							{

							var passw=/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])(?!.*\s).{8,15}$/;
							var passwrd=document.getElementById("password").value;
							var cpasswrd=document.getElementById("cpassword").value;

									
							if(document.getElementById("cpassword").value==null ||updatepass.cpassword.value.length==0)
								{
								document.getElementById("errorCpswrd").innerHTML="Mandatory Field!";

								}

							else if(document.getElementById("cpassword").value.match(passw))
								{
								document.getElementById("errorCpswrd").innerHTML=" ";
								
										if(passwrd==cpasswrd)
													{ 	document.getElementById("errorCpswrd").innerHTML=" ";
													
														}
													else{
													document.getElementById("errorCpswrd").innerHTML="Password and confirm password did not match!";
														document.getElementById("cpassword").value="";
													}
								}

								else
								{
								document.getElementById('errorCpswrd').innerHTML="Password and confirm password should be valid and  same";
								document.getElementById("cpassword").value="";
								 }

							}

	</script>
				  <input type="submit" name="submitp"id="submitp" value="Change password" >
			    </form>
			   </div>	
			   
			   
			   
			   
		
		
		
			
		
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
				
	<div class="footer">
		
		<!--<div class="footer-bottom">
			<div class="container">
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



