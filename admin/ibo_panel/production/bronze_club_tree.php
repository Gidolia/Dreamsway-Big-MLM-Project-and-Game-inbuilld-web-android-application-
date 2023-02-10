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
    <title>Dreamsway || Tree View</title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">

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
                <h3>Bronze tree</h3>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Bronze tree</h2>
                    
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                      <ul>
                          <li><i class="fa fa-user fa-2x blue"></i> ID</li>
                          <li><i class="fa fa-user fa-2x red"></i> Rebirth ID</li>
                          <li><i class="fa fa-user fa-2x"></i> Blank ID</li>
                      </ul>
                      
    <table class="table table-bordered">
        <?php 
        $bt_id=$_GET[bt_id];
        $sql="SELECT * FROM `bronze_tree` WHERE `bt_id`='$bt_id'";
        $que=$con->query($sql);
        $fet=$que->fetch_assoc();
        //////////////level 1
        $temp=array();
        $tempw=array();
        $sql1="SELECT * FROM `bronze_tree` WHERE `s_id`='$fet[bt_id]'";
        $que1=$con->query($sql1);
        while($fet1=$que1->fetch_assoc())
        {
            $temp[]=$fet1[bt_id];
            $tempw[]=$fet1[d_id];
        }
        ////////////////
        $temp1=array();
        $tempw1=array();
        if(isset($temp[0]))
        {
         $sql11="SELECT * FROM `bronze_tree` WHERE `s_id`='$temp[0]'";
        $que11=$con->query($sql11);
        while($fet11=$que11->fetch_assoc())
        {
            $temp1[]=$fet11[bt_id];
            $tempw1[]=$fet11[d_id];
        }
        }
        ////////////////
        $temp2=array();
        $tempw2=array();
        if(isset($temp[1]))
        {
         $sql12="SELECT * FROM `bronze_tree` WHERE `s_id`='$temp[1]'";
        $que12=$con->query($sql12);
        while($fet12=$que12->fetch_assoc())
        {
            $temp2[]=$fet12[bt_id];
            $tempw2[]=$fet12[d_id];
        }
        }
        ////////////////
        $temp3=array();
        $tempw3=array();
        if(isset($temp[2]))
        {
             $sql13="SELECT * FROM `bronze_tree` WHERE `s_id`='$temp[2]'";
            $que13=$con->query($sql13);
            if($que13->num_rows>0){
            while($fet13=$que13->fetch_assoc())
            {
                $temp3[]=$fet13[bt_id];
                $tempw3[]=$fet13[d_id];
            }
        }
        }
        ?>
        <tr><td colspan="9" align="center">
            <?php if($que->num_rows>0)
            {?>
            <a href="bronze_club_tree.php?bt_id=<?php echo $fet[bt_id];?>">
            <?php 
            $clcm="SELECT * FROM `bronze_tree` WHERE `bt_id`='$fet[bt_id]'";
            $sq=$con->query($clcm);
            $xnm=$sq->fetch_assoc();
           if($xnm[rebirth_id]=='y'){
            ?><i class="fa fa-user fa-4x red"></i>
            <?php }else{?>
            
            <i class="fa fa-user fa-4x blue"></i><?php }?>
         <div class="media-body">
             <?php
             $der="SELECT * FROM `distributor` WHERE `d_id`='$fet[d_id]'";
             $fdc=$con->query($der);
             $cnm=$fdc->fetch_assoc();
            ?>
          <a class="title" href="#"><?php echo $cnm[name]." (DS".$fet[d_id].")";?></a>
          <p><strong><?php echo $fet[bt_id];?> </strong> Bronze Club Number</p>
         </div></a>
         <?php }else{ ?>
         <i class="fa fa-user fa-4x"></i>
         <?php }?>
         </td></tr>
        
        <tr>
            
            <td colspan="3" align="center">
                <?php if(isset($temp[0]))
            {?>
            <a href="bronze_club_tree.php?bt_id=<?php echo $temp[0];?>">
                
            <?php 
            $clcm="SELECT * FROM `bronze_tree` WHERE `bt_id`='$temp[0]'";
            $sq=$con->query($clcm);
            $xnm=$sq->fetch_assoc();
           if($xnm[rebirth_id]=='y'){
            ?><i class="fa fa-user fa-4x red"></i>
            <?php }else{?>
            
            <i class="fa fa-user fa-4x blue"></i><?php }?>
         <div class="media-body">
             <?php
             $der="SELECT * FROM `distributor` WHERE `d_id`='$tempw[0]'";
             $fdc=$con->query($der);
             $cnm=$fdc->fetch_assoc();
            ?>
          <a class="title" href="#"><?php echo $cnm[name]." (DS".$tempw[0].")";?></a>
          <p><strong><?php echo $temp[0];?> </strong> Bronze Club Number</p>
         </div></a>
         <?php }else{ ?>
         <i class="fa fa-user fa-4x"></i>
         <?php }?>
            </td>
            
            
            <td colspan="3" align="center"><?php if(isset($temp[1]))
            {?>
            <a href="bronze_club_tree.php?bt_id=<?php echo $temp[1];?>">
                
            <?php 
            $clcm="SELECT * FROM `bronze_tree` WHERE `bt_id`='$temp[1]'";
            $sq=$con->query($clcm);
            $xnm=$sq->fetch_assoc();
           if($xnm[rebirth_id]=='y'){
            ?><i class="fa fa-user fa-4x red"></i>
            <?php }else{?>
            
            <i class="fa fa-user fa-4x blue"></i><?php }?>
         <div class="media-body">
             <?php
             $der="SELECT * FROM `distributor` WHERE `d_id`='$tempw[1]'";
             $fdc=$con->query($der);
             $cnm=$fdc->fetch_assoc();
            ?>
          <a class="title" href="#"><?php echo $cnm[name]." (DS".$tempw[1].")";?></a>
          <p><strong><?php echo $temp[1];?> </strong> Bronze Club Number</p>
         </div></a>
         <?php }else{ ?>
         <i class="fa fa-user fa-4x"></i>
         <?php }?></td>
         
         
            <td colspan="3" align="center">
                <?php if(isset($temp[2]))
            {?>
            <a href="bronze_club_tree.php?bt_id=<?php echo $temp[2];?>">
                
            <?php 
            $clcm="SELECT * FROM `bronze_tree` WHERE `bt_id`='$temp[2]'";
            $sq=$con->query($clcm);
            $xnm=$sq->fetch_assoc();
           if($xnm[rebirth_id]=='y'){
            ?><i class="fa fa-user fa-4x red"></i>
            <?php }else{?>
            
            <i class="fa fa-user fa-4x blue"></i><?php }?>
         <div class="media-body">
             <?php
             $der="SELECT * FROM `distributor` WHERE `d_id`='$tempw[2]'";
             $fdc=$con->query($der);
             $cnm=$fdc->fetch_assoc();
            ?>
          <a class="title" href="#"><?php echo $cnm[name]." (DS".$tempw[2].")";?></a>
          <p><strong><?php echo $temp[2];?> </strong> Bronze Club Number</p>
         </div></a>
         <?php }else{ ?>
         <i class="fa fa-user fa-4x"></i>
         <?php }?>
            </td>
        </tr>
        
        <tr>
            <td align="center">
                    <?php if(isset($temp1[0]))
                    {?>
                    <a href="bronze_club_tree.php?bt_id=<?php echo $temp1[0];?>">
                        
                    <?php 
                    $clcm="SELECT * FROM `bronze_tree` WHERE `bt_id`='$temp1[0]'";
                    $sq=$con->query($clcm);
                    $xnm=$sq->fetch_assoc();
                   if($xnm[rebirth_id]=='y'){
                    ?><i class="fa fa-user fa-4x red"></i>
                    <?php }else{?>
                    
                    <i class="fa fa-user fa-4x blue"></i><?php }?>
                 <div class="media-body">
                     <?php
                     $der="SELECT * FROM `distributor` WHERE `d_id`='$tempw1[0]'";
                     $fdc=$con->query($der);
                     $cnm=$fdc->fetch_assoc();
                    ?>
                  <a class="title" href="#"><?php echo $cnm[name]." (DS".$tempw1[0].")";?></a>
                  <p><strong><?php echo $temp1[0];?> </strong> Bronze Club Number</p>
                 </div></a>
                 <?php }else{ ?>
                 <i class="fa fa-user fa-4x"></i>
                 <?php }?>
            </td>
            <td align="center">
                    <?php if(isset($temp1[1]))
                    {?>
                    <a href="bronze_club_tree.php?bt_id=<?php echo $temp1[1];?>">
                        
                    <?php 
                    $clcm="SELECT * FROM `bronze_tree` WHERE `bt_id`='$temp1[1]'";
                    $sq=$con->query($clcm);
                    $xnm=$sq->fetch_assoc();
                   if($xnm[rebirth_id]=='y'){
                    ?><i class="fa fa-user fa-4x red"></i>
                    <?php }else{?>
                    
                    <i class="fa fa-user fa-4x blue"></i><?php }?>
                 <div class="media-body">
                     <?php
                     $der="SELECT * FROM `distributor` WHERE `d_id`='$tempw1[1]'";
                     $fdc=$con->query($der);
                     $cnm=$fdc->fetch_assoc();
                    ?>
                  <a class="title" href="#"><?php echo $cnm[name]." (DS".$tempw1[1].")";?></a>
                  <p><strong><?php echo $temp1[1];?> </strong> Bronze Club Number</p>
                 </div></a>
                 <?php }else{ ?>
                 <i class="fa fa-user fa-4x"></i>
                 <?php }?>
            </td>
            <td align="center">
                 <?php if(isset($temp1[2]))
                    {?>
                    <a href="bronze_club_tree.php?bt_id=<?php echo $temp1[2];?>">
                        
                    <?php 
                    $clcm="SELECT * FROM `bronze_tree` WHERE `bt_id`='$temp1[2]'";
                    $sq=$con->query($clcm);
                    $xnm=$sq->fetch_assoc();
                   if($xnm[rebirth_id]=='y'){
                    ?><i class="fa fa-user fa-4x red"></i>
                    <?php }else{?>
                    
                    <i class="fa fa-user fa-4x blue"></i><?php }?>
                 <div class="media-body">
                     <?php
                     $der="SELECT * FROM `distributor` WHERE `d_id`='$tempw1[2]'";
                     $fdc=$con->query($der);
                     $cnm=$fdc->fetch_assoc();
                    ?>
                  <a class="title" href="#"><?php echo $cnm[name]." (DS".$tempw1[2].")";?></a>
                  <p><strong><?php echo $temp1[2];?> </strong> Bronze Club Number</p>
                 </div></a>
                 <?php }else{ ?>
                 <i class="fa fa-user fa-4x"></i>
                 <?php }?>
            </td>
            <td align="center">
                     <?php if(isset($temp2[0]))
                    {?>
                    <a href="bronze_club_tree.php?bt_id=<?php echo $temp2[0];?>">
                        
                    <?php 
                    $clcm="SELECT * FROM `bronze_tree` WHERE `bt_id`='$temp2[0]'";
                    $sq=$con->query($clcm);
                    $xnm=$sq->fetch_assoc();
                   if($xnm[rebirth_id]=='y'){
                    ?><i class="fa fa-user fa-4x red"></i>
                    <?php }else{?>
                    
                    <i class="fa fa-user fa-4x blue"></i><?php }?>
                 <div class="media-body">
                     <?php
                     $der="SELECT * FROM `distributor` WHERE `d_id`='$tempw2[0]'";
                     $fdc=$con->query($der);
                     $cnm=$fdc->fetch_assoc();
                    ?>
                  <a class="title" href="#"><?php echo $cnm[name]." (DS".$tempw2[0].")";?></a>
                  <p><strong><?php echo $temp2[0];?> </strong> Bronze Club Number</p>
                 </div></a>
                 <?php }else{ ?>
                 <i class="fa fa-user fa-4x"></i>
                 <?php }?>
            </td>
            <td align="center">
                     <?php if(isset($temp2[1]))
                    {?>
                    <a href="bronze_club_tree.php?bt_id=<?php echo $temp2[1];?>">
                        
                    <?php 
                    $clcm="SELECT * FROM `bronze_tree` WHERE `bt_id`='$temp2[1]'";
                    $sq=$con->query($clcm);
                    $xnm=$sq->fetch_assoc();
                   if($xnm[rebirth_id]=='y'){
                    ?><i class="fa fa-user fa-4x red"></i>
                    <?php }else{?>
                    
                    <i class="fa fa-user fa-4x blue"></i><?php }?>
                 <div class="media-body">
                     <?php
                     $der="SELECT * FROM `distributor` WHERE `d_id`='$tempw2[1]'";
                     $fdc=$con->query($der);
                     $cnm=$fdc->fetch_assoc();
                    ?>
                  <a class="title" href="#"><?php echo $cnm[name]." (DS".$tempw2[1].")";?></a>
                  <p><strong><?php echo $temp2[1];?> </strong> Bronze Club Number</p>
                 </div></a>
                 <?php }else{ ?>
                 <i class="fa fa-user fa-4x"></i>
                 <?php }?>
            </td>
            <td align="center">
                     <?php if(isset($temp2[2]))
                    {?>
                    <a href="bronze_club_tree.php?bt_id=<?php echo $temp2[2];?>">
                        
                    <?php 
                    $clcm="SELECT * FROM `bronze_tree` WHERE `bt_id`='$temp2[2]'";
                    $sq=$con->query($clcm);
                    $xnm=$sq->fetch_assoc();
                   if($xnm[rebirth_id]=='y'){
                    ?><i class="fa fa-user fa-4x red"></i>
                    <?php }else{?>
                    
                    <i class="fa fa-user fa-4x blue"></i><?php }?>
                 <div class="media-body">
                     <?php
                     $der="SELECT * FROM `distributor` WHERE `d_id`='$tempw2[2]'";
                     $fdc=$con->query($der);
                     $cnm=$fdc->fetch_assoc();
                    ?>
                  <a class="title" href="#"><?php echo $cnm[name]." (DS".$tempw2[2].")";?></a>
                  <p><strong><?php echo $temp2[2];?> </strong> Bronze Club Number</p>
                 </div></a>
                 <?php }else{ ?>
                 <i class="fa fa-user fa-4x"></i>
                 <?php }?>
            </td>
            <td align="center">
                
                     <?php if(isset($temp3[0]))
                    {?>
                    <a href="bronze_club_tree.php?bt_id=<?php echo $temp3[0];?>">
                        
                    <?php 
                    $clcm="SELECT * FROM `bronze_tree` WHERE `bt_id`='$temp3[0]'";
                    $sq=$con->query($clcm);
                    $xnm=$sq->fetch_assoc();
                   if($xnm[rebirth_id]=='y'){
                    ?><i class="fa fa-user fa-4x red"></i>
                    <?php }else{?>
                    
                    <i class="fa fa-user fa-4x blue"></i><?php }?>
                 <div class="media-body">
                     <?php
                     $der="SELECT * FROM `distributor` WHERE `d_id`='$tempw3[0]'";
                     $fdc=$con->query($der);
                     $cnm=$fdc->fetch_assoc();
                    ?>
                  <a class="title" href="#"><?php echo $cnm[name]." (DS".$tempw3[0].")";?></a>
                  <p><strong><?php echo $temp3[0];?> </strong> Bronze Club Number</p>
                 </div></a>
                 <?php }else{ ?>
                 <i class="fa fa-user fa-4x"></i>
                 <?php }?>
            </td>
            <td align="center">
                     <?php if(isset($temp3[1]))
                    {?>
                    <a href="bronze_club_tree.php?bt_id=<?php echo $temp3[1];?>">
                        
                    <?php 
                    $clcm="SELECT * FROM `bronze_tree` WHERE `bt_id`='$temp3[1]'";
                    $sq=$con->query($clcm);
                    $xnm=$sq->fetch_assoc();
                   if($xnm[rebirth_id]=='y'){
                    ?><i class="fa fa-user fa-4x red"></i>
                    <?php }else{?>
                    
                    <i class="fa fa-user fa-4x blue"></i><?php }?>
                 <div class="media-body">
                     <?php
                     $der="SELECT * FROM `distributor` WHERE `d_id`='$tempw3[1]'";
                     $fdc=$con->query($der);
                     $cnm=$fdc->fetch_assoc();
                    ?>
                  <a class="title" href="#"><?php echo $cnm[name]." (DS".$tempw3[1].")";?></a>
                  <p><strong><?php echo $temp3[1];?> </strong> Bronze Club Number</p>
                 </div></a>
                 <?php }else{ ?>
                 <i class="fa fa-user fa-4x"></i>
                 <?php }?>
            </td>
            <td align="center">
                     <?php if(isset($temp3[2]))
                    {?>
                    <a href="bronze_club_tree.php?bt_id=<?php echo $temp3[2];?>">
                        
                    <?php 
                    $clcm="SELECT * FROM `bronze_tree` WHERE `bt_id`='$temp3[2]'";
                    $sq=$con->query($clcm);
                    $xnm=$sq->fetch_assoc();
                   if($xnm[rebirth_id]=='y'){
                    ?><i class="fa fa-user fa-4x red"></i>
                    <?php }else{?>
                    
                    <i class="fa fa-user fa-4x blue"></i><?php }?>
                 <div class="media-body">
                     <?php
                     $der="SELECT * FROM `distributor` WHERE `d_id`='$tempw3[2]'";
                     $fdc=$con->query($der);
                     $cnm=$fdc->fetch_assoc();
                    ?>
                  <a class="title" href="#"><?php echo $cnm[name]." (DS".$tempw3[2].")";?></a>
                  <p><strong><?php echo $temp3[2];?> </strong> Bronze Club Number</p>
                 </div></a>
                 <?php }else{ ?>
                 <i class="fa fa-user fa-4x"></i>
                 <?php }?>
            </td>
        </tr>
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
    
    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>
  </body>
</html>
