<!DOCTYPE html>
<html lang="en">
<?php
include("connection/connect.php");
include_once 'product-action.php';
error_reporting(0);
session_start();
if (empty($_SESSION["user_id"])) {
    header('location:login.php');
} else {
    foreach ($_SESSION["cart_item"] as $item) {
        $item_total += ($item["price"] * $item["quantity"]);
        if ($_POST['submit']) {
            $SQL = "insert into users_orders(u_id,title,quantity,price) values('" . $_SESSION["user_id"] . "','" . $item["title"] . "','" . $item["quantity"] . "','" . $item["price"] . "')";
            mysqli_query($db, $SQL);
            $success = "Mulțumim! Comanda ta a fost plasată!";
        }
    }
}
?>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="#">
    <title>Starter Template for Bootstrap</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/animsition.min.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <div class="site-wrapper">
        <header id="header" class="header-scroll top-header headrom">
            <nav class="navbar navbar-dark">
                <div class="container">
                    <button class="navbar-toggler hidden-lg-up" type="button" data-toggle="collapse" data-target="#mainNavbarCollapse">&#9776;</button>
                    <a class="navbar-brand" href="index.html"> <img class="img-rounded" src="images/takeaway.png" alt=""> </a>
                    <div class="collapse navbar-toggleable-md  float-lg-right" id="mainNavbarCollapse">
                        <ul class="nav navbar-nav">
                            <li class="nav-item"> <a class="nav-link active" href="index.php">Home <span class="sr-only">(current)</span></a> </li>
                            <li class="nav-item"> <a class="nav-link active" href="restaurants.php">Restaurante <span class="sr-only"></span></a> </li>
                            <?php
                            if (empty($_SESSION["user_id"])) {
                                echo '<li class="nav-item"><a href="login.php" class="nav-link active">login</a> </li>
                                <li class="nav-item"><a href="registration.php" class="nav-link active">signup</a> </li>';
                            } else {
                                echo  '<li class="nav-item"><a href="your_orders.php" class="nav-link active">Comenzile tale</a> </li>';
                                echo  '<li class="nav-item"><a href="logout.php" class="nav-link active">logout</a> </li>';
                            }
                            ?>
                        </ul>
                    </div>
                </div>
            </nav>
        </header>
        <div class="page-wrapper">
            <div class="top-links">
                <div class="container">
                    <ul class="row links">
                        <li class="col-xs-12 col-sm-4 link-item"><span>1</span><a href="restaurants.php">Alege un restaurant</a></li>
                        <li class="col-xs-12 col-sm-4 link-item"><span>2</span><a href="#">Alege-ți mâncarea favorită</a></li>
                        <li class="col-xs-12 col-sm-4 link-item active"><span>3</span><a href="checkout.php">Comandă și plătește</a></li>
                    </ul>
                </div>
            </div>
            <div class="container">
                <span style="color:green;">
                    <?php echo $success; ?>
                </span>
            </div>
            <div class="container m-t-30">
                <form action="" method="post">
                    <div class="widget clearfix">
                        <div class="widget-body">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="cart-totals margin-b-20">
                                        <div class="cart-totals-title">
                                            <h4>Rezumatul coșului</h4>
                                        </div>
                                        <div class="cart-totals-fields">
                                            <table class="table">
                                                <tbody>
                                                    <tr>
                                                        <td>Valoarea totală</td>
                                                        <td><?php echo "Lei " . $item_total; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Pregătire și expediere</td>
                                                        <td>Livrare gratuită</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-color"><strong>Total</strong></td>
                                                        <td class="text-color"><strong><?php echo "Lei " . $item_total; ?></strong></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="payment-option">
                                        <ul class="list-unstyled">
                                            <li>
                                                <label class="custom-control custom-radio m-b-20">
                                                    <input name="mod" id="radioStacked1" value="COD" type="radio" class="custom-control-input">
                                                    <span class="custom-control-indicator"></span>
                                                    <span class="custom-control-description">Plata la livrare</span>
                                                </label>
                                            </li>
                                            <li>
                                                <a href="card.html">
                                                    <label class="custom-control custom-radio m-b-10">
                                                        <input name="mod" id="radioStacked2" value="paypal" type="radio" class="custom-control-input">
                                                        <span class="custom-control-indicator"></span>
                                                      <a href= card.php>  <span class="custom-control-description">Paypal <img src="images/paypal.jpg" alt="" width="90"></span></a>
                                                    </label>
                                                </a>
                                            </li>
                                        </ul>
                                        <p class="text-xs-center">
                                            <input type="submit" onclick="return confirm('Are you sure?');" name="submit" class="btn btn-outline-success btn-block" value="Comandă acum">
                                        </p>
										<p> <a href="final_comanda.php"> Vezi detalii comandă! </a> </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <section class="app-section">
                    <div class="app-wrap">
                        <div class="container">
                            <div class="row text-img-block text-xs-left">
                                <div class="container">
                                    <div class="col-xs-12 col-sm-5 right-image text-center">
                                        <figure> <img src="images/app.png" alt="Right Image" class="img-fluid"> </figure>
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
                <footer class="footer">
                    <div class="container">
                        <div class="row top-footer">
                            <div class="col-xs-12 col-sm-3 footer-logo-block color-gray">
                                <a href="#"> <img src="images/food-picky-logo.png" alt="Footer logo"> </a> <span>Order Delivery &amp; Take-Out </span>
                            </div>
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
                                    <h5>Phone: <a href="tel:0758864403">0758864403</a></h5>
                                </div>
                                <div class="col-xs-12 col-sm-5 additional-info color-gray">
                                    <h5>Pentru mai multe informații, sună la numărul nostru de telefon.</h5>
                                    <p>Alătură-te miilor de restaurante care își promovează meniurile pe platforma noastră, atrăgându-i pe clienți către experiența culinară pe care o oferi!</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </footer>
                <script src="js/jquery.min.js"></script>
                <script src="js/tether.min.js"></script>
                <script src="js/bootstrap.min.js"></script>
                <script src="js/animsition.min.js"></script>
                <script src="js/bootstrap-slider.min.js"></script>
                <script src="js/jquery.isotope.min.js"></script>
                <script src="js/headroom.js"></script>
                <script src="js/foodpicky.min.js"></script>
            </div>
        </div>
    </div>
</body>
</html>
