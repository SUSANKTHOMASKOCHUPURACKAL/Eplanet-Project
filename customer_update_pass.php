<?php

session_start();
$email=$_SESSION['email'];
$con=mysqli_connect("localhost","root","","eplanet")or die ("Couldn't connect");

if(isset($_POST["submitp"]))
{

$oldpassword=$_POST["oldpassword"];
$newpassword=$_POST["password"];

$disp="SELECT * FROM users where users.email='$email'";
$disp_result=mysqli_query($con,$disp);
while($row=mysqli_fetch_array($disp_result))
{
$oldpass=$row['password'];


if((strcmp($oldpassword, $oldpass) == 0))
  	{	


$q_update="UPDATE users SET password='$newpassword' WHERE email='$email' ";$q_update="UPDATE users SET password='$newpassword' WHERE email='$email' ";

if(mysqli_query($con,$q_update)==TRUE)
{
	
		echo "<script type='text/javascript'>
				
				alert('Password updated successfully'); 
				window.location='http://localhost/eplanet/';
				</script>";
}
else
{
	
	echo "<script type='text/javascript'>
				
				alert('not updated'); 
				window.location='customer_update.php';				
				</script>";
}

	}
	
	else
		
		{
			echo "<script type='text/javascript'>alert('The old password is wrong'); 
		
		window.location='customer_update_.php';</script>";
		//header('Location:new_register.php');
		break;
		}
		
}


}

			?>