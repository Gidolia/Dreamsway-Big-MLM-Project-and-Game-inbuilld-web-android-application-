<div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            
            <div class="navbar nav_title" style="border: 0;">
              <a href="index.php" class="site_title"><img src="symbol.png" height="50px" width="50px"> <span>DREAMSWAY SURE</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="./images/log1.jpg" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <h2><?php echo $d_detail[name];?></h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                  <li><a href="index.php"><i class="fa fa-home"></i> Dashboard </a></li>
                  <li><a><i class="fa fa-sitemap"></i> Team<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="my_network_tree_view.php">Tree</a></li>
                        <li><a href="downline_list.php">Downline</a></li>
                        <li><a href="level.php">Team Level</a></li>
                    </ul>
                  </li>
                  
                  <li><a><i class="fa fa-mobile"></i> Recharge <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="mobile_recharge.php"> Mobile Recharge</a></li>
                       
                    </ul>
                    </li>
                  
                  <li><a><i class="fa fa-child"></i>Activate New ID<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="activate_id_pin.php">Activate Pin 1180</a></li>
                        <li><a href="activate_id_pin2500.php">Activate Pin 2500</a></li>
                        <li><a href="activate_id_pin3600.php">Activate Pin 3600</a></li>
                    </ul>
                  </li>
                  <li><a href="game.php"><i class="fa fa-gamepad"></i> Play Game </a></li>
                  <li><a href="game_generate_coin.php"><i class="fa fa-gamepad"></i> Buy Playing Coin </a></li>
                  
                  
                  <li><a><i class="fa fa-bank"></i>PIN Desk<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="pin_generate.php">Pin Generate</a></li>
                        <li><a href="transfer_pin.php">Transfer Pin</a></li>
                        <li><a href="pin_ledger.php">PIN Ledger View</a></li>
                    </ul>
                  </li>
                  
                  <li><a><i class="fa fa-rupee"></i> Income <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="level_commission.php"> Level Income</a></li>
                       
                        <li><a href="auto_matrix_income_l.php"> Auto Matrix Income Level View</a></li>
                        <li><a href="global_income.php"> Global Income View</a></li>
                        <li><a href="recharge_income.php"> Ecommerce Income View</a></li>
                        <li><a href="self_recharge.php"> Self Recharge Cashback</a></li>
                        <li><a href="leadership_coin.php"> Leadership Income</a></li>
                        
                    </ul>
                    </li>
                  
                  
                 </ul>
              </div>
              
              
              
              
              <div class="menu_section">
                <h3>Corel Plan</h3>
                 <ul class="nav side-menu">
                    <li><a><i class="fa fa-sitemap"></i> Corel Team <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="bronze_club.php"> Club Tree</a></li>
                        
                    </ul>
                    </li>
                    <li><a><i class="fa fa-rupee"></i> Corel Income <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="club_income.php"> Club Income</a></li>
                        <li><a href="club_sponser_income.php"> Club Sponser Income</a></li>
                        <li><a href="#"> Rewards</a></li>
                        <li><a href="upgrade_automatrix_income.php"> Upgrade Auto Matrix Income</a></li>
                        <li><a>R & R Income<span class="fa fa-chevron-down"></span></a>
                          <ul class="nav child_menu">
                            <li class="sub_menu"><a href="team_development_fund.php">Team Development Fund</a>
                            </li>
                            <li><a href="#">Leadership Fund</a>
                            </li>
                            <li><a href="#">Achievement Fund</a>
                            </li>
                          </ul>
                        </li>
                        
                    </ul>
                    </li>
<li><a><i class="fa fa-bank"></i>UPIN Desk<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="activate_id_u_pin.php">Upgrade ID</a></li>
                        <li><a href="upin_generate.php">Upgrade Pin Generate</a></li>
                        <li><a href="upin_transfer.php">Transfer UPin</a></li>
                        <li><a href="u_pin_ledger.php">UPIN Ledger View</a></li>
                    </ul>
                  </li>
                  </ul>
              </div>
              
              
              <div class="menu_section">
                <h3>Basic Functions</h3>
                 <ul class="nav side-menu">
                     <li><a href="add_moneyd.php"><i class="fa fa-money"></i> Add Money</a></li>
                    <li><a><i class="fa fa-bank"></i>Income Wallet<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="transfer_iw_ww.php">Transfer To Withdrawal Wallet</a></li>
                        <li><a href="withdraw_wallet_ledger.php">Income Wallet Ledger View</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-bank"></i>Withdrawal Wallet<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="withdrawal_wallet_transfer.php">Withdrawal Wallet Transfer</a></li>
                        <li><a href="withdrawal_request_history.php">Withdrawal Request</a></li>
                        <li><a href="withdraw_wallet2_ledger.php">Withdrawal Wallet Ledger View</a></li>
                    </ul>
                  </li>
                  
        
                   <li><a><i class="fa fa-user"></i>My Profile<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="profile_edit.php">Update Profile</a></li>
                        
                        <li><a href="pass_change.php">Change Password</a></li>
                        <li><a href="kyc.php">KYC</a></li>
                    </ul>
                  </li>
                  </ul>
              </div>
              
              
            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              
              <a data-toggle="tooltip" data-placement="top" title="Logout" href="log_out.php">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>