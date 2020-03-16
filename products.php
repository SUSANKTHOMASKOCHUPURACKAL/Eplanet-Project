  <?php
            require 'header.php';
			
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
$con=mysqli_connect("localhost","root","","eplanet")or die ("Couldnt connect");

$disp="SELECT  *from products ORDER BY productName ASC";

$disp_result=mysqli_query($con,$disp);
$productName="";

$viewbrand="SELECT * from products ";

//$viewbrand="Select * from tbl_product where name=$pname ORDER BY name ASC";
$d_seller_brand=mysqli_query($con,$viewbrand);

?>

            <div class="container">
                <div class="jumbotron">
                    <h1>Welcome to our Eplanet</h1>
                    <p>We have the best electronic products  for you. No need to hunt around, we have all in one place.</p>
                </div>
            </div>
			<form  action="view_single.php" method="POST" name="prod" id="prod" >
            <div class="container">
                <div class="row">
                    <div class="col-md-3 col-sm-4">
					<?php
					$i=1;
					?>
					
					<?php while ($rowp=mysqli_fetch_array($d_seller_brand))
					{
						
						?>
		
		
		
		
		  <div class="  product-grid">
		  
		   <form  action="view_single.php" method="POST" name="prod_id" id="prod_id" >
			<div class="content_box">
			
			
			   	<div class="left-grid-view grid-view-left">
			   	   	 <img src="img/<?php echo $rowp['productImage2'] ?>"  class="img-responsive watch-right" alt="image"/>
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
				</center>
				</div>
				<?php 
					if($i%3==0){
					echo"</div>";
						echo"<div class='col-md-3 col-sm-4'>";
						$i=1;
					}
					else
					{
						
						$i=$i+1;
					}
					}
					echo "</div>";
					?>
					
                    </div>
              </div>
			  
			  </form>
					
                    
                   
                   
                </div>
         </form>
            <br><br><br><br><br><br><br><br>
           <footer class="footer">
               <div class="container">
                <center>
                   <p>Copyright &copy <a href="https://eplanet">Eplanet</a> </p>
                   <p></p>
               </center>
               </div>
           </footer>
        </div>
    </body>
</html>
					
					


	
