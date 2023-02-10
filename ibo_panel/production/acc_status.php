<?php include "config.php";?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>WIND SON GROUP</title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    
    <link href="http://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">


    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
   
    
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
                <h3>Account Opening Status</h3>
              </div>

            </div>

            <div class="clearfix"></div>
            
            <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Link One Account opening Status</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                     
                    <table class="table table-striped table-bordered">
                       <?php if($_GET[l]==1){?>

                        <tr><th>Account Open</th><td>
                        	<?php 
                    
                                if($d_detail[acc_open1]!='Y')
                                {?>
                                <button type='button' class='btn btn-danger'>Account Not Open</button>
                                <?php }
                                else{ ?> <button type="button" class="btn btn-success">Account Opened</button> <?php }
                                ?>
                        	</td>
                        </tr>
                        <tr><th>Trade Status</th><td><?php 
                    
                                if($d_detail[activate1]!='Y')
                                {?>
                                <button type='button' class='btn btn-danger'>Trade Not Done</button>
                                <?php }
                                else{ ?> <button type="button" class="btn btn-success">Trade Completed</button> <?php }
                                ?></td>
                        </tr>
                        <?php }
	
						if($_GET[l]==2){?>

                        <tr><th>Account Open</th><td>
                        	<?php 
                    
                                if($d_detail[acc_open2]!='Y')
                                {?>
                                <button type='button' class='btn btn-danger'>Account Not Open</button>
                                <?php }
                                else{ ?> <button type="button" class="btn btn-success">Account Opened</button> <?php }
                                ?>
                        	</td>
                        </tr>
                        <tr><th>Trade Status</th><td><?php 
                    
                                if($d_detail[activate2]!='Y')
                                {?>
                                <button type='button' class='btn btn-danger'>Trade Not Done</button>
                                <?php }
                                else{ ?> <button type="button" class="btn btn-success">Trade Completed</button> <?php }
                                ?></td>
                        </tr>
                        <?php }?>
                    </table>
                    
                    
                    
                    
                     
                     </div>
                     </div>
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
    <!-- jquery.inputmask -->
    <script src="../vendors/jquery.inputmask/dist/min/jquery.inputmask.bundle.min.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>
  </body>
</html>
