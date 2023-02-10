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
                                <a href="level1.php">    <button type="button" class="btn btn-primary mb-xl-3">1</button></a>
                                <a href="level2.php">    <button type="button" class="btn btn-primary mb-xl-3">2</button></a>
                                <a href="level3.php">    <button type="button" class="btn btn-primary mb-xl-3">3</button></a>
                                <a href="level4.php"><button type="button" class="btn btn-primary mb-xl-3 active">4</button></a>
                                    <a href="level5.php"><button type="button" class="btn btn-primary mb-xl-3">5</button></a>
                                    <a href="level6.php"><button type="button" class="btn btn-primary mb-xl-3">6</button></a>
                                   
                                </div>
                            
                          <?php
        $temp=array();
        $temp1=array();
        $temp2=array();
        $temp3=array();
        $temp4=array();
        $temp5=array();
        $m=0;
        $g="SELECT * FROM `distributor` WHERE `s_id`='$_SESSION[d_id]'";
        $que=$con->query($g);
        while($d=$que->fetch_assoc())
        {
            $g2="SELECT * FROM `distributor` WHERE `s_id`='$d[d_id]'";
            $que2=$con->query($g2);
            while($d2=$que2->fetch_assoc())
            {
                $g3="SELECT * FROM `distributor` WHERE `s_id`='$d2[d_id]'";
                $que3=$con->query($g3);
                while($d3=$que3->fetch_assoc())
                {
                    $g4="SELECT * FROM `distributor` WHERE `s_id`='$d3[d_id]'";
                    $que4=$con->query($g4);
                    while($d4=$que4->fetch_assoc())
                    {
                    $temp[]=$d4[d_id];
                    $temp1[]=$d4[name];
                    $temp3[]=$d4[reg_date];
                    $temp4[]=$d4[mobile];
                    $temp2[]=$d4[a_status];
                    
                    $m++;
                }
                }
            }
        }
        
        ?>
        <h5>Level 4</h5>
        <div class="single-table">
            <div class="table-responsive">
        <table class="table text-center">
            <thead class="text-uppercase bg-success"><tr class="text-white"><th>Sr. no.</th><th>D ID</th><th>Name</th><th>Mobile</th><th>Joining Date</th><th>Activate Status</th></tr></thead>
            <tbody>
          <?php
            $a=0;
            $green=0;
            $red=0;
            for($x=0; $x<count($temp); $x++)
            { $a++; 
             
            ?><tr>
                <td><?php echo $a;?></td><td>DS<?php echo $temp[$x];?></td><td><?php echo $temp1[$x];?></td><td><?php echo $temp4[$x];?></td><td><?php echo $temp3[$x];?></td><td><?php if($temp2[$x]=="y"){ $green++; ?> <span class="badge badge-success">Active</span><?php }
                        else{ $red++; echo "<span class='badge badge-danger'>Not Active</span>";
                          }
                          ?></td>
            </tr>
            <?php
            }?></tbody> <ul>
                          <li><i class="fa fa-user fa-2x green" style="color:green;"></i> <?php echo $green;?> Active</li>
                          <li><i class="fa fa-user fa-2x red" style="color:red;"></i> <?php echo $red;?> Inactive</li>
                         
                      </ul>
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
