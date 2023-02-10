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
    <!-- Start datatable css -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.jqueryui.min.css">
    <!-- modernizr css -->
    <script src="assets/js/vendor/modernizr-2.8.3.min.js"></script>
    
    
</head>

<body>
    
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
                            <h4>Income Wallet Ledger View</h4>
                            <br>&nbsp;
                            
                          <?php
        
                             
        $g="SELECT * FROM `withdrawal_wallet` WHERE `d_id`='$_SESSION[d_id]' ORDER BY `withdrawal_wallet`.`ww_id` DESC";
        $dc=$con->query($g);
        ?>
        <h5>Income Wallet Ledger</h5>
        <div class="single-table">
            <div class="table-responsive">
        <table class="table text-center" id="dataTable">
            <thead class="text-uppercase bg-success"><tr class="text-white"><th>Amount</th><th>Status</th><th>Note</th><th>Date/time</th><th>After bal</th></tr></thead>
            <tbody>
            <?php
            $a=0;
            while($d=$dc->fetch_assoc())
            { $a++; ?>
            <tr>
                
                <td><?php echo $d[amount];?></td>
                
                
                <td><?php  if($d[type]=="-"){ ?> <span class="badge badge-danger">Debited</span> <?php }
                        else{  echo " <span class='badge badge-success'>Credited</span>";
                          }
                          ?></td>
                <td><?php echo $d[note];?></td>
                <td><?php echo $d[date]." ".$d[time];?></td>
                <td><?php echo $d[a_bal];?></td>
            </tr>
        <?php } ?> </tbody>
        </table>
        </div></div>
                        </div>
                    </div>
                </div>
                            <!-- Textual inputs end -->
                
                
                </div>
                
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
     <!-- Start datatable js -->
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
    <script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap.min.js"></script>
</body>

</html>
