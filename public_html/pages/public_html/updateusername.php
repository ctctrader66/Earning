<?php
include('include/connection.php');

$username = isset($_GET['username']) ? $_GET['username'] : '';
$id = isset($_GET['id']) ? $_GET['id'] : '';

$role_query=mysqli_query($con,"UPDATE `tbl_user` SET `username`='".$username."' WHERE `id` ='".$id."'");


if($role_query){	
echo"1";}else{ echo"0";}		

?>