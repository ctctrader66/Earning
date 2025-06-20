<?php 
   ob_start();
   session_start();
   
   if($_SESSION['userid']=="")
   {
   	header("location:index.php?msg1=notauthorized");
   	exit();
   }
   	
   	?>
<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <title>Adminsuit | Dashboard</title>
      <!-- Tell the browser to be responsive to screen width -->
      <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
      <!-- Bootstrap 3.3.6 -->
      <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
      <!-- Font Awesome -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
      <!-- Ionicons -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
      <!-- Theme style -->
      <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
      <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
      <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
      <!-- iCheck -->
      <link rel="stylesheet" href="plugins/iCheck/flat/blue.css">
      <!-- Morris chart -->
      <link rel="stylesheet" href="plugins/morris/morris.css">
      <!-- jvectormap -->
      <link rel="stylesheet" href="plugins/jvectormap/jquery-jvectormap-1.2.2.css">
      <!-- Date Picker -->
      <link rel="stylesheet" href="plugins/datepicker/datepicker3.css">
      <!-- Daterange picker -->
      <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker-bs3.css">
      <!-- bootstrap wysihtml5 - text editor -->
      <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
      <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
      <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
      <![endif]-->
   </head>
   <body class="hold-transition skin-yellow-light sidebar-mini">
      <div class="wrapper">
         <?php include ("include/connection.php");?>
         <?php include ("include/header.inc.php");?>
         <!-- Left side column. contains the logo and sidebar -->
         <?php include ("include/navigation.inc.php");
            function counter($table){
            $rs=mysql_query("select count(*) from `$table`");
            $row = mysql_fetch_row($rs);
            return $row["0"];
            } 
            
             ?> 
         <?php		  
            $Level1q = mysqli_query($con , "SELECT * FROM `tbl_user` ");
              $rowcount = mysqli_num_rows( $Level1q );
              $today=date('Y-m-d');
               $total_balance_trx = mysqli_fetch_assoc(mysqli_query($con,"SELECT sum(amount) as total FROM `tbl_wallet`"));
            $total_balance_usdt  = mysqli_fetch_assoc(mysqli_query($con,"SELECT sum(amountusdt) as total FROM `tbl_wallet`"));
              
                $withdrawal = mysqli_query($con , "SELECT * FROM `tbl_withdrawal` where status = 0 ");
              $withdrawalshow = mysqli_num_rows( $withdrawal );
              
              $today_recharge_trx = mysqli_fetch_assoc(mysqli_query($con,"SELECT sum(actual_pay) as total FROM `nowpayment` WHERE `payment_status` = 'finished' AND `price_currency` = 'trx' AND `date` ='".$today."' "));
           $today_recharge_usdt = mysqli_fetch_assoc(mysqli_query($con,"SELECT sum(actual_pay) as total FROM `nowpayment` WHERE `payment_status` = 'finished' AND `price_currency` = 'usdttrc20'  AND `date` ='".$today."'"));
           
              
              $total_recharge_trx = mysqli_fetch_assoc(mysqli_query($con,"SELECT sum(actual_pay) as total FROM `nowpayment` WHERE `payment_status` = 'finished' AND `price_currency` = 'trx'  "));
           $total_recharge_usdt = mysqli_fetch_assoc(mysqli_query($con,"SELECT sum(actual_pay) as total FROM `nowpayment` WHERE `payment_status` = 'finished' AND `price_currency` = 'usdttrc20'  "));
           
           $total_recharge_trx_count = mysqli_fetch_assoc(mysqli_query($con,"SELECT count(id) as total FROM `nowpayment` WHERE `payment_status` = 'finished' AND `price_currency` = 'trx'  "));
           $total_recharge_usdt_count = mysqli_fetch_assoc(mysqli_query($con,"SELECT count(id) as total FROM `nowpayment` WHERE `payment_status` = 'finished' AND `price_currency` = 'usdttrc20'  "));
           
           
           $pending_recharge_trx = mysqli_fetch_assoc(mysqli_query($con,"SELECT sum(pay_amount) as total FROM `nowpayment` WHERE `payment_status` = 'waiting' AND `price_currency` = 'trx'  "));
           $pending_recharge_usdt = mysqli_fetch_assoc(mysqli_query($con,"SELECT sum(pay_amount) as total FROM `nowpayment` WHERE `payment_status` = 'waiting' AND `price_currency` = 'usdttrc20'  "));
           
          
          $total_withdraw_trx = mysqli_fetch_assoc(mysqli_query($con,"SELECT sum(amount) as total FROM `tbl_withdrawal` WHERE status = 0 AND payout = 'trx' "));
          
         $total_withdraw_usdt = mysqli_fetch_assoc(mysqli_query($con, "SELECT SUM(amount) as total FROM tbl_withdrawal WHERE status = 0 AND payout = 'usdt' "));
         
         $total_withdraw_trx_count = mysqli_fetch_assoc(mysqli_query($con,"SELECT count(id) as total FROM `tbl_withdrawal` WHERE status = 0 AND payout = 'trx' "));
          
         $total_withdraw_usdt_count = mysqli_fetch_assoc(mysqli_query($con, "SELECT count(id) as total FROM tbl_withdrawal WHERE status = 0 AND payout = 'usdt' "));
         
         
          $today_withdraw_trx = mysqli_fetch_assoc(mysqli_query($con,"SELECT count(id) as total FROM `tbl_withdrawal` WHERE status = 0 AND payout = 'trx' AND `date` ='".$today."' "));
          
         $today_withdraw_usdt =  mysqli_fetch_assoc(mysqli_query($con,"SELECT count(id) as total FROM `tbl_withdrawal` WHERE status = 0 AND payout = 'usdt' AND `date` ='".$today."' "));

          
           $pending_withdraw_trx = mysqli_fetch_assoc(mysqli_query($con,"SELECT sum(amount) as total FROM `tbl_withdrawal` WHERE status = 1 AND payout = 'trx' "));
          
         $pending_withdraw_usdt = mysqli_fetch_assoc(mysqli_query($con, "SELECT SUM(amount) as total FROM tbl_withdrawal WHERE status = 1 AND payout = 'usdt' "));
         
           $total_bonus = mysqli_fetch_assoc(mysqli_query($con,"SELECT sum(amount) as total FROM `tbl_bonus` where amount > 0 AND userid = '".$userid."'"));
           
           $total_bonusw = mysqli_fetch_assoc(mysqli_query($con,"SELECT sum(amount) as total FROM `tbl_bonuswithdrawal` where amount > 0 AND userid = '".$userid."'"));
            
            $total_reward_trx = mysqli_fetch_assoc(mysqli_query($con,"SELECT sum(amount) as total FROM `tbl_reward` where userid = '".$userid."'"));
            
            $total_reward_usdt = mysqli_fetch_assoc(mysqli_query($con,"SELECT sum(amountusdt) as total FROM `tbl_reward` where userid = '".$userid."'"));
             
             
               $total_bet_trx = mysqli_fetch_assoc(mysqli_query($con,"SELECT SUM(amount) as total FROM tbl_userresult WHERE curr = 'trx' AND date(`createdate`)='".$today."'"));
           
            $total_bet_usdt = mysqli_fetch_assoc(mysqli_query($con,"SELECT sum(amount) as total FROM `tbl_userresult` where  curr = 'usdt' AND date(`createdate`)='".$today."'"));
            
              $total_betwin_trx = mysqli_fetch_assoc(mysqli_query($con,"SELECT SUM(amount) as total FROM tbl_userresult WHERE curr = 'trx' AND status ='success' AND date(`createdate`)='".$today."'"));
           
            $total_betwin_usdt = mysqli_fetch_assoc(mysqli_query($con,"SELECT sum(amount) as total FROM `tbl_userresult` where  curr = 'usdt' AND status ='success' AND date(`createdate`)='".$today."'"));
             
              
               ?>
         <!-- Content Wrapper. Contains page content -->
         <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
               <h1>
                  Dashboard
                  <small>Control panel</small>
               </h1>
               <ol class="breadcrumb">
                  <li><a href="statics.php"><i class="fa fa-dashboard"></i> Home</a></li>
                  <li class="active">Dashboard</li>
               </ol>
            </section>
            <section  class="content">
               <div  class="container">
                  <!-- Small boxes (Stat box) -->
                  <div class="row">
                     <div style="background-color: #D68A10; color: white; padding: 20px; margin: 10px;" class="dashboard_box blue_bg col-md-3 border-radius">
                        <div class="title">
                           <p class="text-title" style="text-align:left">Today User Join</p>
                           <h4 class="text-amount" style="text-align:left"><?php
                              $result = mysqli_query($con,"SELECT count(*) as 'total_user' FROM tbl_user where status = 1 AND DATE(createdate) = CURDATE();");
                              ?>
                              <?php
                                 if (mysqli_num_rows($result) > 0) {
                                   $row = mysqli_fetch_array($result);
                                 
                                   $total_user = $row["total_user"];
                                               echo "$total_user";                  
                                                     
                                 }
                                 
                                 else 
                                 {
                                   echo "0";
                                 }
                                 ?>
                           </h4>
                        </div>
                     </div>
                     <div style="background-color: #D68A10; color: white; padding: 20px; margin: 10px;" class="dashboard_box blue_bg col-md-3 border-radius">
                        <div class="title">
                           <p class="text-title" style="text-align:left">Today's Recharge</p>
                         <h4>TRX: <?= round($today_recharge_trx["total"],2);?> | USDT: <?= round($today_recharge_usdt["total"],2);?> </h4>
                        </div>
                     </div>
                     <div style="background-color: #D68A10; color: white; padding: 20px; margin: 10px;" class="dashboard_box blue_bg col-md-3 border-radius">
                        <div class="title">
                           <p class="text-title" style="text-align:left">Today's Withdrawal</p>
                            <h4>TRX: <?= round($today_withdraw_trx["total"],2);?> | USDT: <?= round($today_withdraw_usdt["total"],2);?> </h4>
                        </div>
                     </div>
                     <div style="background-color: #D68A10; color: white; padding: 20px; margin: 10px;" class="dashboard_box blue_bg col-md-3 border-radius">
                        <div class="title">
                           <p class="text-title" style="text-align:left">User Balance</p>
                          <h4>TRX: <?= round($total_balance_trx["total"],2);?> | USDT: <?= round($total_balance_usdt["total"],2);?> </h4>
                        </div>
                        <a href="manage_user.php">
                           <div class="panel-footer">
                              <span class="pull-left">See in Detail</span>
                              <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                              <div class="clearfix"></div>
                           </div>
                        </a>
                     </div>
                     
                     <div style="background-color: #D68A10; color: white; padding: 20px; margin: 10px;" class="dashboard_box blue_bg col-md-3 border-radius">
                        <div class="title">
                           <p class="text-title" style="text-align:left">Total User</p>
                           <h4 class="text-amount" style="text-align:left"><?php
                              $result = mysqli_query($con,"SELECT count(*) as 'total_user' FROM tbl_user where status = 1");
                              ?>
                              <?php
                                 if (mysqli_num_rows($result) > 0) {
                                   $row = mysqli_fetch_array($result);
                                 
                                   $total_user = $row["total_user"];
                                               echo "$total_user";                  
                                                     
                                 }
                                 
                                 else 
                                 {
                                   echo "0";
                                 }
                                 ?>
                           </h4>
                        </div>
                        <a href="manage_user.php">
                           <div class="panel-footer">
                              <span class="pull-left">See in Detail</span>
                              <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                              <div class="clearfix"></div>
                           </div>
                        </a>
                     </div>
                     <div style="background-color: #D68A10; color: white; padding: 20px; margin: 10px;" class="dashboard_box blue_bg col-md-3 border-radius">
                        <div class="title">
                           <p class="text-title" style="text-align:left">Pending Recharges</p>
                           <h4>TRX: <?= round($pending_recharge_trx["total"],2);?> | USDT: <?= round($pending_recharge_usdt["total"],2);?> </h4>
                        </div>
                        <a href="manage_recharge.php">
                           <div class="panel-footer">
                              <span class="pull-left">See in Detail</span>
                              <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                              <div class="clearfix"></div>
                           </div>
                        </a>
                     </div>
                     <div style="background-color: #D68A10; color: white; padding: 20px; margin: 10px;" class="dashboard_box blue_bg col-md-3 border-radius">
                        <div class="title">
                           <p class="text-title" style="text-align:left">Success Recharge</p>
                           <h4>TRX: <?= round($total_recharge_trx["total"],2);?> | USDT: <?= round($total_recharge_usdt["total"],2);?> </h4>
                        </div>
                        <a href="approve_recharge.php">
                           <div class="panel-footer">
                              <span class="pull-left">See in Detail</span>
                              <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                              <div class="clearfix"></div>
                           </div>
                        </a>
                     </div>
                     <div style="background-color: #D68A10; color: white; padding: 20px; margin: 10px;" class="dashboard_box blue_bg col-md-3 border-radius">
                        <div class="title">
                           <p class="text-title" style="text-align:left">TOTAL WITHDRAWAL</p>
                            <h4>TRX: <?= round($total_withdraw_trx["total"],2);?> | USDT: <?= round($total_withdraw_usdt["total"],2);?> </h4>
                        </div>
                        <a href="manage_withdrawAccept.php">
                           <div class="panel-footer">
                              <span class="pull-left">See in Detail</span>
                              <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                              <div class="clearfix"></div>
                           </div>
                        </a>
                     </div>
                     <div style="background-color: #D68A10; color: white; padding: 20px; margin: 10px;" class="dashboard_box blue_bg col-md-3 border-radius">
                        <div class="title">
                           <p class="text-title" style="text-align:left">Withdrawal Requests</p>
                            <h4>TRX: <?= round($pending_withdraw_trx["total"],2);?> | USDT: <?= round($pending_withdraw_usdt["total"],2);?> </h4>
                        </div>
                        <a href="manage_withdraw.php">
                           <div class="panel-footer">
                              <span class="pull-left">See in Detail</span>
                              <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                              <div class="clearfix"></div>
                           </div>
                        </a>
                     </div>
                     <!-- ./col -->
                     <div style="background-color: #D68A10; color: white; padding: 20px; margin: 10px;" class="dashboard_box blue_bg col-md-3 border-radius">
                        <div class="title">
                           <p class="text-title" style="text-align:left">Website Mode</p>
                           <div style="padding-bottom: 10px;" class="huge">
                              <?php
                                 $chkswitchQuery=mysqli_query($con,"select * from `tbl_gamesettings` where `id`='1'");
                                 $role=mysqli_fetch_array($chkswitchQuery);
                                 
                                 ?>
                              <?php if($role['settingtype']=='high'){echo"High Profit";}else{echo"Low Profit";}?>
                           </div>
                        </div>
                        <a href="manage_gamewinnersetting.php">
                           <div class="panel-footer">
                              <span class="pull-left">See in Detail</span>
                              <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                              <div class="clearfix"></div>
                           </div>
                        </a>
                     </div>
                     <div style="background-color: #D68A10; color: white; padding: 20px; margin: 10px;" class="dashboard_box blue_bg col-md-3 border-radius">
                        <div class="title">
                           <p class="text-title" style="text-align:left">VIP USER</p>
                           <h4 class="text-amount" style="text-align:left" id="balance">0</h4>
                        </div>
                        <a href="filter_user.php">
                           <div class="panel-footer">
                              <span class="pull-left">10 trx plous deposit</span>
                              <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                              <div class="clearfix"></div>
                           </div>
                        </a>
                     </div>
                     <div style="background-color: #D68A10; color: white; padding: 20px; margin: 10px;" class="dashboard_box blue_bg col-md-3 border-radius">
                        <div class="title">
                           <p class="text-title" style="text-align:left">Pending Complaints</p>
                           <h4 class="text-amount" style="text-align:left">
                              <?php
                                 $sql = "SELECT * from `tbl_complaints` where `status`='1'";
                                 if ($complaint = mysqli_query($con, $sql)) {
                                 $rowcount1 = mysqli_num_rows( $complaint );
                                 printf(" %d\n",$rowcount1);
                                 };
                                 ?>
                           </h4>
                        </div>
                        <a href="complaints.php">
                           <div class="panel-footer">
                              <span class="pull-left">See in Detail</span>
                              <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                              <div class="clearfix"></div>
                           </div>
                        </a>
                     </div>
                    
                  </div>
               </div>
            </section>
            <!-- ./col -->
            <section  class="content">
               <div style="margin-top: -28px;" class="container">
                  <!-- Small boxes (Stat box) -->
                  <div class="row">
                     <div style="background-color: #D68A10; color: white; padding: 20px; margin: 10px;" class="dashboard_box blue_bg col-md-3 border-radius">
                        <div class="title">
                           <p class="text-title" style="text-align:left">No. of Deposits</p>
                          <h4>TRX: <?= round($total_recharge_trx_count["total"],2);?> | USDT: <?= round($total_recharge_usdt_count["total"],2);?> </h4>
                        </div>
                     </div>
                     <div style="background-color: #D68A10; color: white; padding: 20px; margin: 10px;" class="dashboard_box blue_bg col-md-3 border-radius">
                        <div class="title">
                           <p class="text-title" style="text-align:left">No. of Withdrawal</p>
                             <h4>TRX: <?= round($total_withdraw_trx_count["total"],2);?> | USDT: <?= round($total_withdraw_usdt_count["total"],2);?> </h4>
                        </div>
                     </div>
                     <div style="background-color: #D68A10; color: white; padding: 20px; margin: 10px;" class="dashboard_box blue_bg col-md-3 border-radius">
                        <div class="title">
                           <p class="text-title" style="text-align:left">Total Envelope Collect</p>
                           <h4>TRX <?php
                              $result = mysqli_query($con,"SELECT  sum(amt) as 'pending' FROM lifafa_his");
                              ?>
                              <?php
                                 if (mysqli_num_rows($result) > 0) {
                                   $row = mysqli_fetch_array($result);
                                 
                                   $pending = $row["pending"];
                                               echo number_format($pending,0);                
                                                     
                                 }
                                 
                                 else 
                                 {
                                   echo "0";
                                 }
                                 ?>
                           </h4>
                        </div>
                     </div>
                     <div style="background-color: #D68A10; color: white; padding: 20px; margin: 10px;" class="dashboard_box blue_bg col-md-3 border-radius">
                        <div class="title">
                           <p class="text-title" style="text-align:left">Today Bet Amount</p>
                           <h4>TRX: <?= round($total_bet_trx["total"],2);?> | USDT: <?= round($total_bet_usdt["total"],2);?> </h4>
                        </div>
                     </div>
                     <div style="background-color: #D68A10; color: white; padding: 20px; margin: 10px;" class="dashboard_box blue_bg col-md-3 border-radius">
                        <div class="title">
                           <p class="text-title" style="text-align:left">Today total win</p>
                           <h4>TRX: <?= round($total_betwin_trx["total"],2);?> | USDT: <?= round($total_betwin_usdt["total"],2);?> </h4>
                        </div>
                     </div>
                     <div style="background-color: #D68A10; color: white; padding: 20px; margin: 10px;" class="dashboard_box blue_bg col-md-3 border-radius">
                        <div class="title">
                           <p class="text-title" style="text-align:left">Today Profit </p>
                           <?php 
                           $trx = $total_bet_trx["total"];
                           $usdt = $total_betwin_trx["total"];
                           $today_trx_profit = $trx - $usdt;
                           $today_usdt_profit = $total_bet_usdt["total"] - $total_betwin_usdt["total"];
                           ?>
                           <h4>TRX: <?= round($today_trx_profit,2);?> | USDT: <?= round($today_usdt_profit,2);?> </h4>
                        </div>
                     </div>
                     <div style="background-color: #D68A10; color: white; padding: 20px; margin: 10px;" class="dashboard_box blue_bg col-md-3 border-radius">
                        <div class="title">
                           <p class="text-title" style="text-align:left">Level 1 Commision</p>
                           <h4>TRX <?php
                              $result = mysqli_query($con,"select sum(`level1`)as 'level' from `tbl_bonus` where level1 > 0");
                              ?>
                              <?php
                                 if (mysqli_num_rows($result) > 0) {
                                   $row = mysqli_fetch_array($result);
                                 
                                   $pending = $row["level"];
                                               echo number_format($pending,0);                
                                                     
                                 }
                                 
                                 else 
                                 {
                                   echo "0";
                                 }	?>	
                           </h4>
                        </div>
                     </div>
                     <div style="background-color: #D68A10; color: white; padding: 20px; margin: 10px;" class="dashboard_box blue_bg col-md-3 border-radius">
                        <div class="title">
                           <p class="text-title" style="text-align:left">Level 2 Commision</p>
                           <h4>TRX <?php
                              $result = mysqli_query($con,"select sum(`level2`)as 'pending' from `tbl_bonus` where level2 > 0");
                              ?>
                              <?php
                                 if (mysqli_num_rows($result) > 0) {
                                   $row = mysqli_fetch_array($result);
                                 
                                   $pending = $row["pending"];
                                               echo number_format($pending,0);                
                                                     
                                 }
                                 
                                 else 
                                 {
                                   echo "0";
                                 }
                                 ?>
                           </h4>
                        </div>
                     </div>
                     <div style="background-color: #D68A10; color: white; padding: 20px; margin: 10px;" class="dashboard_box blue_bg col-md-3 border-radius">
                        <div class="title">
                           <p class="text-title" style="text-align:left">Level 3 Commision</p>
                           <h4>TRX <?php
                              $result = mysqli_query($con,"select sum(`level3`)as 'pending' from `tbl_bonus` where level3 > 0");
                              ?>
                              <?php
                                 if (mysqli_num_rows($result) > 0) {
                                   $row = mysqli_fetch_array($result);
                                 
                                   $pending = $row["pending"];
                                               echo number_format($pending,0);                
                                                     
                                 }
                                 
                                 else 
                                 {
                                   echo "0";
                                 }
                                 ?>
                           </h4>
                        </div>
                     </div>
                    
                    
                     <div style="background-color: #D68A10; color: white; padding: 20px; margin: 10px;" class="dashboard_box blue_bg col-md-3 border-radius">
                        <div class="title">
                           <p class="text-title" style="text-align:left">Bonus Wallet</p>
                           <h4>TRX <?php
                              $result = mysqli_query($con,"SELECT  sum(amount) as 'pending' FROM tbl_bonus  where amount > 0");
                              ?>
                              <?php
                                 if (mysqli_num_rows($result) > 0) {
                                   $row = mysqli_fetch_array($result);
                                 
                                   $pending = $row["pending"];
                                               echo number_format($pending,0);                
                                                     
                                 }
                                 
                                 else 
                                 {
                                   echo "0";
                                 }
                                 ?>
                           </h4>
                        </div>
                     </div>
                    
                     <div style="background-color: #D68A10; color: white; padding: 20px; margin: 10px;" class="dashboard_box blue_bg col-md-3 border-radius">
                        <div class="title">
                           <p class="text-title" style="text-align:left">Total Refer Commission</p>
                           <h4>TRX <?php
                              $result = mysqli_query($con,"select sum(`amount`)as 'pending' from `tbl_walletsummery` where actiontype = 'refer_commission'");
                              ?>
                              <?php
                                 if (mysqli_num_rows($result) > 0) {
                                   $row = mysqli_fetch_array($result);
                                 
                                   $pending = $row["pending"];
                                               echo number_format($pending,0);                
                                                     
                                 }
                                 
                                 else 
                                 {
                                   echo "0";
                                 }
                                 ?>
                           </h4>
                        </div>
                     </div>
                     <div style="background-color: #D68A10; color: white; padding: 20px; margin: 10px;" class="dashboard_box blue_bg col-md-3 border-radius">
                        <div class="title">
                           <p class="text-title" style="text-align:left">Total Recharge Bonus</p>
                           <h4>TRX <?php
                              $result = mysqli_query($con,"select sum(`amount`)as 'pending' from `tbl_walletsummery` where actiontype = 'recharge_bonus'");
                              
                              ?>
                              <?php
                                 if (mysqli_num_rows($result) > 0) {
                                   $row = mysqli_fetch_array($result);
                                   $pending = $row["pending"];
                                    
                                   
                                               echo number_format($pending,0);                
                                                     
                                 }
                                 
                                 else 
                                 {
                                   echo "0";
                                 }
                                 ?>
                           </h4>
                        </div>
                     </div>
                 
                  </div>
               </div>
            </section>
            <!-- /.content -->
         </div>
         <!-- /.content-wrapper -->
         <?php include("include/footer.inc.php");?>
         <script src="dist/js/pages/dashboard.js"></script>
      </div>
      <!-- ./wrapper -->
   </body>
</html>