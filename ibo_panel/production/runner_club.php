<?php include "config.php";
function for_finding_runner_12completed_id($rt_id)
{
    global $con,$date,$time;
    $fcd="SELECT * FROM `runner_tree` WHERE `rt_id`='$rt_id'";
    $que=$con->query($fcd);
    $tot=0;
    ////////////////////level 1 check 3 id
    $a=0;
    $sql="SELECT * FROM `runner_tree` WHERE `s_id`='$rt_id'";
    $quet=$con->query($sql);
    while($er=$quet->fetch_assoc())
    {
        $a++;
        $sql1="SELECT * FROM `runner_tree` WHERE `s_id`='$er[rt_id]'";
        $quet1=$con->query($sql1);
        while($er1=$quet1->fetch_assoc())
        {
            $a++;
        }
    }
    
        return $a;
    
}
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
    <title>Dreamsway || runner Club</title>

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
                <h3>Total ID (Runner Tree)</h3>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>runner Tree View</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li>Select Club :: 
                      </li>
                      <li><?php include "corel_team_view.php";?>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                      
                      <table class="table table-striped table-bordered">
            <thead><tr><th width="6%">Sr No.</th><th width="12%">ID Type</th><th>Date / Time</th><th>Status of 12 Team</th><th width="8%">View Tree</th></tr></thead>
                   <?php
                   $a=1;
                   $sr=1;
                   $sqlsdfdsfg="SELECT * FROM `runner_tree` WHERE `d_id`='$_SESSION[d_id]'";
                   $conss=$con->query($sqlsdfdsfg);
                   while($der=$conss->fetch_assoc())
                   {?>
                   <tr>
                       <td><?php
                       echo "<a href='runner_club_tree.php?rt_id=".$der[rt_id]."'>".$sr."</a>";?>
                       </td>
                       <?php
                       
                       if($der[rebirth_id]=="n"){
                          
                           $view="Club ID";
                       }
                       else{
                           
                           $view="Rebirth - ".$a;
                           $a++;
                       }?>
                       <td>
                           <?php 
                           echo $view;?>
                       </td>
                       <td>
                          <?php echo $der[e_date]." / ".$der[e_time];?>
                       </td>
                       <td class="project_progress">
                           <?php
                           $xxxc=for_finding_runner_12completed_id($der[rt_id]);
                           $scccm=$xxxc*100/12;
                           ?>
                <div class="progress progress_sm">
                  <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="<?php echo $scccm;?>"></div>
                </div>
                <small><?php echo number_format($scccm, 3, '.', '');?>% Complete, &nbsp; Total Team - <?php echo $xxxc;?>  </small></td>
                       <td>
                           <?php
                       echo "<a href='runner_club_tree.php?rt_id=".$der[rt_id]."'><button type='button' class='btn btn-success'>View Tree</button></a>";?>
                       </td>
                   </tr>
                   
                   <?php
                       //echo "<a href='runner_club_tree.php?rt_id=".$der[rt_id]."'>".$der[rt_id]."<br>";
                       $sr++;
                   }
                    
                    ?>
                    </table>
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
