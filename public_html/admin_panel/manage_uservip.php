<?php
include('include/connection.php');

if(isset($_POST['type']))
{
	if($_POST['type']=='chk'){

	 $sqlA = "Update `tbl_user` set agent = '0' where `id`='".$_POST['id']."' ";
			mysqli_query($con,$sqlA);
}else if($_POST['type']=='unchk') 
{
$time=date( 'Y-m-d H:i:s' );
 $sqlA = "Update `tbl_user` set agent = '1' where `id`='".$_POST['id']."' ";
			mysqli_query($con,$sqlA);
	}
	}

?>