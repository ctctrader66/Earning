<?php

 include("include/connection.php");

$today = date('Y-m-d');


$today1 = new DateTime();
$twoDaysAgo = $today1->sub(new DateInterval('P1D'));
$twooneAgo = $twoDaysAgo->format('Y-m-d');


$fiveDaysAgo = $today1->sub(new DateInterval('P5D'));
$fiveoneAgo = $fiveDaysAgo->format('Y-m-d');

$firstDayOfMonth = new DateTime(date('Y-m-01'));
$getmonth = $firstDayOfMonth->format('Y-m-d');


$querydel=mysqli_query($con,"DELETE FROM `tbl_walletsummery` WHERE actiontype = 'join' and date(`createdate`) <= '$fiveoneAgo'"); //transcation Join summery

$querydel=mysqli_query($con,"DELETE FROM `tbl_walletsummery` WHERE actiontype = 'win' and date(`createdate`) = '$fiveoneAgo'"); //transcation Win summery


$querydel=mysqli_query($con,"DELETE FROM `tbl_betting` WHERE date(`createdate`) <= '$twooneAgo'"); 
$querydel=mysqli_query($con,"DELETE FROM `tbl_betting1` WHERE date(`createdate`) <= '$twooneAgo'"); 


$querydel=mysqli_query($con,"DELETE FROM `tbl_order` WHERE date(`createdate`) <= '$twooneAgo'"); 
$querydel=mysqli_query($con,"DELETE FROM `tbl_order1` WHERE date(`createdate`) <= '$twooneAgo'"); 


$querydel=mysqli_query($con,"DELETE FROM `tbl_userresult` WHERE date(`createdate`) <= '$twooneAgo'"); 
$querydel=mysqli_query($con,"DELETE FROM `tbl_userresult1` WHERE date(`createdate`) <= '$twooneAgo'"); 


$querydel=mysqli_query($con,"DELETE FROM `nowpayment` WHERE 'payment_status' = 'waiting' and `date` <= '$today'"); 

$querydel=mysqli_query($con,"DELETE FROM `tbl_gameid1` WHERE date(`createdate`) <= '$today'"); 
$querydel=mysqli_query($con,"DELETE FROM `tbl_gameid` WHERE date(`createdate`) <= '$today'"); 

$querydel=mysqli_query($con,"DELETE FROM `tbl_result1` WHERE date(`createdate`) <= '$today'"); 
$querydel=mysqli_query($con,"DELETE FROM `tbl_result` WHERE date(`createdate`) <= '$today'"); 

?>



	
			