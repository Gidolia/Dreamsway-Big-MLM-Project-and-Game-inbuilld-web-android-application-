<?php include "config.php";?>
<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Dreamsway</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="assets/images/icon/favicon.ico">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/metisMenu.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/slicknav.min.css">
    <!-- amchart css -->
    <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
    <!-- others css -->
    <link rel="stylesheet" href="assets/css/typography.css">
    <link rel="stylesheet" href="assets/css/default-css.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/responsive.css">
    <!-- modernizr css -->
    <script src="assets/js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <!-- preloader area start -->
    <div id="preloader">
        <div class="loader"></div>
    </div>
    <!-- preloader area end -->
    <!-- page container area start -->
    <div class="page-container">
        <!-- sidebar menu area start -->
        <?php include "include/sidebar.php";?>
        <!-- sidebar menu area end -->
        <!-- main content area start -->
        <div class="main-content">
            <!-- header area start -->
            <?php include "include/header.php";?>
            <!-- header area end -->
            <!-- page title area start -->
            <!-- page title area end -->
            <div class="main-content-inner">
             <div class="row">
                
                <!-- Textual inputs start -->
                <div class="col-12 mt-12">
                    <div class="card">
                        <div class="card-body">
                            <h4> Pin Transfer </h4>
                            <br>&nbsp;
                            <?php if($_GET[s]=="s")
                            {?>
                            <div class="alert alert-success" role="alert">
                                            <strong>Success!</strong> PIN Transfered
                            </div>
                            <?php }elseif($_GET[s]=="q_f"){
                                ?>
                                <div class="alert alert-danger" role="alert">
                                            <strong>Failed!</strong> Please Try again
                                        </div>
                           <?php }elseif($_GET[s]=="n_id"){
                                ?>
                                <div class="alert alert-danger" role="alert">
                                            <strong>Failed!</strong> ID Must be Activate
                                        </div>
                           <?php }elseif($_GET[s]=="u_bal"){
                                ?>
                                <div class="alert alert-danger" role="alert">
                                            <strong>Failed!</strong> You Dont Have Pins
                                        </div>
                           <?php }?>
                                        <br>&nbsp;
                          
                            <div class="col-md-6 mt-6 mb-6">
                                <div class="card">
                                    <div class="seo-fact sbg1">
                                        <div class="p-4 d-flex justify-content-between align-items-center">
                                            <div class="seofct-icon"><i class="fa fa-money"></i> Pins</div>
                                            <h2><?php echo $d_detail[pin_wallet]+0;?></h2>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                            <br>&nbsp;<br>&nbsp;
                            <form action="confirm_transfer_pin.php" method="post">
        <table class="table table-striped table-bordered">
            <thead><tr><th>PIN Wallet Balance</th><th><?php echo $d_detail[pin_wallet]+0;?></th></tr></thead>
            <tr>
                <th>To ID</th>
                <td><input type="text" name="to_d_id"></td>
            </tr>
            <tr>
                <th>Pin To Transfer</th>
                <td><input type="number" name="pins"></td>
            </tr>
            <tr>
                <th></th>
                <td><input type="submit" name="transfer_pin"></td>
            </tr>
            </table>
            </form>
                        </div>
                    </div>
                </div>
                            <!-- Textual inputs end -->
                 
                <!-- row area start-->
            </div>
        </div>
        <!-- main content area end -->
        <!-- footer area start-->
       <?php include "include/footer.php";?>
        <!-- footer area end-->
    </div>
    <!-- page container area end -->
    
    <!-- jquery latest version -->
    <script src="assets/js/vendor/jquery-2.2.4.min.js"></script>
    <!-- bootstrap 4 js -->
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>
    <script src="assets/js/metisMenu.min.js"></script>
    <script src="assets/js/jquery.slimscroll.min.js"></script>
    <script src="assets/js/jquery.slicknav.min.js"></script>
    <!-- all line chart activation -->
    <script src="assets/js/line-chart.js"></script>
    <!-- all pie chart -->
    <script src="assets/js/pie-chart.js"></script>
    <!-- others plugins -->
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/scripts.js"></script>
</body>

</html>
