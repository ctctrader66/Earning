<?php 
include("include/connection1.php");
include("winnerResult1.php");
$current = strtotime(date("Y-m-d 00:00:00"));
$now = strtotime(date("Y-m-d H:i:s"));
$firstperiodid=date('Ymd').sprintf("%03d",1);
$lastperiodid=date('Ymd',strtotime("-1 days")).sprintf("%03d",360);

$checkperiod_Query=mysqli_query($con,"select * from `tbl_gameid1` order by id desc limit 1");
$periodRow=mysqli_num_rows($checkperiod_Query);
$periodidRow=mysqli_fetch_array($checkperiod_Query);


if($periodRow=='')
{
$sql1=mysqli_query($con,"INSERT INTO `tbl_gameid1` (`gameid`) VALUES ('".$firstperiodid."')");
	

}else if($lastperiodid==$periodidRow['gameid'])
{
  $truncateQuery=mysqli_query($con,"TRUNCATE TABLE `tbl_gameid1`");
  $truncateResultQuery=mysqli_query($con,"TRUNCATE TABLE `tbl_result1`");
    $sql1=mysqli_query($con,"INSERT INTO `tbl_gameid1` (`gameid`) VALUES ('".$firstperiodid."')");  
}else
{
$nextid=$periodidRow['gameid']+1;
$sql1=mysqli_query($con,"INSERT INTO `tbl_gameid1` (`gameid`) VALUES ('".$nextid."')");

	}

	
?>