<?php
ob_start();
session_start();
include("include/connection.php");

@$userid = $_POST['userid'];

@$redept = 10;
@$date = date("Y-m-d");
@$time = date("Y-m-d H:i");
$getdata = mysqli_query($con, "SELECT * FROM `tbl_signin` WHERE `userid` = $userid  ORDER BY `id` DESC limit 1");
$fetch = mysqli_fetch_assoc($getdata);


// checking Betting 
              $total_bet1 = mysqli_query($con,"SELECT sum(amount) as total1 FROM `tbl_betting` where userid = '".$userid."' and date(`createdate`)='".$date."'");
                	$wagar_bet1=mysqli_fetch_array($total_bet1);
                $total_bet = $wagar_bet1['total1'];
                
                $wagar_check = $total_bet>500;
                  
                  if($wagar_check){

if ($fetch == "") {
    
    
    $add_data = mysqli_query($con, "INSERT INTO `tbl_signin`(`userid`, `rebates`) VALUES ('$userid','$redept')");
   

    if ($add_data) {
        
        $sql2 = "UPDATE tbl_wallet SET amount= amount+$redept WHERE userid=$userid";
        mysqli_query($con,$sql2);
        
        	$sql6= mysqli_query($con,"INSERT INTO `tbl_walletsummery`(`userid`,`amount`,`type`,`actiontype`) VALUES ('".$userid."','".$redept."','credit','Signin')");
        
        echo 1;
    } else {
        echo 2;
    }
} else {

    if ($fetch['date'] != $date) {
        $add_data = mysqli_query($con, "INSERT INTO `tbl_signin`(`userid`, `rebates`) VALUES ('$userid','$redept')");

        if ($add_data) {
            
              $sql2 = "UPDATE tbl_wallet SET amount= amount+$redept WHERE userid=$userid";
        mysqli_query($con,$sql2);
        
        	$sql6= mysqli_query($con,"INSERT INTO `tbl_walletsummery`(`userid`,`amount`,`type`,`actiontype`) VALUES ('".$userid."','".$redept."','credit','Signin')");
        	
            echo 1;
        } else {
            echo 2;
        }
    } else {
        echo 3;
    }
}
} else {
        echo 4;
    }