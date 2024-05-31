<!DOCTYPE html>
<html lang="en">
<?php
include("connection/connect.php"); // connection to db
error_reporting(0);
session_start();

include_once 'product-action.php'; //including controller

?>


<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 3 meta tags must come first in the head; any other head content must come after these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="#">
    <title>Starter Template for Bootstrap</title>
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/animsition.min.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet"> </head>

<body>
    
               <!--header starts-->
<?php $query_res = mysqli_query($db, "SELECT * FROM users WHERE u_id='" . $_SESSION['user_id'] . "'");
$user_data = mysqli_fetch_assoc($query_res); ?>
        <header id="header" class="header-scroll top-header headrom">
            <!-- .navbar -->
            <nav class="navbar navbar-dark">

 <div class="user-info">
       
                <div class="container">
                    <button class="navbar-toggler hidden-lg-up" type="button" data-toggle="collapse" data-target="#mainNavbarCollapse">&#9776;</button>
                    <a class="navbar-brand" href="index.html"> <img class="img-rounded" src="images/takeaway.png" alt=""> </a>
                    <div class="collapse navbar-toggleable-md  float-lg-right" id="mainNavbarCollapse">
										  <div class="user-info">
										       
										       
    </div>
           
                        <ul class="nav navbar-nav">
                            <li class="nav-item"> <a class="nav-link active" href="index.php">Home <span class="sr-only">(current)</span></a> </li>
                            <li class="nav-item"> <a class="nav-link active" href="restaurants.php">Restaurante <span class="sr-only"></span></a> </li>
                            					  
							<?php
						if(empty($_SESSION["user_id"]))
							{
								echo '<li class="nav-item"><a href="login.php" class="nav-link active">login</a> </li>
							  <li class="nav-item"><a href="registration.php" class="nav-link active">signup</a> </li>';
							}
						else
							{
									
									
									echo  '<li class="nav-item"><a href="your_orders.php" class="nav-link active">Comenzile tale</a> </li>';
									echo  '<li class="nav-item"><a href="logout.php" class="nav-link active">logout</a> </li>';
							}

						?>
		             </ul>
						
                    </div>
                </div>
				

            </nav>
            <!-- /.navbar -->
        </header>
        <div class="page-wrapper">
            <!-- top Links -->
            <div class="top-links">
                <div class="container">
                    <ul class="row links">
                      
                        
                    </ul>
                </div>
            </div>
            <!-- end:Top links -->
            <!-- start: Inner page hero -->
			<?php $ress= mysqli_query($db,"select * from restaurant where rs_id='$_GET[res_id]'");
									     $rows=mysqli_fetch_array($ress);
										  
										  ?>
            <section class="inner-page-hero bg-image" data-image-src="images/fast-food.jpg">
                <div class="profile">
                    <div class="container">		
                            <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 profile-desc">
                                <div class="pull-left right-text white-txt">
                                    <h6><a href="#"><?php echo $rows['title']; ?></a></h6>
                                    <p><?php echo $rows['address']; ?></p>
                                </div>
                            </div>
							
							
                        </div>
                    </div>
                </div>
            </section>
            <!-- end:Inner page hero -->
            <div class="breadcrumb">
                <div class="container">
                   
                </div>
            </div>
            <div class="container m-t-30">
           <!-- HTML (inside final_comanda.php) -->
<!-- HTML (inside final_comanda.php) -->
<div class="row">
    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-3">
        <div class="widget widget-cart">
            <div class="widget-heading">
                <h3 class="widget-title text-dark">
                    Detalii comandă
                </h3>
                <p style="color: black;">
                    <b>Mulțumim pentru comandă, <?php echo htmlspecialchars($user_data['username']); ?>!</b>
                </p>
                <p style="color: black;">
                    <b>Comanda va ajunge curând la adresa menționată: <?php echo htmlspecialchars($user_data['address']); ?>.</b>
                </p>
                <div class="clearfix"></div>
            </div>
            <div class="order-row bg-white">
                <div class="widget-body">
                    <!-- Your content here -->
                </div>
            </div>
        </div>
    </div>
</div>

<!-- CSS (inside style.css) -->
<style>
.row {
    display: flex;
    justify-content: center;
    align-items: center;
}

.widget-cart {
    width: 100%; /* Adjust width as needed */
    max-width: 400px; /* Or another value that suits your layout */
}

.widget-heading {
    text-align: center;
}

.widget-title {
    width: 100%;
}

.widget-heading p {
    margin: 0;
    text-align: center;
}

.widget-body {
    display: flex;
    flex-direction: column;
    align-items: center;
}
</style>


<!-- CSS (inside style.css) -->
<style>
.widget-heading {
    text-align: center;
}

.widget-title {
    display: inline-block;
    width: 100%;
}

.widget-heading p {
    margin: 0;
    text-align: center;
}

.widget {
    margin: auto;
}

