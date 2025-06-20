<?php 
ob_start();
session_start();
include("include/connection.php");

@$address=$_POST['address'];
$today = date("Y-m-d H:i:s");
if($action=="sumbit")
{
	

$chkbankdetailQuery=mysqli_query($con,"select * from `lifafa_his` where `l_id`='".$address."'");
$bankdetailRows=mysqli_num_rows($chkbankdetailQuery);
if($bankdetailRows==true)
{

echo"1";	
	
	}else{echo"2";}//bank detail chk
	
	
	
	
}
?>