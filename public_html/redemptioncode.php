<?php
include('include/connection.php');

$username = isset($_GET['giftCode']) ? $_GET['giftCode'] : '';
$role_query=mysqli_query($con,"SELECT * FROM `lifafa` WHERE `random`='".$username."'");

if($role_query->num_rows > 0){	
echo"1";}else{ echo"0";}		

?>