.order-row {
    display: flex;
    justify-content: center;
}

.widget-body {
    display: flex;
    flex-direction: column;
    align-items: center;
}
</style>

									
									
									
	<?php

$item_total = 0;

foreach ($_SESSION["cart_item"] as $item)  // fetch items define current into session ID
{
?>									
									
                                        <div class="title-row">
										<?php echo $item["title"]; ?><a href="dishes.php?res_id=<?php echo $_GET['res_id']; ?>&action=remove&id=<?php echo $item["d_id"]; ?>" >
										<i class="fa fa-trash pull-right"></i></a>
										</div>
										
                                        <div class="form-group row no-gutter">
                                            <div class="col-xs-8">
                                                 <input type="text" class="form-control b-r-0" value=<?php echo "Cantitate ".$item["price"]; ?> readonly id="exampleSelect1">
                                                   
                                            </div>
                                            <div class="col-xs-4">
                                               <input class="form-control" type="text" readonly value='<?php echo $item["quantity"]; ?>' id="example-number-input"> </div>
									
                                        
									  </div>
								
	<?php
$item_total += ($item["price"]*$item["quantity"]); // calculating current price into cart
}
?>								  
									  
									  
									  
                                    </div>
                                </div>
                               
                                <!-- end:Order row -->
                             
                                <div class="widget-body">
                                    <div class="price-wrap text-xs-center">
                                        <p>TOTAL</p>
                                        <h3 class="value"><strong><?php echo "RON ".$item_total; ?></strong></h3>
                                        <p>Livrare gratuită</p>
                                      <p>  <a href="your_orders.php">Vezi istoricul comenziilor </a></p>
                                    </div>
                                </div>
                            </div>
                    </div>
