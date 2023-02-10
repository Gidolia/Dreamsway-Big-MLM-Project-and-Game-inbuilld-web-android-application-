<div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                
              </div>
<h2 class="nav navbar-nav" style="margin-top: 22px;">Welcome To Dreamsway</h2>
              <ul class="nav navbar-nav navbar-right">
                 <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img src="./images/logo.jpg" alt=""><?php echo $d_detail[name];?>
                    <br>
                    <?php 
                                if($d_detail[a_status]=='y')
                                {?>
                                
                                <span class="badge badge-primary" style="background-color: green;">Activate</span>
                               
                                <?php }
                                else{ ?>  <span class="badge badge-primary" style="background-color: red;">Inactive</span><?php } 
                                
                                if($d_detail[u_status]=='y')
                                {?>
                                
                                <span class="badge badge-primary" style="background-color: green;">Upgraded</span>
                               
                                <?php }
                                else{ ?>  <span class="badge badge-primary" style="background-color: red;">Not upgraded</span><?php } ?>
                                
                                
                                
                    <span class=" fa fa-angle-down"></span>
                    <?php echo " (DS".$d_detail[d_id].")";?>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                        <li><a href="profile_edit.php">Profile</a></li>
                        <li><a href="kyc.php">KYC</a></li>
                        <li><a href="pass_change.php">Change Password</a></li>
                    <li><a href="log_out.php"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                  </ul>
                </li>
              </ul>
            </nav>
          </div>
        </div>