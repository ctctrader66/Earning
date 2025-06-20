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
  <title>Adminsuit | Manage User</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="css/ionicons.min.css">
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
<link rel="stylesheet" href="plugins/datatables/dataTables.bootstrap.css">
<link rel="stylesheet" href="plugins/select2/select2.min.css">
<link rel="stylesheet" href="plugins/iCheck/all.css">
    <link href="css/custom.css" rel="stylesheet" type="text/css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
     <link rel="stylesheet" href="css/app.css" id="maincss">
     
    <style>
        .list{
            padding: 0;
        }
        .span{background-color: black; color: white;}
        .user-info .list li{
            list-style: none;
        }
        .uinfo,.user-box{
            margin: 0px;
            padding: 10px;
            margin-bottom: 20px;
        }
        .uinfo{
            background: #fff;
        }
        .uinfo h2{
            text-align: left;
        }
        .uinfo strong {
            
            font-weight: 600;
            font-size: 15px;
        }
        .uinfo span {
            font-weight: 600;
            font-size: 15px;
        }
        .ubox{
            margin: 0 150px;
        }
        .user-box div {
            width: 22%;
            margin: 0px 23px 25px 25px;
            padding: 27px;
        }
    </style>

</head>
<body class="hold-transition skin-yellow-light sidebar-mini">
<div class="wrapper">
<?php include ("include/connection.php");?>
<?php include ("include/header.inc.php");?>
  <!-- Left side column. contains the logo and sidebar -->
 <?php include ("include/navigation.inc.php");?> 
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    
    
    <section class="content-header">
      <h1>Users</h1>
      <ol class="breadcrumb">
        <li><a href="desktop.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">User</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        
        <?php
            $userid = $_GET['user'];
            $snum = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM `tbl_user` WHERE `id` = '".$userid."' "));
            
            $total_balance_trx = wallet($con,'amount',$userid);
            $total_balance_usdt = wallet($con,'amountusdt',$userid);
            $owncode = $snum['owncode'];
            
         
            
            
          $total_recharge_trx = mysqli_fetch_assoc(mysqli_query($con,"SELECT sum(actual_pay) as total FROM `nowpayment` WHERE `payment_status` = 'finished' AND `price_currency` = 'trx'  AND `userid` = '".$userid."'"));
           $total_recharge_usdt = mysqli_fetch_assoc(mysqli_query($con,"SELECT sum(actual_pay) as total FROM `nowpayment` WHERE `payment_status` = 'finished' AND `price_currency` = 'usdttrc20'  AND `userid` = '".$userid."'"));
          
          $total_withdraw_trx = mysqli_fetch_assoc(mysqli_query($con,"SELECT sum(amount) as total FROM `tbl_withdrawal` WHERE status = 0 AND payout = 'trx' AND userid = '".$userid."'"));
          
         $total_withdraw_usdt = mysqli_fetch_assoc(mysqli_query($con, "SELECT SUM(amount) as total FROM tbl_withdrawal WHERE status = 0 AND payout = 'usdt' AND userid = '".$userid."'"));

          
           $total_bonus = mysqli_fetch_assoc(mysqli_query($con,"SELECT sum(amount) as total FROM `tbl_bonus` where amount > 0 AND userid = '".$userid."'"));
           
           $total_bonusw = mysqli_fetch_assoc(mysqli_query($con,"SELECT sum(amount) as total FROM `tbl_bonuswithdrawal` where amount > 0 AND userid = '".$userid."'"));
            
            $total_reward_trx = mysqli_fetch_assoc(mysqli_query($con,"SELECT sum(amount) as total FROM `tbl_reward` where userid = '".$userid."'"));
            
            $total_reward_usdt = mysqli_fetch_assoc(mysqli_query($con,"SELECT sum(amountusdt) as total FROM `tbl_reward` where userid = '".$userid."'"));
            
            
               $total_Comission = mysqli_fetch_assoc(mysqli_query($con,"SELECT FROM `tbl_bonus` where userid = '".$userid."'"));
           
               $total_interest = mysqli_fetch_assoc(mysqli_query($con,"SELECT sum(amount) as total FROM `tbl_interest` where userid = '".$userid."'"));
               
                $total_referrecharge = mysqli_fetch_assoc(mysqli_query($con,"SELECT sum(amount) as total FROM `tbl_walletsummery` where actiontype = 'refer_commission' AND userid = '".$userid."'"));
                
                
                $total_rechargebonus = mysqli_fetch_assoc(mysqli_query($con,"SELECT sum(amount) as total FROM `tbl_walletsummery` where actiontype = 'recharge_bonus' AND userid = '".$userid."'"));
                
                 $total_fundsend = mysqli_fetch_assoc(mysqli_query($con,"SELECT sum(amount) as total FROM `tbl_walletsummery` where actiontype = 'Fund_Transfer' AND userid = '".$userid."'"));
                 $total_recived = mysqli_fetch_assoc(mysqli_query($con,"SELECT sum(amount) as total FROM `tbl_walletsummery` where actiontype = 'Fund_Receive' AND orderid = '".$userid."'"));
                
               
                $total_redc = mysqli_fetch_assoc(mysqli_query($con,"SELECT sum(amt) as total FROM `lifafa_his` where userid = '".$userid."'"));
            
               $total_envelope = mysqli_fetch_assoc(mysqli_query($con,"SELECT sum(amount*tqua) as total FROM `lifafa` where userid = '".$userid."'"));
            
            $total_refer = mysqli_fetch_assoc(mysqli_query($con,"SELECT count(id) as total FROM `tbl_user` where code = '".$owncode."'"));
            
            
            //$total_refer_recharge = mysqli_query($con,"SELECT id as FROM `tbl_user` where code = '".$owncode."'");
        //$q = mysqli_query($con,"SELECT sum(amount) as total FROM 'tbl_wallet' WHERE userid = '".$total_refer_recharge."' ");
                                                               //$totalreferRecharge = mysqli_fetch_assoc($q);
                                                               
            
            $total_bet_trx = mysqli_fetch_assoc(mysqli_query($con,"SELECT SUM(amount) as total FROM tbl_betting WHERE userid = '".$userid."' AND curr = 'trx'"));
           
            $total_bet_usdt = mysqli_fetch_assoc(mysqli_query($con,"SELECT sum(amount) as total FROM `tbl_betting` where userid = '".$userid."' and  curr = 'usdt' "));
            $deposite_record = mysqli_query($con,"SELECT * FROM `nowpayment` WHERE `userid` LIKE '".$userid."' ORDER BY id DESC");
            
           
          
            
            
            
            $withdraw_record = mysqli_query($con,"SELECT * FROM `tbl_withdrawal` where userid = '".$userid."' ORDER BY id DESC");
            
             $bonus_withdraw_record = mysqli_query($con,"SELECT * FROM `tbl_bonuswithdrawal` where userid = '".$userid."' ORDER BY id DESC");
            
             $totale_reward = mysqli_query($con,"SELECT * FROM `tbl_reward` where userid = '".$userid."' ORDER BY id DESC");
            
            // echo "SELECT * FROM `tbl_withdrawal` where userid = '".$userid."'";
            
           $refer_record = mysqli_query($con, "SELECT * FROM `tbl_user` WHERE code = '".$owncode."' ORDER BY id DESC");
