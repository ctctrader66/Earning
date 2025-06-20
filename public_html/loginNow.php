<?php 
// exit('hello');
ob_start();
session_start();
include("include/connection.php");
require("cookie.php");

if(isset($_POST['action'])=="login")
{ 
   date_default_timezone_set("Asia/Kolkata");
$time=date( 'Y-m-d H:i:s' );
$username=$_POST['login_mobile'];
$password=$_POST['login_password'];
if($username!='' && $password!=''){
$sql="select * from `tbl_user` where `mobile`='".$username."' and `password`='".md5($password)."' and `status`='1'";
	$result=mysqli_query($con,$sql);
	$num=mysqli_num_rows($result);
	$line=mysqli_fetch_assoc($result);
	if($num>=1)
	{
    	    $userid=$line['id'] ;
    		$_SESSION['frontuserid']=$userid;
    		$_SESSION['mobile']=$line['mobile'];
  
                $days = 1;
                $value = encryptCookie($userid);
                setcookie ("frontuserid",$value,time()+ ($days *  24 * 60 * 60 * 1000));
   
    		echo"1";
    		
    	}
    	else
    	{
    		echo"0";
    		exit;
    	}
}else{echo"0";}
}
else
{
	echo"0";
	exit;
}
?>