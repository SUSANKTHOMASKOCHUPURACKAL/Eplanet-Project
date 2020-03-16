<?php
session_start();
if (isset($_SESSION['email'])){
	$email=$_SESSION['email'];
	$id=$_SESSION['id'];
	
//$prod_id=$_POST['prod_id'];

	?>



<?php
$con=mysqli_connect("localhost","root","","eplanet")or die ("Couldnt connect");

if(isset($_POST["add_cart"]))
{
$cart_total=0;

	
$viewbrand1="Select * from products where id=$id";

//$viewbrand1="Select * from tbl_product where name=$pname ORDER BY name ASC";
$d_seller_brand1=mysqli_query($con,$viewbrand1);
//$product_category=$rowp['product_category_id'];

$cart_item_qty=$_POST['qty'];

$flag=0;

$viewuser="SELECT * FROM `users` WHERE email='$email'";
//"Select * from cart inner join products on cart.id=products.id  inner join users on users.uid=cart.uid where cart.id=$prod_id";

//$viewbrand="Select * from product where name=$pname ORDER BY name ASC";
$d_user=mysqli_query($con,$viewuser);

//$countp=mysqli_num_rows($d_seller_brand);//


$row_user=mysqli_fetch_array($d_user);

$uid=$row_user['uid'];

$rowp=mysqli_fetch_array($d_seller_brand1);
$old_stock=$rowp['quantity'];
$productPrice =$rowp['productPrice'];
$cart_total=(int)$cart_item_qty * (int)$productPrice;
$old_stock=$rowp['quantity'];
$category=$rowp['category'];
		
	$cart_query="select *from cart where id='$id'";
	$cart_query_result=mysqli_query($con,$cart_query);
	$count=mysqli_num_rows($cart_query_result);
	if($count==0)
	{
	$q_ins1="INSERT INTO `cart`( `uid`,`id`, `cart_quantity`, `amount`,`old_stock`) VALUES ($uid,$id, $cart_item_qty,$cart_total,$old_stock)";

//`caid`, `uid`, `id`, `cart_quantity`, `amount`)
//insert into cart(rid,product_category_id,pid,cart_qunty,amount)values($rd,$product_category,$id,$cart_item_qty,$cart_total)";
	
$ins=mysqli_query($con,$q_ins1);
		
if($ins)
{
	
		echo "<script type='text/javascript'>
				
				alert('added to cart successfully'); 
				window.location='cart_view.php';
				</script>";
}
else
{
	
	echo "<script type='text/javascript'>
				
			alert('Product Not added'); 
              window.location='cart_view.php';
					
				</script>";
}
		
	}


else{
echo "<script type='text/javascript'>
				
alert('item already added to cart'+$count); 
              
						window.location='cart_view.php';	
				</script>";
}


	}
	
		

}
	
	

		
					?>