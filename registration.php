<!DOCTYPE html>
<html lang="en">
<?php

session_start(); //temp session
error_reporting(0); // hide undefine index
include("connection/connect.php"); // connection
if(isset($_POST['submit'] )) //if submit btn is pressed
{
     if(empty($_POST['firstname']) ||  //fetching and find if its empty
   	    empty($_POST['lastname'])|| 
		empty($_POST['email']) ||  
		empty($_POST['phone'])||
		empty($_POST['password'])||
		empty($_POST['cpassword']) ||
		empty($_POST['cpassword']))
		{
			$message = "All fields must be Required!";
		}
	else
	{
		//cheching username & email if already present
	$check_username= mysqli_query($db, "SELECT username FROM users where username = '".$_POST['username']."' ");
	$check_email = mysqli_query($db, "SELECT email FROM users where email = '".$_POST['email']."' ");
		

	
	if($_POST['password'] != $_POST['cpassword']){  //matching passwords
       	$message = "Password not match";
    }
	elseif(strlen($_POST['password']) < 6)  //cal password length
	{
		$message = "Password Must be >=6";
	}
	elseif(strlen($_POST['phone']) < 10)  //cal phone length
	{
		$message = "invalid phone number!";
	}

    elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) // Validate email address
    {
       	$message = "Invalid email address please type a valid email!";
    }
	elseif(mysqli_num_rows($check_username) > 0)  //check username
     {
    	$message = 'username Already exists!';
     }
	elseif(mysqli_num_rows($check_email) > 0) //check email
     {
    	$message = 'Email Already exists!';
     }
	else{
       
	 //inserting values into db
	$mql = "INSERT INTO users(username,f_name,l_name,email,phone,password,address) VALUES('".$_POST['username']."','".$_POST['firstname']."','".$_POST['lastname']."','".$_POST['email']."','".$_POST['phone']."','".md5($_POST['password'])."','".$_POST['address']."')";
	mysqli_query($db, $mql);
		$success = "Account Created successfully! <p>You will be redirected in <span id='counter'>5</span> second(s).</p>
														<script type='text/javascript'>
														function countdown() {
															var i = document.getElementById('counter');
															if (parseInt(i.innerHTML)<=0) {
																location.href = 'login.php';
															}
															i.innerHTML = parseInt(i.innerHTML)-1;
														}
														setInterval(function(){ countdown(); },1000);
														</script>'";
		
		
		
		
		 header("refresh:5;url=login.php"); // redireted once inserted success
    }
	}

}


?>


<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
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
         <header id="header" class="header-scroll top-header headrom">
            <!-- .navbar -->
            <nav class="navbar navbar-dark">
               <div class="container">
                  <button class="navbar-toggler hidden-lg-up" type="button" data-toggle="collapse" data-target="#mainNavbarCollapse">&#9776;</button>
                  <a class="navbar-brand" href="index.php"> <img class="img-rounded" src="images/takeaway.png" alt=""> </a>
                  <div class="collapse navbar-toggleable-md  float-lg-right" id="mainNavbarCollapse">
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
									
									
										echo  '<li class="nav-item"><a href="your_orders.php" class="nav-link active">your orders</a> </li>';
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
            <div class="breadcrumb">
               <div class="container">
                  <ul>
                     <li><a href="#" class="active">
					  <span style="color:red;"><?php echo $message; ?></span>
					   <span style="color:green;">
								<?php echo $success; ?>
										</span>
					   
					</a></li>
                    
                  </ul>
               </div>
            </div>
            <section class="contact-page inner-page">
               <div class="container">
                  <div class="row">
                     <!-- REGISTER -->
                     <div class="col-md-8">
                        <div class="widget">
                           <div class="widget-body">
                              
							  <form action="" method="post">
                                 <div class="row">
								  <div class="form-group col-sm-12">
                                       <label for="exampleInputEmail1">Nume de utilizator</label>
                                       <input class="form-control" type="text" name="username" id="example-text-input" placeholder="Nume de utilizator"> 
                                    </div>
                                    <div class="form-group col-sm-6">
                                       <label for="exampleInputEmail1">Prenume</label>
                                       <input class="form-control" type="text" name="firstname" id="example-text-input" placeholder="Prenume"> 
                                    </div>
                                    <div class="form-group col-sm-6">
                                       <label for="exampleInputEmail1">Nume</label>
                                       <input class="form-control" type="text" name="lastname" id="example-text-input-2" placeholder="Nume"> 
                                    </div>
                                    <div class="form-group col-sm-6">
                                       <label for="exampleInputEmail1">Adresă de email</label>
                                       <input type="text" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Introdu emailul"> <small id="emailHelp" class="form-text text-muted">Nu vom distribui niciodată adresa ta de email</small> 
                                    </div>
                                    <div class="form-group col-sm-6">
                                       <label for="exampleInputEmail1">Număr de telefon</label>
                                       <input class="form-control" type="text" name="phone" id="example-tel-input-3" placeholder="Număr de telefon"> <small class="form-text text-muted">Nu vom distribui niciodată numărul de telefon.</small> 
                                    </div>
                                    <div class="form-group col-sm-6">
                                       <label for="exampleInputPassword1">Parolă</label>
                                       <input type="password" class="form-control" name="password" id="exampleInputPassword1" placeholder="Parola"> 
                                    </div>
                                    <div class="form-group col-sm-6">
                                       <label for="exampleInputPassword1">Repetă parola</label>
                                       <input type="password" class="form-control" name="cpassword" id="exampleInputPassword2" placeholder="Parola"> 
                                    </div>
									 <div class="form-group col-sm-12">
                                       <label for="exampleTextarea">Adresa de livrare</label>
                                       <textarea class="form-control" id="exampleTextarea"  name="address" rows="3"></textarea>
                                    </div>
                                   
                                 </div>
                                
                                 <div class="row">
                                    <div class="col-sm-4">
                                       <p> <input type="submit" value="Înregistrează-te" name="submit" class="btn theme-btn"> </p>
                                    </div>
                                 </div>
                              </form>
                           
						   </div>
                           <!-- end: Widget -->
                        </div>
                        <!-- /REGISTER -->
                     </div>
                     <!-- WHY? -->
                     <div class="col-md-4">
                        <h4>Înregistrarea este rapidă, ușoară și gratuită.</h4>
                        <p>Odată ce te-ai înregistrat, poți:</p>
                        <hr>
                        <img src="images/poza1.jpg" class="img-fluid">
                        <p></p>
                        <div class="panel">
                           <div class="panel-heading">
                              <h4 class="panel-title"><a data-parent="#accordion" data-toggle="collapse" class="panel-toggle collapsed" href="#faq1" aria-expanded="false"><i class="ti-info-alt" aria-hidden="true"></i>Înregistrarea pe site-ul nostru este un pas simplu, dar plin de beneficii.</a></h4>
                           </div>
                           <div class="panel-collapse collapse" id="faq1" aria-expanded="false" role="article" style="height: 0px;">
                              <div class="panel-body"> Înregistrarea pe site-ul nostru este un pas simplu, dar plin de beneficii. În primul rând, este important să subliniem că respectăm confidențialitatea și securitatea informațiilor tale personale. Politica noastră de confidențialitate garantează că datele tale sunt protejate și utilizate numai în scopul îmbunătățirii experienței tale pe platforma noastră. Odată ce te-ai înregistrat, vei avea acces la o serie de funcționalități care îți vor îmbunătăți experiența de comandă. Poți să-ți personalizezi profilul, să-ți salvezi preferințele de comandă și adresa de livrare pentru a economisi timp la fiecare achiziție. Mai mult, vei fi la curent cu cele mai recente oferte și promoții exclusive disponibile doar pentru membrii înregistrați. De asemenea, vei putea să-ți urmărești istoricul comenzilor și să beneficiezi de asistență clienți dedicată pentru orice întrebare sau nelămurire.
