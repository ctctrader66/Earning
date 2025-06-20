<?php

include ("include/connection.php");

$postData = $_POST;

## Read value
$draw = $postData['draw'];
$start = $postData['start'];
$rowperpage = $postData['length']; // Rows display per page
$columnIndex = $postData['order'][0]['column']; // Column index
$columnName = $postData['columns'][$columnIndex]['data']; // Column name
$columnSortOrder = $postData['order'][0]['dir']; // asc or desc
$searchValue = $postData['search']['value']; // Search value

## Search 
$searchQuery = "";
if($searchValue != ''){
	$searchQuery = "WHERE 1 AND (id like '%".$searchValue."%' or mobile like '%".$searchValue."%' or username like '%".$searchValue."%' or email like '%".$searchValue."%' or owncode like '%".$searchValue."%' or ip like '%".$searchValue."%' or code like '%".$searchValue."%' or createdate like '%".$searchValue."%') ";
}else{
	$searchQuery = "WHERE 1";
}

## Total number of records without filtering
$sqlCount = "SELECT id FROM tbl_user where status = 1";
$queryCount = mysqli_query($con, $sqlCount);
$totalRecords = mysqli_num_rows($queryCount);
// print_r($totalRecords); exit;

## Total number of record with filtering
$sqlCountSearch = "SELECT id FROM tbl_user ".$searchQuery;
$queryCountSearch = mysqli_query($con, $sqlCountSearch);
$totalRecordwithFilter = mysqli_num_rows($queryCountSearch);

## Fetch records
$data = array();
$sql = "SELECT * FROM tbl_user ".$searchQuery." ORDER BY id DESC LIMIT ".$rowperpage." OFFSET ".$start; 
// echo $sql;
// exit;
$query = mysqli_query($con, $sql);
$action = '';

