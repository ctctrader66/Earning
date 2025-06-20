<?php

 include("include/connection.php");
 
$firstDayOfMonth = new DateTime(date('Y-m-01'));
$getmonth = $firstDayOfMonth->format('Y-m-d');

$queryupdate=mysqli_query($con,"UPDATE `tbl_bonus` SET `amount`='0',`level1`='0',`level2`='0',`level3`='0'"); 

$querydel=mysqli_query($con,"DELETE FROM `tbl_bonussummery` WHERE date(`createdate`) <= '$getmonth'"); 
?>