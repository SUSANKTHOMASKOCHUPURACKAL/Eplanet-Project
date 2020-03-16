<?php
session_start();
if(isset($_SESSION['email'])){
	$email=$_SESSION['email'];
	echo "<script>alert ('".$email."'); </script>";
?>



<?php
$con=mysqli_connect("localhost","root","","eplanet")or die ("Couldnt connect");

$disp="SELECT * from tbl_delivary  ORDER BY name ASC";

$disp_result=mysqli_query($con,$disp);
$prodname="";

?>



<?php

if(isset($_POST["select_adrs"]))
{
	$id=$_POST["id"];
$cat=$_POST["cat"];	
$name=$_POST["name"];
$email=$_POST["email"];
$address=$_POST["address"];
$city=$_POST["city"];
$state=$_POST["state"];

$zip=$_POST["zip"];
//$image=$_POST["image"];
$Status=0;
$flag=0;
$prodc="";

$user="Select uid from users WHERE email='$email'";

$userid=mysqli_query($con,$user);
$rid_row=mysqli_fetch_array($userid);
$checknamep="Select * from tbl_delivary  WHERE name='$name'";
$disp_presult=mysqli_query($con,$checknamep);
while($row=mysqli_fetch_array($disp_presult))
{
$prodc=$row['name'];


if((strcmp($prodc,$name) == 0))
  	{	
		$flag=$flag+1;
		echo "<script type='text/javascript'>alert('The category is already Existing'); 
		
		window.location='view_products.php';</script>";
		
		break;
	}
}



	
if($flag==0)

{	


						
						
						
						
						
	$uid=$rid_row['uid'];

	
	
	

	$q_ins1="INSERT INTO tbl_delivary ( uid, name, email, address, city, state, zip) VALUES ( '$uid', '$name', '$email', '$address', '$city', '$state', '$zip')";
	
	$ins=mysqli_query($con,$q_ins1);
		
if($ins==TRUE)
{
	
		echo "<script type='text/javascript'>
				
				alert('New product added successfully'); 
				window.location='view_products.php';
				</script>";
}
else
{
	
	echo "<script type='text/javascript'>
				
				alert('Not added'); 
				window.location='view_products.sphp';				
				</script>";
}

}
else
{
	echo "<script type='text/javascript'>
				
				alert('The product is already added '); 
				window.location='view_products.php';				
				</script>";
}

}

?>
<?php
}
?>