while($row = mysqli_fetch_array($query)){
	// echo $row['name']; exit;
	$id = $row['id'];
	$wallettrx = wallet($con,'amount',$id);
	$walletAction = '<a href="javascript:void(0);" onClick="edit(' . $row['id'] . ',' . $row['mobile'] . ',' . $wallettrx . ',\'trx\')" class="text-aqua" title="Update"><i class="fa fa-edit"></i></a>';
	$wallet = number_format($wallettrx,2).$walletAction;
	
		$walletusdt = wallet($con,'amountusdt',$id);
	$walletAction1 = '<a href="javascript:void(0);" onClick="edit(' . $row['id'] . ',' . $row['mobile'] . ',' . $walletusdt . ',\'usdt\')" class="text-aqua" title="Update"><i class="fa fa-edit"></i></a>';
	$wallet1 = number_format($walletusdt,2).$walletAction1;
	
	
	   
	    
	      $totalrecharge = mysqli_query($con,"SELECT sum(price_amount) as total FROM `nowpayment` WHERE `payment_status` = 'finished' AND `userid` = '".$row["id"]."'");
	

	$totalResult=mysqli_fetch_array($totalrecharge);
	$recharge = number_format($totalResult['total'],2);
	
	$totalreward=mysqli_query($con,"select sum(`amount`)as total from  `tbl_reward` where `userid`='".$row["id"]."'");
	$totalResult=mysqli_fetch_array($totalreward);
	$reward = number_format($totalResult['total'],2);
	
	$totalreward1=mysqli_query($con,"select sum(`amountusdt`)as total from  `tbl_reward` where `userid`='".$row["id"]."'");
	$totalResult1=mysqli_fetch_array($totalreward1);
	$reward1 = number_format($totalResult1['total'],2);
	
	 $totalwithdrawal=mysqli_query($con,"select sum(`amount`)as total from  `tbl_withdrawal` where status = 0 and `userid`='".$row["id"]."'");
	$totalResult=mysqli_fetch_array($totalwithdrawal);
	$withdrawal = number_format($totalResult['total'],2);
	

            $snum = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM `tbl_user` WHERE `id` = '".$row["id"]."' "));
            
            
            $owncode = $snum['owncode'];
            
	
	   
	
	  $total_refer = mysqli_query(mysqli_query($con,"SELECT count(id) as total FROM `tbl_user` where code = '".$owncode."'"));
	  	$totalResult=mysqli_fetch_array($total_refer);
$refer = $totalResult['total']; 
	
$telegram=mysqli_query($con,"select sum(level1+level2+level3) as total from `tbl_bonus` where userid = '".$row["id"]."'");
	$link=mysqli_fetch_array($telegram);
	$ready = number_format($link['total'],2);
	
	
	 $fetchref=mysqli_query($con,"select sum(amount) as total from `tbl_walletsummery` where userid = '".$row["id"]."' and actiontype = 'refer_commission'");
	$link=mysqli_fetch_array($fetchref);
	$firstreward = number_format($link['total'],2); 
	


   $total_bonus = mysqli_query($con,"SELECT sum(amount) as total FROM `tbl_bonus` where amount > 0 AND userid = '".$row["id"]."'");
		$totalResult=mysqli_fetch_array($total_bonus);
$totalbonus =  number_format($totalResult['total'],1);

 $userid = $row['id'];
            $snum = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM `tbl_user` WHERE `id` = '".$userid."' "));
            
           
            $owncode = $snum['owncode'];
			  
			  
			  $total_refer = mysqli_fetch_assoc(mysqli_query($con,"SELECT count(id) as total FROM `tbl_user` where code = '".$owncode."'"));;
			  
			  $totalrefer = $total_refer['total'];


  $total_bonusw = mysqli_query($con,"SELECT `tbl_bonuswithdrawal` where  userid = '".$row["id"]."'");
		$totalResult=mysqli_fetch_array($total_bonus);
$totalbonusw =  number_format($totalResult['amount'],1);

$fetch = $row['mobile'];
$addstring = '';
$usermobile = $addstring.$fetch;
 $total_recharge_trx = mysqli_fetch_assoc(mysqli_query($con,"SELECT sum(actual_pay) as total FROM `nowpayment` WHERE `payment_status` = 'finished' AND `price_currency` = 'trx'  AND `userid` = '".$id."'"));
           $total_recharge_usdt = mysqli_fetch_assoc(mysqli_query($con,"SELECT sum(actual_pay) as total FROM `nowpayment` WHERE `payment_status` = 'finished' AND `price_currency` = 'usdttrc20'  AND `userid` = '".$id."'"));
          
          $total_withdraw_trx = mysqli_fetch_assoc(mysqli_query($con,"SELECT sum(amount) as total FROM `tbl_withdrawal` WHERE status = 0 AND payout = 'trx' AND userid = '".$id."'"));
          
         $total_withdraw_usdt = mysqli_fetch_assoc(mysqli_query($con, "SELECT SUM(amount) as total FROM tbl_withdrawal WHERE status = 0 AND payout = 'usdt' AND userid = '".$id."'"));
        
	
	
	if($row['status']==1){
        $del = '<a href="javascript:void(0);" onClick="Respond('.$id.')" class="update-person" style="color:#090; font-size:16px;" data-toggle="tooltip" title="Publish"><i class="fa fa-check-square-o"></i></a>';
    } else if($row['status']==0){
        $del = '<a href="javascript:void(0);" onClick="UnRespond('.$id.')" class="update-person" style="color:#f00; font-size:16px;" data-toggle="tooltip" title="Unpublish"><i class="fa fa-square-o"></i></a>';
    }
	
	$action =  ' <a href="javascript:void(0);" onClick="delete_row('.$id.')" class="update-person" style="color:#f56954; font-size:16px;" title="Delete"><i class="fa fa-trash"></i></a>'.$del.'
			 <a href="edit_user_info.php?user='.$id.'"  class="update-person" style="color:#0E0E44; font-size:16px;" data-toggle="tooltip" title="Edit"><i class="fa fa-edit"></i></a>
       <a href="user-details.php?user='.$id.'"  class="update-person" style="color:#0E0E44; font-size:16px;" data-toggle="tooltip" title="User Deatil"><i class="fa fa-info"></i></a>';    
    $ip = '<a href="https://whatismyipaddress.com/ip/'.$row['ip'].'" target="_blank">'.$row['ip'].'</a>';   
	
	$data[] = array( 
		    "id" => $id,
		     "name" => $row['name'],
            "mobile" => $row['mobile'],
            "ip" => $ip,
             "email" => $row['email'],
            "owncode" => $row['owncode'],
            "code" => $row['code'],
            "wallet" => $wallet,
            "wallet1" => $wallet1,
            "recharge" => $total_recharge_trx["total"],
             "recharge1" => $total_recharge_usdt["total"],
			"withdrawal" => $total_withdraw_trx["total"],
				"withdrawal1" => $total_withdraw_usdt["total"],
            "reward" => $reward,
            "reward1" => $reward1,
             "refer" => $totalrefer,
             "comission" => $ready,
             "bonus" => $totalbonus,
            
			 "bonusw" => $totalbonusw,
            "createdate" => $row['createdate'],
            "action" => $action,
		); 
}

## Response
$response = array(
	"draw" => intval($draw),
	"iTotalRecords" => $totalRecords,
	"iTotalDisplayRecords" => $totalRecordwithFilter,
	"data" => $data
	);

echo json_encode($response); exit;

// print_r(json_encode($response)); exit;
// return json_encode($response); 