$item = mysqli_fetch_array($refer_record);



                                     
            
            $game_bet = mysqli_query($con,"SELECT * FROM `tbl_userresult` where userid = '".$userid."' ORDER BY id DESC");
            
            $bank_details = mysqli_query($con,"SELECT * FROM `tbl_bankdetail` where userid = '".$userid."' ORDER BY id DESC");
            
            $envelope_create  = mysqli_query($con,"SELECT * FROM `lifafa` where userid = '".$userid."' ORDER BY id DESC");
            $envelope_redeem  = mysqli_query($con,"SELECT * FROM `lifafa_his` where userid = '".$userid."' ORDER BY id DESC");
            
            $walletsummery = mysqli_query($con,"SELECT * FROM `tbl_walletsummery` where userid = '".$userid."' ORDER BY id DESC");
            
            $walletsummerytrf = mysqli_query($con,"SELECT * FROM `tbl_walletsummery` where userid = '".$userid."' and  actiontype = 'Fund_Transfer' ORDER BY id DESC");
            
            $walletsummeryrec = mysqli_query($con,"SELECT * FROM `tbl_walletsummery` where orderid = '".$userid."' and  actiontype = 'Fund_Receive' ORDER BY id DESC");
            
                $interest = mysqli_query($con,"SELECT * FROM `tbl_interest` where userid = '".$userid."' ORDER BY id DESC");
            
        ?>
        
        <div class="row uinfo">
            <h4 class="box-title" style="font-weight:600;margin-left:16px;">User Details</h4>
            <div class="col-lg-6 col-sm-6 col-xs-6 user-info">
                <ul class="list">
                    <li>User Id : <?php echo "<b>".$snum['id']."</b>"; ?></li>
                    <li>Referal Id : <?php echo "<b>".$snum['owncode']."</b>"?></li>
                    
                       <li>IP Address : <?php echo "<b>".$snum['ip']."</b>"; ?></li>
                </ul>
            </div>
            
            <div class="col-lg-6 col-sm-6 col-xs-6 user-info">
                <ul class="list">
                    <li>Email : <b><?php echo $snum['email']; ?> </b> </li>
                    <li>Phone No. : <b><?php echo $snum['mobile']; ?> </b> </li>
                    <li>Created At : <?php echo "<b>".$snum['createdate']."</b>"; ?></li>
                    <li>Refered By : <?php echo "<b>".$snum['code']."</b>"?></li>
                </ul>
            </div>
        </div>
        
        <div class="row user-box" style="margin:0px;padding:0px;width:100%;">
            <div class="col-md-3 col-sm-12  col-lg-3 uinfo">
               <strong><a href="#total_transcation">TOTAL BALANCE</a></strong>
                <h4>TRX: <?= round($total_balance_trx,2);?> <br> USDT: <?= round($total_balance_usdt,2);?> </h4>
            </div>
            <div class="col-md-3 col-sm-12  col-lg-3 uinfo">
                 <strong><a href="#total_refer">TOTAL REFERRAL</a></strong>
                <h2><?= (float) $total_refer['total'];?></h2>
            </div>
            <div class="col-md-3 col-sm-12  col-lg-3 uinfo">
                 <strong><a href="#total_bet">TOTAL BET</a></strong>
                <h4>TRX: <?= round($total_bet_trx["total"],2);?> <br> USDT: <?= round($total_bet_usdt["total"],2);?> </h4>
            </div>
             <div class="col-md-3 col-sm-12 col-lg-3 uinfo">
              <strong><a href="#total_recharge">TOTAL Recharge</a></strong>
               <h4>TRX: <?= round($total_recharge_trx["total"],2);?> <br> USDT: <?= round($total_recharge_usdt["total"],2);?> </h4>
            </div>
            <div class="col-md-3 col-sm-12 col-lg-3 uinfo">
               <strong><a href="#total_withdrawal">TOTAL WITHDRAWN</a></strong>
                <h4>TRX: <?= round($total_withdraw_trx["total"],2);?> <br> USDT: <?= round($total_withdraw_usdt["total"],2);?> </h4>
            </div>
              <div class="col-md-3 col-sm-12 col-lg-3 uinfo" >
                <strong><a href="#total_reward">TOTAL Reward</a></strong>
                 <h4>TRX: <?= round($total_reward_trx["total"],2);?> <br> USDT: <?= round($total_reward_usdt["total"],2);?> </h4>
            </div>
              <div class="col-md-3 col-sm-12 col-lg-3 uinfo">
                <strong>Avaliable Bonus</strong>
                <h2>$<?= round($total_bonus['total'],2);?></h2>
            </div>
             
        
         
            
        <div class="col-md-3 col-sm-12 col-lg-3 uinfo">
                <strong>Total Commision</strong>
                <h2>$ <?php $telegram=mysqli_query($con,"select sum(level1+level2+level3+level4+level5) as total from `tbl_bonus` where userid = '".$userid."'");
	$link=mysqli_fetch_array($telegram);
	$ready = $link['total']; echo round($ready,2);?></h2>
            </div>
             <div class="col-md-3 col-sm-12 col-lg-3 uinfo">
                <strong>Total Refer's Recharge Commission</strong>
                <h2>$<?= round($total_referrecharge['total'],2);?></h2>
            </div>
             <div class="col-md-3 col-sm-12 col-lg-3 uinfo">
                <strong>Total Recharge Bonus</strong>
                <h2>$<?= round($total_rechargebonus['total'],2);?></h2>
            </div>
              <div class="col-md-3 col-sm-12 col-lg-3 uinfo">
                <strong><a href="#total_sended">Total Fund Transfer</a></strong>
                <h2>$<?= round($total_fundsend['total'],2);?></h2>
            </div>
             <div class="col-md-3 col-sm-12 col-lg-3 uinfo">
                <strong><a href="#total_recived">Total Fund Receive</a></strong>
                <h2>$<?= round($total_recived['total'],2);?></h2>
            </div>
        </div>
         <div id="total_refer" class="row uinfo">
            <div class="col-lg-12 col-sm-12 col-xs-12 user-info">
                <span>REFERAL RECORD</span>
                <table id="example1" class="table table-condensed">
                    <thead>
                        <tr>
                            <th>Join Date</th>
                            <th>Number</th>
                            <th>Invite Id</th>
                            <th>Email</th>
                           <th>IP Address</th>
                            <th>Total Recharge TRX</th> 
                            <th>Total Recharge USDT</th> 
                            <th>Wallet TRX</th> 
                            <th>Wallet USDT</th> 
                             <th>Action</th> 
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            while($item=mysqli_fetch_array($refer_record)) {
                            
                            
                            
                            
                            ?>
                                <tr>
                                    <td><?= $item['createdate']; ?></td>
                                    <td><?= $item['mobile']; ?></td>
                                    <td><?= $item['owncode']; ?></td>
                                    <td><?= $item['email']; ?></td>
                                      <td><?= $item['ip']; ?></td>
                                    
                                      <td>		    TRX <?php
														    
														    $totalRecharge['total'] = 0;
                                                                $q = mysqli_query($con,"SELECT sum(actual_pay) as total FROM `nowpayment` WHERE `payment_status` = 'finished' AND `price_currency` = 'trx'  AND `userid` = '".$item['id']."'");
                                                                $totalRecharge = mysqli_fetch_assoc($q);
                                                                echo round($totalRecharge['total'],2);
                                                            
                                                            ?></td>
                                                            <td>		    USDT <?php
														    
														    $totalRecharge['total'] = 0;
                                                                $q = mysqli_query($con,"SELECT sum(actual_pay) as total FROM `nowpayment` WHERE `payment_status` = 'finished' AND `price_currency` = 'usdttrc20'  AND `userid` = '".$item['id']."'");
                                                                $totalRecharge = mysqli_fetch_assoc($q);
                                                                echo round($totalRecharge['total'],2);
                                                            
                                                            ?></td>
                                                              <td>		    TRX <?php
														    
														    $totalRecharge['total'] = 0;
                                                                $q = mysqli_query($con,"SELECT amount as total FROM tbl_wallet WHERE userid = '".$item['id']."' ");
                                                                $totalRecharge = mysqli_fetch_assoc($q);
                                                                echo round($totalRecharge['total'],2);
                                                            
                                                            ?></td>
                                                            <td>		    USDT  <?php
														    
														    $totalRecharge['total'] = 0;
                                                                $q = mysqli_query($con,"SELECT amountusdt as total FROM tbl_wallet WHERE userid = '".$item['id']."' ");
                                                                $totalRecharge = mysqli_fetch_assoc($q);
                                                                echo round($totalRecharge['total'],2);
                                                            
                                                            ?></td>
                                                            <td>
                                                                <a href="user-details.php?user=<?= $item['id']; ?>"  target="_blank" class="update-person" style="background-color: darkorange; color:white; font-size:12px; padding: 5px;" title="User Detail">User Detail</a>
                                                                </td>
                                                            
                                                            
													
                                </tr>
                            <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
        
          <div id="total_reward" class="row uinfo">
            <div class="col-lg-12 col-sm-12 col-xs-12 user-info">
                <span>REWARD RECORD</span>
                                    <?php //echo '<pre>';
                                    //print_r($withdraw_record); exit('deposite');?>
                <table id="example2" class="table table-condensed">
                    <thead>
                        <tr>
                            <th>Create Date</th>
                            <th>Amount TRX</th>
                            <th>Amount USDT</th>
                            <th>Note</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                         <?php 
                                    while($item = mysqli_fetch_array($totale_reward)){  ?>
                                       <tr>
                                            <td><?= $item['createdate'] ?></td>
                                            <td><?= $item['amount'] ?></td>
                                            <td><?= $item['amountusdt'] ?></td>
                                            <td><?= $item['note'] ?></td>
                                            
                                       </tr> 
                            <?php
                                    } ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div id="total_recharge" class="row uinfo">
            <div class="col-lg-12 col-sm-12 col-xs-12 user-info">
                <span>Recharge RECORD</span>
                                    <?php //echo '<pre>';
                                    //print_r($withdraw_record); exit('deposite');?>
                <table id="example3" class="table table-condensed">
                    <thead>
                        <tr>
                            <th>Updated At</th>
                            <th>Transaction ID</th>
                            <th>Payment Method</th>
                            <th>Userid</th>
                            <th>Amount</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                         <?php 
                                    while($item = mysqli_fetch_array($deposite_record)){  ?>
                                       <tr>
                                            <td><?= $item['created_at'] ?></td>
                                            <td><?= $item['payment_id'] ?></td>
                                            <td><?= ucfirst($item['pay_currency']) ?></td>
                                            <td><?= $item['userid'] ?></td>
                                            <td>$<?= $item['actual_pay'] ?></td>
                                             <td><?= $item['payment_status'] ?></td>
                                       </tr> 
                            <?php
                                    } ?>
                    </tbody>
                </table>
            </div>
        </div>
        
        <div id="total_withdrawal" class="row uinfo">
            <div class="col-lg-12 col-sm-12 col-xs-12 user-info">
                <span>WITHDRAW RECORD</span>
                <table id="example4" class="table table-condensed">
                    <thead>
                        <tr>
                            <th>Updated At</th>
                            <th>Amount</th>
                           <th>Type</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                            <?php
                                
                                    while($item = mysqli_fetch_array($withdraw_record)){ ?>
                                        <tr>
                                            <td><?= $item['createdate'] ?></td>
                                            <td>$<?= $item['amount'] ?></td>
                                            <td><?= $item['payout'] ?></td>
                                            
                                        <td>    <?php if($item["status"]=='1'){$ex = Pending; echo '<p style="color: darkorange;">'.$ex.'</p>';}elseif($item["status"]=='0'){$ex = Success; echo '<p style="color: green;">'.$ex.'</p>';}elseif($item["status"]=='2'){$ex = 'Cancel & Refund'; echo '<p style="color: red;">'.$ex.'</p>';}?>
                                           </td>
                                        </tr>
                            <?php   } ?>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
         
       
        <div id="total_bet" class="row uinfo">
            <div class="col-lg-12 col-sm-12 col-xs-12 user-info">
                <span>GAME BET RECORD</span>
                <table id="example6" class="table table-condensed">
                    <thead>
                        <tr>
                            <th>Created At</th>
                            <th>Period Id</th>
                              <th>Value</th>
                              <th>currency</th>
                          <th>Amount</th>
                            
                             <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(!empty($game_bet)){
                            while($item=mysqli_fetch_array($game_bet)) {  ?>
                                <tr>
                                    <td><?=$item['createdate'] ?></td>
                                    <td><?=$item['periodid'] ?></td>
                             
                                    <td><?php if($item["value"]=='Green'){ echo '<p style="color: green;">'.$item["value"].'</p>';}elseif($item["value"]=='Red'){ echo '<p style="color: red;">'.$item["value"].'</p>';}else echo '<p style="color: blue;">'.$item["value"].'</p>';?></td>
                                  
                                  
                                  
                                  <td><?=$item['curr'] ?></td>
                                  
                                  
                                    <td><?php 
                                    
                                    
                                    
                                    if ($item['curr'] == 'usdt') {
    $usdt = $item['amount'];
    $betam = $usdt / 11.04;
   echo number_format($betam,2);
} else {
    $betam = $item['amount'];
    echo number_format($betam,2);
}

?>
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                    </td>
                                   
                                     
                                           <td><?php if($item["status"]=='success'){$ex = Success; echo '<p style="color: green;">'.$ex.'</p>';}elseif($item["status"]=='fail'){$ex = Fail; echo '<p style="color: red;">'.$ex.'</p>';}?></td>
                                </tr>
                               
                               
                               
                               
                                </tr>
                            <?php }
                            }else{?>
                                <tr>
                                    <td colspan="6">No data found </td>
                                </tr>
                            <?php }?>
                    </tbody>
                </table>
            </div>
        </div>
        
        <div class="row uinfo">
            <div class="col-lg-12 col-sm-12 col-xs-12 user-info">
                <span>BANK DETAILS</span>
                <table id="example7" class="table table-condensed">
                    <thead>
                         <tr>
                              <th>ID</th>
                          
                            <th>Account Holder</th>
                            <th>Address</th>
                            <th>Method</th>
                           
                           
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while($item=mysqli_fetch_array($bank_details)) { ?>
                        <tr>
                           <td><?= $item['id'] ?> </td>
                        
                            <td><?= $item['name'] ?> </td>
                            <td><?= $item['account'] ?> </td>
                            <td><?= $item['ifsc'] ?> </td>
                          
                            
                             
                                           <td>
                                           <a href="javascript:void(0);" onClick="delete_row(<?= $item['id'] ?>)"  class="update-person" style="background-color:#f56954; color:white; font-size:16px; padding: 7px;" title="Delete">Delete</a></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
          <div id="total_sended" class="row uinfo">
            <div class="col-lg-12 col-sm-12 col-xs-12 user-info">
                <span>Fund Transfer</span>
                <table id="example10" class="table table-condensed">
                    <thead>
                        <tr>
                           
                               <th>Create Date</th>
                               <th>To</th>
                            
                              <th>Amount</th>
                             
                        </tr>
                    </thead>
                    <tbody>
                        <?php while($item=mysqli_fetch_array($walletsummerytrf)) { ?>
                        <tr>
                       
                                           <td><?= $item['createdate'] ?> </td> 
                                          <td><?= $item['orderid'] ?> </td>
                                             <td>$<?= $item['amount'] ?> </td>
                                             
                                           
                                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
         <div id="total_recived" class="row uinfo">
            <div class="col-lg-12 col-sm-12 col-xs-12 user-info">
                <span>Fund Received</span>
                <table id="example10" class="table table-condensed">
                    <thead>
                        <tr>
                           
                               <th>Create Date</th>
                               <th>From</th>
                            
                              <th>Amount</th>
                             
                        </tr>
                    </thead>
                    <tbody>
                        <?php while($item=mysqli_fetch_array($walletsummeryrec)) { ?>
                        <tr>
                       
                                           <td><?= $item['createdate'] ?> </td> 
                                          <td><?= $item['orderid'] ?> </td>
                                             <td>$<?= $item['amount'] ?> </td>
                                             
                                           
                                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div id="total_transcation" class="row uinfo">
            <div class="col-lg-12 col-sm-12 col-xs-12 user-info">
                <span>TRANSCATION LOGS</span>
                <table id="example10" class="table table-condensed">
                    <thead>
                        <tr>
                           
                               <th>Create Date</th>
                               <th>Uses</th>
                             <th>Type</th></th>
                              <th>Amount</th>
                             
                        </tr>
                    </thead>
                    <tbody>
                        <?php while($item=mysqli_fetch_array($walletsummery)) { ?>
                        <tr>
                       
                                           <td><?= $item['createdate'] ?> </td> 
                                          
                                            <td>
                                           
                                           <?php if($item["actiontype"]=='lif'){echo"Envelope Redeem";}elseif($item["actiontype"]=='lifa'){echo"Evnelope Created";}elseif($item["actiontype"]=='win'){echo"Bet Win";}elseif($item["actiontype"]=='join'){echo"Bet";}else echo $item['actiontype'];?></td>
                                           
                                           
                                           
                                            <td><?php if($item["type"]=='credit'){$ex = Credit; echo '<p style="color: green;">'.$ex.'</p>';}elseif($item["type"]=='debit'){$ex = Debit; echo '<p style="color: red;">'.$ex.'</p>';}?> </td>
                                             <td>$<?= $item['amount'] ?> </td>
                                             
                                           
                                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    
        
        
      
      
    </section>
    <!-- /.content -->
  </div>
   <!-- /.content-wrapper -->

<?php include("include/footer.inc.php");?></div>
<!-- ./wrapper -->
 
<script type="text/javascript">
 function delete_row(Id) {
 var strconfirm = confirm("Are You Sure You Want To Delete?");

           if (strconfirm == true) {
               $.ajax({
                   type: "Post",
                  data:"id=" + Id + "& type=" + "delete" ,
                   url: "delete_bank.php",
                   success: function (html) { 
                      if(html==1){
						  alert("Selected Item Deleted Sucessfully....");
                     window.location = '';
					  }
					  else if(html==0){
						  alert("Some Technical Problem");
						  
						  }
                   },
                   error: function (e) {
                   }
               });
           }

       }
</script>
<script>

  $(function () {
    $('#example1').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": true,
      "ordering": false,
      "info": true,
      "autoWidth": true,
	  "pageLength": 50,
	  /*"processing": true,
      "serverSide": true,
      "ajax": '../server_side/scripts/server_processing.php',*/
    });
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": true,
      "ordering": false,
      "info": true,
      "autoWidth": true,
	  "pageLength": 50,
	  /*"processing": true,
      "serverSide": true,
      "ajax": '../server_side/scripts/server_processing.php',*/
    });
    $('#example3').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": true,
      "ordering": false,
      "info": true,
      "autoWidth": true,
	  "pageLength": 50,
	  /*"processing": true,
      "serverSide": true,
      "ajax": '../server_side/scripts/server_processing.php',*/
    });
    $('#example4').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": true,
      "ordering": false,
      "info": true,
      "autoWidth": true,
	  "pageLength": 50,
	  /*"processing": true,
      "serverSide": true,
      "ajax": '../server_side/scripts/server_processing.php',*/
    });
    $('#example5').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": true,
      "ordering": false,
      "info": true,
      "autoWidth": true,
	  "pageLength": 50,
	  /*"processing": true,
      "serverSide": true,
      "ajax": '../server_side/scripts/server_processing.php',*/
    });
     $('#example6').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": true,
      "ordering": false,
      "info": true,
      "autoWidth": true,
	  "pageLength": 50,
	  /*"processing": true,
      "serverSide": true,
      "ajax": '../server_side/scripts/server_processing.php',*/
    });
     $('#example7').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": true,
      "ordering": false,
      "info": true,
      "autoWidth": true,
	  "pageLength": 50,
	  /*"processing": true,
      "serverSide": true,
      "ajax": '../server_side/scripts/server_processing.php',*/
    });
     $('#example8').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": true,
      "ordering": false,
      "info": true,
      "autoWidth": true,
	  "pageLength": 50,
	  /*"processing": true,
      "serverSide": true,
      "ajax": '../server_side/scripts/server_processing.php',*/
    });
       $('#example9').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": true,
      "ordering": false,
      "info": true,
      "autoWidth": true,
	  "pageLength": 50,
	  /*"processing": true,
      "serverSide": true,
      "ajax": '../server_side/scripts/server_processing.php',*/
    });
     $('#example10').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": true,
      "ordering": false,
      "info": true,
      "autoWidth": true,
	  "pageLength": 50,
	  /*"processing": true,
      "serverSide": true,
      "ajax": '../server_side/scripts/server_processing.php',*/
    });
       $('#example11').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": true,
      "ordering": false,
      "info": true,
      "autoWidth": true,
	  "pageLength": 50,
	  /*"processing": true,
      "serverSide": true,
      "ajax": '../server_side/scripts/server_processing.php',*/
    });
  });
</script>

</body>
</html>
