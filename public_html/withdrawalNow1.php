<?php 
ob_start();
session_start();
include("include/connection.php");

@$userid=$_POST['userid'];
@$userammount=$_POST['userammount'];
@$optionsname=$_POST['optionsname'];
@$acid=$_POST['acid'];
@$password1=$_POST['password'];
@$walletbalance=wallet($con,'amount',$userid);
@$action=$_POST['action'];
$today = date("Y-m-d H:i:s");
$today_date=date("Y-m-d");
if($action=="withdrawal")
{
	
if($walletbalance>=$userammount)
{ 
$chkbankdetailQuery=mysqli_query($con,"select * from `tbl_user` where `id`='".$userid."' AND `password`='".md5($password1)."'");
$bankdetailRows=mysqli_num_rows($chkbankdetailQuery);
if($bankdetailRows!='')
{
  //withdrawal status
  $wstatus=mysqli_query($con,"select * from `tbl_user` where `id`='".$userid."'");
	$wstatuscheck=mysqli_fetch_array($wstatus);
	$wfetch = $wstatuscheck["wstatus"];
  if($wfetch == 1){
 // checking recharge status 1 25-06-2022
            $recharge = mysqli_query($con,"SELECT * FROM `tbl_recharge` WHERE `userid`='".$userid."' AND status = 1");
            $checkUserRecharge = mysqli_num_rows($recharge);
            if($checkUserRecharge){
                
                 // checking wagar amount
                $total_recharge = mysqli_query($con,"SELECT sum(amount) as total FROM `tbl_recharge` WHERE status = 1 AND userid = '".$userid."'"); 
    	$wagar_recharge1=mysqli_fetch_array($total_recharge);
    	
    		$wagar=mysqli_query($con,"select * from `tbl_user` where `id`='".$userid."'");
	$wagaramount=mysqli_fetch_array($wagar);
	$fixwagar = $wagaramount['wagar'];
    	
    	
    	
    	
    $wagar_recharge = $wagar_recharge1['total']*$fixwagar;
                
         $total_bet1 = mysqli_query($con,"SELECT sum(amount) as total1 FROM `tbl_betting` where userid = '".$userid."' ");
                	$wagar_bet1=mysqli_fetch_array($total_bet1);
                $total_bet = $wagar_bet1['total1'];
                
                
                
                $wagar_check = $total_bet>$wagar_recharge;
                  
                  if($wagar_check){
    
    // Withdrawal limit
$qry1=mysqli_query($con,"SELECT id FROM `tbl_withdrawal` WHERE DATE(`createdate`)='$today_date' AND `userid`='$userid'" );
$nu_rows=mysqli_num_rows($qry1);
// echo $nu_rows;
if($nu_rows<=1)
{
$withdrawalsql= mysqli_query($con,"INSERT INTO `tbl_withdrawal`(`userid`,`amount`,`payout`,`payid`,`status`,`createdate`) VALUES ('".$userid."','".$userammount."','".$optionsname."','".$acid."','1','".$today."')");
$withdrawalid=mysqli_insert_id($con);
$sql= mysqli_query($con,"INSERT INTO `tbl_order`(`userid`,`transactionid`,`amount`,`status`) VALUES ('".$userid."','withdraw','".$userammount."','1')");
@$orderid=mysqli_insert_id($con);

$actiontype="withdraw~".$withdrawalid;
$sql3= mysqli_query($con,"INSERT INTO `tbl_walletsummery`(`userid`,`orderid`,`amount`,`type`,`actiontype`) VALUES ('".$userid."','".$orderid."','".$userammount."','debit','$actiontype')");

$walletbalance=wallet($con,'amount',$userid);	
$finalbalanceCredit=$walletbalance-$userammount;	
$sqlwallet= mysqli_query($con,"UPDATE `tbl_wallet` SET `amount` = '$finalbalanceCredit' WHERE `userid`= '$userid'");	
echo"1";	
}else{echo"6";}
}

else{echo"7";}
                
            }else{echo"5";}
}else{echo"8";}
	}else{echo"2";}//bank detail chk
}else{echo"3";}
	
	
	
	
}
?>