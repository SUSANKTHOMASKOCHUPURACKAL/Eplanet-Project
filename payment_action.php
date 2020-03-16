<?php
session_start();

$email=$_SESSION['email'];



$delvr_address_id=1;
$cart_tl=$_SESSION['ctot'];
$con=mysqli_connect("localhost","root","","eplanet")or die ("Couldn't connect");



if(isset($_POST["payment"]))
{
$cnumber=0;
$security_code=0;


$security_code=$_POST["security_code"];

$balance_amount=10000000;
$status='VALID';
$new_balance=0;



$d_cutomer_cart=mysqli_query($con,"SELECT *  FROM `cart` WHERE uid in(select uid from users where email='$email')");

$d_bank_info=mysqli_query($con,"SELECT * FROM `tbl_bank_info` WHERE   CVV='$security_code' and status='VALID' and user_type_id=2");

//$row=mysqli_fetch_array($d_del_adrs);

$rowcount = mysqli_num_rows($d_bank_info); 


	if($rowcount==0)
	{
						

	echo "<script>
												alert('Wrong CVV !Enter correct CVV');
												window.location='payment.php';
												</script>";





	}

			else if ($rowcount==1)
			{		


			$customer_bank_info=mysqli_query($con,"SELECT * FROM `tbl_bank_info` WHERE  status='VALID' and user_type_id=2");

			$row_customer=mysqli_fetch_array($customer_bank_info);

			$old_balance=$row_customer['balance_amount'];

				if($old_balance<$cart_tl)
				{
					$_SESSION['delv_address_id']=$delvr_address_id;
					echo "<script>
															alert('Insufficient Balance in your card');
															window.location='payment.php';
															
															</script>";
				}
			else
					{

					$new_balance=$old_balance-$cart_tl;

					$sql2=mysqli_query($con,"  UPDATE `tbl_bank_info` SET `balance_amount`=$new_balance WHERE  CVV='$security_code' and user_type_id=2");			

					if($sql2)
							{
								
								
								
							$seller_bank_info=mysqli_query($con,"SELECT * FROM `tbl_bank_info` WHERE status='VALID' and user_type_id=1 ");

							$row_seller=mysqli_fetch_array($seller_bank_info);
							$seller_old_bal=$row_seller['balance_amount'];
							$seller_new_bal=$seller_old_bal+$cart_tl;

							$sql3=mysqli_query($con,"  UPDATE `tbl_bank_info` SET `balance_amount`=$seller_new_bal WHERE   user_type_id=1 ");

									if($sql3)
									{
									
									
									
									while($rowcart=mysqli_fetch_array($d_cutomer_cart))
									{
										
										$stock_product_id=$rowcart['id'];
										$purchase_qty=$rowcart['cart_quantity'];
										$purchase_price=$rowcart['amount'];
										$old_stock=$rowcart['old_stock'];
										$orderdate=date("Y-m-d");
										$sql_order_prod=mysqli_query($con,"  INSERT INTO `tbl_customer_order` ( `email`, `stock_product_id`, `delv_adres_id`, `purchase_qty`, `purchase_price`, `order_date`, `delivery_date`, `status`) VALUES ('$email', $stock_product_id, $delvr_address_id, $purchase_qty, $purchase_price, now(), now()+1, 'NEW') ");
										
										
												echo "<script>
															alert('payment successfully');
															
															
															</script>";
											
														
														
														$sql_del_cart=mysqli_query($con," DELETE FROM `cart` WHERE email='$email' and pid=$stock_product_id");
									
															if($sql_del_cart)
															{
																
																
															$seller_stock_view=mysqli_query($con,"SELECT * FROM products` WHERE   id=$stock_product_id");
															$rowstock_count=mysqli_fetch_array($seller_stock_view);
															
															$new_stock_count=$old_stock - $purchase_qty;
															
															$seller_stock_update=mysqli_query($con,"UPDATE `products` SET `quantity` = $new_stock_count WHERE `product`.id` = $stock_product_id ");
															
															//UPDATE `tbl_seller_stock` SET `stock_item_count` = '2' WHERE `tbl_seller_stock`.`stock_product_id` = 20;
															if($seller_stock_update)
																
																{
																echo "<script>
																			
																			window.location='cart_view.php';
																			</script>";
																			
																}
															}
													
													
													
										
										
									}
		
										
																					
									}
								
								else
									
									{
											echo "<script>
																		alert('Transaction failed');
																		window.location='cart_view.php';
																		</script>";
										
									}
								
							}
																
					}



			}//cvv match end

	else
		
		{
			echo "Card verification failed";
			}

}
	
?>
<a href="http://localhost/eplanet/">goto home</a>