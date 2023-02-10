<?php include "config.php";?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Dreamsway </title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
    <link href="css/slider.css" rel="stylesheet">
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
              <?php include "slider.php";?>



            <div class="clearfix"></div>
<h3>&nbsp;Welcome <?php echo $d_detail[name];?></h3>
            <div class="row">
              <div class="col-md-12 col-sm-12  ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Recharge and Bill Payment</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
					<div class="bs-glyphicons">
                        <ul class="bs-glyphicons-list">
                          <a href="../../mobile_recharge.php"><li>
                             <img src="images/recharge icon-08.png" height="50" width="50">
                             <span class="glyphicon glyphicon-" aria-hidden="true"></span>
                            <span class="glyphicon-class">Mobile</span>
                          </li></a>
                          
                          <li data-toggle="modal" data-target=".bs-example-modal-lg">
                             <img src="images/electric.png" height="50" width="50">
                             <span class="glyphicon glyphicon" aria-hidden="true"></span>
                            <span class="glyphicon-class">Electricity</span>
                          </li>

                          <li data-toggle="modal" data-target=".bs-example-modal-lg">
                          <img src="images/gas.png" height="50" width="50">
                            <span class="glyphicon glyphicon" aria-hidden="true"></span>
                            <span class="glyphicon-class">Gas</span>
                          </li>
                          <li data-toggle="modal" data-target=".bs-example-modal-lg">
                          <img src="images/drop.png" height="50" width="50">
                            <span class="glyphicon glyphicon" aria-hidden="true"></span>
                            <span class="glyphicon-class">Water Tax</span>
                          </li>
                          <li data-toggle="modal" data-target=".bs-example-modal-lg">
                          <img src="images/recharge icon-04.png" height="50" width="50">
                            <span class="glyphicon glyphicon" aria-hidden="true"></span>
                            <span class="glyphicon-class">Insurance Premium</span>
                          </li>
                          <a href="../../dth_recharge.php"><li>
                          <img src="images/dth.png" height="50" width="50">
                            <span class="glyphicon glyphicon" aria-hidden="true"></span>
                            <span class="glyphicon-class">DTH</span>
                          </li></a>

                          <li data-toggle="modal" data-target=".bs-example-modal-lg">
                          <img src="images/recharge icon-06.png" height="50" width="50">
                            <span class="glyphicon glyphicon" aria-hidden="true"></span>
                            <span class="glyphicon-class">Broadband</span>
                          </li>

                          <li data-toggle="modal" data-target=".bs-example-modal-lg">
                          <img src="images/recharge icon-07.png" height="50" width="50">
                            <span class="glyphicon glyphicon" aria-hidden="true"></span>
                            <span class="glyphicon-class">Gift Voucher</span>
                          </li>
                        </ul>
                      </div>
                  </div>
                </div>
                <div class="x_panel">
                <div class="x_title">
                    <h3>Utility toos</h3>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
					<div class="bs-glyphicons">
                        <ul class="bs-glyphicons-list">
                          <li data-toggle="modal" data-target=".bs-example-modal-lg">
                             <img src="https://upload.wikimedia.org/wikipedia/commons/d/de/Amazon_icon.png" height="50" width="50">
                             <span class="glyphicon glyphicon" aria-hidden="true"></span>
                            <span class="glyphicon-class">Amazon</span>
                          </li>
                          
                          <li data-toggle="modal" data-target=".bs-example-modal-lg">
                          <img src="https://cdn2.iconfinder.com/data/icons/social-icons-color/512/flipkart-512.png" height="50" width="50">
                            <span class="glyphicon glyphicon" aria-hidden="true"></span>
                            <span class="glyphicon-class">Flipkart</span>
                          </li>

                          <li data-toggle="modal" data-target=".bs-example-modal-lg">
                          <img src="https://pbs.twimg.com/profile_images/1109918288283201538/UNAOYxaG_400x400.jpg" height="50" width="50">
                            <span class="glyphicon glyphicon" aria-hidden="true"></span>
                            <span class="glyphicon-class">Myntra</span>
                          </li>
                          <li data-toggle="modal" data-target=".bs-example-modal-lg">
                          <img src="https://www.searchpng.com/wp-content/uploads/2019/01/OYO-Rooms-Logo-.png" height="50" width="50">
                            <span class="glyphicon glyphicon" aria-hidden="true"></span>
                            <span class="glyphicon-class">Oyo</span>
                          </li>
                          
                          
                          
                        </ul>
                      </div>
                  </div>
                </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->
      </div>
            <!--footar-->
            <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">

                        <div class="modal-header">
                          <h4 class="modal-title" id="myModalLabel">Comming Soon</h4>
                          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <p>We are currently Working on it....</p>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>

                      </div>
                    </div>
                  </div>
          

               <?php include "../../footer.php";?>
                
             <!--//footar-->

    <!-- jQuery -->
    <script src="../vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
   <script src="../vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- FastClick -->
    <script src="../vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../vendors/nprogress/nprogress.js"></script>
    
    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>
  </body>
</html>
