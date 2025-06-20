<?php 
include("include/connection3.php");
if($_POST['type']=='generate'){
	$checkperiod_Query=mysqli_query($con,"select * from `tbl_gameid3` order by id desc limit 1");
$periodidRow=mysqli_fetch_array($checkperiod_Query);
	echo $periodidRow['gameid'].'~'.'';

}
?>