<?php
ob_start();
session_start();
include("include/connection.php");
if(isset($_POST['action'])=="paydetail")
{ 
$finalamount=$_POST['finalamount'];
@$_SESSION['finalamount']=$finalamount;
echo"1";
}else{echo"0";}


?>