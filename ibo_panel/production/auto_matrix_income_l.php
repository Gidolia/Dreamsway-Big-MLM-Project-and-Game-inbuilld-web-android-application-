<?php include "config.php";?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="icon" href="../../small_logo.jpg" type="image/ico" />
    <title>Dreamsway || Auto Matrix Income</title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
    <!-- Datatables -->
    
    <link href="../vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <?php include "include/sidebar.php";?>
          </div>
        </div>

        <!-- top navigation -->
        <?php include "include/header.php";?>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Auto Matrix Income</h3>
              </div>
            </div>

            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-6 col-sm-8 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Your Auto Matrix Income Level View </h2>
                  
                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
            <br>
            <div class="card-box table-responsive">
        <table class="table table-striped table-bordered">
            <thead><tr><th>Level</th><th>Total Team</th><th>Amount</th><th>Meter</th></tr></thead>
            <tbody>
            <?php
            //////////////////
            /////////////////////////
            ////////////////////////////////////lv 1
            $g1="SELECT * FROM `auto_matrix_income` WHERE `d_id`='$_SESSION[d_id]' AND `level`='1'";
            $dc1=$con->query($g1);
            $a1=$dc1->num_rows;
            $am1=$a1*10;
            $meter1=$am1*100/20;
            ?>
            <tr><td>lv 1</td><td><?php echo $a1;?></td><td><?php echo $am1;?></td><td class="project_progress">
                <div class="progress progress_sm">
                  <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="<?php echo $meter1;?>"></div>
                </div>
                <small><?php echo $meter1;?>% Complete</small></td></tr>
                
                
            
            <?php
            //////////////////
            /////////////////////////
            ////////////////////////////////////lv 2
            $g2="SELECT * FROM `auto_matrix_income` WHERE `d_id`='$_SESSION[d_id]' AND `level`='2'";
            $dc2=$con->query($g2);
            $a2=$dc2->num_rows;
            $am2=$a2*12;
            $meter2=$am2*100/48;
            if($meter2!=0)
            {
            ?>
            <tr><td>lv 2</td><td><?php echo $a2;?></td><td><?php echo $am2;?></td><td class="project_progress">
                <div class="progress progress_sm">
                  <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="<?php echo $meter2;?>"></div>
                </div>
                <small><?php echo $meter2;?>% Complete</small></td></tr>
                
                
                <?php }
                //////////////////
            /////////////////////////
            ////////////////////////////////////lv 3
            $g3="SELECT * FROM `auto_matrix_income` WHERE `d_id`='$_SESSION[d_id]' AND `level`='3'";
            $dc3=$con->query($g3);
            $a3=$dc3->num_rows;
            $am3=$a3*8;
            $meter3=$am3*100/64;
            if($meter3!=0)
            {
            ?>
            <tr><td>lv 3</td><td><?php echo $a3;?></td><td><?php echo $am3;?></td><td class="project_progress">
                <div class="progress progress_sm">
                  <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="<?php echo $meter3;?>"></div>
                </div>
                <small><?php echo $meter3;?>% Complete</small></td></tr>
                
                
            
            <?php }
            //////////////////
            /////////////////////////
            ////////////////////////////////////lv 4
            $g4="SELECT * FROM `auto_matrix_income` WHERE `d_id`='$_SESSION[d_id]' AND `level`='4'";
            $dc4=$con->query($g4);
            $a4=$dc4->num_rows;
            $am4=$a4*8;
            $meter4=$am4*100/128;
            if($meter4!=0)
            {
            ?>
            <tr><td>lv 4</td><td><?php echo $a4;?></td><td><?php echo $am4;?></td><td class="project_progress">
                <div class="progress progress_sm">
                  <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="<?php echo $meter4;?>"></div>
                </div>
                <small><?php echo $meter4;?>% Complete</small></td></tr>
            
            
            <?php }
            //////////////////
            /////////////////////////
            ////////////////////////////////////lv 5
            $g5="SELECT * FROM `auto_matrix_income` WHERE `d_id`='$_SESSION[d_id]' AND `level`='5'";
            $dc5=$con->query($g5);
            $a5=$dc5->num_rows;
            $am5=$a5*7;
            $meter5=$am5*100/224;
            if($meter5!=0)
            {
            ?>
            <tr><td>lv 5</td><td><?php echo $a5;?></td><td><?php echo $am5;?></td><td class="project_progress">
                <div class="progress progress_sm">
                  <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="<?php echo $meter5;?>"></div>
                </div>
                <small><?php echo $meter5;?>% Complete</small></td></tr>
                
                
            <?php }
            //////////////////
            /////////////////////////
            ////////////////////////////////////lv 6
            $g6="SELECT * FROM `auto_matrix_income` WHERE `d_id`='$_SESSION[d_id]' AND `level`='6'";
            $dc6=$con->query($g6);
            $a6=$dc6->num_rows;
            $am6=$a6*5;
            $meter6=$am6*100/320;
            if($meter6!=0)
            {
            ?>
            <tr><td>lv 6</td><td><?php echo $a6;?></td><td><?php echo $am6;?></td><td class="project_progress">
                <div class="progress progress_sm">
                  <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="<?php echo $meter6;?>"></div>
                </div>
                <small><?php echo $meter6;?>% Complete</small></td></tr>
                
            
            <?php }
            //////////////////
            /////////////////////////
            ////////////////////////////////////lv 7
            $g7="SELECT * FROM `auto_matrix_income` WHERE `d_id`='$_SESSION[d_id]' AND `level`='7'";
            $dc7=$con->query($g7);
            $a7=$dc7->num_rows;
            $am7=$a7*4;
            $meter7=$am7*100/512;
            if($meter7!=0)
            {
            ?>
            <tr><td>lv 7</td><td><?php echo $a7;?></td><td><?php echo $am7;?></td><td class="project_progress">
                <div class="progress progress_sm">
                  <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="<?php echo $meter7;?>"></div>
                </div>
                <small><?php echo $meter7;?>% Complete</small></td></tr>
                
                
            <?php }
            //////////////////
            /////////////////////////
            ////////////////////////////////////lv 8
            $g8="SELECT * FROM `auto_matrix_income` WHERE `d_id`='$_SESSION[d_id]' AND `level`='8'";
            $dc8=$con->query($g8);
            $a8=$dc8->num_rows;
            $am8=$a8*3;
            $meter8=$am8*100/768;
            if($meter8!=0)
            {
            ?>
            <tr><td>lv 8</td><td><?php echo $a8;?></td><td><?php echo $am8;?></td><td class="project_progress">
                <div class="progress progress_sm">
                  <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="<?php echo $meter8;?>"></div>
                </div>
                <small><?php echo $meter8;?>% Complete</small></td></tr>
            
            
            <?php }
            //////////////////
            /////////////////////////
            ////////////////////////////////////lv 9
            $g9="SELECT * FROM `auto_matrix_income` WHERE `d_id`='$_SESSION[d_id]' AND `level`='9'";
            $dc9=$con->query($g9);
            $a9=$dc9->num_rows;
            $am9=$a9*3;
            $meter9=$am9*100/1536;
            if($meter9!=0)
            {
            ?>
            <tr><td>lv 9</td><td><?php echo $a9;?></td><td><?php echo $am9;?></td><td class="project_progress">
                <div class="progress progress_sm">
                  <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="<?php echo $meter9;?>"></div>
                </div>
                <small><?php echo $meter9;?>% Complete</small></td></tr>
            
            
            <?php }
            //////////////////
            /////////////////////////
            ////////////////////////////////////lv 10
            $g10="SELECT * FROM `auto_matrix_income` WHERE `d_id`='$_SESSION[d_id]' AND `level`='10'";
            $dc10=$con->query($g10);
            $a10=$dc10->num_rows;
            $am10=$a10*2;
            $meter10=$am10*100/2048;
            if($meter10!=0)
            {
            ?>
            <tr><td>lv 10</td><td><?php echo $a10;?></td><td><?php echo $am10;?></td><td class="project_progress">
                <div class="progress progress_sm">
                  <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="<?php echo $meter10;?>"></div>
                </div>
                <small><?php echo $meter10;?>% Complete</small></td></tr>
                
            
            <?php }
            //////////////////
            /////////////////////////
            ////////////////////////////////////lv 11
            $g11="SELECT * FROM `auto_matrix_income` WHERE `d_id`='$_SESSION[d_id]' AND `level`='11'";
            $dc11=$con->query($g11);
            $a11=$dc11->num_rows;
            $am11=$a11*2;
            $meter11=$am11*100/4096;
            if($meter11!=0)
            {
            ?>
            <tr><td>lv 11</td><td><?php echo $a11;?></td><td><?php echo $am11;?></td><td class="project_progress">
                <div class="progress progress_sm">
                  <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="<?php echo $meter11;?>"></div>
                </div>
                <small><?php echo $meter11;?>% Complete</small></td></tr>
            
            <?php }
            //////////////////
            /////////////////////////
            ////////////////////////////////////lv 12
            $g12="SELECT * FROM `auto_matrix_income` WHERE `d_id`='$_SESSION[d_id]' AND `level`='12'";
            $dc12=$con->query($g12);
            $a12=$dc12->num_rows;
            $am12=$a12*2;
            $meter12=$am12*100/8192;
            if($meter12!=0)
            {
            ?>
            <tr><td>lv 12</td><td><?php echo $a12;?></td><td><?php echo $am12;?></td><td class="project_progress">
                <div class="progress progress_sm">
                  <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="<?php echo $meter12;?>"></div>
                </div>
                <small><?php echo $meter12;?>% Complete</small></td></tr>
            
            
            
            <?php }
            //////////////////
            /////////////////////////
            ////////////////////////////////////lv 13
            $g13="SELECT * FROM `auto_matrix_income` WHERE `d_id`='$_SESSION[d_id]' AND `level`='13'";
            $dc13=$con->query($g13);
            $a13=$dc13->num_rows;
            $am13=$a13*2;
            $meter13=$am13*100/16384;
            if($meter13!=0)
            {
            ?>
            <tr><td>lv 13</td><td><?php echo $a13;?></td><td><?php echo $am13;?></td><td class="project_progress">
                <div class="progress progress_sm">
                  <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="<?php echo $meter13;?>"></div>
                </div>
                <small><?php echo $meter13;?>% Complete</small></td></tr>
                
            
            <?php }
            //////////////////
            /////////////////////////
            ////////////////////////////////////lv 14
            $g14="SELECT * FROM `auto_matrix_income` WHERE `d_id`='$_SESSION[d_id]' AND `level`='14'";
            $dc14=$con->query($g14);
            $a14=$dc14->num_rows;
            $am14=$a14*2;
            $meter14=$am14*100/32768;
            if($meter14!=0)
            {
            ?>
            <tr><td>lv 14</td><td><?php echo $a14;?></td><td><?php echo $am14;?></td><td class="project_progress">
                <div class="progress progress_sm">
                  <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="<?php echo $meter14;?>"></div>
                </div>
                <small><?php echo $meter14;?>% Complete</small></td></tr>
            
            
            <?php }
            //////////////////
            /////////////////////////
            ////////////////////////////////////lv 15
            $g15="SELECT * FROM `auto_matrix_income` WHERE `d_id`='$_SESSION[d_id]' AND `level`='15'";
            $dc15=$con->query($g15);
            $a15=$dc15->num_rows;
            $am15=$a15*3;
            $meter15=$am15*100/98304;
            if($meter15!=0)
            {
            ?>
            <tr><td>lv 15</td><td><?php echo $a15;?></td><td><?php echo $am15;?></td><td class="project_progress">
                <div class="progress progress_sm">
                  <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="<?php echo $meter15;?>"></div>
                </div>
                <small><?php echo $meter15;?>% Complete</small></td></tr>
            
            
            <?php }
            //////////////////
            /////////////////////////
            ////////////////////////////////////lv 16
            $g16="SELECT * FROM `auto_matrix_income` WHERE `d_id`='$_SESSION[d_id]' AND `level`='16'";
            $dc16=$con->query($g16);
            $a16=$dc16->num_rows;
            $am16=$a16*6;
            $meter16=$am16*100/393216;
            if($meter16!=0)
            {
            ?>
            <tr><td>lv 16</td><td><?php echo $a16;?></td><td><?php echo $am16;?></td><td class="project_progress">
                <div class="progress progress_sm">
                  <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="<?php echo $meter16;?>"></div>
                </div>
                <small><?php echo $meter16;?>% Complete</small></td></tr>
            
            
            
            <?php }
            //////////////////
            /////////////////////////
            ////////////////////////////////////lv 17
            $g17="SELECT * FROM `auto_matrix_income` WHERE `d_id`='$_SESSION[d_id]' AND `level`='17'";
            $dc17=$con->query($g17);
            $a17=$dc17->num_rows;
            $am17=$a17*8;
            $meter17=$am17*100/1048576;
            if($meter17!=0)
            {
            ?>
            <tr><td>lv 17</td><td><?php echo $a17;?></td><td><?php echo $am17;?></td><td class="project_progress">
                <div class="progress progress_sm">
                  <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="<?php echo $meter17;?>"></div>
                </div>
                <small><?php echo $meter17;?>% Complete</small></td></tr>
            
            
            
            <?php }
            //////////////////
            /////////////////////////
            ////////////////////////////////////lv 18
            $g18="SELECT * FROM `auto_matrix_income` WHERE `d_id`='$_SESSION[d_id]' AND `level`='18'";
            $dc18=$con->query($g18);
            $a18=$dc18->num_rows;
            $am18=$a18*13;
            $meter18=$am18*100/3407872;
            if($meter18!=0)
            {
            ?>
            <tr><td>lv 18</td><td><?php echo $a18;?></td><td><?php echo $am18;?></td><td class="project_progress">
                <div class="progress progress_sm">
                  <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="<?php echo $meter18;?>"></div>
                </div>
                <small><?php echo $meter18;?>% Complete</small></td></tr>
               <?php }?>
            </tbody>
        </table>
        </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <?php include "include/footer.php";?>
        <!-- /footer content -->
      </div>
    </div>

    <!-- jQuery -->
    <script src="../vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="../vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../vendors/nprogress/nprogress.js"></script>
    <!-- Datatables -->
    <script src="../vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="../vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="../vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="../vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="../vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="../vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="../vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="../vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
    <script src="../vendors/jszip/dist/jszip.min.js"></script>
    <script src="../vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="../vendors/pdfmake/build/vfs_fonts.js"></script>
    
    <!-- bootstrap-progressbar -->
    <script src="../vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    
    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>
  </body>
</html>
