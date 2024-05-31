<!DOCTYPE html>
<html lang="ro">
<?php
include("../connection/connect.php");
error_reporting(0);
session_start();
?>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
    <title>Ela - Bootstrap Admin Dashboard Template</title>
    <link href="css/lib/bootstrap/bootstrap.min.css" rel="stylesheet">
    <link href="css/helper.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:** -->
    <!--[if lt IE 9]>
    <script src="https:**oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https:**oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body class="fix-header fix-sidebar">
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10"></circle>
        </svg>
    </div>
    <div id="main-wrapper">
        <div class="header">
            <nav class="navbar top-navbar navbar-expand-md navbar-light">
                <div class="navbar-header">
                    <a class="navbar-brand" href="index.html">
                        <b><img src="images/logo.png" alt="homepage" class="dark-logo"></b>
              
                    </a>
                </div>
                <div class="navbar-collapse">
                    <ul class="navbar-nav mr-auto mt-md-0">
                        <li class="nav-item"> <a class="nav-link nav-toggler hidden-md-up text-muted" href="javascript:void(0)"><i class="mdi mdi-menu"></i></a> </li>
                        <li class="nav-item m-l-10"> <a class="nav-link sidebartoggler hidden-sm-down text-muted" href="javascript:void(0)"><i class="ti-menu"></i></a> </li>
                    </ul>
                    <ul class="navbar-nav my-lg-0">
                        <li class="nav-item hidden-sm-down search-box"> <a class="nav-link hidden-sm-down text-muted" href="javascript:void(0)"><i class="ti-search"></i></a>
                            <form class="app-search">
                                <input type="text" class="form-control" placeholder="Căutați aici"> <a class="srh-btn"><i class="ti-close"></i></a> 
                            </form>
                        </li>
                        <li class="nav-item dropdown">
                            <div class="dropdown-menu dropdown-menu-right mailbox animated zoomIn">
                                <ul>
                                    <li>
                                        <div class="drop-title">Notificări</div>
                                    </li>
                                    <li>
                                        <a class="nav-link text-center" href="javascript:void(0);"> <strong>Verificați toate notificările</strong> <i class="fa fa-angle-right"></i> </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="images/users/5.jpg" alt="user" class="profile-pic"></a>
                            <div class="dropdown-menu dropdown-menu-right animated zoomIn">
                                <ul class="dropdown-user">
                                    <li><a href="logout.php"><i class="fa fa-power-off"></i> Deconectare</a></li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
        <div class="left-sidebar">
            <div class="scroll-sidebar">
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li class="nav-devider"></li>
                        <li class="nav-label">Acasă</li>
                        <li> <a class="has-arrow" href="#" aria-expanded="false"><i class="fa fa-tachometer"></i><span class="hide-menu">Tablou de bord</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="dashboard.php">Tablou de bord</a></li>
                            </ul>
                        </li>
                        <li class="nav-label">Log</li>
                        <li> <a class="has-arrow" href="#" aria-expanded="false"> <span><i class="fa fa-user f-s-20"></i></span><span class="hide-menu">Utilizatori</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="allusers.php">Toți utilizatorii</a></li>
                                <li><a href="add_users.php">Adăugați utilizatori</a></li>
                            </ul>
                        </li>
                        <li> <a class="has-arrow" href="#" aria-expanded="false"><i class="fa fa-archive f-s-20 color-warning"></i><span class="hide-menu">Magazin</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="allrestraunt.php">Toate magazinele</a></li>
                                <li><a href="add_category.php">Adăugați categorie</a></li>
                                <li><a href="add_restraunt.php">Adăugați magazin</a></li>
                            </ul>
                        </li>
                        <li> <a class="has-arrow" href="#" aria-expanded="false"><i class="fa fa-cutlery" aria-hidden="true"></i><span class="hide-menu">Meniu</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="all_menu.php">Toate meniurile</a></li>
                                <li><a href="add_menu.php">Adăugați meniu</a></li>
                            </ul>
                        </li>
                        <li> <a class="has-arrow" href="#" aria-expanded="false"><i class="fa fa-shopping-cart" aria-hidden="true"></i><span class="hide-menu">Comenzi</span></a>
                            <ul aria-expanded="false" class="collapse">
									             <li><a href="all_cards.php">Plată</a></li>
                                <li><a href="all_orders.php">Toate comenzile</a></li>
                            </ul>
                        </li>
                        <li class="nav-label">Review-uri</li>
                        <li> <a class="has-arrow" href="all_reviews.php" aria-expanded="false"><i class="fa fa-star" aria-hidden="true"></i><span class="hide-menu">Review-uri</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="all_reviews.php">Toate review-urile</a></li>
                            </ul>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
        <div class="page-wrapper">
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Tablou de bord</h3> 
                </div>
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Toate review-urile</h4>
                                <h6 class="card-subtitle">Exportați datele către Copy, CSV, Excel, PDF și Print</h6>
                                <div class="table-responsive m-t-40">
                                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>ID Review</th>
                                                <th>Nume Utilizator</th>
                                                <th>Rating Utilizator</th>
                                                <th>Review Utilizator</th>
                                                <th>Data/Ora</th>
                                                <th>Acțiune</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>ID Review</th>
                                                <th>Nume Utilizator</th>
                                                <th>Rating Utilizator</th>
                                                <th>Review Utilizator</th>
                                                <th>Data/Ora</th>
                                                <th>Acțiune</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            <?php
                                            $sql = "SELECT * FROM review_table ORDER BY review_id DESC";
                                            $query = mysqli_query($db, $sql);
                                            
                                            if (!mysqli_num_rows($query) > 0) {
                                                echo '<td colspan="6"><center>Niciun review găsit!</center></td>';
                                            } else {
                                                while ($rows = mysqli_fetch_array($query)) {
                                                    echo '<tr><td>' . $rows['review_id'] . '</td>
                                                            <td>' . $rows['user_name'] . '</td>
                                                            <td>' . $rows['user_rating'] . '</td>
                                                            <td>' . $rows['user_review'] . '</td>
                                                            <td>' . $rows['datetime'] . '</td>
                                                            <td><a href="delete_review.php?review_del=' . $rows['review_id'] . '" class="btn btn-danger btn-flat btn-addon btn-xs m-b-10"><i class="fa fa-trash-o" style="font-size:16px"></i></a> 
                                                            <a href="update_review.php?review_upd=' . $rows['review_id'] . '" class="btn btn-info btn-flat btn-addon btn-sm m-b-10 m-l-5"><i class="ti-settings"></i></a>
                                                            </td></tr>';
                                                }
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <footer class="footer"> © COSY CUISINE. </footer>
        </div>
    </div>
    <script src="js/lib/jquery/jquery.min.js"></script>
    <script src="js/lib/bootstrap/js/popper.min.js"></script>
    <script src="js/lib/bootstrap/js/bootstrap.min.js"></script>
    <script src="js/jquery.slimscroll.js"></script>
    <script src="js/sidebarmenu.js"></script>
    <script src="js/lib/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <script src="js/custom.min.js"></script>
    <script src="js/lib/datatables/datatables.min.js"></script>
    <script src="js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
    <script src="js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>
    <script src="js/lib/datatables/cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
    <script src="js/lib/datatables/cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
    <script src="js/lib/datatables/cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
    <script src="js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
    <script src="js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>
    <script src="js/lib/datatables/datatables-init.js"></script>
</body>
</html>
