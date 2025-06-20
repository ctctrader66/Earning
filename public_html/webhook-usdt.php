<?php

// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

include("include/connection.php");

// Get all payments with amount_status = 0
$nowpayment = mysqli_query($con, "SELECT * FROM `nowpayment` WHERE `amount_status` = '0' AND `pay_currency` = 'usdttrc20' ORDER BY id DESC LIMIT 500");


while($row=mysqli_fetch_array($nowpayment)) {
  $payment_id = $row['payment_id'];
 $userid = $row['userid'];
  $wallet_status = $row['amount_status'];
  $id = $row['id'];
  
  // Call NowPayments API to get payment status
  $curl = curl_init();

  curl_setopt_array($curl, array(
    CURLOPT_URL => 'https://api.nowpayments.io/v1/payment/'.$payment_id,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'GET',
    CURLOPT_HTTPHEADER => array(
      'x-api-key: ZN26XN6-6DK45BC-KDNZB4Y-QDY0K00'
    ),
  ));

  $response = curl_exec($curl);

  curl_close($curl);
  
  // Parse API response to get payment status and amount
  $json_obj = json_decode($response);
  $status = $json_obj->payment_status;
//   $amount = $json_obj->price_amount;
  $amount = $json_obj->actually_paid;


  // update payment status
  $sql= mysqli_query($con,"UPDATE `nowpayment` SET `payment_status` = '$status' where `payment_id` = '$payment_id'");
  
  
//          $userref=mysqli_query($con,"select * from `tbl_user` where `id`='".$userid."'");
// $userRows=mysqli_num_rows($userref);
// $userResult=mysqli_fetch_array($userref);
// $owncode=$userResult['code'];
// $userlevel1=mysqli_query($con,"select *  from `tbl_user` where `owncode`='".$owncode."'");
// $userlevel1Rows=mysqli_fetch_array($userlevel1); $userreferfineded = $userlevel1Rows['id'];
  
//     $sql = "SELECT count(id) as rechargeId FROM `nowpayment` WHERE payment_status = finished AND userid =  $userid" ;
//     $checkUser = mysqli_query($con,$sql);
//     $userCount=mysqli_num_rows($checkUser);
//     $dt = mysqli_fetch_assoc($checkUser);
//     $rechargeCount = $dt['rechargeId'];
    
//     if($rechargeCount == 0){
//       $findUserSql = "SELECT code FROM `tbl_user` WHERE id = $userid";
//       $findUser = mysqli_query($con,$findUserSql);
//     //   echo mysqli_num_rows($findUser);
//       if(mysqli_num_rows($findUser) > 0){
//         $userCode = mysqli_fetch_assoc($findUser);
//         $referrerCode = $userCode['code'];
//         $findReferredUserSql = "SELECT id,mobile,code FROM `tbl_user` WHERE owncode = $referrerCode";
//         $findReferredUser = mysqli_query($con,$findReferredUserSql); 
       
//       }
    // }
    
   
    // end
    
    
  if ($status === "finished") {
    if ($wallet_status == '0') {
      // Update payment and wallet status in database
      $sql= mysqli_query($con,"UPDATE `nowpayment` SET `payment_status` = 'finished', `amount_status` = '1',    `actual_pay` = '$amount ' where `payment_id` = '$payment_id'");
      
     
     	
		$chkorder=mysqli_query($con,"select * from `tbl_order` where `transactionid`='".$id."'");
		$chkorderRow=mysqli_num_rows($chkorder);
		$today = date("Y-m-d H:i:s");
		
		  $getBonus1 = mysqli_query($con,"SELECT * FROM `tbl_paymentsetting` ORDER BY id DESC");
		   $getBonusAmount1 = mysqli_fetch_assoc($getBonus1);
		  
          $total2 = (float)$getBonusAmount1['rechargebonus'];
          
             $total3 = (float)$getBonusAmount1['rcomission'];
          
          $bamount1 = $amount*$total2/100;
          
            $bamount2 = $amount*$total3/100;
            
           
                          
		if($chkorderRow==''){
			$sql= mysqli_query($con,"INSERT INTO `tbl_order`(`userid`,`transactionid`,`amount`,`status`) VALUES ('".$userid."','".$id."','".$amount."','1')");
			$orderid=mysqli_insert_id($con);

			$sql3= mysqli_query($con,"INSERT INTO `tbl_walletsummery`(`userid`,`orderid`,`amount`,`type`,`actiontype`,`createdate`) VALUES ('".$userid."','".$id."','".$amount."','credit','recharge','".$today."')");
			
				$sql4= mysqli_query($con,"INSERT INTO `tbl_walletsummery`(`userid`,`orderid`,`amount`,`type`,`actiontype`,`createdate`) VALUES ('".$userid."','".$id."','".$bamount1."','credit','recharge_bonus','".$today."')");
			  if($rechargeCount == 0){
			 $walletSql = mysqli_query($con,"UPDATE `tbl_wallet` SET `amountusdt`= `amountusdt`+'".$bamount2."' WHERE userid = $userreferfineded");
			 
			 	$sql6= mysqli_query($con,"INSERT INTO `tbl_walletsummery`(`userid`,`orderid`,`amount`,`type`,`actiontype`,`createdate`) VALUES ('".$userreferfineded."','".$id."','".$bamount2."','credit','refer_commission','".$today."')");
			  }
			
			              

			$sqlwall="SELECT * FROM `tbl_wallet` WHERE `userid`='$userid'";
			$t_d = "SELECT * FROM `tbl_user` WHERE `userid`='$userid'";
			$reswall=mysqli_query($con,$sqlwall);
			if(mysqli_num_rows($reswall)>0)
			{
				$rowwall=mysqli_fetch_assoc($reswall);
				$walletbalance=$rowwall['amountusdt'];	
				$finalbalanceCredit=$walletbalance+$amount+$bamount1;	

				$sqlwallet= mysqli_query($con,"UPDATE `tbl_wallet` SET `amountusdt` = '$finalbalanceCredit' WHERE `userid`= '$userid'");
					$sqlt_d= mysqli_query($con,"UPDATE `tbl_user` SET `t_deposit` = `t_deposit`+'".$finalbalanceCredit."' WHERE `userid`= '$userid'");
			}
			else
			{

				$walletbalance=0;	
				$finalbalanceCredit=$walletbalance+$amount+$bamount1;	
			
				$sqlwallet= mysqli_query($con,"INSERT INTO `tbl_wallet`(`userid`,`amountusdt`,`envelopestatus`)VALUES('$userid','$finalbalanceCredit','0')");
				$sqlt_d= mysqli_query($con,"UPDATE `tbl_user` SET `t_deposit` = `t_deposit`+'".$finalbalanceCredit."' WHERE `userid`= '$userid'");
			}
			
			
			
		}
		
      

      
    } else {
    //   echo "Payment with ID $payment_id has already been processed.";
    }
  } else {
    // echo "Payment with ID $payment_id is still pending or failed.";
  }
}

?>