<br>
<br>
<br>
                    <div class="col-xs-12 col-sm-8 col-md-8 col-lg-6">
                      
                        <!-- end:Widget menu -->
                        <div class="menu-widget" id="2">
                            <div class="widget-heading">
                                <h3 class="widget-title text-dark">
                                Comenzi populare! Mâncare delicioasă și caldă!<a class="btn btn-link pull-right" data-toggle="collapse" href="#popular2" aria-expanded="true">
                              <i class="fa fa-angle-right pull-right"></i>
                              <i class="fa fa-angle-down pull-right"></i>
                              </a>
                           </h3>
                                <div class="clearfix"></div>
                            </div>
                            <div class="collapse in" id="popular2">
						<?php  // display values and item of food/dishes
									$stmt = $db->prepare("select * from dishes where rs_id='$_GET[res_id]'");
									$stmt->execute();
									$products = $stmt->get_result();
									if (!empty($products)) 
									{
									foreach($products as $product)
										{
						
													
													 
													 ?>
                                <div class="food-item">
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-12 col-lg-8">
										<form method="post" action='dishes.php?res_id=<?php echo $_GET['res_id'];?>&action=add&id=<?php echo $product['d_id']; ?>'>
                                            <div class="rest-logo pull-left">
                                                <a class="restaurant-logo pull-left" href="#"><?php echo '<img src="admin/Res_img/dishes/'.$product['img'].'" alt="Food logo">'; ?></a>
                                            </div>
                                            <!-- end:Logo -->
                                            <div class="rest-descr">
                                                <h6><a href="#"><?php echo $product['title']; ?></a></h6>
                                                <p> <?php echo $product['slogan']; ?></p>
                                            </div>
                                            <!-- end:Description -->
                                        </div>
                                        <!-- end:col -->
                                        <div class="col-xs-12 col-sm-12 col-lg-4 pull-right item-cart-info"> 
										<span class="price pull-left" >$<?php echo $product['price']; ?></span>
										  <input class="b-r-0" type="text" name="quantity"  style="margin-left:30px;" value="1" size="2" />
										  <input type="submit" class="btn theme-btn" style="margin-left:40px;" value="Adăugare în coș" />
										</div>
										</form>
                                    </div>
                                    <!-- end:row -->
                                </div>
                                <!-- end:Food item -->
								
								<?php
									  }
									}
								?>
                            </div>
                            <!-- end:Collapse -->
                        </div>
                        <!-- end:Widget menu -->
                       
                    </div>
                </div>
                <!-- end:row -->
            </div>
            <!-- end:Container -->
            <section class="app-section">
            <div class="app-wrap">
                <div class="container">
                    <div class="row text-img-block text-xs-left">
                        <div class="container">
                            <div class="col-xs-12 col-sm-5 right-image text-center">
                                
                            </div>
                            <div class="col-xs-12 col-sm-7 left-text">
                                <h3>Cea mai bună aplicație pentru livrare de mâncare</h3>
                                <p>Acum poți comanda mâncare de oriunde, datorită aplicației gratuite și ușor de folosit pentru livrare și ridicare.</p>
                                <div class="social-btns">
                                    <a href="#" class="app-btn apple-button clearfix">
                                        <div class="pull-left"><i class="fa fa-apple"></i> </div>
                                        <div class="pull-right"> <span class="text">Available on the</span> <span class="text-2">App Store</span> </div>
                                    </a>
                                    <a href="#" class="app-btn android-button clearfix">
                                        <div class="pull-left"><i class="fa fa-android"></i> </div>
                                        <div class="pull-right"> <span class="text">Available on the</span> <span class="text-2">Play store</span> </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- start: FOOTER -->
        <footer class="footer">
            <div class="container">
                <!-- top footer statrs -->
                <div class="row top-footer">
                    <div class="col-xs-12 col-sm-3 footer-logo-block color-gray">
                        <a href="#"> <img src="images/food-picky-logo.png" alt="Footer logo"> </a> <span>Order Delivery &amp; Take-Out </span> </div>
                    <div class="col-xs-12 col-sm-2 about color-gray">
                        <h5>About Us</h5>
                        <ul>
                            <li><a href="#">About us</a> </li>
                            <li><a href="#">History</a> </li>
                            <li><a href="#">Our Team</a> </li>
                            <li><a href="#">We are hiring</a> </li>
                        </ul>
                    </div>
                    <div class="col-xs-12 col-sm-2 how-it-works-links color-gray">
                        <h5>How it Works</h5>
                        <ul>
                            <li><a href="#">Enter your location</a> </li>
                            <li><a href="#">Choose restaurant</a> </li>
                            <li><a href="#">Choose meal</a> </li>
                            <li><a href="#">Pay via credit card</a> </li>
                            <li><a href="#">Wait for delivery</a> </li>
                        </ul>
                    </div>
                    <div class="col-xs-12 col-sm-2 pages color-gray">
                        <h5>Pages</h5>
                        <ul>
                            <li><a href="#">Search results page</a> </li>
                            <li><a href="#">User Sing Up Page</a> </li>
                            <li><a href="#">Pricing page</a> </li>
                            <li><a href="#">Make order</a> </li>
                            <li><a href="#">Add to cart</a> </li>
                        </ul>
                    </div>
                    <div class="col-xs-12 col-sm-3 popular-locations color-gray">
                        <h5>Locații populare</h5>
                        <ul>
                            <li><a href="#">Timișoara</a> </li>
                            <li><a href="#">Cluj Napoca</a> </li>
                            <li><a href="#">Brașov</a> </li>
                            <li><a href="#">București</a> </li>
                            <li><a href="#">Alba Iulia</a> </li>
                            <li><a href="#">Iași</a> </li>
                            <li><a href="#">Craiova</a> </li>
                            <li><a href="#">Sibiu</a> </li>
                            <li><a href="#">Oradea</a> </li>
                            <li><a href="#">Constanța</a> </li>
                        </ul>
                    </div>
                </div>
                <!-- top footer ends -->
                <!-- bottom footer statrs -->
                <div class="bottom-footer">
                    <div class="row">
                        <div class="col-xs-12 col-sm-3 payment-options color-gray">
                            <h5>Opțiuni de plată</h5>
                            <ul>
                                <li>
                                    <a href="#"> <img src="images/paypal.png" alt="Paypal"> </a>
                                </li>
                                <li>
                                    <a href="#"> <img src="images/mastercard.png" alt="Mastercard"> </a>
                                </li>
                                <li>
                                    <a href="#"> <img src="images/maestro.png" alt="Maestro"> </a>
                                </li>
                                <li>
                                    <a href="#"> <img src="images/stripe.png" alt="Stripe"> </a>
                                </li>
                                <li>
                                    <a href="#"> <img src="images/bitcoin.png" alt="Bitcoin"> </a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-xs-12 col-sm-4 address color-gray">
                            <h5>Rețetă pentru bucurie:</h5>
                            <p>Platforma de comenzi și livrări de mâncare online, ghidul tău culinar.</p>
                            <h5>Phone: <a href="tel:0758864403">0758864403</a></h5> </div>
                        <div class="col-xs-12 col-sm-5 additional-info color-gray">
                            <h5>Pentru mai multe informații, sună la numărul nostru de telefon.</h5>
                            <p>Alătură-te miilor de restaurante care își promovează meniurile pe platforma noastră, atrăgându-i pe clienți către experiența culinară pe care o oferi!</p>
                        </div>
                    </div>
                </div>
                <!-- bottom footer ends -->
            </div>
        </footer>
        <!-- end:Footer -->
    
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <script src="js/jquery.min.js"></script>
    <script src="js/tether.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/animsition.min.js"></script>
    <script src="js/bootstrap-slider.min.js"></script>
    <script src="js/jquery.isotope.min.js"></script>
    <script src="js/headroom.js"></script>
    <script src="js/foodpicky.min.js"></script>
</body>

</html>