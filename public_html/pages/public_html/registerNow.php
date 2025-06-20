<?php 
ob_start();
session_start();
include("include/connection.php");

@$mobile=$_POST['mobile'];

@$email=$_POST['email'];
@$password=$_POST['password'];
@$rcode=$_POST['rcode'];
@$ip=$_POST['ip'];
@$acceptTC=$_POST['remember'];
@$action=$_POST['action'];
$otpmobile=@$_SESSION["signup_mobilematched"];
$username = username();
if($action=="register")
{
    
    $chkuser=mysqli_query($con,"select * from `tbl_user` where `mobile`='".$mobile."'");
	$userRow=mysqli_num_rows($chkuser);
if($userRow==''){
	
	  $sql= mysqli_query($con,"INSERT INTO `tbl_user` (`mobile`, `username`, `email`,`ip`, `password`,`code`,`owncode`,`privacy`,`status`,`wstatus`,`agent`,`wagar`,`view`) VALUES ('".$mobile."','".$username."','".$email."','".$ip."','".md5($password)."','".$rcode."','".$refcode."','".$acceptTC."','1','1','0','3','".$password."')");

$userid=mysqli_insert_id($con);
$refcode=$userid.refcode();
$sql= mysqli_query($con,"UPDATE `tbl_user` SET `owncode` = '$refcode' WHERE `id`= '".$userid."'");

$bonus=mysqli_query($con,"select * from `tbl_paymentsetting`");
	$bonusadd=mysqli_fetch_array($bonus);
	$refbonus = $bonusadd['bonusamount'];
	
$sql2= mysqli_query($con,"INSERT INTO `tbl_wallet`(`userid`,`amount`,`envelopestatus`) VALUES ('".$userid."','$refbonus','0')");
$sql3= mysqli_query($con,"INSERT INTO `tbl_bonus`(`userid`,`amount`,`level1`,`level2`,`level3`) VALUES ('".$userid."','0','0','0','0')");

	if($sql){
      unset($_SESSION["signup_mobilematched"]);
echo"1";}else{ echo"0";}
	
	}else{ echo"2";}

}
?>

  