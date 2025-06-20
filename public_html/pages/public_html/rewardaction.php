<?php
ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);
include('include/connection.php');
$userid = isset($_GET['userid']) ? $_GET['userid'] : '';
$amount = isset($_GET['amount']) ? $_GET['amount'] : '';

//create here date 
$date = date('Y-m-d H:i:s');
if(!empty($userid) && !empty($amount) ){
   // $selectruser=mysqli_query($con,"select * from `tbl_user` where `id`='".$userid."'");
    $sql = mysqli_query($con,"INSERT INTO tbl_taskreward VALUES ('','".$userid."', '".$amount."','".$date."')");
    $sql2 = mysqli_query($con,"UPDATE tbl_wallet SET amount=amount+'".$amount."' WHERE userid='".$userid."'" );
    	$sql6= mysqli_query($con,"INSERT INTO `tbl_walletsummery`(`userid`,`amount`,`type`,`actiontype`) VALUES ('".$userid."','".$amount."','credit','task')");
    // 'sql : '.$sql;
     echo 1;
}else{
    echo 0 ;
}
?>
