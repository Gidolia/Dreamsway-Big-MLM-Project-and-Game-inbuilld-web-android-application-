<?php include "config.php";
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="icon" href="../../small_logo.jpg" type="image/ico" />
    <title>Dreamsway || Game Play</title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">

    <link href="../vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">
    
    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
<style>
.rotate {
  animation: rotation 8s infinite linear;
}

@keyframes rotation {
  from {
    transform: rotate(0deg);
  }
  to {
    transform: rotate(359deg);
  }
}
.center {
  display: block;
  margin-left: auto;
  margin-right: auto;
  
}
.blinking{
    animation:blinkingText 1.2s infinite;
}
@keyframes blinkingText{
    0%{     color: green; background:#000;}
    49%{    color: green; background:#000;}
    60%{    color: transparent; background:#000;}
    99%{    color: transparent;  background:#000;}
    100%{   color: green;    background:#000;}
}
</style>
    
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
                <h3>Game</h3>
              </div>
            </div>
            <div class="clearfix"></div>
            <?php
            $dcbpbiop="SELECT * FROM `game_rooms` ORDER BY `game_rooms`.`gr_id` DESC";
            $scscp=$con->query($dcbpbiop);
            $lp=$scscp->fetch_assoc();
                $fvjknhp="SELECT * FROM `game_room_person` WHERE `gr_id`='$lp[gr_id]'";
                $cdvnhp=$con->query($fvjknhp);
                $p_countnhp=$cdvnhp->num_rows;
            ?>
            <div class="row">
                <div class="col-md-2 col-sm-2 col-xs-2">
                <div class="x_panel">
                  <div class="x_content">
                             <?php
                             if($p_countnhp==1){
                                 $a="green";
                                 $b="red";
                                 $c="red";
                                 $d="red";
                             }
                             elseif($p_countnhp==2){
                                 $a="green";
                                 $b="green";
                                 $c="red";
                                 $d="red";
                             }
                             elseif($p_countnhp==3){
                                 $a="green";
                                 $b="green";
                                 $c="green";
                                 $d="red";
                             }
                             elseif($p_countnhp==4){
                                 $a="green";
                                 $b="green";
                                 $c="green";
                                 $d="green";
                             }
                             ?>
       <i class="fa fa-user fa-4x <?php echo $a;?>"></i> <br>
       <i class="fa fa-user fa-4x <?php echo $b;?>" ></i><br>
       <i class="fa fa-user fa-4x <?php echo $c;?>" ></i><br>
       <i class="fa fa-user fa-4x <?php echo $d;?>" ></i><br>
                  </div>
                </div>
              </div>
            
                <div class="col-md-10 col-sm-10 col-xs-10">
                <div class="x_panel">
                  
                  <div class="x_content">
                        
                     <br>&nbsp;<br>&nbsp;<br>&nbsp;   
             <img src="images/a42e2656-a8b1-4703-8bcc-444c805ce7b9.jpg" class="rotate center" width="250px" height="250px" />     
                   <br>&nbsp;<br>&nbsp;<br>&nbsp; 
              <h1 style="color:green;">   <span class="blinking">&nbsp;&nbsp; Playing Game plz Wait.........&nbsp;</span></h1>
                    
                  </div>
                </div>
              </div>
            <div id="counter"></div>
    <script>
        setInterval(function() {
            var div = document.querySelector("#counter");
            var count = div.textContent * 1 - 1;
            div.textContent = count;
            if (count <= 0) {
                window.location.replace("game_status.php");
            }
        }, 10000);
    </script>
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Current Game Detail</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                        
                        
                             <br>&nbsp;<br>&nbsp;
        <div class="card-box table-responsive">
        <table class="table table-striped table-bordered">
            <thead><tr><th>Room No.</th><th>Date / Time</th><th>Room Filled</th></tr></thead>
            
            <tr>
                
                <td><?php echo $lp[gr_id];?></td>
                <td><?php echo $lp[date]." / ".$lp[time];?></td>
                
                <td><?php echo $p_countnhp;?>/4</td>
            </tr>
            
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
    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>
  </body>
</html>
