<?php

session_start();
$email=$_SESSION['email'];
$con=mysqli_connect("localhost","root","","eplanet")or die ("Couldnt connect");

if(isset($_POST["submitd"]))
{

$name=$_POST["name"];
$email=$_POST["email"];
$contact=$_POST["contact"];





$q_update="UPDATE users SET name='$name',email='$email',contact='$contact' where WHERE email='$email' ";

if(mysqli_query($con,$q_update)==TRUE)
{
	
		echo "<script type='text/javascript'>
				
				alert('Profile updated successfully'); 
				window.location='customer_profile.php';
				</script>";
}
else
{
	
	echo "<script type='text/javascript'>
				
				alert('not updated'); 								
				</script>";
}
}

			?>