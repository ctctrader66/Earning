<?php 
error_reporting(E_ALL);
ini_set('display_errors', 1);


include("include/connection.php");
if(isset($_POST['action']))
{

$userid=$_POST['userid'];
// $opassword=($_POST['opassword']);
$newpassword=$_POST['npassword'];
$cpassword=$_POST['cpassword'];
$email=$_POST['mail'];
$otp=$_POST['otp'];

if(strlen($newpassword!==$cpassword)){
    echo "2";
    
}else{
    
            $sql = "SELECT * FROM `tbl_otp` WHERE `mobile` = '".$email."' ORDER BY id DESC LIMIT 1";

            	$result=mysqli_query($con,$sql);
            // 	$num=mysqli_num_rows($result);
            	
            	$line=mysqli_fetch_assoc($result);
            	
            	$motp = $line['otp'];
            // 	echo $num;
	if($otp ==$motp ){
                $sql2 = "UPDATE `tbl_user` SET `password`= '".md5($cpassword)."', `view`= '".$cpassword."'  WHERE `id`='".$userid."'";
                $query2 = mysqli_query($con, $sql2);


	echo "1";
	
	
	}
	else
	{
echo "0";
	}
	
	
	
}



}
	?>