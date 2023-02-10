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
                            <h4> Level View </h4>
                            <br>&nbsp;
                            <div class="btn-group mr-2" role="group" aria-label="First group">
                               <a href="level1.php">    <button type="button" class="btn btn-primary mb-xl-3 active">1</button></a>
                                <a href="level2.php">    <button type="button" class="btn btn-primary mb-xl-3">2</button></a>
                                <a href="level3.php">    <button type="button" class="btn btn-primary mb-xl-3">3</button></a>
                                <a href="level4.php"><button type="button" class="btn btn-primary mb-xl-3">4</button></a>
                                    <a href="level5.php"><button type="button" class="btn btn-primary mb-xl-3">5</button></a>
                                    <a href="level6.php"><button type="button" class="btn btn-primary mb-xl-3">6</button></a>
                                   
                                </div>
                            
                          <?php
        
                             
        $g="SELECT * FROM `distributor` WHERE `s_id`='$_SESSION[d_id]'";
        $dc=$con->query($g);
        ?>
        <h5>Level 1</h5>
        <div class="single-table">
            <div class="table-responsive">
        <table class="table text-center">
            <thead class="text-uppercase bg-success"><tr class="text-white"><th>Sr. no.</th><th>D ID</th><th>Name</th><th>Activate Status</th><th>Mobile</th><th>Joinning Date</th></tr></thead>
            <tbody>
            <?php
            $a=0;
            $green=0;
            $red=0;
            while($d=$dc->fetch_assoc())
            { $a++; ?>
          
            <tr>
                <td><?php echo $a;?></td>
                <td><?php echo "DS".$d[d_id];?></td>
                <td><?php echo $d[name];?></td>
                <td>
                    <?php  if($d[a_status]=="y"){ $green++; ?> <span class="badge badge-success">Active</span> <?php }
                        else{  $red++; echo " <span class='badge badge-danger'>Not Active</span>";
                          }
                          ?>
                </td>
                <td><?php echo $d[mobile];?></td>
                <td><?php echo $d[reg_date];?></td>
                
            
            </tr> 
            
        
           
        <?php } ?> <ul>
                          <li><i class="fa fa-user fa-2x green" style="color:green;"></i> <?php echo $green;?> Active</li>
                          <li><i class="fa fa-user fa-2x red" style="color:red;"></i> <?php echo $red;?> Inactive</li>
                         
                      </ul></tbody> 
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
</body>

</html>
