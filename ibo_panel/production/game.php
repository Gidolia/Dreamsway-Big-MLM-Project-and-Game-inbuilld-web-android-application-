<?php include "config.php";

function win_no($chars) 
{
  $data = '0123';
  return substr(str_shuffle($data), 0, $chars);
}

$dcbp="SELECT * FROM `game_rooms` WHERE `fill_status`='N'";
$mkl=$con->query($dcbp);
$cmlop=$mkl->fetch_assoc();
$xcxc=array();
$fvjk="SELECT * FROM `game_room_person` WHERE `gr_id`='$cmlop[gr_id]'";
$cdv=$con->query($fvjk);
$p_count=$cdv->num_rows;
while($vml=$cdv->fetch_assoc())
{
    $xcxc[]=$vml[grp_id];
}
if($p_count>3)
{
    
   /* $efnj=win_no(1);
    $mlkjno=$xcxc[$efnj];
    $fvjkw="SELECT * FROM `game_room_person` WHERE `grp_id`='$mlkjno'";
    $cdvw=$con->query($fvjkw);
    $vmlw=$cdvw->fetch_assoc();*/
    
    $lpo="UPDATE `game_rooms` SET `win_grp_id` = '$mlkjno' WHERE `game_rooms`.`gr_id` = '$cmlop[gr_id]';";
   // $ghp="UPDATE `game_rooms` SET `d_id` = '$vmlw[d_id]' WHERE `game_rooms`.`gr_id` = '$cmlop[gr_id]';";
    $bpoa="UPDATE `game_rooms` SET `c_date` = '$date' WHERE `game_rooms`.`gr_id` = '$cmlop[gr_id]';";
    $bpoat="UPDATE `game_rooms` SET `c_time` = '$time' WHERE `game_rooms`.`gr_id` = '$cmlop[gr_id]';";
    $dlgh="UPDATE `game_rooms` SET `fill_status` = 'Y' WHERE `game_rooms`.`gr_id` = '$cmlop[gr_id]';";
    
    $bn="INSERT INTO `game_rooms` (`gr_id`, `date`, `time`, `win_grp_id`, `d_id`, `c_date`, `c_time`, `fill_status`) VALUES (NULL, '$date', '$time', '', '', '', '', 'N');";
    /*$skl="SELECT * FROM `distributor` WHERE `d_id`='$vmlw[d_id]'";
    $dlprt=$con->query($skl);
    $tgh=$dlprt->fetch_assoc();
    $coin_bal_no=$tgh[ludo_wallet]+900;
    $sql_uph="UPDATE `distributor` SET `ludo_wallet` = '$coin_bal_no' WHERE `distributor`.`d_id` = '$tgh[d_id]';";
   // echo $sql_uph;
   $sql_ins="INSERT INTO `ludo_wallet_history` (`lwh_id`, `d_id`, `date`, `time`, `coin`, `a_coin`, `note`, `activated_d_id`, `level`, `type`) VALUES (NULL, '$tgh[d_id]', '$date', '$time', '900', '$coin_bal_no', 'Win Game Income', '', '', '+');";
    //$sql_ins="INSERT INTO `ludo_coin_history` (`lch_id`, `d_id`, `coin`, `type`, `a_coin`, `date`, `time`, `note`, `activated_id`) VALUES (NULL, '$tgh[d_id]', '900', '+', '$coin_bal_no', '$date', '$time', 'Win Game Income', '');";*/
    if($con->query($lpo)==TRUE && $con->query($bpoa)==TRUE && $con->query($bpoat)==TRUE && $con->query($dlgh)==TRUE && $con->query($bn)==TRUE)
    {
        echo "<script>location.href='game.php';</script>";
    }
    else{
        echo "<script>location.href='game.php';</script>";
    }
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

   <script>
    function validateForm() {
 	var sel_coin = document.forms["myForm"]["sel_coin"].value;

	if(sel_coin=="1")
	{
	    document.getElementById("coin_msg").innerHTML = " Please Select Coins ";
    return false;
	}
	
	  
}
   


</script> 
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
            
             <div class="row tile_count">
                <div class="animated flipInY col-lg-6 col-md-6 col-sm-6 col-xs-6">
                    <a href="ludo_coin_ledger.php"><div class="tile-stats">
                      <div class="icon"><i class="fa fa-coin"></i></div>
                      <div class="count"><i class="fa fa-circle"></i> <?php echo $d_detail[ludo_coin];?></div>
                      <h3>Playing Coin</h3>
                    </div></a>
                </div>
                <div class="animated flipInY col-lg-6 col-md-6 col-sm-6 col-xs-6">
                    <a href="redeem_coin.php"><div class="tile-stats">
                      <div class="icon"><i class="fa fa-coin"></i></div>
                      <div class="count"><i class="fa fa-circle"></i> <?php echo $d_detail[ludo_wallet];?></div>
                      <h3>Redeem Coin</h3>
                    </div></a>
                </div>
                <div class="animated flipInY col-lg-6 col-md-6 col-sm-6 col-xs-6">
                    <a href="win_game_status.php"><div class="tile-stats">
                      <div class="icon"><i class="fa fa-coin"></i></div>
                      <div class="count"><i class="fa fa-circle"></i> <?php
                    
        $gddd="SELECT * FROM `ludo_wallet_history` WHERE `d_id`='$_SESSION[d_id]' AND `note`='Win Game Income'";
        $dcbv=$con->query($gddd);
        $g_i=0;
        while($drftw=$dcbv->fetch_assoc())
            {$g_i=$g_i+$drftw[coin];
            }
            echo $g_i;
        ?></div>
                      <h3>Win Game</h3>
                    </div></a>
                </div>
                <div class="animated flipInY col-lg-6 col-md-6 col-sm-6 col-xs-6">
                    <a href="redeem_coin.php"><div class="tile-stats">
                      <div class="icon"><i class="fa fa-coin"></i></div>
                      <div class="count"><i class="fa fa-circle"></i> <?php
                    
        $gddd="SELECT * FROM `ludo_wallet_history` WHERE `d_id`='$_SESSION[d_id]' AND `note`='game play income'";
        $dcbv=$con->query($gddd);
        $g_i=0;
        while($drftw=$dcbv->fetch_assoc())
            {$g_i=$g_i+$drftw[coin];
            }
            echo $g_i;
        ?></div>
                      <h3>Team Game Income</h3>
                    </div></a>
                </div>
            </div>
            
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Game</h2>
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
                     <form action="#" class="form-horizontal form-label-left" method="post" name="myForm" onsubmit="return validateForm()">
                      
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-3">Current Coins </label>
                        <div class="col-md-9 col-sm-9 col-xs-9">
                          <input type="number" class="form-control" value="<?php echo $d_detail[ludo_coin];?>" readonly required>
                          <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                        </div>
                        
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-3">Playing Coin </label>
                        <div class="col-md-9 col-sm-9 col-xs-9">
                            <select class="form-control" name="sel_coin">
                                <option value="1"></option>
                                <option value="600">2000</option>
                            </select>
                          
                          <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                        </div>
                        <span id="coin_msg" style="color: red"></span>
                      </div>
                      <div class="form-group">
                        <div class="col-md-9 col-md-offset-3">
                            <button type="submit" class="btn btn-success" name="sub_play">Start Game <i class="fa fa-play-circle"></i></button>
                          
                        </div>
                      </div>
                     </form>          
                    <?php
                    if(isset($_POST[sub_play]))
                    {
                        $dcbpb="SELECT * FROM `game_rooms` WHERE `fill_status`='N'";
                        $mklb=$con->query($dcbpb);
                        $cmlopb=$mklb->fetch_assoc();
                        $coin_bal=$d_detail[ludo_coin]-2000;
                        if($coin_bal>=0)
                        {
    $sql_uph1="UPDATE `distributor` SET `ludo_coin` = '$coin_bal' WHERE `distributor`.`d_id` = '$_SESSION[d_id]';";
    
    $sql_ins1="INSERT INTO `ludo_coin_history` (`lch_id`, `d_id`, `coin`, `type`, `a_coin`, `date`, `time`, `note`, `activated_id`) VALUES (NULL, '$_SESSION[d_id]', '2000', '-', '$coin_bal', '$date', '$time', 'Game Played', '');";
    
///////////////////////for finding winning no

$fvjk="SELECT * FROM `game_room_person` WHERE `gr_id`='$cmlopb[gr_id]'";
$cdv=$con->query($fvjk);
$p_count=$cdv->num_rows;
if($p_count==0){
    $win_no=1;
    $win_coin=3000;
}
elseif($p_count==1){
    $win_no=4;
    $win_coin=800;
}
elseif($p_count==2){
    $win_no=3;
    $win_coin=1000;
}
elseif($p_count==3){
    $win_no=2;
    
    $win_coin=1500;
}
    
                        //$sql="INSERT INTO `game_room_person` (`grp_id`, `d_id`, `date`, `time`, `played_coin`, `win_status`, `coin_credited`, `gr_id`) VALUES (NULL, '$_SESSION[d_id]', '$date', '$time', '2000', '', '', '$cmlopb[gr_id]');";
                        $sql="INSERT INTO `game_room_person` (`grp_id`, `d_id`, `date`, `time`, `played_coin`, `win_status`, `coin_credited`, `gr_id`, `distribute_status`, `win_no`, `win_coin`) VALUES (NULL, '$_SESSION[d_id]', '$date', '$time', '2000', 'y', '$win_coin', '$cmlopb[gr_id]', 'y', '$win_no', '$win_coin');";
                        $a_coin=$d_detail[ludo_wallet]+$win_coin;
                        $sql_uphww="UPDATE `distributor` SET `ludo_wallet` = '$a_coin' WHERE `distributor`.`d_id` = '$_SESSION[d_id]';";
   
                        
                        $sql_insww="INSERT INTO `ludo_wallet_history` (`lwh_id`, `d_id`, `date`, `time`, `coin`, `a_coin`, `note`, `activated_d_id`, `level`, `type`, `win_rank`) VALUES (NULL, '$_SESSION[d_id]', '$date', '$time', '$win_coin', '$a_coin', 'Win Game Income', '', '', '+', '$win_no');";
                        
                        if($con->query($sql)===TRUE && $con->query($sql_uph1)===TRUE && $con->query($sql_ins1)===TRUE && $con->query($sql_uphww)===TRUE && $con->query($sql_insww)===TRUE){
                            echo "<script>alert('Success! Coin Inserted');location.href='game_play.php';</script>";
                        }
                        else{
                            echo "<script>alert('Fail! Please Try Again');location.href='game.php';</script>";
                        }
                        }else{
                            echo "<script>alert('Failed! You Dont Have Coin Balance');location.href='game.php';</script>";
                        }
                    }
                    
                    ?>
                    
                    
                  </div>
                </div>
              </div>
            </div>
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
            
                <div class="col-md-4 col-sm-10 col-xs-10">
                <div class="x_panel">
                  
                  <div class="x_content">
                        
                    <br>&nbsp;<br>    
            &nbsp;&nbsp; <img src="images/a42e2656-a8b1-4703-8bcc-444c805ce7b9.jpg" class="rotate center" width="170px" height="170px" />     
                  <br>&nbsp;<br>  
                    
                  </div>
                </div>
              </div>
            
              <div class="col-md-6 col-sm-12 col-xs-12">
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
                        <a href="game_income.php" class="btn btn-success">Game Income</a>
                        <a href="win_game_status.php" class="btn btn-success">Win Game Income</a>
                        <a href="game_ledger_view.php" class="btn btn-success">Coin Ledger View</a>
                        
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
            <div class="row">
                
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Game Room History</h2>
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
                        
                        
                             
        <div class="card-box table-responsive">
        <table class="table table-striped table-bordered" id="datatable">
            <thead><tr><th>Room No.</th><th>Date / Time</th><th>Fill Status</th><th>Win ID</th><th>Room Filled</th></tr></thead>
            <?php
            $dcbpbio="SELECT * FROM `game_rooms` ORDER BY `game_rooms`.`gr_id` DESC";
            $scsc=$con->query($dcbpbio);
            while($l=$scsc->fetch_assoc())
            {
                $fvjknh="SELECT * FROM `game_room_person` WHERE `gr_id`='$l[gr_id]'";
                $cdvnh=$con->query($fvjknh);
                $p_countnh=$cdvnh->num_rows;
                
            ?>
            <tr>
                
                <td><?php echo $l[gr_id];?></td>
                <td><?php echo $l[date]." / ".$l[time];?></td>
                <td><?php echo $l[fill_status];?></td>
                <td><?php echo $l[d_id];?></td>
                <td><?php echo $p_countnh;?>/4</td>
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