În concluzie, înregistrarea pe site-ul nostru este un pas mic, dar care aduce cu sine o serie de beneficii semnificative pentru tine, clienții noștri. Alătură-te comunității noastre acum și descoperă toate avantajele oferite de înregistrare!</div>
                           </div>
                        </div>
                        <!-- end:panel -->
                        <div class="panel">
                           <div class="panel-heading">
                              <h4 class="panel-title"><a data-parent="#accordion" data-toggle="collapse" class="panel-toggle" href="#faq2" aria-expanded="true"><i class="ti-info-alt" aria-hidden="true"></i>Politica noastră de livrare și returnare este concepută pentru a-ți oferi o experiență fără griji și satisfăcătoare.</a></h4>
                           </div>
                           <div class="panel-collapse collapse" id="faq2" aria-expanded="true" role="article">
                              <div class="panel-body">  În primul rând, ne străduim să asigurăm livrări rapide și sigure pentru toate comenzile tale. Colaborăm cu parteneri de încredere în domeniul logistic pentru a ne asigura că mâncarea ta ajunge la tine în condiții optime și la timp. În cazul în care întâmpini orice problemă sau neclaritate legată de comanda ta, echipa noastră de asistență clienți este mereu disponibilă pentru a te ajuta. Ne angajăm să oferim suportul necesar și soluții prompte pentru orice solicitare ai avea. În ceea ce privește politica noastră de returnare, dorim să te asigurăm că satisfacția ta este prioritatea noastră principală. În cazul în care nu ești pe deplin mulțumit de produsele primite, ai posibilitatea de a le returna conform termenilor și condițiilor noastre. Suntem aici pentru a te ajuta să obții cea mai bună experiență posibilă în cadrul platformei noastre, iar politica noastră de livrare și returnare este unul dintre modurile în care ne respectăm angajamentul față de clienții noștri.</div>
                           </div>
                        </div>
                        <!-- end:Panel -->
                        <h4 class="m-t-20">Contactează echipa noastră de suport clienți!</h4>
                        <p> Dacă ai nevoie de mai multă asistență sau dacă ai întrebări, te rugăm să ne contactezi. Suntem aici pentru tine și suntem gata să răspundem la orice nelămurire sau solicitare ai avea. Echipa noastră dedicată de suport clienți este disponibilă să te ajute în orice fel, astfel încât să te bucuri de o experiență plăcută și fără probleme pe platforma noastră. </p>
                        <p> <a href="contact.html" class="btn theme-btn m-t-15">Contactează-ne</a> </p>
                     </div>
                     <!-- /WHY? -->
                  </div>
               </div>
            </section>
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